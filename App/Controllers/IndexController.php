<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action{

        //Action PATH index
        public function index(){

            $this->render('index');
        }

        public function inscreverse(){

            $this->render('inscreverse');
        }

        public function cadastrar(){
            $usuario = Container::getModel('usuario');
            $usuario->__set('nome', $_POST['nome'])
                    ->__set('email', $_POST['email'])
                    ->__set('senha', $_POST['senha']);
            $usuario->salvar();
            print_r($usuario);
        }
        
    }
?>
