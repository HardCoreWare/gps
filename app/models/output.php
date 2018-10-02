<?php

require_once('tracker.php');

final class output extends tracker{

    public function __construct($request,$host,$user,$password,$database){

        $this->begin($host,$user,$password,$database);
        $tracker=$this->read($request);
        $device=$tracker->device;
        $validate=$this->validate_device($device);
        $response=$this->select_gps($device);
        echo($response);
    
    }

}

?>