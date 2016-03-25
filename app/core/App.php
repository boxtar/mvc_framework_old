<?php

class App{
	
	protected $controller = 'home';
	
	protected $action = 'index';
	
	protected $params = [];
	
	function __construct(){
		
		$uri = $this->parse_uri();

        $uri = $this->getController($uri);

        $uri = $this->setAction($uri);

        /*
         * need to check $uri is not empty. $uri will be empty if user passes nothing or
         * if first two elements were a valid Controller and Action, respectively.
         */
		
		$this->params = $uri ? array_values($uri) : [];
		
		/*
		 * @param one: [Controller Object, Method within the Object to call]
		 * @param two: [parameters]
		 */
		
		call_user_func_array([$this->controller, $this->action], $this->params);
	}

    /**
     * Parses the request uri so that controllers, actions and parameters
     * can be extracted and used.
     *
     * @return array
     */
    public function parse_uri(){
		if(isset($_SERVER['REQUEST_URI'])){

			/*
			 * remove trailing slash, sanitize uri, explode into an
			 * array using '/' as separator
			 */

			return explode('/', filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
		}
        return false;
	}

    /**
     * If the uri starts with a valid controller, instantiate and return it.
     * Otherwise, instantiate and return the default controller (home)
     *
     * @param $uri
     */
    private function getController($uri)
    {
        if (file_exists(CONTROLLERS_DIR . '/' . $uri[0] . '.php')) {
            $this->controller = $uri[0];
            unset($uri[0]); // Need to unset so that we're left with just parameters to pass to controller
        }

        require_once CONTROLLERS_DIR . '/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        return $uri;
    }

    /**
     * If the 2nd parameter in the uri is a valid method in the Controller
     * then return it.
     * Otherwise, use default action that all Controllers must implement (index)
     *
     * @param $uri
     * @return mixed
     */
    private function setAction($uri)
    {
        if (isset($uri[1])) {
            if (method_exists($this->controller, $uri[1])) {
                $this->action = $uri[1];
                unset($uri[1]);
            }
        }
        return $uri; // Need to unset so that we're left with just parameters to pass to controller
    }

}
