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
     		'content' => $view_content
     		, 'css'=>$params['css']
     		, 'js'=>$params['js']));
	}


  
  	public function print_css($css = array()) 
	{ 
	    // Initialize a string that will hold all includes 
	    $final_includes = ''; 
	    //print_r($css);

		for ($i=0; $i < count($css); $i++) { 
			$final_includes.= '<link href="' . $css[$i] . '" rel="stylesheet" type="text/css" />'; 
		} 

  		//return $final_includes; 	    
	}



	public function print_js( $js = array())
	{
		$finaljs = ''; 

		//for ($i=0; $i < count($js); $i++) { 
			$finaljs.= '<script type="text/javascript" src="' . $js . '"></script>';
			//print_r($js[$i]);
//		} 
		//return $finaljs; 
	}
	
}
	

