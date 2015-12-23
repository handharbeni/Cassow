<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preferences extends CI_Controller {
	private $customTheme = 0;

	private $font;
	private $fontsize;
	private $searchboxwidth;
	private $centeralignment;
	private $backgroundcolor;
	private $homepagetabs;
	private $headerbehavior;
	private $headercolor;
	private $resulttitlecolor;
	private $resultvisitedtitlecolor;
	private $resulttitleunderline;
	private $resultdescriptioncolor;
	private $resultfullurl = 1;
	private $resultabovesnippet = 1;

	private $selectthemes = 1;
	function __construct(){
	    parent::__construct();
	    $this->CI =& get_instance();
	}
	public function setTheme($theme = "default", $selectthemes = 1){
		if($theme == "default"){
			$this->customTheme = 0;
			$this->selectthemes = $selectthemes;
		}else{
			$params = $this->input->post();
			$this->customTheme = 1;
			$this->selectthemes = $theme;
			$this->font = $params['font'];
			$this->fontsize = $params['fontsize'];
			$this->searchboxwidth = $params['searchboxwidth'];
			$this->centeralignment = $params['centeralignment'];
			$this->backgroundcolor = $params['backgroundcolor'];
			$this->homepagetabs = $params['homepagetabs'];
			$this->headerbehavior = $params['headerbehavior'];
			$this->headercolor = $params['headercolor'];
			$this->resulttitlecolor = $params['resulttitlecolor'];
			$this->resultvisitedtitlecolor = $params['resultvisitedtitlecolor'];
			$this->resulttitleunderline = $params['resulttitleunderline'];
			$this->resultdescriptioncolor = $params['resultdescriptioncolor'];
			$this->resultabovesnippet = $params['resultabovesnippet'];
			$this->resultfullurl = $params['resultfullurl'];
			$data = array(  'name' => 'font',
							'value' => $this->font,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'fontsize',
							'value' => $this->fontsize,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'searchboxwidth',
							'value' => $this->searchboxwidth,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'centeralignment',
							'value' => $this->centeralignment,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'backgroundcolor',
							'value' => $this->backgroundcolor,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'homepagetabs',
							'value' => $this->homepagetabs,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'headerbehavior',
							'value' => $this->headerbehavior,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'headercolor',
							'value' => $this->headercolor,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resulttitlecolor',
							'value' => $this->resulttitlecolor,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resultvisitedtitlecolor',
							'value' => $this->resultvisitedtitlecolor,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resulttitleunderline',
							'value' => $this->resulttitleunderline,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resultdescriptioncolor',
							'value' => $this->resultdescriptioncolor,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resultfullurls',
							'value' => $this->resultfullurls,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resultabovesnippet',
							'value' => $this->resultabovesnippet,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
		}
		$data = array(  'name' => 'customTheme',
						'value' => $this->customTheme,
						'expire' => '5184000',
						'path' => '/' );
   		$this->input->set_cookie($data);

		$data = array(  'name' => 'selectthemes',
						'value' => $this->selectthemes,
						'expire' => '5184000',
						'path' => '/' );
   		$this->input->set_cookie($data);
	    header("location:".$_SERVER['HTTP_REFERER']);
	}
    public function _getCustomTheme(){
    	if($this->input->cookie('customTheme')){
    		$this->customTheme = $this->input->cookie('customTheme');
    	}
    }
    public function _getDefaultTheme(){
    	return $this->input->cookie('selectthemes');
    }
    public function currentTheme(){
    	$this->_getCustomTheme();
    	if($this->customTheme != 0){
    		$this->_getDefaultTheme();
    		//custom theme
    		$this->customTheme = 1;
    	}else{
    		//default theme
    		$this->_getDefaultTheme();
    		$this->customTheme = 0;
    	}
    	return array(
    			"customTheme" => $this->customTheme,
    			"baseTheme" => $this->selectthemes
    		);
    }
}