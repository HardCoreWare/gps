<?php

require_once('tracker.php');

final class output extends tracker{

    public function __construct($request){

        $this->begin('localhost','root','','test2');
        $tracker=$this->read($request);
        $device=$tracker->device;
        $validate=$this->validate_device($device);
        $response=$this->select_gps($device);
        echo($response);
    
    }

}

?>