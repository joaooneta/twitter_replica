<?php
    namespace App;
    use MF\Init\Bootstrap;

    class Route extends Bootstrap{
        
        //Rotas do sistema
        protected function initRoutes(){

            //Rota Home
            $routes['home'] = array('route' => '/', 
                                    'controller' => 'indexController', 
                                    'action' => 'index');

            $this->setRoutes($routes);
        }

    }
?>