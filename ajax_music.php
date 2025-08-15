<?php
    require("config.php");
    
    $Action = $_POST["action"];

    if(isset($Action) && $Action == "localInitMusic"){
        $callMethod     =   "GET";
        $url            =   "http://localhost:8080/search/jamendo";
        $data           =   [];

        $response       =   callApi($callMethod, $url, $data);
        echo json_encode($response);
        exit;
    }else if(isset($Action) && $Action == "localInitArtist"){
        $callMethod     =   "GET";
        $url            =   "http://localhost:8080/artist/jamendo";
        $data           =   [];

        $response       =   callApi($callMethod, $url, $data);
        echo json_encode($response);
        exit;
    }else{
        echo "failed";
        exit;
    }
?>