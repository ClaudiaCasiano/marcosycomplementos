<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado extends CI_Controller {

	public function index()
	{
		
		$data['css'] = 'assets/theme/vendor/metisMenu/metisMenu.min.css';
		$data['js'] = 'assets/custom/crud/main.js';
		$data['page_title'] = 'SERVICIOS';	
		$this->load->Library('menu');
		$this->menu->load_view("crud/crud_view",$data);
		
	  	//$this->load->view("crud/crud_view");
	}


	public function get_servicios()
	{
		if(!$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}
		$this->load->model("listado_model");
		$r = $this->listado_model->getfilas();
		if($r[0]['code']!= 0){
			$result["success"] = -1;
			$result["data"] = $r[0]['message'];
		}else{
			$result["success"] = 0;
			$result["data"] = $r[1];
		}

		echo json_encode($result);


	}


	public function buscar_custodio()
	{
		if(!$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}
		$this->load->model("listado_model");
		$r = $this->listado_model->buscar_custodio($this->input->post('code'));
		if($r[0]['code']!= 0){
			$result["success"] = -1;
			$result["data"] = $r[0]['message'];
		}else{
			$result["success"] = 0;
			$result["data"] = $r[1];
		}

		echo json_encode($result);
	}


	public function buscar_recurso()
	{
		if(!$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}
		$this->load->model("listado_model");
		$r = $this->listado_model->buscar_recurso($this->input->post('code'));
		if($r[0]['code']!= 0){
			$result["success"] = -1;
			$result["data"] = $r[0]['message'];
		}else{
			$result["success"] = 0;
			$result["data"] = $r[1];
		}

		echo json_encode($result);
	}


	public function guardar_servicio()
	{
		if($this->input->post = null || !$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}

		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$this->load->model("listado_model");
		$r = $this->listado_model->guardar_servicio($codigo, $nombre);
		if($r[0]['code']!= 0){
			$result["success"] = -1;
			$result["message"] = $r[0]['message'];
		}else{
			$result["success"] = $r[1];
		}

		echo json_encode($result);
	}


	public function modificar_servicio()
	{
		if($this->input->post = null || !$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}
		$id = $this->input->post("id");
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$this->load->model("listado_model");
		$r = $this->listado_model->modificar_servicio($id, $codigo, $nombre);
		if($r[0]['code']!= 0){
			$result["success"] = -1;
			$result["message"] = $r[0]['message'];
		}else{
			$result["success"] = 0;
		}

		echo json_encode($result);
	}

	public function eliminar_servicio()
	{
		if($this->input->post = null || !$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}
		$id = $this->input->post("id");
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$this->load->model("listado_model");
		$r = $this->listado_model->eliminar_servicio($id);
		if($r[0]['code']!= 0){
			$result["success"] = -1;
			$result["message"] = $r[0]['message'];
		}else{
			$result["success"] = 0;
		}

		echo json_encode($result);
	}

	public function guardar_detalles()
	{
		if($this->input->post = null || !$this->input->is_ajax_request()){
			$result["success"] = -1;
			$result["message"] = "Acceso Denegado";
			echo json_encode($result);
			die();
		}
		$this->load->model("listado_model");
		$valores = $this->input->post('info');
		foreach ($valores as $key => $f) {
			$r = $this->listado_model->guardar_detalles($f[0],$f[1], $f[2], $f[3]);
		}

		if($r[0]['code']!= 0){
			$result["success"] = -1;
		}else{
			$result["success"] = 0;
		}

		echo json_encode($result);
	}
}