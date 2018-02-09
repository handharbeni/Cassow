<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preferences extends CI_Controller {
	private $customTheme = 0;

	private $suggest;
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
	public function save($mode = "preferences"){
		// print_r($this->input->post()!=null?$this->input->post():"NULL");
		// print_r($this->input->post());
		if($this->input->post() != null){
			$paramsParsing = array();
			switch ($mode) {
				case 'preferences':
					$params = $this->input->post();
					$paramsParsing['font'] = $params['font'];
					$paramsParsing['suggest'] = $params['suggest'];
					$paramsParsing['fontsize'] = $params['fontsize'];
					$paramsParsing['searchboxwidth'] = $params['searchboxwidth'];
					$paramsParsing['centeralignment'] = $params['centeralignment'];
					$paramsParsing['backgroundcolor'] = $params['backgroundcolor'];
					$paramsParsing['homepagetabs'] = $params['homepagetabs'];
					$paramsParsing['headerbehavior'] = $params['headerbehavior'];
					$paramsParsing['headercolor'] = $params['headercolor'];
					$paramsParsing['resulttitlecolor'] = $params['resulttitlecolor'];
					$paramsParsing['resultvisitedtitlecolor'] = $params['resultvisitedtitlecolor'];
					$paramsParsing['resulttitleunderline'] = $params['resulttitleunderline'];
					$paramsParsing['resultdescriptioncolor'] = $params['resultdescriptioncolor'];
					$paramsParsing['resultfullurl'] = $params['resultfullurls'];
					$paramsParsing['resultabovesnippet'] = $params['resultabovesnippet'];
					$this->_saveCustomTheme($paramsParsing);
					break;
				case 'language':
					break;
				case 'regional':
					break;
				
				default:
					# code...
					break;
			}
		}
	}
	public function _saveCustomTheme($params){
			$this->suggest = $params['suggest'];
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
			$data = array(  'name' => 'suggest',
							'value' => $this->suggest,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
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
							'value' => $this->resultfullurl,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'resultabovesnippet',
							'value' => $this->resultabovesnippet,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
	   		$data = array(	'name' => 'resultfullurls',
	   						'value'=>  $this->resultfullurl,
	   						'expire' => '5184000',
	   						'path','/');
	   		$this->input->set_cookie($data);
			$data = array(  'name' => 'customTheme',
							'value' => 0,
							'expire' => '5184000',
							'path' => '/' );
	   		$this->input->set_cookie($data);
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
    public function changeTheme($theme = 1){
    	if($this->input->post('theme') != null){
    		$theme = $this->input->post('theme');
    	}
		$data = array(  'name' => 'customTheme',
						'value' => 1,
						'expire' => '5184000',
						'path' => '/' );
   		$this->input->set_cookie($data);
		$data = array(  'name' => 'selectthemes',
				'value' => $theme,
				'expire' => '5184000',
				'path' => '/' );
		$this->input->set_cookie($data);

    }
    public function _getDefaultTheme(){
    	return $this->input->cookie('selectthemes');
    }
    public function printTheme(){
    	print_r($this->currentTheme());
    }
    public function currentTheme(){
    	$this->_getCustomTheme();
		// $this->_getDefaultTheme();
    	if($this->customTheme != 0){
    		$this->selectthemes = $this->_getDefaultTheme();
    		//custom theme
    		$this->customTheme = 1;
    	}else{
    		//default theme
    		$this->selectthemes = $this->_getDefaultTheme();
    		$this->customTheme = 0;
    	}
    	return array(
    			"customTheme" => $this->customTheme,
    			"baseTheme" => $this->selectthemes
    		);
    }
    public function setLanguage($language = null){
    	if($language == null){
	    	if($this->input->post('language') != null){
	    		$language = $this->input->post('language');
	    	}else{
	    		$language = 'english';
	    	}
    	}else{
    		$language = $language;
    	}
    		$data = array(  
    				'name' => 'language',
					'value' => $language,
					'expire' => '5184000',
					'path' => '/' );
			$this->input->set_cookie($data);
    }
    public function getLanguage(){
    	$language = $this->_decisionLanguage();
    	$this->lang->load($language['codeLanguage'], $language['language']);
    }
    public function _getCurrentLanguage(){
    	if($this->input->cookie('language') != null){
    		return $this->input->cookie('language');
    	}else{
    		return "english";
    	}
    }
    public function _decisionLanguage(){
    	$language = $this->_getCurrentLanguage();
    	switch ($language) {
    		case 'english':
    				$codeLanguage = "en";
    				$language = "english";
    			break;
    		
    		case 'french':
    				$codeLanguage = "fr";
    				$language = "french";
    			break;
    		
    		case 'indonesia':
    				$codeLanguage = "ina";
    				$language = "indonesia";
    			break;
    		
    		default:
    				$codeLanguage = "en";
    				$language = "english";
    			break;
    	}
    	return array(
    			"codeLanguage" => $codeLanguage,
    			"language" => $language
    		);
    }
    public function setRegional($regional = null){
    	if($regional == null){
	    	$regional = "US";
	    	if($this->input->post('regional') != null){
	    		$params = $this->input->post();
	    		$regional = $params['regional'];
	    	}
    	}else{
    		$regional = $regional;
    	}
		$data = array(  
				'name' => 'regional',
				'value' => $regional,
				'expire' => '5184000',
				'path' => '/' );
		$this->input->set_cookie($data);
    }
    public function getRegional(){
    	$regional = "US";
    	if($this->input->cookie('regional') != null){
    		$regional = $this->input->cookie('regional');
    	}
    	return $regional;
    }
}