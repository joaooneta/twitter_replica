<?php

    namespace MF\Init;

    abstract class Bootstrap{
        //Array que armazena as rotas
        private $routes;

        //Define necessidade do método ser declarado na classe filha
        abstract protected function initRoutes();

        //Função construtora que inicia as rotas, além de iniciar o método run() responsável por encaminhar o PATH ao controller correspondente
        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        //GET & SET
        public function getRoutes(){
            return $this->routes;
        }

        public function setRoutes(array $routes){
            $this->routes = $routes;
        }

        //Identifica o PATH acessado pelo usuário e gera dinamicamente o controller responsável pela página
        protected function run($url){
            foreach($this->getRoutes() as $key => $route){
                if($url == $route['route']){
                    $class = "App\\Controllers\\" . ucfirst($route['controller']);
                    $controller = new $class;
                    $action = $route['action'];
                    $controller->$action();
                }
            }
        }

        //Retorna o PATH acessado pelo usuário
        protected function getURL(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

?>