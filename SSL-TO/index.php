<html>
    <head>
        <?php
            include 'indexStyle.html';
        ?>
        <title>Sports League: The Original</title>
    </head>
    <body>
        <h1 class="MenuScreenTitle">Sports League</h1>
        <h2 class="MenuScreenSubTitle">The Original</h2>
        <form action="newgame.php">
            <input type="submit" class="NewButtonMenu" name="newButtonMenu" value="New Game">
        </form>
        <form>
            <input type="button" class="QuitButtonMenu" name="QuitButtonMenu" value="Quit" onclick=Window.close()>
        </form>
    </body>
</html>
