<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE ');
    header("Access-Control-Allow-Headers: Content-Type");

    $request = json_decode(file_get_contents("php://input"));


    if ($request != null) {
        $video_subunit = $request->video_subunit;
        // $name2 = $request->username;
        // $emails = $request->emails;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $mysqli = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($mysqli == false) {
        die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "DELETE FROM video WHERE video_subunit=$video_subunit";
        if ($mysqli->query($sql) === true) {
        echo ("success");
        } else {
        echo ("Error: " . $sql . "<br>" . $mysqli->error);
        }

        
        $mysqli->close();
    }
    
?>