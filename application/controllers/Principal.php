<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('login/login_view');	

		$data['css'][0] = 'assets/theme/vendor/metisMenu/metisMenu.min.css';
		$data['js'][0] = 'assets/theme/dist/js/sb-admin-2.js';
		$data['page_title'] = 'Hola';	
		$this->load->Library('menu');
		$this->menu->load_view("dashboard/dashboard_view",$data);

		////$this->Menu->load_view('dashboard/dashboard_view',$data);		
	}

	
}