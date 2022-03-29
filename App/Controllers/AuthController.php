<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class AuthController extends Action{

        public function logar(){
            $usuario = Container::getModel('usuario'); 
            $usuario->__set('email', $_POST['email'])
                    ->__set('senha', $_POST['senha']);

            $usuario->autenticar();

            //Caso autenticação ocorra com sucesso, armazena os dados id e nome em uma sessão, se não redireciona para a página de login
            if($usuario->__get('id') != null && $usuario->__get('nome') != null){
               
                session_start();
                $_SESSION['id'] = $usuario->__get('id');
                $_SESSION['nome'] = $usuario->__get('nome');

                //Redireciona para a linha do tempo do usuário
                header("Location: /timeline");
            }else{
                header('Location: /?login=erro');
            }
        }

        public function sair(){
            session_start();
            session_destroy();
            header('Location:/');
        }
    }


?>