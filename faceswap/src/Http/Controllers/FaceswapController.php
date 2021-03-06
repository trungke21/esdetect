<?php

namespace Esdetect\Faceswap\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class FaceswapController extends BaseController
{
    static public function getAngle($source)
    {
    	$url = 'http://45.79.8.219/angle/face';
		$data = array('source' => $source);

		// use key 'http' even if you send the request to https://...
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result == false || $result == FALSE || $result =='false↵' || $result =='false') {
			return false;
		}
        return $result;
    }
    static public function swap($source,$destination)
    {
    	$url = 'http://45.79.8.219/swap/face';
		$data = array('source' => $source,'destination' => $destination);

		// use key 'http' even if you send the request to https://...
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result == false || $result == FALSE || $result =='false↵' || $result =='false') {
			return false;
		}
        return $result;
    }
}
