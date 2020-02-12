<?php include 'menu-lateral.php'; ?>
<div class="container">
    <div class="cliente-container" >
        <div class="cliente-container-content">  
            <div class="title"><h4>Registro de reservas do sistema</h4></div>
            <div class="cliente-filter">
                <form method="GET">
                    <input type="text" class="pesq_nome" name="filtro_cliente" placeholder="Digite o nome do cliente"/>
                    <input type="text" class="pesq_cpf" name="filtro_quarto" placeholder="Digite o nome do Quarto"/>
                    <input type="submit" class="btn-filtrar" value="Filtrar"/>
                </form>
            </div>
            <div class="clientes-content">
                <table class='table table-bordered' width='100%'>
                    <tr>
                        <th>Cliente</th>
                        <th>Quarto Reservado</th>
                        <th>Data do CheckIn</th>
                        <th>Data do CheckOut</th>
                    </tr>
                    <?php
                    if ($reservas != false) {
                        foreach ($reservas as $item) :
                            ?>
                            <tr>
                                <td><?php echo utf8_decode($item['cliente']); ?></td>
                                <td><?php echo utf8_decode($item['quarto']); ?></td>
                                <td><?php echo utf8_encode(date('d/m/Y', (strtotime($item['data_inicio'])))); ?></td>
                                <td><?php echo utf8_encode(date('d/m/Y', (strtotime($item['data_fim'])))); ?></td>
                            </tr>
                            <?php
                        endforeach;
                    } else {
                        echo 'Nenhum resultado retornado.';
                    }
                    ?>
                </table>
            </div>
            <div style="" class='paginacao'>
                <?php
                for ($p = 1; $p <= $paginas; $p++):
                    ?><a class="paginacao-item" style="color:white;" href="<?php echo BASE_URL ?>clientes?p=<?php echo $p; ?>"><?php echo $p; ?></a>

                <?php endfor; ?>
            </div>
        </div>


    </div>


</div>


