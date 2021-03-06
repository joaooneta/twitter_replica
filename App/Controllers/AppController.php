<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class AppController extends Action{

        public function timeline(){
            $this->validaLogin();
            $id_usuario = $_SESSION['id'];
            
            $tweet = Container::getModel('tweet');
            $tweet->__set('id_usuario', $id_usuario);

            $tweets = $tweet->getAll();
            $this->view->tweets = $tweets;

            $numeroTweets = $tweet->getNumeroTweets();
            $this->view->numeroTweets = $numeroTweets;

            $seguidores = Container::getModel('seguidores');
            $seguidores->__set('id_usuario', $id_usuario);
            $numeroSeguidores = $seguidores->getSeguidores();
            $this->view->numeroSeguidores = $numeroSeguidores;

            $seguidores->__set('id_usuario_seguidor', $id_usuario);
            $numeroSeguindo = $seguidores->getSeguindo();
            $this->view->numeroSeguindo = $numeroSeguindo;

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
            //Inicia sessão para que seja possível recuperar o valor do id do usuário logado no momento
            session_start();

            $nomeBusca = isset($_GET['nome']) ? $_GET['nome'] : '';
            $usuarios = array();
            if($nomeBusca != ''){
                $usuario = Container::getModel('usuario');
                $usuario->__set('nome', $nomeBusca);
                $usuario->__set('id', $_SESSION['id']);
                $usuarios = $usuario->getAll();
            }

            $this->view->usuarios = $usuarios;
            $this->render('buscarConhecidos');
        }

        public function seguir(){
            $this->validaLogin();

            if(isset($_GET['id_usuario']) && isset($_GET['info'])){
                $seguir = Container::getModel('seguidores');
                $seguir->__set('id_usuario', $_GET['id_usuario'])
                       ->__set('id_usuario_seguidor', $_SESSION['id']);
                if($_GET['info'] == 'true'){
                    $seguir->seguir();
                }else{
                    $seguir->deixarDeSeguir();
                }
            }else{
                header('Location:/timeline');
            }

            header('Location:/timeline');
        }

        public function remover(){
            $this->validaLogin();
            
            $id_tweet = isset($_GET['id']) ? $_GET['id'] : '';
            $tweet = Container::getModel('tweet');
            $tweet->__set('id', $id_tweet);
            if($_SESSION['id'] == $tweet->getIdUsuario()){
                $tweet->deleteTweet(); 
                echo 'Removido!'; 
            }
            
            header('Location:/timeline');
        }

        public function perfil(){
            $this->validaLogin();

            $usuario = Container::getModel('usuario');
            $usuario->__set('id', $_GET['id_usuario']);
            $perfil = $usuario->getUsuarioPorId();

            $tweet = Container::getModel('tweet');
            $tweet->__set('id_usuario', $_GET['id_usuario']);
            $tweets = $tweet->getTweetsPorId();

            if($perfil != NULL && $_GET['id_usuario'] != $_SESSION['id']){
                $this->view->perfil = $perfil;
                $this->view->tweets = $tweets;
    
                $this->render('perfil');
            }else{
                header('Location:/timeline');
            }
        }
    }

?>