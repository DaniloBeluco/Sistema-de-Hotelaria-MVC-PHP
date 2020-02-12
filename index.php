<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        require 'config.php';
        spl_autoload_register(function($class) {
            if (file_exists('controllers/' . $class . '.php')) {
                require 'controllers/' . $class . '.php';
            } else if (file_exists('models/' . $class . '.php')) {
                require 'models/' . $class . '.php';
            } else if (file_exists('core/' . $class . '.php')) {
                require 'core/' . $class . '.php';
            }
        });

        $core = new Core();
        $core->run();
        ?>
    </body>
</html>
