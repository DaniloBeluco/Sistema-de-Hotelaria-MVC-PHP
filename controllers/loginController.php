<?php

class loginController extends controller {

    function index() {
        $dados = array();
        $u = new Usuarios();

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = $_POST['senha'];

            if ($u->login($email, $senha)) {
                ?>
                <script type="text/javascript">window.location.href = "./dashboard";</script>
                <?php

            } else {
                
            }
        }
        $this->loadTemplate('login', $dados);
    }

    function sair() {
        session_start();
        unset($_SESSION['cLogin']);
        header("Location:" . BASE_URL . "login");
    }

}
