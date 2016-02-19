<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	define('HOST_BING', "https://api.datamarket.azure.com/Bing/Search/v1");
	define('HOST_FLICKR', "");
	define('HOST_YOUTUBE', "https://www.googleapis.com/youtube/v3/search");
	define('HOST_YOUTUBE_DETAIL', "https://www.googleapis.com/youtube/v3/videos");
	define('HOST_VIMEO', "");
	define('HOST_DAILYMOTION', "https://api.dailymotion.com/videos");
	define('HOST_PICASA', "http://picasaweb.google.com/data/feed/api/all");
	define('HOST_500PX', "https://api.500px.com/v1/photos/search");
	define('HOST_IPERNITY', "http://api.ipernity.com/api/");
	define('METHOD_SEARCH_IPERNITY', 'doc.search');
	define('METHOD_GET_IPERNITY', 'doc.getContainers');

	define('FIRST', "1");
	define('LIMIT', "1");
	include ('key_constants.php');
