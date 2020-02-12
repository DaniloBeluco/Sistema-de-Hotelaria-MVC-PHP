<?php

class Core {     //inicia o mvc

    public function run() {    //pega a url que nois ta enviando e a partir dela identifica o controller
        $url = '/';
        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }
        $params = array();
        if (!empty($url) && $url != '/') {

            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0] . 'Controller';
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {

                $currentAction = $url[0];
                array_shift($url);
            } else {

                $currentAction = 'index';
            }
            if (count($url) > 0) {  //se ainda tiver algo na url 
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }


        $c = new $currentController();

        //executo uma classe e um metodo da classe, e passa os parametros que envie junto
        call_user_func_array(array($c, $currentAction), $params); //pega a classe e executa a action
        //echo '<hr/>';
        //echo "CONTROLLER: " . $currentController . "<br/>";
        //echo "ACTION: " . $currentAction . "<br/>";
        //echo "PARAMS: " . print_r($params) . "<br/>";
    }

}
