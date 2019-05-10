<?php

class App {

	public $controller = 'home';
	public $method = 'index';
	public $params = array();
	
	public function __construct(){
		$url = $this->parseUrl();
		
		if(file_exists('app/controllers/'.$url[0].'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		} else {
			die('404 PAGE NOT FOUND');	
		}
		
		require_once 'app/controllers/'.$this->controller.'.php';
		
		if(isset($this->controller)) define('URI1', $this->controller);
		if(isset($url[1])) define('URI2', $url[1]);
		if(isset($url[2])) define('URI3', $url[2]);
		
		$this->controller = new $this->controller;
		
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			} else {
				$url[2] = $url[1];
				unset($url[1]);
			}
			if($url) $this->params = array_values($url);
		}
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}
	
	public function parseUrl(){
		if(isset($_GET['url'])){
			return explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
		} else {
			return array($this->controller, $this->method, 0);
		}
	}
	
}