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

            //Rota timeline
            $routes['timeline'] = array('route' => '/timeline',
                                        'controller' => 'AppController',
                                        'action' => 'timeline');

            //Rota sair
            $routes['sair'] = array('route' => '/sair',
                                    'controller' => 'AuthController',
                                    'action' => 'sair');

            //Rota tweet
            $routes['tweet'] = array('route' => '/tweet',
                                     'controller' => 'AppController',
                                     'action' => 'twittar');

            //Rota buscar_conhecidos
            $routes['buscar_conhecidos'] = array('route' => '/buscar_conhecidos',
                                                 'controller' => 'AppController',
                                                 'action' => 'buscarConhecidos');

            $this->setRoutes($routes);
        }

    }
?>