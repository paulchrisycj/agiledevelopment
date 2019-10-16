<?php
/**
 * Created by PhpStorm.
 * User: Chester Chin
 * Date: 4/13/2017
 * Time: 9:24 AM
 */
 


// define('dbName', 'ks_test');
// define('userName', 'root');
// define('passWord', '');
// define('dsn','mysql:host=127.0.0.1;dbname=ks_test');


//Use for local dev 
if ($_SERVER['SERVER_NAME']=="localhost"){

    define('dbName', 'agiledev');
    define('userName', 'root');
    define('passWord', 'root');
    define('dsn','mysql:host=127.0.0.1;dbname=agiledev');
    
    

}
//Use for live site
elseif ($_SERVER['SERVER_NAME']==""){

    define('dbName', '');
    define('userName', '');
    define('passWord', '');
    define('dsn','mysql:host=127.0.0.1;dbname=');
    
    
}
else{
    echo "Current server is not configured to access KS database.";
}


