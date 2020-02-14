<?php include 'menu-lateral-design.php'; ?>
<div class="container">
    <div class="cliente-container" >

        <div class="cliente-container-content">
            <div class="title"><h4>Clientes cadastrados no sistema</h4></div>
            <div class="cliente-filter">
                <form method="GET">
                    <input type="text" class="pesq_nome" name="filtro_nome" placeholder="Digite o nome"/>
                    <input type="text" class="pesq_cpf" name="filtro_cpf" id="cpf" placeholder="Digite o CPF"/>
                    <input type="submit" class="btn-filtrar" value="Filtrar"/>
                </form>
                <a href="<?php echo BASE_URL; ?>clientes/adicionar"><button class="btn-add">Cadastrar Cliente</button></a>
            </div>
            <div class="clientes-content">
                <table class='table table-bordered' width='100%'>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <th>Data de Nacimento</th>
                        <th>Opções</th>
                    </tr>
                    <?php
                    if ($clientes != false) {
                        foreach ($clientes as $item) :
                            ?>
                            <tr>
                                <td><?php echo utf8_decode($item['nome']); ?></td>
                                <td><?php echo utf8_encode($item['cpf']); ?></td>
                                <td><?php echo utf8_encode($item['telefone']); ?></td>
                                <td><?php echo utf8_encode($item['sexo']); ?></td>
                                <td><?php echo utf8_encode(date('d/m/Y', (strtotime($item['data_nascimento'])))); ?></td>
                                <td><a href="<?php echo BASE_URL . 'clientes/editar?id=' . $item['id']; ?>"><button class="btn btn-default btn-opcoes">Editar</button></a><a href="<?php echo BASE_URL . 'clientes/excluir?id=' . $item['id']; ?>"><button class="btn btn-danger btn-opcoes">Excluir</button></a></td>
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
                    ?><a class="paginacao-item" href="<?php echo BASE_URL ?>clientes?p=<?php echo $p; ?>"><?php echo $p; ?></a>

                <?php endfor; ?>
            </div>
        </div>


    </div>


</div>


