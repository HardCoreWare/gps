<?php

    require_once('output.php');

    if(isset($_POST["req"])){

    $request=$_POST["req"];

    $output = new output($request,SQL_HOST,SQL_USER,SQL_PASSWORD,SQL_DATABASE);

    }
    
?>