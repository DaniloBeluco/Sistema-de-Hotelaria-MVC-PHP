<?php
$u = new Usuarios();
if (!empty($_SESSION['cLogin'])) {
    $usuario = $u->getInfo($_SESSION['cLogin']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meu site</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/animation.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.maskedinput-1.1.4.pack.js"/></script>
</head>
<body style="background-image: url('<?php echo BASE_URL; ?>assets/images/blur.jpg')">

    <?php if (isset($_SESSION['cLogin']) && (!empty($_SESSION['cLogin']))): ?>
        <nav class="navbar navbar-inverse menu-topo">
            <div class="container-fluid">
                <div class="navbar-header">                                  
                    <a class="navbar-brand" href="<?php echo BASE_URL; ?>dashboard">
                        <div class="menu-logo">
                            <img src="<?php echo BASE_URL; ?>assets/images/d.png" width="50" height="50" class="menu-logo"/>
                        </div>
                        <div class="menu-title">
                            Hotel
                        </div>

                    </a>
                </div>


                <div class="nav navbar-nav navbar-right">
                    <ul>
                        <li class="li-topo">Bem vindo, <?php echo '<strong>' . $usuario . '</strong>'; ?></li>
                        <li class="li-topo"><a class="topo-sair" href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <div class="content">

        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>
    <?php if (isset($_SESSION['cLogin']) && (!empty($_SESSION['cLogin']))): ?>
        <!-- Footer -->
        <footer style="background:white;margin-top: 59px;" class="page-footer font-small blue pt-4">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div  class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <img style="padding:20px;" src="<?php echo BASE_URL . 'assets/images/footer/certificado-ssl.png' ?>" width="160"/>
                        <img style="padding:20px;" src="<?php echo BASE_URL . 'assets/images/footer/google-navegacao-segura.png' ?>" width="160"/>
                    </div>
                    <!-- Grid column -->


                    <!-- Grid column -->
                    <div style="" class="col-md-6 mb-md-0 mb-3">
                        <h3 style="line-height:75px;color:#4b7a86;"><strong></strong></h3>

                    </div>
                    <!-- Grid column -->


                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div style="color:white;padding: 20px;background: #4fcd62" class="footer-copyright text-center py-3">© 2020 Copyright:
                <a style="color: gold;" href=""> Danweb.com</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer --> 
    <?php endif; ?>
</body>

</html>

