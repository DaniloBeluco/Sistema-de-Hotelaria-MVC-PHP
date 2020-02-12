<?php include 'menu-lateral.php'; ?>
<div class="container">
    <div class="adicionar-container">
        <div class="title"><h4>Insira os dados do cliente</h4></div>
        <div class="formulario-container">

            <form method="POST" class="form-group">


                <div class="col-md-6">
                    <input class="formulario-container check form-control" type="text" name="nome" placeholder="Nome" />
                </div>
                <div class="col-md-6">
                    <input class="formulario-container check form-control" id='telefone' type="text" name="telefone" placeholder="Telefone" />
                </div>
                <div class="col-md-6">
                    <input class="formulario-container check form-control" id='checkin' type="text" name="data_nascimento" placeholder="Data de Nascimento" />
                </div>
                <div class="col-md-6">
                    <select  class="select-menu-reserva-sel form-control" type="text" name="sexo" placeholder="Sexo">
                        <option>Selecione o Sexo</option>
                        <option value='Masculino'>Masculino</option>
                        <option value='Feminino'>Feminino</option>
                    </select>
                </div>
                <input type="text" name="cpf" class="formulario-container input-full form-control" id='cpf' placeholder="CPF"/>

                <input type="submit" value="Cadastrar" class="btn-select-add"/>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'error'): ?>
                <div class='error falha'>Este <strong>CPF</strong> já está cadastrado.</div>

                <?php endif; ?>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'sucesso'): ?>
                    <div class='error'>Cliente cadastrado com sucesso.</div>

                <?php endif; ?>
        </div>
    </div>

</div>



