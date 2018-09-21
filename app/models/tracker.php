<?php

class tracker extends crud{

    public function read($request){

        $tracker=json_decode($request);
        return $tracker;

    }

    public function validate_device($device){

        $code=$device->code;
        $password=$device->password;
        $validation=$this->validate_password('Device','Code_Device','Password_Device',$code,$password);
        return $validation;

    }

    public function insert_command($device,$command){

        $code = $device->code;
        $track = $command->track;      
        $alarm = $command->alarm;

        $line = array(
            "Alarm_Command"=>$alarm,
            "Track_Command"=>$track,
            "Code_Device"=>$code
        );

        $this->insert_line("Command",$line);

    }

    public function insert_gps($device,$gps){

        $code = $device->code;

        $check = $gps->state->check;
        $sat = $gps->state->sat;
        $hdop = $gps->state->hdop;    
        $vdop = $gps->state->vdop;
        $time = $gps->temporal->time;
        $date = $gps->temporal->date;
        $lat = $gps->location->lat;
        $lng = $gps->location->lng;
        $alt = $gps->location->alt;
        $speed=$gps->move->speed;
        $course=$gps->move->course;

        $line = array(

            "Code_Device"=>$code, "Check_Register"=>$check,"Sat_Register"=>$sat,
            "Hdop_Register"=>$hdop,  "Vdop_Register"=>$vdop,
            "Time_Register"=>$time,  "Date_Register"=>$date, 
            "Lat_Register"=>$lat,    "Lng_Register"=>$lng,"Alt_Register"=>$alt,
            "Speed_Register"=>$speed,"Course_Register"=>$course
        
        );
    
        $this->insert_line("Gps",$line);

    }

    public function select_gps($device){

        $code = $device->code;
        $target = "Code_Device = '".$code."'";
        $order = "Time_Register";
        $data=$this->select('Gps',['Lat_Register','Lng_Register'],$target,$order,1);
        $json = json_encode($data);

        return $json;

    }

}

?>