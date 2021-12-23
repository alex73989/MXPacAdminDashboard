// ========== KEYMAPS ==========
// KeyMaps for Arrow
const KEY_UP = 38;      // Arrow Up
const KEY_DOWN = 40;    // Arrow Down
const KEY_LEFT = 37;    // Arrow Left
const KEY_RIGHT = 39;   // Arrow Right

// KeyMaps for AWSD
const KEY_W = 87;       // W Button
const KEY_S = 83;       // S Button
const KEY_A = 65;       // A Button
const KEY_D = 68;       // D Button
// ========== KEYMAPS ==========

const DIR_KEY_MAP2 = [KEY_W, KEY_S, KEY_A, KEY_D];
const DIR_KEY_MAP1 = [KEY_UP, KEY_DOWN, KEY_LEFT, KEY_RIGHT];
const BLOCK_DEFAULT_FOR = [KEY_W, KEY_S, KEY_A, KEY_D, KEY_UP, KEY_DOWN, KEY_LEFT, KEY_RIGHT];


var myGamePiece;
var myFi;
var myFi1;
var myFi2;
var buttonMove = false;

function startGame() {
  myGameArea.start();
  myGamePiece = new component(150, 150, "http://localhost/MXPacGroup/public/assets/images/CarLogoCanvasMoving.gif", 10, 175, "image");
  //blueGamePiece = new component(20, 20, "blue", 300, 110);
  myFi = new component(40, 40, "blue", 100, 50);
  myFi1 = new component(40, 40, "blue", 300, 50);
  myFi2 = new component(40, 40, "blue", 500, 50);
}
var myGameArea = {
  canvas: document.createElement("canvas"),
  start: function() {
    var bodyID = document.getElementById("canvasDemo");

    this.canvas.width = 680;
    this.canvas.height = 420;
    this.context = this.canvas.getContext("2d");
    bodyID.insertBefore(this.canvas, bodyID.childNodes[2]);

    this.interval = setInterval(updateGameArea, 20);
    window.addEventListener('keydown', function(e) {
    myGameArea.keys = (myGameArea.keys || []);
    myGameArea.keys[e.keyCode] = true;
    });
    window.addEventListener('keyup', function(e) {
    myGameArea.keys[e.keyCode] = false;
    });
  },

  clear: function() {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  },

  stop: function() {
    clearInterval(this.interval);
  }
}

function component(width, height, color, x, y, type) {
    this.gamearea = myGameArea;
    this.type = type;
    if(type == "image")
    {
        this.image = new Image();
        this.image.src = color;
    }

    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;

    this.update = function() {
        ctx = myGameArea.context;
        if(type == "image")
        {
            ctx.drawImage(this.image, this.x, this.y, this.width, this.height);
        }
        else
        {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
      this.x += this.speedX;
      this.y += this.speedY;
    },
    this.crashWith = function(enemy) {
      var myleft = this.x;
      var myright = this.x + (this.width);
      var mytop = this.y;
      var mybottom = this.y + (this.height);
      var fileft = enemy.x;
      var firight = enemy.x + (enemy.width);
      var fitop = enemy.y;
      var fibottom = enemy.y + (enemy.height);
      if ((mybottom < fitop) || (mytop > fibottom) || (myright < fileft) || (myleft > firight)) {
            ctx = myGameArea.context;

      }
    }
}

function updateGameArea() {

  if (myGamePiece.crashWith(myFi)) {
    myFi.fillStyle = "green";
  } else {
    myGameArea.clear();

    if (!buttonMove) {
      myGamePiece.speedX = 0;
      myGamePiece.speedY = 0;
    }


    if (myGameArea.keys && (myGameArea.keys[KEY_LEFT] || myGameArea.keys[KEY_A])) {

      myGamePiece.speedX = -2;
    }
    if (myGameArea.keys && (myGameArea.keys[KEY_RIGHT] || myGameArea.keys[KEY_D])) {

      myGamePiece.speedX = 2;
    }
    if (myGameArea.keys && (myGameArea.keys[KEY_UP] || myGameArea.keys[KEY_W])) {

      myGamePiece.speedY = -2;
    }
    if (myGameArea.keys && (myGameArea.keys[KEY_DOWN] || myGameArea.keys[KEY_S])) {

      myGamePiece.speedY = 2;
    }

    Number.prototype.clamp = function(min, max) {
      return Math.min(Math.max(this, min), max);
    };

    myGamePiece.x = myGamePiece.x.clamp(0, myGameArea.canvas.width - myGamePiece.width);
    myGamePiece.y = myGamePiece.y.clamp(0, myGameArea.canvas.height - myGamePiece.height);
    myGamePiece.newPos();
    //blueGamePiece.x -=1;
    //blueGamePiece.y +=2;
    //blueGamePiece.update();
    myGamePiece.update();
    myFi.update();
    myFi1.update();
    myFi2.update();
  }
}

function moveup() {
  buttonMove = true;
  myGamePiece.speedY -= 1;
}

function movedown() {
  buttonMove = true;
  myGamePiece.speedY += 1;
}

function moveleft() {
  buttonMove = true;
  myGamePiece.speedX -= 1;
}

function moveright() {
  buttonMove = true;
  myGamePiece.speedX += 1;
}

function clearmove() {
    buttonMove = false;
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
}

function resetmove(){
    startGame();
}