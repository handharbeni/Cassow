<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {
	private $plang;
	private $plangs;
	function __construct(){
	    parent::__construct();
	    $this->CI =& get_instance();
	    $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	}
	public function get(){
    	if($this->input->cookie('lang') && $this->input->cookie('langs')){
	    	$this->plang = $this->input->cookie('lang');
	    	$this->plangs = $this->input->cookie('langs');
    	}
   	}
	public function set($language = 'en'){
    	//$params = $this->input->post();
    	switch ($language) {
    		case 'en':
		    	$sLanguange = "en";
		    	$sLanguanges = "english";
    			break;
    		case 'fr':
		    	$sLanguange = "fr";
		    	$sLanguanges = "french";
    			break;
    		case 'ina':
		    	$sLanguange = "ina";
		    	$sLanguanges = "indonesia";
    			break;
    		
    		default:
		    	$sLanguange = "en";
		    	$sLanguanges = "english";
    			break;
    	}

    	if($sLanguange != ""){
    		$data = array(  'name' => 'lang',
    						'value' => $sLanguange,
    						'expire' => '5184000',
    						'path' => '/' );
    		$this->input->set_cookie($data);
    		$data = array(  'name' => 'langs',
    						'value' => $sLanguanges,
    						'expire' => '5184000',
    						'path' => '/' );
    		$this->input->set_cookie($data);
    	}
   	}
   	//$this->lang->load($this->plang, $this->plangs);
}