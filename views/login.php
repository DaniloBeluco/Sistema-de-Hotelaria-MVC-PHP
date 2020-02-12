<html>
    <header>

    </header>
    <body class="body-login" style="background-image: url('<?php echo BASE_URL; ?>assets/images/blur.jpg')">
        <div class="col-md-4"></div>
        <div class="col-md-4 div-login">
            <img src="<?php echo BASE_URL; ?>assets/images/d.png" width="150" height="150" class="login-logo"/><br/>
            <form method="POST">
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Seu email"/><br/><br/>

                    <input type="password" name="senha" id="senha" placeholder="Sua senha"/><br/><br/>
                    <input type="submit" value="Entrar" class="btn btn-default btn-login" />

                    <?php if (isset($_GET['aviso'])): ?>
                        <div class='error'>Usuário e/ou senha incorretos</div>

                    <?php endif; ?>
                </div>
            </form>
        </div>    
    </body>
