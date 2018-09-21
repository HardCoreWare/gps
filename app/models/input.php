<?php

require_once('tracker.php');

final class input extends tracker{

    public function __construct($request){

        $this->begin('localhost','root','','prueba3');
    
        $tracker=$this->read($request);
        $device=$tracker->device;
        $validate=$this->validate_device($device);
    
        if($validate==2){
    
            $command=$tracker->command;
    
            $this->insert_command($device,$command);
    
            if($command->track==1){
    
                $gps=$tracker->gps;
    
                $this->insert_gps($device,$gps);
    
            }
    
        }
    
    }

}
?>