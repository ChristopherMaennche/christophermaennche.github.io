<?php
    $codeAuth = $_GET['code'];
    $scopeAuth = $_GET['scope'];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://www.strava.com/api/v3/oauth/token?client_id=51285&client_secret=8b75d5f01ec713a31eec47ca71667352112758e5&code=' . $codeAuth . '&grant_type=authorization_code');
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($curl);
    curl_close($curl);

    setcookie('codeAuth', $codeAuth, time() + (86400 * 30), "/");
    setcookie('scopeAuth', $scopeAuth, time() + (86400 * 30), "/");

    echo $content;
    header("Location: ./cyclist tracker/");
?>