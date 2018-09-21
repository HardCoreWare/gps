<?php

$request=
'
{
    
    "device":{"code":"6dsK8p93","password":"p455w0rd"},

    "command":{"alarm":1,"track":1},

    "gps":{

            "state":{"check":2,"sat":4,"hdop":1.2,"vdop":1.5},

            "temporal":{"time":"12054599","date":"180724"},

            "location":{"lat":19.0005,"lng":-99.0002,"alt":2045.25},
            
            "move":{"speed":10.35,"course":355.01}

    }

}';

require_once('input.php');

$input=new input($request);

?>