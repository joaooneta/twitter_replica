<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action{

        //Action PATH index
        public function index(){

            $this->view->login = isset($_GET['login']) ? 'E-mail ou senha informados estão incorretos!' : '';
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

            //Cadastro válido
            if($usuario->validarCadastro()){
                //Procura outro usuário com mesmo e-mail
                if(count($usuario->getUsuarioPorEmail()) == 0){
                    $usuario->salvar();
                    $this->render('cadastro');
                }else{
                    //Armazena o erro e o informa ao usuário na view inscreverse
                    $this->view->erroCadastro = 'Email já cadastrado!';

                    //Guarda os dados já digitados pelo usuário
                    $this->view->usuario = $usuario;
                    
                    $this->render('inscreverse');
                }
            //Cadastro inválido
            }else{
                //Armazena o erro e o informa ao usuário na view inscreverse
                $this->view->erroCadastro = 'Tamanho mínimo dos campos não atingido! Nome(3), Email(10), Senha(8)!';

                //Guarda os dados já digitados pelo usuário
                $this->view->usuario = $usuario;

                $this->render('inscreverse');
            }

        }
        
    }
?>
