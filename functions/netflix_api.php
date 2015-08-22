
<?php  

	/*The following is a sample code snippet. Please note that the API key and 
      shared secret are bogus and will not work. 
       
      I'm using OAuthSimple as the library to perform the signatures. It 
      currently is available for PHP and Javascript, but I'd REALLY appreciate 
      it if folks could help flesh out versions for Python, .net, and other 
      languages. 
    */  

    include ('./includes/OAuthSimple.php');  
          
    /* Remember, these are bogus. Swap them for the API key and Shared Secret 
      you got when you registered your Application at 
      http://developer.netflix.com 
    */  
    $apiKey = 'ars6as88pyq8ck4zpf5kb2nd';  
    $sharedSecret = 'VR4JwSSYDG';  
      
    // Some sample argument values  
  
    /* You can pass in arguments to OAuthSimple either as a string of URL 
      characters or an array. (See the documentation for OAuthSimple for 
      details. There's nothing magical going on here, just simple key=>value 
      pairs. */  
    $arguments = Array(  
        'term'=>$search_term,
		'output'=>'json'  
    );  
      
    // this is the URL path (note the lack of arguments.)  
    $path = "http://api-public.netflix.com/catalog/titles";  
  
    // Create the Signature object.  
    $oauth = new OAuthSimple();  
    $signed = $oauth->sign(Array('path'=>$path,  
                    'parameters'=>$arguments,  
                    'signatures'=> Array('consumer_key'=>$apiKey,  
                                        'shared_secret'=>$sharedSecret  
                                        /* If you wanted to do queue functions 
                                          or other things that require access 
                                          tokens and secrets, you'd include them 
                                          here as: 
                                        'access_token'=>$accessToken, 
                                        'access_secret'=>$tokenSecret 
                                        */  
                                        )));  
      
    // Now go fetch the data.  
    $curl = curl_init();  
    curl_setopt($curl,CURLOPT_URL,$signed['signed_url']);  
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);  
    curl_setopt($curl,CURLOPT_ENCODING,'gzip,deflate');
//    curl_setopt($curl,CURLOPT_SETTIMEOUT,2);  
    $buffer = curl_exec($curl);  
    if (curl_errno($curl))  
    {  
        die ("An error occurred:".curl_error());  
    }  
    $result = json_decode($buffer, true);  
	
?>  

