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

            //Rota inscreverse
            $routes['inscreverse'] = array('route' => '/inscreverse',
                                           'controller' => 'indexController',
                                           'action' => 'inscreverse');

            //Rota cadastrar
            $routes['cadastrar'] = array('route' => '/cadastrar',
                                         'controller' => 'IndexController',
                                         'action' => 'cadastrar');

            //Rota logar
            $routes['logar'] = array('route' => '/logar',
                                         'controller' => 'AuthController',
                                         'action' => 'logar');

            $this->setRoutes($routes);
        }

    }
?>