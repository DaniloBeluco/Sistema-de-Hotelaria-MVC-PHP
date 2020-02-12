<?php include 'menu-lateral.php'; ?>
<div class="container">
    <div class="adicionar-container">
        <div class="title"><h4>Insira os novos dados do cliente</h4></div>
        <div class="formulario-container">

            <form method="POST" class="form-group">


                <div class="col-md-6">
                    <input class="formulario-container check form-control" type="text" name="nome" placeholder="Nome" value="<?php echo $cliente_dados['nome']; ?>" />
                </div>
                <div class="col-md-6">
                    <input class="formulario-container check form-control" id='telefone' type="text" name="telefone" placeholder="Telefone" value="<?php echo $cliente_dados['telefone']; ?>" />
                </div>
                <div class="col-md-6">
                    <input class="formulario-container check form-control" id='checkin' type="text" name="data_nascimento" placeholder="Data de Nascimento" value="<?php echo date('d/m/Y', strtotime($cliente_dados['data_nascimento'])) ?>" />
                </div>
                <div class="col-md-6">
                    <select  class="select-menu-reserva-sel form-control" type="text" name="sexo" placeholder="Sexo">
                        <option>Selecione o Sexo</option>
                        <option <?php if ($cliente_dados['sexo'] == 'Masculino'): echo 'selected';
endif;
?> value='Masculino'>Masculino</option>
                        <option <?php if ($cliente_dados['sexo'] == 'Feminino   '): echo 'selected';
                            endif;
?> value='Feminino'>Feminino</option>
                    </select>
                </div>
                <input type="text" name="cpf" class="formulario-container input-full form-control" id='cpf' placeholder="CPF" value="<?php echo $cliente_dados['cpf']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                <input type="submit" value="Editar" class="btn-select-add"/>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'error'): ?>
                    <div class='error falha'>Este <strong>CPF</strong> já está cadastrado.</div>

<?php endif; ?>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'sucesso'): ?>
                    <div class='error'>Cliente editado com sucesso.</div>

<?php endif; ?>
        </div>
    </div>

</div>



