<?php

    namespace MF\Controller;
    
    abstract class Action{
        protected $view;

        //Função construtora responsável por tornar possível armazenar dados em um objeto vazio acessável pela view
        public function __construct(){
            $this->view = new \stdClass();
        }

        //Função responsável por renderizar a view
        protected function render($view, $layout = 'layout'){
            //Permitindo acesso do dado da view a função content()
            $this->view->page = $view;

            //Caso o arquivo não exista, exibe somente o conteúdo
            if(file_exists("../App/Views/index/".$layout.".phtml")){
                require_once "../App/Views/index/".$layout.".phtml";
            }else{
                $this->content();
            }
            
        }

        //Requisição da View pelo controller a partir da página index
        protected function content(){
            //Encontrando dinamicamente o diretório da view solicitado pelo controller
            $controller = get_class($this);
            $controller = str_replace('App\\Controllers\\', '', $controller);
            $controller = str_replace('Controller', '', $controller);
            $controller = strtolower($controller);

            require_once "../App/Views/" .$controller. "/" .$this->view->page. ".phtml";
        }
        
    }

?>