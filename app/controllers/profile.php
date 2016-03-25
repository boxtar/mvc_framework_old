<?php

class Profile extends Controller{

	public function index($name=''){
	
		$user = $this->model('user');	
		$user->name = $name;
		
		$this->view('profile/index', ['name' => $user->name]);
	
	}
	
}

