<html>
    <head>
        <?php
            include 'Variables.php';
        ?>
        <link rel="stylesheet" href="Main.css">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS Bootstrap Import -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <!-- Tic Tac Toe Lines -->
        <div class="Buttons">
            <?php 
                switch($turn){ 
                    case 'P':
                        ?><h2>Players Turn</h2><?php
                        break;
                    case 'C':
                        ?><h2>Computers Turn</h2><?php
                        break;
                }
                
                $frmClass = "";
                if($winner){
                    $frmClass = "Winner";
                }
            ?>
            <h2>Score <span class="badge badge-secondary"><?php echo $score ?></span></h2>
            <form method="POST" class="<?php echo $frmClass; ?>" id="ttForm">
                <input type="hidden" name="player" value="<?php echo $turn; ?>">
                <input type="hidden" name="box" id="box" value="">
                <legend>Tic Tac Toe</legend>
                <div class="container">
                    <div class="row justify-content-center">
                <?php 
                    if((is_array($boxes))){
                        $icnt = 1;
                        foreach($boxes as $box){
                            $tempClass = "";
                            if($box === 'X'){
                                $tempClass = "XClass";
                            }
                            if($box === 'O'){
                                $tempClass = "OClass";
                            }
                            
                            $isDisabled = "";
                            if($tempClass !== "" || $winner){
                                $isDisabled = "DISABLED";
                            }
                            
                            ?>
                            
                                  <div class="col-4 bg-warning">
                                    <div class="button<?php echo $icnt; ?>><?php echo $box; ?>" style="text-align: center; border: 1px Solid black;">
                                        <div class="card-body ttButton <?php echo $tempClass; ?>" id="<?php echo $icnt; ?>">
                                            <?php echo $box; ?>
                                        </div>
                                    </div>
                                  </div>
                            <?php
                            $icnt ++;
                        }
                    
                    }
                ?>
                    </div>
                </div>
            </form>
            <form method="POST">
                <input type="hidden" name="btn" value="1">
                <input type="submit" class="NewGame" name="NewGame" value="New Game">
            </form>
        </div>
        <!-- JS Bootstrap Import -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(".ttButton").click(function(){
                <?php
                
                if (empty($openSpaces)) {
                    echo '$var is either 0, empty, or not set at all';
                }else{
                    echo "Poop";
                }
                
//                if($openSpaces != ""){
//                    echo "No";
//                }else{
//                    echo "Yea";
//                }
                ?>
                //$('#box').val($(this).attr('id'));
                //$('#ttForm').submit();
              //alert($(this).attr('class'));
            });
        </script>
    </body>
    <head>
</html>