<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class AppController extends Action{

        public function timeline(){
            $this->validaLogin();

            $tweet = Container::getModel('tweet');
            $tweet->__set('id_usuario', $_SESSION['id']);
            $tweets = $tweet->getAll();

            $this->view->tweets = $tweets;

            $this->render('timeline');
        }

        public function twittar(){
            $this->validaLogin();

            $tweet = Container::getModel('tweet');
            $tweet->__set('tweet', $_POST['tweet'])
                  ->__set('id_usuario', $_SESSION['id']);
            $tweet->setTweet();
            header('Location:/timeline');
        }

        public function validaLogin(){
            session_start();

            if($_SESSION['id'] != null && $_SESSION['nome'] != null){
                return true;
            }else{
                header('Location:/?login=erro');
            }
        }

        public function buscarConhecidos(){
            $nomeBusca = isset($_GET['nome']) ? $_GET['nome'] : '';
            $usuarios = array();
            if($nomeBusca != ''){
                $usuario = Container::getModel('usuario');
                $usuario->__set('nome', $nomeBusca);
                $usuarios = $usuario->getAll();
            }

            $this->view->usuarios = $usuarios;
            $this->render('buscarConhecidos');
        }
    }

?>