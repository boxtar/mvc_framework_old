<?php

abstract class Controller{
	
	protected function model($model){
	
		require_once MODELS_DIR . '/'.$model.'.php';
		return new $model();
		
	}
	
	protected function view($view, $data = []){
		require_once VIEWS_DIR . '/'.$view.'.php';
	}
	
	abstract public function index();
	
}

?>