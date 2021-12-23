<?php
include(__DIR__.'\..\vendor\autoload.php');
use Phpfastcache\Helper\Psr16Adapter;

if(!function_exists('newInstagramClient')){ 
    function newInstagramClient() {
        // Credentials for IG
        $instagram = \InstagramScraper\Instagram::withCredentials(
            new \GuzzleHttp\Client(), 
            'USERNAME IG',          
            'PASSWORD IG', 
            new Psr16Adapter('Files')
        );
        $instagram->login();
        sleep(2); // Delay to mimic user
        
        // Account to be analyzed 
        $username = 'kevin😁';
        $account = $instagram->getAccount($username);
        sleep(1);

        return array($instagram,$account);
    }
   
}
