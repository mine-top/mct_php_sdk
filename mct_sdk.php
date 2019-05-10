<?php
class MCT_SDK
{
	private $url = "https://mc-t.ru/";

	function __construct($key, $url="")
	{
		$this->key = $key;
		if ($url) $this->url = $url;
	}

	public function request($method, $kwargs=array()){
		$curl = curl_init($this->url . "api/");
		$data = array(
			'key' => $this->key,
			'method' => $method
		);
		if ($kwargs) $data['kwargs'] = $kwargs;
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}
