<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class AppController extends Action{

        public function timeline(){
            session_start();

            //Verifica se o usuário que está tentando acessar a página passou pelo processo de autenticação
            if($_SESSION['id'] != null && $_SESSION['nome'] != null){
                $this->render('timeline');
            }else{
                header('Location:/?login=erro');
            }
            
        }
    }

?>