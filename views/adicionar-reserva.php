<?php include 'menu-lateral.php'; ?>
<div class="container">
    <div class="adicionar-container">
        
        <div class="title"><h4>Insira os dados da reserva</h4></div>
        <div class="formulario-container">

            <form method="POST" class="form-group">
                <select name="quarto" class="form-control">
                    <option>Selecione um Quarto</option>
                    <?php
                    foreach ($quartos as $quarto):
                        ?>
                        <option value="<?php echo $quarto['id']; ?>"><?php echo utf8_encode($quarto['nome']); ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>

                <div class="col-md-6">
                    <input class="formulario-container check form-control" id="checkin" type="text" name="data_inicio" placeholder="Data do Check In" />
                </div>
                <div class="col-md-6">
                    <input class="formulario-container check form-control" id="checkout" type="text" name="data_fim" placeholder="Data do Check Out" />
                </div>
                <select name="cliente" class=" form-control" placeholder="Selecione o Cliente">
                    <option>Selecione o Cliente</option>                   
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value='<?php echo $cliente['id']; ?>'><?php echo $cliente['nome'] . ' - ' . $cliente['cpf']; ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" value="Reservar" class="btn-select-add"/>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'error'): ?>
                    <div class='error falha' style="background-color: rgb(255, 0, 0, 0.3);">Quarto já reservado nessa data.</div>

                <?php endif; ?>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'sucesso'): ?>
                    <div class='error'>Reserva criada com sucesso.</div>

                <?php endif; ?>
        </div>
    </div>

</div>



