<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router {

	public $uri;
	public $params = array();
	public $page;
	public $module;
	public $title;

	function __construct() {

		$this->uri = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$this->parse_url();
		$this->page();

	}

	private function parse_url() {

		$uri_array = parse_url($this->uri);

		foreach ($uri_array as $key => $value) {
			$this->$key = $value;
		}

		$this->params = $_GET;

		return $this->uri;

	}

	private function page() {

		$this->path = substr($this->path, 1);

		if (($this->path == "") || ($this->path == "index.php")) {

			$this->module = 'home';
			$this->page = 'pages/home' . DISPLAYEXT;

		} else {

			$path_array = explode(DIRECTORY_SEPARATOR, $this->path);

			$this->module = $path_array[0];
			$this->page = 'pages/' . $this->path . DISPLAYEXT;

		}

		$this->title = ucfirst($this->module);

		if (!stream_resolve_include_path($this->page)) {

			$this->module = 'not-found';
			$this->page = 'pages/404' . DISPLAYEXT;

		}

		return $this->page;

	}

}
