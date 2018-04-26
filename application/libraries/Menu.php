<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Menu// extends AnotherClass
{
	private $CI;

	function __construct()
	{
		$this->CI =& get_instance(); 
	}

	public function load_view($view_name, $params = array(), $layout = "menu_view")
	{
		$view_content = $this->CI->load->view($view_name, $params, TRUE); 
		$this->CI->load->view('menu/'. $layout, array( 
     		'content' => $view_content));
	}
}
	
	

