<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://www.strava.com/oauth/authorize?client_id=51285&response_type=code&redirect_uri=http://localhost/here.php&approval_prompt=force&scope=activity:read_all');
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($curl);
    curl_close($curl);
    
    header("Location: http://www.strava.com/oauth/authorize?client_id=51285&response_type=code&redirect_uri=http://localhost/here.php&approval_prompt=force&scope=activity:read_all");
?>