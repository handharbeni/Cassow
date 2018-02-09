<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Search extends CI_Controller {
	function __construct(){

	    parent::__construct();

	    $this->CI =& get_instance();

	    require ('Api.php');

	    require ('Preferences.php');

	    $language = new Preferences();
	    $language->getLanguage();

	}

	public function index(){

		if($this->CI->input->post() != null){

			echo "POST SEARCH";

		}

		$dataView['q'] = '';

		$dataView['action'] = "Google";

		$dataView['from'] = 'index';

		$dataView['api'] = new Api();

		$dataView['preferences'] = new Preferences();

		$this->load->view("html/header",$dataView);

		$this->load->view("html/landing/landingmenu");

		$this->load->view("html/landing/landingpage");

		$this->load->view("html/footerlandingpage",$dataView);

	}

	public function search(){
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');
		if($this->CI->input->post() != null){

			echo "POST SEARCH";

		}

		$dataView['q'] = '';

		$dataView['action'] = "Google";

		$dataView['from'] = 'index';

		$dataView['api'] = new Api();

		$dataView['preferences'] = new Preferences();



		$this->load->view("html/header",$dataView);

		$this->load->view("html/landing/landingmenu");

		$this->load->view("html/landing/landingpage");

		$this->load->view("html/footerfooterlandingpage",$dataView);

	}

	public function Web(){
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');
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


	public function Google(){
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');
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

        $this->load->view('html/footer',$dataView);

        $this->load->view('result/searchresult',$dataView);


	}

	public function Image(){
		$this->setSource('Video', 'youtube');

		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";



		$api = new Api();



		$dataView['api'] = $api;

		$dataView['preferences'] = new Preferences();



		$dataView['action'] = 'Image';

		$dataView['q'] = $q;

		$dataView['source'] = $this->getSource('Image');//'bing';

		$dataView['size'] = $this->getSize();

		$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], $dataView['action'], $q, $dataView['size']);





        $this->load->view('html/header',$dataView);

        $this->load->view('html/searchbar',$dataView);

        $this->load->view('html/navbar',$dataView);

        $this->load->view('result/searchresult',$dataView);

        $this->load->view('html/footer',$dataView);

	}

	public function Video(){
		$this->setSource('Image', 'bing');
		$q = $this->input->get('q') != null? $this->input->get('q'): "Illiyin";



		$api = new Api();



		$dataView['api'] = $api;

		$dataView['preferences'] = new Preferences();



		$dataView['action'] = 'Video';

		$dataView['q'] = $q;

		// $dataView['source'] = 'bing';

		$dataView['source'] = $this->getSource('Video');//'bing';

		$dataView['sort'] = $this->getSort();

		$dataView['hasilSearch'] = $this->chooseApi($dataView['source'], $dataView['action'], $q, '', $dataView['sort']);
		// print_r($dataView['hasilSearch']);


        $this->load->view('html/header',$dataView);

        $this->load->view('html/searchbar',$dataView);

        $this->load->view('html/navbar',$dataView);

        $this->load->view('result/searchresult',$dataView);

        $this->load->view('html/footer',$dataView);

	}

	public function News(){
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');
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
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');

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
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');

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
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');

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
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');

		$dataView['action'] = 'Web';

		$dataView['q'] = '';

		$dataView['api'] = new Api();

		$dataView['preferences'] = new Preferences();



        $this->load->view('html/header', $dataView);

        $this->load->view('html/blog');

	}

	public function help(){
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');

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
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'youtube');

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
		$this->setSource('Image', 'bing');
		$this->setSource('Video', 'bing');

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

	public function setSource($service = "Image", $source = "bing"){
		$data = array(  'name' => $service,

						'value' => $source,

						'expire' => '5184000',

						'path' => '/' );

   		$this->input->set_cookie($data);
	}
	public function setSize($size = "small"){
		$data = array(  'name' => "sizeImage",

						'value' => $size,

						'expire' => '5184000',

						'path' => '/' );

   		$this->input->set_cookie($data);
	}
	public function setSort($sort = "relevance"){
		$data = array(  'name' => "sortVideo",

						'value' => $sort,

						'expire' => '5184000',

						'path' => '/' );

   		$this->input->set_cookie($data);
	}
	public function getSort(){
		return $this->input->cookie('sortVideo')!=null?$this->input->cookie('sortVideo'):"relevance";
	}
	public function getSize(){
		return $this->input->cookie('sizeImage')!=null?$this->input->cookie('sizeImage'):"small";
	}
	public function getSource($service = "Image"){
		return $this->input->cookie($service)!=null?$this->input->cookie($service):"bing";
	}

	public function chooseApi($source = 'Bing', $serviceOp, $query, $size = "small", $sort = "relevance"){

		$query = urlencode($query);

		$response = "";

		$api = new Api();

		switch ($source) {

			case 'bing':

				$response = $api->bing($serviceOp, $query, $size, $sort);

				break;

			case 'youtube' :

				$response = $api->youtube($query, $sort);

				break;

			case 'soopx' :

				$response = $api->soopx($query, $size);

				break;

			case 'ipernity' :

				$response = $api->ipernity($query, $size);

				break;

			case 'flickr' :

				$response = $api->flickr($query, $size);

				break;

			case 'dailymotion' :

				$response = $api->dailymotion($query, $sort);

				break;
			case 'vimeo' :

					$response = $api->vimeo($query, $sort);

					break;
			case 'picasa' :

				$response = $api->picasa($query);

				break;
			case 'shutterstock' :

				$response = $api->shutterstock($query);

				break;
			default:

				# code...

				break;

		}

		return $response;

	}
	public function next_page($action = 'Web', $query = 'illiyin', $page = 0){
		$current_page = $page;
		$response = "";
		$api = new Api();
		switch ($action) {
			case 'Web':
				# code...
				$response = $api->bing($action, $query, "", "", $current_page * 50);
				break;
			case 'Image':
				$size = $this->getSize();
				$source = $this->getSource('Image');
				# code...
				if($source == "bing"){
					$response = $api->bing($action, $query, "", "", $current_page * 50);
				}else if($source == "flickr"){
					$response = $api->flickr($query, $size);
				}else if($source == "picasa"){
					$response = $api->picasa($query);
				}else if($source == "soopx"){
					$response = $api->soopx($query, $size, $current_page);
				}else if($source == "ipernity"){
					$response = $api->ipernity($query, $size, $current_page);
				}else if($source == "shutterstock"){
					$response = $api->shutterstock($query, $current_page);
				}
				break;
			case 'Video':
				$sort = $this->getSort();
				$source = $this->getSource('Video');
				if($source == "bing"){
					$response = $api->bing($action, $query, "", "", $current_page * 50);
				}else if($source == "youtube"){
					$response = $api->youtube($query, $sort, $current_page);
				}else if($source == "dailymotion"){
					$response = $api->dailymotion($query, $sort, $current_page);
				}else if($source == "vimeo"){
					$response = $api->vimeo($query, $sort, $current_page);
				}
				# code...
				break;
			case 'News':
				# code...
				$response = $api->bing($action, $query, "", "", $current_page * 50);
				break;
			default:
				# code...
				break;
		}
		// runkit_constant_redefine("LIMIT", LIMIT + 1);
		echo $response;
	}
	public function suggest($query = 'illiyin'){
		$Api = new Api();
		$suggest = $Api->getSuggest($query);
		echo $suggest;
	}
}
