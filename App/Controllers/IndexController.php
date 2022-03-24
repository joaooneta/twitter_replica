<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action{

        //Action PATH index
        public function index(){

            $this->render('index');
        }
        
    }
?>
