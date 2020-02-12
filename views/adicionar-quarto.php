<?php include 'menu-lateral.php'; ?>
<div class="container">
    <div class="adicionar-container">
        <div class="title"><h4>Insira as informações do quarto</h4></div>
        <div class="formulario-container">

            <form method="POST" class="form-group" enctype="multipart/form-data">
                <div style="color:white;" class="">
                    <input style="margin-top: 8px; background: white;" class="formulario-container input-full form-control" type="text" name="nome" placeholder="Nome" />
                </div>
                <div class="col-md-6">
                    <select class="select-menu-reserva-sel form-control" type="text" name="capacidade" placeholder="Capacidade"> 
                        <option style="color: #9999a6;">Selecione a Capacidade</option>
                        <option value='1'>Uma Pessoa</option>
                        <option value='2'>Duas Pessoas</option>
                        <option value='3'>Três Pessoas</option>
                        <option value='4'>Quatro Pessoas</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for='selecao-arquivo'>Selecionar uma foto &#187;</label>
                    <input id='selecao-arquivo' style="border: 0;" type="file" name="foto" placeholder="Foto" />
                </div>


                <textarea placeholder='Descrição' style="border: 1px solid #4a7c86;font-size: 14pt;" class='formulario-container input-full form-control' name='descricao'></textarea>

                <input type="submit" value="Cadastrar" class="btn-select-add"/>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'error'): ?>
                    <div class='error falha'>Este Quarto já está cadastrado.</div>

                <?php endif; ?>
                <?php if (isset($_GET['aviso']) && $_GET['aviso'] == 'sucesso'): ?>
                    <div class='error'>Quarto cadastrado com sucesso.</div>

                <?php endif; ?>
            </form>
        </div>
    </div>

</div>



