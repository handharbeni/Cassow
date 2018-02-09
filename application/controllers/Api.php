<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->CI =& get_instance();
	}
	function _getHeader($headerString, $key) {
	    preg_match('#\s\b' . $key . '\b:\s.*\s#', $headerString, $header);
	    return substr($header[0], strlen($key) + 3, -2);
	}
	public function _getDailyToken(){
		$postdata = http_build_query(
		    array(
						'grant_type'		=> 'password',
		        'client_id' 		=> DAILYMOTION_API_KEY,
		        'client_secret' => DAILYMOTION_API_SECRET_KEY,
						'username' 			=> DAILYMOTION_USERNAME,
						'password' 			=> DAILYMOTION_PASSWORD,
						'scope'					=> 'read write'
		    )
		);
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);
		$url = 'https://api.dailymotion.com/oauth/token';
		$context  = stream_context_create($opts);
			// $data = "grant_type=password&client_id=".DAILYMOTION_API_KEY."&client_secret=".DAILYMOTION_API_SECRET_KEY."&username=".$User."&password=".$Password."&scope=read+write";
			$jsonObj = file_get_contents($url, false, $context);
			$jsonArr = json_decode($jsonObj);
			return $jsonArr->access_token;
	}
	public function _getCountBing($serviceOp = "Web" ,$query = "illiyin"){
		$total = '';
		$query = urlencode("'{".$query."}'");
		$requestUri = HOST_BING."/Composite?Sources=%27$serviceOp%27&\$format=json&Query=$query";
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
		foreach($jsonObj->d->results as $value){
			switch ($serviceOp) {
				case 'Web':
					$total = $value->WebTotal;
					break;
				case 'Image':
					$total = $value->ImageTotal;
					break;
				case 'Video':
					$total = $value->VideoTotal;
					break;
				case 'News':
					$total = $value->NewsTotal;
					break;
				default:
					$total = 0;
					break;
			}
		}
		return $total;
	}

	public function bing($serviceOp, $query, $size = "", $sort = "", $skip = 50){

		$responses = array();

		$queryNoLencode = $query;
		$partSize = "";
		if($serviceOp == "Image"){
			switch ($size) {
				case 'small':
					# code...
					$partSize = "&ImageFilters=%27Size%3ASmall%27";
					break;
				case 'medium':
					# code...
					$partSize = "&ImageFilters=%27Size%3AMedium%27";
					break;
				case 'large':
					# code...
					$partSize = "&ImageFilters=%27Size%3ALarge%27";
					break;

				default:
					# code...
					break;
			}
		}else if($serviceOp == "Video"){
			switch ($sort) {
				case 'relevance':
					# code...
					$partSize = "&VideoFilters=%27Resolution%3AHigh%27&VideoSortBy=%27Relevance%27";
					break;
				case 'date':
					# code...
					$partSize = "&VideoFilters=%27Resolution%3AHigh%27&VideoSortBy=%27Date%27";
					break;

				default:
					# code...
					break;
			}
		}
		$query = "'".urlencode($query)."'";


		$uriSkip = $skip!=50?"":"&\$skip=".$skip;

		$requestUri = HOST_BING."/$serviceOp?\$format=json&Query=$query".$uriSkip."".$partSize;

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

    	$item['total'] = $this->_getCountBing($serviceOp, $queryNoLencode)>'0'?number_format($this->_getCountBing($serviceOp, $queryNoLencode)):'0';

		foreach($jsonObj->d->results as $value)

		{

		  switch ($value->__metadata->type)

		  {

		    case 'WebResult':

		    	$url = str_replace("'", "", $value->Url);

		    	$url = str_replace("\/","/",$url);

		    	$item['Url'] = $url;

		    	$item['Title'] = str_replace("'", "", $value->Title);

		    	$item['Description'] = wordwrap(str_replace("'", "", $value->Description), 90, "<br>");

		    	array_push($responses,$item);

		      break;

		    case 'ImageResult':

		    	$item['Url'] = $value->SourceUrl;

		    	$item['MediaUrl'] = $value->MediaUrl;

		    	$item['Thumbnail'] = $value->Thumbnail->MediaUrl;

		    	$item['Title'] = $value->Title;

		    	$item['iWidth'] = $value->Width;

		    	$item['iHeight'] = $value->Height;

		    	array_push($responses,$item);

		      break;

		    case 'VideoResult' :

		    	$mediaUrl = $this->separatedParameter(0, $value->MediaUrl)=="https://www.youtube.com/watch"?"https://www.youtube.com/embed/".$this->separatedParameter(1,$value->MediaUrl):$value->MediaUrl;
		    	if($this->separatedParameter(0, $value->MediaUrl) == "https://www.youtube.com/watch"){
			    	$item['MediaUrl'] = $value->MediaUrl;

			    	$item['Thumbnail'] = $value->Thumbnail->MediaUrl;

			    	$item['Title'] = $value->Title;

			    	$item['Embed'] = $mediaUrl;

			    	$item['Description'] = "";

			    	$item['duration'] = $this->_mediaTimeDeFormater($value->RunTime / 1000);

			    	$item['views_total'] = "";

			    	array_push($responses,$item);
		    	}

		   	  break;

		   	case 'NewsResult' :

			$url = explode("/", $value->Url);

		    	$item['Url'] = $url[0]."//".$url[2];

		    	$item['Title'] = $value->Title;

		    	$item['Description'] = wordwrap(str_replace("'", "", $value->Description), 90, "<br>");

		    	array_push($responses,$item);

		   	  break;

		  }

		}

		//$jsonreturn = str_replace("[", "", json_encode($responses));

		//$jsonreturn = str_replace("]", "", $jsonreturn);

		// if($skip == 50){

			return json_encode($responses);

		// }else{

		// 	echo json_encode($responses);

		// }

	}

	public function youtube($q = "illiyin", $order = "rating", $pageToken = null){

		$response = "";

		$responses = array();

		$partUrl = "q=".$q;

		$partUrl .= "&";

		$partUrl .= "part=snippet";

		$partUrl .= "&";

		$partUrl .= "maxResults=50";

		$partUrl .= "&";

		$partUrl .= "order=".$order;

		$partUrl .= "&";

		$partUrl .= "type=video";

		$partUrl .= "&";

		$partUrl .= "videoCaption=any";

		$partUrl .= "&";

		$partUrl .= "videoDefinition=any";

		$partUrl .= "&";

		$partUrl .= "fields=etag,eventId,items,kind,nextPageToken,pageInfo,prevPageToken,tokenPagination,visitorId";

		$partUrl .= "&";

		$partUrl .= "key=".KEY_GOOGLE;

		if($pageToken == null){

			// page first

			$response = file_get_contents(HOST_YOUTUBE."?".$partUrl);

		}else{

			// next page

			$partUrl .= "&";

			$partUrl .= "pageToken=".$pageToken;

			$response = file_get_contents(HOST_YOUTUBE."?".$partUrl);

		}

		$jsonObj = json_decode($response);

		$nextPage = $jsonObj->nextPageToken;

		$item = array();

		//https://www.youtube.com/embed/ufl1wrIq7_Y
		//define('NEXT_PAGE', $nextPage);
		$item['total'] = number_format($jsonObj->pageInfo->totalResults);

		foreach ($jsonObj->items as $value) {

	    	$item['MediaUrl'] = "https://www.youtube.com/watch?v=".$value->id->videoId;

	    	$item['Thumbnail'] = $value->snippet->thumbnails->high->url;

	    	$item['Title'] = $value->snippet->title;

	    	$item['Embed'] = "https://www.youtube.com/embed/".$value->id->videoId;

	    	$item['Description'] = $value->snippet->description;

	    	$info = $this->_getVideoInfo($value->id->videoId);

	    	$item['duration'] = $info['duration'];

	    	$item['views_total'] = $info['views_total'];

	    	$item['owner'] = $value->snippet->channelTitle;

	    	$item['created_time'] = $value->snippet->publishedAt;



	    	//$item['Runtime'] = $value->RunTime;

	    	array_push($responses,$item);

		}

		//$responses['nextPage'] = $nextPage;

		if($pageToken == null){

			return json_encode($responses);

		}else{

			echo json_encode($responses);

		}

	}

	public function vimeo($query = "illiyin", $sort = 'recent', $page = 1){
		$sort = $sort=="date"?$sort:"relevant";
		$responses = array();
		$item = array();
		$jsonObj = $this->getContentUrl("https://api.vimeo.com/videos?page=$page&per_page=50&query=$query&sort=$sort", KEY_TOKEN_VIMEO);
		$item['total'] = number_format($jsonObj->total);
		foreach ($jsonObj->data as $result) {
			$item['MediaUrl'] = $result->link;
			$item['Thumbnail'] = $result->pictures->sizes[2]->link;
			$item['Title'] = str_replace('\/', '', $result->name);
			$embed_url = explode('/',$result->uri);
			$item['Embed'] = "https://player.vimeo.com/video/".$embed_url[2];
			$order   = array("\r\n", "\n", "\r", "(", ")", ",", ".");
			$item['Description'] = str_replace($order, '', $result->description);
			$item['views_total'] = $result->stats->plays;
			$item['duration'] = "".$result->duration."";
			$item['owner'] = $result->user->name;
			// $item['created_time'] = date("d M,Y",$result->created_time);
			$item['created_time'] = $result->created_time;
			array_push($responses, $item);
		}
		return json_encode($responses);
	}

	function getContentUrl($url, $auth){
		$requestUri = $url;
		$post = array(
			"fields" => "embed_url,favorited_at,id,tags,taken_time,thumbnail_url,title,url,views_total,duration_formatted,owner,created_time",
			"search" => "test",
			"sort"		=> "date",
			"limit"	=> 25,
			"page"	=> 1
		);
		$data = array(
		  'http' => array(
		    'request_fulluri' => true,
		    'ignore_errors' => true,
		    'header'  => "Authorization: bearer $auth"),
			'content' => $post
		  );
		$context = stream_context_create($data);
		$response = file_get_contents($requestUri, 0, $context);
		$jsonObj = json_decode($response);
		return $jsonObj;
	}
	public function testDailyMotion($query, $sort, $page){
		$partUrl = "";
		$partUrl .= "fields=embed_url,favorited_at,id,tags,taken_time,thumbnail_url,title,url,views_total,duration_formatted,owner,created_time&";
		$partUrl .= "search=".$query."&";
		$partUrl .= "sort=".$sort."&";
		$partUrl .= "limit=25&";
		$partUrl .= "page=".$page;
		$jsonArr = $this->getContentUrl(HOST_DAILYMOTION, $this->_getDailyToken());
		print_r($jsonArr);
	}
	public function dailymotion($query = "illiyin", $sort = 'recent', $page = 1){
		$token = $this->_getDailyToken();
		$data = array(
		  'http' => array(
		    'request_fulluri' => true,
		    'ignore_errors' => true,
		    'header'  => "Authorization: bearer $token"),
		  );
		$context = stream_context_create($data);
		$sort = $sort=="date"?"recent":$sort;
		$responses = array();
		$item = array();
		$partUrl = "";
		$partUrl .= "fields=embed_url,favorited_at,id,tags,taken_time,thumbnail_url,title,url,views_total,duration_formatted,owner,created_time&";
		$partUrl .= "search=".$query."&";
		$partUrl .= "sort=".$sort."&";
		$partUrl .= "limit=25&";
		$partUrl .= "page=".$page;
		$jsonArr = json_decode(file_get_contents(HOST_DAILYMOTION."?".$partUrl));
		$item['total'] = number_format($jsonArr->total);
		foreach ($jsonArr->list as $result) {
	    	$item['MediaUrl'] = $result->url;
	    	$item['Thumbnail'] = $result->thumbnail_url;
	    	$item['Title'] = $result->title;
	    	$item['Embed'] = $result->embed_url;
	    	$item['Description'] = $result->title;
	    	$item['views_total'] = $result->views_total;
	    	$item['duration'] = $result->duration_formatted;
	    	$item['owner'] = $result->owner;
	    	$item['created_time'] = date("d M,Y",$result->created_time);
	    	array_push($responses, $item);
		}
		return json_encode($responses);
	}
	public function flickr($query = 'Illiyin', $size = 'small'){
		$responses = array();
		$item = array();
		Zend_Loader::loadClass('Zend_Service_Flickr');
		$flickr = new Zend_Service_Flickr(KEY_FLICKR);
		try{
			$results = $flickr->tagSearch($query);
			if ($results->totalResults() > 0){
				$item['total'] = number_format($results->totalResults());
				foreach ($results as $result){
					if($size == "small"){
						if(isset($result->Small)){
							$item['Url'] = $result->Small->clickUri;
							$item['MediaUrl'] = $result->Small->uri;
							$item['Thumbnail'] = $result->Small->uri;
							$item['iWidth'] = $result->Small->width;
							$item['iHeight'] = $result->Small->height;
						}else if(isset($result->Square)){
							$item['Url'] = $result->Square->clickUri;
							$item['MediaUrl'] = $result->Square->uri;
							$item['Thumbnail'] = $result->Square->uri;
							$item['iWidth'] = $result->Square->width;
							$item['iHeight'] = $result->Square->height;
						}
					}else if($size == "medium"){
						if(isset($result->Medium)){
							$item['Url'] = $result->Medium->clickUri;
							$item['MediaUrl'] = $result->Medium->uri;
							$item['Thumbnail'] = $result->Medium->uri;
							$item['iWidth'] = $result->Medium->width;
							$item['iHeight'] = $result->Medium->height;
						}else if(isset($result->Thumbnail)){
							$item['Url'] = $result->Thumbnail->clickUri;
							$item['MediaUrl'] = $result->Thumbnail->uri;
							$item['Thumbnail'] = $result->Thumbnail->uri;
							$item['iWidth'] = $result->Thumbnail->width;
							$item['iHeight'] = $result->Thumbnail->height;
						}else if(isset($result->Square)){
							$item['Url'] = $result->Square->clickUri;
							$item['MediaUrl'] = $result->Square->uri;
							$item['Thumbnail'] = $result->Square->uri;
							$item['iWidth'] = $result->Square->width;
							$item['iHeight'] = $result->Square->height;
						}else if(isset($result->Small)){
							$item['Url'] = $result->Small->clickUri;
							$item['MediaUrl'] = $result->Small->uri;
							$item['Thumbnail'] = $result->Small->uri;
							$item['iWidth'] = $result->Small->width;
							$item['iHeight'] = $result->Small->height;
						}
					}else if($size == "large"){
						if (isset($result->Large)){
					    	$item['Url'] = $result->Large->clickUri;
					    	$item['MediaUrl'] = $result->Large->uri;
					    	$item['Thumbnail'] = $result->Large->uri;
					    	$item['iWidth'] = $result->Large->width;
					    	$item['iHeight'] = $result->Large->height;
						}else if(isset($result->Medium)){
					    	$item['Url'] = $result->Medium->clickUri;
					    	$item['MediaUrl'] = $result->Medium->uri;
					    	$item['Thumbnail'] = $result->Medium->uri;
					    	$item['iWidth'] = $result->Medium->width;
					    	$item['iHeight'] = $result->Medium->height;
						}else if(isset($result->Thumbnail)){
					    	$item['Url'] = $result->Thumbnail->clickUri;
					    	$item['MediaUrl'] = $result->Thumbnail->uri;
					    	$item['Thumbnail'] = $result->Thumbnail->uri;
					    	$item['iWidth'] = $result->Thumbnail->width;
					    	$item['iHeight'] = $result->Thumbnail->height;
						}else if(isset($result->Square)){
					    	$item['Url'] = $result->Square->clickUri;
					    	$item['MediaUrl'] = $result->Square->uri;
					    	$item['Thumbnail'] = $result->Square->uri;
					    	$item['iWidth'] = $result->Square->width;
					    	$item['iHeight'] = $result->Square->height;
						}else if(isset($result->Small)){
					    	$item['Url'] = $result->Small->clickUri;
								$item['MediaUrl'] = $result->Small->uri;
					    	$item['Thumbnail'] = $result->Small->uri;
					    	$item['iWidth'] = $result->Small->width;
					    	$item['iHeight'] = $result->Small->height;
						}
					}else{
						if(isset($result->Original)){
					    	$item['Url'] = $result->Original->clickUri;
					    	$item['MediaUrl'] = $result->Original->uri;
					    	$item['Thumbnail'] = $result->Original->uri;
					    	$item['iWidth'] = $result->Original->width;
					    	$item['iHeight'] = $result->Original->height;
						}else if (isset($result->Large)){
					    	$item['Url'] = $result->Large->clickUri;
					    	$item['MediaUrl'] = $result->Large->uri;
					    	$item['Thumbnail'] = $result->Large->uri;
					    	$item['iWidth'] = $result->Large->width;
					    	$item['iHeight'] = $result->Large->height;
						}else if(isset($result->Medium)){
					    	$item['Url'] = $result->Medium->clickUri;
					    	$item['MediaUrl'] = $result->Medium->uri;
					    	$item['Thumbnail'] = $result->Medium->uri;
					    	$item['iWidth'] = $result->Medium->width;
					    	$item['iHeight'] = $result->Medium->height;
						}else if(isset($result->Thumbnail)){
					    	$item['Url'] = $result->Thumbnail->clickUri;
					    	$item['MediaUrl'] = $result->Thumbnail->uri;
					    	$item['Thumbnail'] = $result->Thumbnail->uri;
					    	$item['iWidth'] = $result->Thumbnail->width;
					    	$item['iHeight'] = $result->Thumbnail->height;
						}else if(isset($result->Square)){
					    	$item['Url'] = $result->Square->clickUri;
					    	$item['MediaUrl'] = $result->Square->uri;
					    	$item['Thumbnail'] = $result->Square->uri;
					    	$item['iWidth'] = $result->Square->width;
					    	$item['iHeight'] = $result->Square->height;
						}else if(isset($result->Small)){
					    	$item['Url'] = $result->Small->clickUri;
					    	$item['MediaUrl'] = $result->Small->uri;
					    	$item['Thumbnail'] = $result->Small->uri;
					    	$item['iWidth'] = $result->Small->width;
					    	$item['iHeight'] = $result->Small->height;
						}
					}
				    	$item['Title'] = $result->title;
				    	array_push($responses, $item);
				}
			}

			else{
				return "";
			}
			return json_encode($responses);
		}
		catch (Zend_Service_Exception $e){
			return "";
		}
	}

	public function picasa($search = "illiyin"){
		$responses = array();
		$item = array();
		Zend_Loader::loadClass('Zend_Gdata_Photos');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_AuthSub');
		$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
		$user = "illiyinstudio@gmail.com";
		$pass = "illiyingmailpass";
		$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $serviceName);
		$gp = new Zend_Gdata_Photos($client, "Google-DevelopersGuide-2.0");
		$query = $gp->newQuery("https://picasaweb.google.com/data/feed/api/all");
		$query->setParam("kind", "photo");
		$query->setQuery($search);
		$query->setMaxResults("25");
		$userFeed = $gp->getUserFeed(null, $query);
		$item['total'] = "25";
		foreach ($userFeed as $photoEntry) {
			$camera = "";
			$contentUrl = "";
			$firstThumbnailUrl = "";
			$albumId = $photoEntry->getGphotoAlbumId()->getText();
			$photoId = $photoEntry->getGphotoId()->getText();
			$photoWidth = $photoEntry->getGphotoWidth()->getText();
			$photoHeight= $photoEntry->getGphotoHeight()->getText();
			$title= $userFeed->getGphotoNickname();
			$test= $photoEntry->getGphotoHeight()->getText();
			if ($photoEntry->getExifTags() != null &&
			    $photoEntry->getExifTags()->getMake() != null &&
			    $photoEntry->getExifTags()->getModel() != null) {
			    $camera = $photoEntry->getExifTags()->getMake()->getText() . " " .
			              $photoEntry->getExifTags()->getModel()->getText();
			}

			if ($photoEntry->getMediaGroup()->getContent() != null) {
			  $mediaContentArray = $photoEntry->getMediaGroup()->getContent();
			  $contentUrl = $mediaContentArray[0]->getUrl();
			}

			if ($photoEntry->getMediaGroup()->getThumbnail() != null) {
			  $mediaThumbnailArray = $photoEntry->getMediaGroup()->getThumbnail();
			  $firstThumbnailUrl = $mediaThumbnailArray[1]->getUrl();
			}
	    	$item['Url'] = $photoEntry->getLink('alternate')->getHref();
	    	$item['MediaUrl'] = $firstThumbnailUrl;
	    	$item['Thumbnail'] = $contentUrl;
	    	$item['Title'] =  $photoEntry->getTitle()->getText();
	    	$item['iWidth'] = $photoWidth;
	    	$item['iHeight'] = $photoHeight;
	    	array_push($responses, $item);
		}
		return json_encode($responses);
	}

	public function soopx($query = "illiyin", $size = "small", $page = 1){
		$responses = array();
		$item = array();
		$partSize = "";
		$rSize = "";
		switch ($size) {
			case 'small':
				# code...
				$partSize = "&image_size=4,20";
				$rSize = "20";
				break;
			case 'medium':
				# code...
				$partSize = "&image_size=4,21";
				$rSize = "21";
				break;
			case 'large':
				# code...
				$partSize = "&image_size=4,2048";
				$rSize = "2048";
				break;
			default:
				# code...
				$partSize = "";
				break;
		}
		$partUrl = "";
		$partUrl .= "consumer_key=".KEY_500PX."&";
		$partUrl .= "term=".$query."&";
		$partUrl .= "page=".$page."&";
		$partUrl .= "image_size=4&";
		$partUrl .= "rpp=50";
		$partUrl .= $partSize;
		$jsonObj = file_get_contents(HOST_500PX."?".$partUrl);
		$jsonArr = json_decode($jsonObj);
		$item['total'] = number_format($jsonArr->total_items);
		foreach ($jsonArr->photos as $result ) {
	    	$item['Url'] = "https://500px.com".$result->url;
	    	foreach ($result->images as $image) {
		    	if($image->size == $rSize){
			    	$item['MediaUrl'] = $image->url;
		    	}else if($image->size == "4"){
			    	$item['Thumbnail'] = $image->url;
	    		}
	    	}
	    	$item['Title'] = $result->name;
	    	$item['iWidth'] = $result->width;
	    	$item['iHeight'] = $result->height;
	    	array_push($responses, $item);
		}
		return json_encode($responses);
	}

	public function ipernity($query, $size, $page = 1){
		$responses = array();
		$item = array();
		$partSize = "";
		switch ($size) {
			case 'small':
				# code...
				$partSize = "&thumbsize=640";
				break;
			case 'medium':
				# code...
				$partSize = "&thumbsize=1024";
				break;
			case 'large':
				# code...
				$partSize = "&thumbsize=2048";
				break;

			default:
				# code...
				break;
		}
		$partUrl = "";
		$partUrl .= "api_key=".KEY_IPERNITY."&";
		$partUrl .= "media=photo&";
		$partUrl .= "text=".$query."&";
		$partUrl .= "extra=owner,dates,count,license,medias,geo,original&";
		$partUrl .= "dist=30km&";
		$partUrl .= "thumbsize=800&";
		$partUrl .= "per_page=50&";
		$partUrl .= "page=".$page;
		$partUrl .= $partSize;
		$jsonObj = file_get_contents(HOST_IPERNITY.METHOD_SEARCH_IPERNITY."?".$partUrl);
		$jsonDecode = json_encode($jsonObj);
		$jsonArr = json_decode($jsonObj);
		$item['total'] = number_format($jsonArr->docs->total);
		foreach ($jsonArr as $result) {
			if(isset($result->doc)){
				foreach ($result->doc as $key) {
					if($this->_getLinkIpernity($key->doc_id) != "NOT FOUND"){
				    	$item['Url'] = $this->_getLinkIpernity($key->doc_id);
				    	$item['MediaUrl'] = $key->thumb->url;
				    	$item['Thumbnail'] = $key->thumb->url;
				    	$item['Title'] = $key->title;
				    	$item['iWidth'] = $key->thumb->w;
				    	$item['iHeight'] = $key->thumb->h;
				    	array_push($responses, $item);
					}
				}
			}
		}
		return json_encode($responses);
	}
	function testShutterStock($search_terms='Test+test'){
		$search_terms_for_url = preg_replace('/\s/', '+', $search_terms);
		$requestUri = 'https://api.shutterstock.com/v2/images/search?view=full&per_page=5&query=' . $search_terms_for_url;
		$auth = base64_encode(KEY_ID_SHUTTERSTOCK.":".KEY_SECRET_SHUTTERSTOCK);
		$data = array(
		  'http' => array(
		    'request_fulluri' => true,
		    'ignore_errors' => true,
		    'header'  => "Authorization: Basic $auth\r\n".
		    				"User-Agent: ".$_SERVER['HTTP_USER_AGENT'])
		  );
		$context = stream_context_create($data);
		$response = file_get_contents($requestUri, 0, $context);
		$jsonObj = json_decode($response);
		echo json_encode($jsonObj);
	}
	public function shutterstock($search_terms='Test+test', $page = 1){
		$responses = array();
		$search_terms_for_url = preg_replace('/\s/', '+', $search_terms);
		$requestUri = 'https://api.shutterstock.com/v2/images/search?view=full&page='.$page.'&height_from=4859&per_page=50&query=' . $search_terms_for_url;
		$auth = base64_encode(KEY_ID_SHUTTERSTOCK.":".KEY_SECRET_SHUTTERSTOCK);
		$data = array(
		  'http' => array(
		    'request_fulluri' => true,
		    'ignore_errors' => true,
		    'header'  => "Authorization: Basic $auth\r\n".
		    				"User-Agent: ".$_SERVER['HTTP_USER_AGENT'])
		  );
		$context = stream_context_create($data);
		$response = file_get_contents($requestUri, 0, $context);
		$jsonObj = json_decode($response);
		$item = array();
		$item['total'] = number_format($jsonObj->total_count);
		foreach ($jsonObj->data as $value) {
	    	$item['Url'] = $value->assets->preview->url;
	    	$item['MediaUrl'] = $value->assets->preview->url;
	    	$item['Thumbnail'] = $value->assets->large_thumb->url;
	    	$item['Title'] = $value->description;
	    	$item['iWidth'] = $value->assets->preview->width;
	    	$item['iHeight'] = $value->assets->preview->height;
			array_push($responses, $item);
		}
		return json_encode($responses);
	}
	public function _getLinkIpernity($docid){
		$partUrl = "";
		$partUrl .= "api_key=".KEY_IPERNITY."&";
		$partUrl .= "doc_id=".$docid;
		$jsonObj = file_get_contents(HOST_IPERNITY.METHOD_GET_IPERNITY."?".$partUrl);
		$jsonArr = json_decode($jsonObj, TRUE);
		return isset($jsonArr['albums']['album'][0]['link'])?$jsonArr['albums']['album'][0]['link']:"NOT FOUND";
	}
	public function loadMaps($query = "Malang"){
		$location = $this->geoLocationQuerywithXML($query);
		$config['center'] = $location['address'];
		$config['height'] = "100%";
		$this->googlemaps->initialize($config);
		$marker = array();
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
		if($array['status'] != "ZERO_RESULTS"){
			if(isset($array['result']['geometry'])){
				$return = array(
						"address" => $array['result']['formatted_address']
					);
			}else{
				$address = array_column($array['result'], 'formatted_address');
				$return = array(
						"address" => $address[0]
					);
			}
		}else{
			$return  = array(
					"address" => "Perum Puri Nirwana Keben Kav. 7,Kecamatan Sukun,Kelurahan Bandung Rejosari,Jawa Timur 65148"
				);
		}
		return $return;
	}
	public function detectBrowser(){
	    $u_agent = $_SERVER['HTTP_USER_AGENT'];
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";
	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'linux';
	    }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'mac';
	    }elseif (preg_match('/windows|win32/i', $u_agent)) {
    			$platform = 'windows';
	    }
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
					$bname = 'Internet Explorer';
					$ub = "MSIE";

	    }elseif(preg_match('/OPR/i',$u_agent)){
	        $bname = 'Opera';
	        $ub = "Opera";
	    }elseif(preg_match('/Netscape/i',$u_agent)){
	        $bname = 'Netscape';
	        $ub = "Netscape";
	    }elseif(preg_match('/Edge/i', $u_agent)){
	        $bname = 'Microsoft Edge';
	        $ub = "Edge";
	    }elseif(preg_match('/Firefox/i',$u_agent)){
	        $bname = 'Mozilla Firefox';
	        $ub = "Firefox";
	    }elseif(preg_match('/Chrome/i',$u_agent)){
	        $bname = 'Google Chrome';
	        $ub = "Chrome";
	    }elseif(preg_match('/Safari/i',$u_agent)){
	        $bname = 'Safari';
	        $ub = "Safari";
	    }
	    return array(
	        'userAgent' => $u_agent,
	        'name'      => $bname,
	        'alias'		=> $ub,
	        'version'   => 'N/A',
	        'platform'  => $platform,
	        'pattern'    => 'N/A'
	    );
	}

	function in_array_r($needle, $haystack, $strict = false) {

	    foreach ($haystack as $item) {

	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {

	            return true;

	        }

	    }



	    return false;

	}

	function objectToArray ($object) {

	    if(!is_object($object) && !is_array($object))

	        return $object;



	    return array_map('objectToArray', (array) $object);

	}

    function _getVideoInfo($vid)

    {

        $params = array(

            'part' => 'contentDetails,statistics',

            'id' => $vid,

            'key' => KEY_GOOGLE,

        );



        $api_url = HOST_YOUTUBE_DETAIL . '?' . http_build_query($params);

        $result = json_decode(file_get_contents($api_url), true);

        // print_r($result);

        if(empty($result['items'][0]['contentDetails']))

            return null;

        $vinfo = $result['items'][0]['contentDetails'];

        $vinfo2 = $result['items'][0]['statistics'];



        $interval = new DateInterval($vinfo['duration']);

        $duration_sec = $interval->h * 3600 + $interval->i * 60 + $interval->s;

        return array('duration' => $this->_mediaTimeDeFormater($duration_sec),

        				'views_total'=> $vinfo2['viewCount']);

    }

	function formatMilliseconds($milliseconds) {

		$mil = $milliseconds;

		$seconds = $mil / 1000;

		return date("H:i:s", $seconds);

	}

	function _mediaTimeDeFormater($seconds)

	{

	    if (!is_numeric($seconds))

	        throw new Exception("Invalid Parameter Type!");





	    $seconds = $seconds;

	    $ret = "";



	    $hours = (string )floor($seconds / 3600);

	    $secs = (string )$seconds % 60;

	    $mins = (string )floor(($seconds - ($hours * 3600)) / 60);



	    if (strlen($hours) == 1)

	        $hours = "0" . $hours;

	    if (strlen($secs) == 1)

	        $secs = "0" . $secs;

	    if (strlen($mins) == 1)

	        $mins = "0" . $mins;



	    if ($hours == 0)

	        $ret = "$mins:$secs";

	    else

	        $ret = "$hours:$mins:$secs";



	    return $ret;

	}

	public function separatedParameter($posisi = 1, $url = "https://www.youtube.com/watch?v=xNJpTpBdi2s"){

		$url = explode("?", $url);

		$url = explode("=", $url[$posisi]);

		return $url[$posisi];

	}
	public function getSuggest($query = "illiyin"){
		$responses = array();
		$item = array();
		if($this->input->cookie('suggest')!=null){
			if($this->input->cookie('suggest') == 1){
				if($query != "illiyin"){
					$url =  "http://api.bing.net/qson.aspx";
					$jsonObj = json_decode(file_get_contents($url ."?query=". $query));
					foreach ($jsonObj->SearchSuggestion->Section as $value) {
						# code...
						$item['suggest'] = $value->Text;
						array_push($responses, $item);
					}
				}
			}
		}
		return json_encode($responses);
	}
}
