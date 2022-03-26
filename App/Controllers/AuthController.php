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

            if($usuario->__get('id') != null && $usuario->__get('nome') != null){
                echo 'Autenticado!';
            }else{
                header('Location: /?login=erro');
            }
        }
    }


?>