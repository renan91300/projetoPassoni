<?php
    namespace Config;
    class ConfigController{
        private $url;
        private $urlConjunto;
        private $urlController;
        private $urlMetodo;
        private $urlParametro;
        private static $formato;
        
        public function __construct(){
            if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
                $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
                $this->clearUrl(); //limpa a url
                //SEPARA OS VALORES EM ARRAY
                
                $this->urlConjunto = explode("/", $this->url);
                
                //trata o controller e método, caso existam
                if(isset($this->urlConjunto[0]) && (isset($this->urlConjunto[1]))){
                    $this->urlController = $this->prepararController($this->urlConjunto[0]);
                    $this->urlMetodo = $this->urlConjunto[1];
                }
               else if(isset($this->urlConjunto[0]) && (!isset($this->urlConjunto[1]))){
                    $this->urlController = $this->prepararController($this->urlConjunto[0]);
                    $this->urlMetodo = METHOD;
                }

                else{
                    $this->urlController = CONTROLLER;
                    $this->urlMetodo = METHOD;
                }
                
                //Trata o parâmetro
                if(isset($this->urlConjunto[2])){
                    $this->urlParametro = $this->urlConjunto[2];      
                }
                else{
                    $this->urlParametro = null;
                }
                
            }
            else{
                $this->urlController=CONTROLLER;
                $this->urlMetodo = METHOD;
            }
          /*echo "Controller: " .$this->urlController ."<br/>Método: " .$this->urlMetodo ."<br/>Parametro: " .$this->urlParametro;
          exit();*/
        }   
        
	public function carregar(){
		/*echo $this->urlController;*/
            $listarPg= new \App\site\models\Pagina();

            $this->paginas = $listarPg->listarPaginas($this->urlController, $this->urlMetodo);
            if ($this->paginas) {
	        /*var_dump($this->paginas);
		exit;*/

                $this->class = "\\App\\{$this->paginas[0]['tipo_tpg']}\\controllers\\" . $this->urlController;
		/*echo $this->class;
		exit;*/
               
                if (class_exists($this->class)) {
                  
                    $this->carregarMetodo();
		} else {
			/*echo "nao existe";*/
			
	            $this->urlController = ERROR404;
                    $this->carregar();
                }
            }else {
                $this->urlController = ERROR404;
                $this->urlMetodo = "index";
                $this->carregar();
            }
        }

        public function clearUrl(){
            //elimina as tags
            $this->url = strip_tags($this->url);
            //elimina espaços
            $this->url = trim($this->url);
            //elimina barra no final
            $this->url = rtrim($this->url, "/");
            
            self::$formato = array();
            self::$formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
            self::$formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
            $this->url = strtr(utf8_decode($this->url), utf8_decode(self::$formato['a']), self::$formato['b']);
        }
        
        public function prepararController($urlController){
            $urlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($urlController)))));
            return $urlController;
        }

        private function carregarMetodo(){
            $classLoad = new $this->class;
            if (method_exists($classLoad, $this->urlMetodo)) {
                /*echo "Método existe";
                exit();*/
                if ($this->urlParametro !== null) {
                    $classLoad->{$this->urlMetodo}($this->urlParametro);
                } else {

                    $classLoad->{$this->urlMetodo}();
                }
            }else{
                $this->urlController = CONTROLLER;
                $this->urlMetodo = METHOD;
                $this->carregar();
            }
        }

        public function getController(){
            return $this->urlController;
        }
    }
