<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./index.php.css">
        <title>Cyclist Tracker</title>
    </head>
    <body>
        <center>
            <h1>Welcome</h1>
            <h2>First You Need To Login</h2>
        <BR>
            <div class='stravaLoginDiv'>
                <img src='./img/strava-app-logo.png' class='stravaLoginImg' />
                <!-- GET https://www.strava.com/oauth/authorize -->
                <?php
                    if(isset($_COOKIE['codeAuth']) && isset($_COOKIE['scopeAuth'])){
                        echo '<p style="font-size: 12.5px; position: relative; top: -5%;">You Are Logged In.</p>';
                    }else{
                        ?> <button class='stravaLoginBtn'><a class='stravaLoginBtn' href='http://www.strava.com/oauth/authorize?client_id=51285&response_type=code&redirect_uri=http://localhost/here.php&approval_prompt=force&scope=activity:read_all'>+</a></button> <?php
                        echo '<p class="stravaLoginBtn">Not Logged In.</p>';
                    }
                ?>
            </div>
        </center>
        <?php
            echo $_COOKIE['codeAuth'];
        ?>
    </body>
</html>