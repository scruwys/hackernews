<?php namespace Services;

class HttpHelper {

	public $url;

	public function __construct($url)
	{
		$this->url = $url;
	}

	public function get()
	{
		return $this->url;
	}
	
	/**
	 * Adds HTTP to front of url if it does not exist
	 * @return string
	 */
	public function add_http() 
	{
	    if (!preg_match("~^(?:f|ht)tps?://~i", $this->url)) 
	    {
	        $this->url = "http://" . $this->url;
	    }

	    return $this->url;
	}

	/**
	 * Checks to see if the link is valid
	 * @return boolean
	 */
	public function is_valid() 
	{
		$httpcode = $this->get_http_code();
        
        if ($httpcode >= 200 && $httpcode < 300)
        {  
            return true;  
        }
	}

	/**
	 * Retrieves HTTP code associated with url
	 * @return string 
	 */
	public function get_http_code()
	{
		if ($this->url == NULL) return false; 

        $ch = curl_init($this->url);  
        
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        
        $data = curl_exec($ch);  
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        
        curl_close($ch);   

	    return $http_code;
   	}


}