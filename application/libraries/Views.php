<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Views{
	protected $init = null;
	protected $lang = [];
	public $layout = "layout/default";

	private $globals = [];
	private $layout_data = [];

	public function __construct()
	{
		$this->init =& get_instance();
		
	}

	public function set_layout($layout){
		$this->layout = $layout;
	}

	public function layout_data(){

	}

	public function set_globals($arv=[]){
		$this->globals = array_merge($this->globals,$arv);
	}

	public function layout($file=null,$data=[], $layout=false){
		if(!$layout) $layout = $this->layout;
		$this->loadLanguage("globals");
		
		$data = array_merge($this->globals, $data);

		$datas = $this->block($file, $data, true);

		$html = $this->init->load->view($layout, ["data" => $datas], true);

		$search = [
			'{{RESOURCE_URL}}' => base_url("resource"),
			'{{TEMPLATE_URL}}' => base_url("templates"),
			'{{TITLE}}' => (isset($data["title"]) ? $data["title"] : $this->init->config->item("site_name"))
		];

		foreach ($search as $key => $value) {
			$html = str_replace($key, $value, $html);
		}

		print_r($html);
		exit();
	}

	public function block($file=null,$data=[], $render=false){
		return $this->init->load->view($file, $data, $render);
	}


	public function  loadLanguage($file=""){
		$lang = [];
		$file = FCPATH.'/resource/language/vi/'.$file.".php";
		if(file_exists($file)){
			$lang = require_once $file;
			$this->lang = array_merge($this->lang, $lang);
		}
	}

	public function lang($key="", $return=false){


		if(isset($this->lang[$key])){
			$lang =  $this->lang[$key];
		}else{
			$lang = str_replace('_',' ',ucfirst($key));
		}



		if($return){
			return $lang;
		}else{
			echo $lang;
		}
	}


	public function json($arv=[]){
		header('Content-Type: application/json');
		echo json_encode($arv);
	}
}