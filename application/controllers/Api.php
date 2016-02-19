<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->CI =& get_instance();
	}
	public function search($segment = 'Web'){

	}
	public function bing($serviceOp, $query, $skip = null){
		$responses = array();
		$query = urlencode("'{".$query."}'");
		$uriSkip = $skip!=null?"&\$skip=".$skip:"";
		$requestUri = HOST_BING."/$serviceOp?\$format=json&Query=$query".$uriSkip;
		$auth = base64_encode(KEY_BING.":".KEY_BING);
		$data = array(
		  'http' => array(
		    'request_fulluri' => true,
		    'ignore_errors' => true,
		    'header'  => "Authorization: Basic $auth")
		  );
		$context = stream_context_create($data);
		$response = file_get_contents($requestUri, 0, $context);
		$jsonObj = json_decode($response);

    	$item = array();
		foreach($jsonObj->d->results as $value)
		{
		  switch ($value->__metadata->type)
		  {
		    case 'WebResult':
		    	$url = str_replace("'", "", $value->Url);
		    	$url = str_replace("\/","/",$url);
		    	$item['Url'] = $url;
		    	$item['Title'] = str_replace("'", "", $value->Title);
		    	$item['Description'] = str_replace("'", "", $value->Description);
		    	array_push($responses,$item);
		      break;
		    case 'ImageResult':
		    	$item['Url'] = $value->SourceUrl;
		    	$item['MediaUrl'] = $value->MediaUrl;
		    	$item['Thumbnail'] = $value->Thumbnail->MediaUrl;
		    	$item['Title'] = $value->Title;
		    	array_push($responses,$item);
		      break;
		    case 'VideoResult' :
		    	$item['MediaUrl'] = $value->MediaUrl;
		    	$item['Thumbnail'] = $value->Thumbnail->MediaUrl;
		    	$item['Title'] = $value->Title;
		    	$item['Runtime'] = $value->RunTime;
		    	array_push($responses,$item);
		   	  break;
		   	case 'NewsResult' :
		    	$item['Url'] = $value->Url;
		    	$item['Title'] = $value->Title;
		    	$item['Description'] = $value->Description;
		    	array_push($responses,$item);
		   	  break;
		  }
		}
		//$jsonreturn = str_replace("[", "", json_encode($responses));
		//$jsonreturn = str_replace("]", "", $jsonreturn);
		if($skip == null){
			return json_encode($responses);
		}else{
			echo json_encode($responses);
		}
	}
	public function youtube(){
		$partUrl = "";
		$partUrl .= "part=snippet";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		$partUrl .= "";
		//part=snippet&maxResults=50&order=rating&q=pantai&type=video&videoCaption=any&videoDefinition=any&fields=etag%2CeventId%2Citems%2Ckind%2CnextPageToken%2CpageInfo%2CprevPageToken%2CtokenPagination%2CvisitorId&key={YOUR_API_KEY}
		//file_get_contents(HOST_YOUTUBE) HOST_YOUTUBE;
	}
	public function vimeo(){

	}
	public function dailymotion(){

	}
	public function flickr(){

	}
	public function picasa(){

	}
	public function soopx(){

	}
	public function ipernity(){

	}
	public function loadMaps($query = "Malang"){
		$location = $this->geoLocationQuerywithXML($query);
		//$config['center'] = $location['lat'].','.$location['lng'];
		$config['center'] = $location['address'];
		$config['height'] = "100%";
		//$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$marker = array();
		//$marker['position'] = $location['lat'].','.$location['lng'];
		$marker['position'] = $location['address'];
		$this->googlemaps->add_marker($marker);
		$this->dataView['map'] = $this->googlemaps->create_map();
		$this->load->view('result/mapsresult', $this->dataView);
	}
	public function geoLocationQuerywithXML($query = 'Cassow'){
		$url = "https://maps.googleapis.com/maps/api/geocode/xml?key=".KEY_GOOGLE."&address=".urlencode($query);
		$xmlstring = file_get_contents($url);
		$xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);
		//print_r($array);
		if($array['status'] != "ZERO_RESULTS"){
			if(isset($array['result']['geometry'])){
				return array(
						//"lat" => $array['result']['geometry']['location']['lat'],
						//"lng" => $array['result']['geometry']['location']['lng'],
						"address" => $array['result']['formatted_address']
					);
			}
			else
			{
				//$rLat = array_column($array['result'], 'lat');
				//$rLng = array_column($array['result'], 'lng');
				//$lLat = array_column($rLat['geometry'], 'location');
				//$lLng = array_column($rLng['geometry'], 'location');
				//$lat = array_column($lLat, 'lat');
				//$lng = array_column($lLng, 'lng');
				$address = array_column($array['result'], 'formatted_address');
				print_r($array);
				$return = array(
						//"lat" => $lat,
						//"lng" =>  $lng,
						"address" => $address[0]
					);
				return $return;
			}
		}
	}
	public function detectBrowser(){
	    $u_agent = $_SERVER['HTTP_USER_AGENT'];
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";
	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
	        $platform = 'windows';
	    }
	   
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Internet Explorer';
	        $ub = "MSIE";
	    }
	    elseif(preg_match('/OPR/i',$u_agent))
	    {
	        $bname = 'Opera';
	        $ub = "Opera";
	    }
	    elseif(preg_match('/Netscape/i',$u_agent))
	    {
	        $bname = 'Netscape';
	        $ub = "Netscape";
	    }
	    elseif(preg_match('/Edge/i', $u_agent)){
	        $bname = 'Microsoft Edge';
	        $ub = "Edge";
	    }
	    elseif(preg_match('/Firefox/i',$u_agent))
	    {
	        $bname = 'Mozilla Firefox';
	        $ub = "Firefox";
	    }
	    elseif(preg_match('/Chrome/i',$u_agent))
	    {
	        $bname = 'Google Chrome';
	        $ub = "Chrome";
	    }
	    elseif(preg_match('/Safari/i',$u_agent))
	    {
	        $bname = 'Safari';
	        $ub = "Safari";
	    }

	    /*$known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
	    }
	    $i = count($matches['browser']);
	    if ($i != 1) {
	        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }
	    if ($version==null || $version=="") {$version="?";}*/
	    return array(
	        'userAgent' => $u_agent,
	        'name'      => $bname,
	        'alias'		=> $ub,
	        'version'   => 'N/A',
	        'platform'  => $platform,
	        'pattern'    => 'N/A'
	    );
	}
}