<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	/*
		STEP 1 DECLARING COOKIE PREFERENCES
	*/
	/*
		STEP 2 DECLARING COOKIE SEARCH
	*/
	/*
		STEP 3 SECRET KEY AND HOST

		PLEASE CHANGE SECRET KEY IN FILE key_constants.php in CONFIG FOLDER
		PLEASE CHANGE SECRET KEY IN FILE my_constants.php in CONFIG FOLDER
	*/

	function __construct(){
	    parent::__construct();
	    $this->CI =& get_instance();
	    require ('Api.php');
	    require ('Preferences.php');
	} 
	public function index(){
		if($this->CI->input->post() != null){
			echo "POST SEARCH";
		}
		/*echo "SEARCH <br>";
		echo HOST_YOUTUBE."<br>";
		echo KEY_IPERNITY;*/
		$dataView['action'] = "Search";
		$dataView['from'] = 'index';
		$dataView['api'] = new Api();
		$dataView['preferences'] = new Preferences();
		$this->load->view("html/header",$dataView);
		$this->load->view("html/landing/landingmenu");
		$this->load->view("html/landing/landingpage");
		$this->load->view("html/footer");
	}
	public function search(){
		if($this->CI->input->post() != null){
			echo "POST SEARCH";
		}
		/*echo "SEARCH <br>";
		echo HOST_YOUTUBE."<br>";
		echo KEY_IPERNITY;*/
		$dataView['action'] = "Search";
		$dataView['from'] = 'index';
		$dataView['api'] = new Api();
		$dataView['preferences'] = new Preferences();

		$this->load->view("html/header",$dataView);
		$this->load->view("html/landing/landingmenu");
		$this->load->view("html/landing/landingpage");
		$this->load->view("html/footer");
	}
	public function Web(){
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";

		$api = new Api();

		$dataView['api'] = $api;
		$dataView['preferences'] = new Preferences();

		$dataView['action'] = 'Web';
		$dataView['q'] = $q;
		$dataView['source'] = 'bing';
		$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], $dataView['action'], $q);

        $this->load->view('html/header',$dataView);
        $this->load->view('html/searchbar',$dataView);
        $this->load->view('html/navbar',$dataView);
        $this->load->view('result/searchresult',$dataView);
        $this->load->view('html/footer',$dataView);
	}
	public function testApi(){
		print_r($this->chooseApi('bing', 'Web', 'Test'));
	}
	public function Google(){
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";

		$api = new Api();
		$dataView['api'] = $api;
		$dataView['preferences'] = new Preferences();

		$dataView['action'] = 'Google';
		$dataView['q'] = $q;
		$dataView['source'] = 'google';
		//$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], 'News', $q);

        $this->load->view('html/header',$dataView);
        $this->load->view('html/searchbar',$dataView);
        $this->load->view('html/navbar',$dataView);
        $this->load->view('result/searchresult',$dataView);
        $this->load->view('html/footer',$dataView);
	}
	public function Image(){
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";
		
		$api = new Api();

		$dataView['api'] = $api;
		$dataView['preferences'] = new Preferences();

		$dataView['action'] = 'Image';
		$dataView['q'] = $q;
		$dataView['source'] = 'bing';
		$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], $dataView['action'], $q);


        $this->load->view('html/header',$dataView);
        $this->load->view('html/searchbar',$dataView);
        $this->load->view('html/navbar',$dataView);
        $this->load->view('result/searchresult',$dataView);
        $this->load->view('html/footer',$dataView);
	}
	public function Video(){
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";
		
		$api = new Api();

		$dataView['api'] = $api;
		$dataView['preferences'] = new Preferences();

		$dataView['action'] = 'Video';
		$dataView['q'] = $q;
		$dataView['source'] = 'bing';
		$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], $dataView['action'], $q);

        $this->load->view('html/header',$dataView);
        $this->load->view('html/searchbar',$dataView);
        $this->load->view('html/navbar',$dataView);
        $this->load->view('result/searchresult',$dataView);
        $this->load->view('html/footer',$dataView);
	}
	public function News(){
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";
		
		$api = new Api();

		$dataView['api'] = $api;
		$dataView['preferences'] = new Preferences();

		$dataView['action'] = 'News';
		$dataView['q'] = $q;
		$dataView['source'] = 'bing';
		$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], $dataView['action'], $q);

        $this->load->view('html/header',$dataView);
        $this->load->view('html/searchbar',$dataView);
        $this->load->view('html/navbar',$dataView);
        $this->load->view('result/searchresult',$dataView);
        $this->load->view('html/footer',$dataView);
	}
	public function Maps(){
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";

		$api = new Api();
		$dataView['preferences'] = new Preferences();

		$dataView['api'] = $api;
		$dataView['action'] = 'Maps';
		$dataView['q'] = $q;
		$dataView['source'] = 'maps';
		//$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], 'News', $q);

        $this->load->view('html/header',$dataView);
        $this->load->view('html/searchbar',$dataView);
        $this->load->view('html/navbar',$dataView);
        $this->load->view('result/searchresult',$dataView);
        $this->load->view('html/footer',$dataView);
	}
	function _getSSLPage($url) {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . "/certs/cacert.pem");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_SSLVERSION,3); 
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
	}




	public function about(){
		$dataView['action'] = 'Web';
		$dataView['q'] = '';
		$dataView['preferences'] = new Preferences();

        $this->load->view('html/header', $dataView);
        $this->load->view('html/searchbar', $dataView);
        $this->load->view('html/navbar');
        $this->load->view('html/about');
        $this->load->view('html/footer');
	}
	public function addtobrowser(){
		$dataView['action'] = 'Web';
		$dataView['q'] = '';
		$dataView['api'] = new Api();
		$dataView['preferences'] = new Preferences();

        $this->load->view('html/header', $dataView);
        $this->load->view('html/searchbar', $dataView);
        $this->load->view('html/navbar');
        $this->load->view('html/addtobrowser', $dataView);
        $this->load->view('html/footer');
	}
	public function blog(){
        $this->load->view('html/header');
        $this->load->view('html/blog');
	}
	public function help(){
		$dataView['action'] = 'Web';
		$dataView['q'] = '';
		$dataView['api'] = new Api();
		$dataView['preferences'] = new Preferences();

		$this->load->view('html/header', $dataView);
        $this->load->view('html/searchbar', $dataView);
        $this->load->view('html/navbar');
        $this->load->view('html/help');
        $this->load->view('html/footer');
	}
	public function contact(){
		$dataView['action'] = 'Web';
		$dataView['q'] = '';
		$dataView['api'] = new Api();
		$dataView['preferences'] = new Preferences();

        $this->load->view('html/header', $dataView);
        $this->load->view('html/searchbar', $dataView);
        $this->load->view('html/navbar');
        $this->load->view('html/contact', $dataView);
        $this->load->view('html/footer');
	}
	public function setting(){
		$dataView['action'] = 'Web';
		$dataView['q'] = '';
		$dataView['api'] = new Api();
		$dataView['preferences'] = new Preferences();

        $this->load->view('html/header', $dataView);
        $this->load->view('html/searchbar', $dataView);
        $this->load->view('html/navbar');
        $this->load->view('html/settings', $dataView);
        $this->load->view('html/footer');
	}

	public function chooseApi($source = 'Bing', $serviceOp, $query){
		$response = "";
		$api = new Api();
		switch ($source) {
			case 'bing':
				$response = $api->bing($serviceOp, $query);
				break;
			
			default:
				# code...
				break;
		}
		return $response;
	}
}
