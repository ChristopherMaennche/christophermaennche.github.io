<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
}
</style>
</head>
<body onload="startGame()">
    <script>

    var myGamePiece;

    function startGame() {
        myGameArea.start();
        //Game Pieces
        //GamePiece = new component(xsize, ysize, "Color", xpos, ypos);
        GrassGameBackground = new component(1000, 500, "green", 0, 0);
        P1GamePiece = new component(30, 30, "red", 150, 160);
        P2GamePiece = new component(30, 30, "blue", 800, 160);
        LTGoalGamePiece = new component(40, 120, "red", 10, 120);
        RTGoalGamePiece = new component(40, 120, "blue", 950, 120);
        FieldLineLeft1 = new component(10, 110, "black", 40, 10);
        FieldLineLeft2 = new component(10, 110, "black", 40, 240);
        FieldLineRight1 = new component(10, 110, "black", 950, 10);
        FieldLineRight2 = new component(10, 110, "black", 950, 240);
    }

    var myGameArea = {
        canvas : document.createElement("canvas"),
        start : function() {
            this.canvas.width = 1000;
            this.canvas.height = 500;
            this.context = this.canvas.getContext("2d");
            document.body.insertBefore(this.canvas, document.body.childNodes[0]);
            this.interval = setInterval(updateGameArea, 20);
            window.addEventListener('keydown', function (e) {
                myGameArea.keys = (myGameArea.keys || []);
                myGameArea.keys[e.keyCode] = (e.type == "keydown");
            })
            window.addEventListener('keyup', function (e) {
                myGameArea.keys[e.keyCode] = (e.type == "keydown");            
            })
        }, 
        clear : function(){
            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        }
    }

    function component(width, height, color, x, y) {
        this.gamearea = myGameArea;
        this.width = width;
        this.height = height;
        this.speedX = 0;
        this.speedY = 0;    
        this.x = x;
        this.y = y;    
        this.update = function() {
            ctx = myGameArea.context;
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
        this.newPos = function() {
            this.x += this.speedX;
            this.y += this.speedY;        
        }    
    }

    function updateGameArea() {
        myGameArea.clear();
        P1GamePiece.speedX = 0;
        P1GamePiece.speedY = 0; 
        P2GamePiece.speedX = 0;
        P2GamePiece.speedY = 0;    
        speedX = 5;
        speedY = 5;
        if (myGameArea.keys && myGameArea.keys[65]) {P1GamePiece.speedX = -speedX; }
        if (myGameArea.keys && myGameArea.keys[68]) {P1GamePiece.speedX = speedX; }
        if (myGameArea.keys && myGameArea.keys[87]) {P1GamePiece.speedY = -speedY; }
        if (myGameArea.keys && myGameArea.keys[83]) {P1GamePiece.speedY = speedY; }

        if (myGameArea.keys && myGameArea.keys[37]) {P2GamePiece.speedX = -speedX; }
        if (myGameArea.keys && myGameArea.keys[39]) {P2GamePiece.speedX = speedX; }
        if (myGameArea.keys && myGameArea.keys[38]) {P2GamePiece.speedY = -speedY; }
        if (myGameArea.keys && myGameArea.keys[40]) {P2GamePiece.speedY = speedY; }
        //Grass Render
        GrassGameBackground.update();
        //Player 1
        P1GamePiece.newPos();    
        P1GamePiece.update();
        //Player 2
        P2GamePiece.newPos();    
        P2GamePiece.update();
        //Goals
        LTGoalGamePiece.update();
        RTGoalGamePiece.update();
        //LeftFieldBorder
        FieldLineLeft1.update();
        FieldLineLeft2.update();
        //RightFieldBorder
        FieldLineRight1.update();
        FieldLineRight2.update();
    }
    </script>
</body>
</html>
