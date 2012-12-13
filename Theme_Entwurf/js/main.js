/*Bubble whith an arrow that points to the left*/
function drawBubble_left(ctx, x, y, w, h, radius)
{
  var r = x + w;
  var b = y + h;
  ctx.fillStyle = "#ffffff"; 
  ctx.beginPath();

  ctx.moveTo(x+radius, y);
  ctx.lineTo(x+radius/2, y-10);
  ctx.lineTo(x+radius * 2, y);
  ctx.lineTo(r-radius, y);

  ctx.quadraticCurveTo(r, y, r, y+radius);
  ctx.lineTo(r, y+h-radius);
  ctx.quadraticCurveTo(r, b, r-radius, b);
  ctx.lineTo(x+radius, b);
  ctx.quadraticCurveTo(x, b, x, b-radius);
  ctx.lineTo(x, y+radius);
  ctx.quadraticCurveTo(x, y, x+radius, y);

  ctx.fill();
}

/*Bubble whith an arrow that points to the right*/
function drawBubble_right(ctx, x, y, w, h, radius)
{
  var r = x + w;
  var b = y + h;
  ctx.fillStyle = "#ffffff"; 
  ctx.beginPath();

  /*Creates Arrow*/
  ctx.moveTo(x+190, y);
  ctx.lineTo(x+220/2, y-10);
  ctx.lineTo(x+radius * 2, y);
  ctx.lineTo(r-radius, y);

  /*Creates Bubble*/
  ctx.quadraticCurveTo(r, y, r, y+radius);
  ctx.lineTo(r, y+h-radius);
  ctx.quadraticCurveTo(r, b, r-radius, b);
  ctx.lineTo(x+radius, b);
  ctx.quadraticCurveTo(x, b, x, b-radius);
  ctx.lineTo(x, y+radius);
  ctx.quadraticCurveTo(x, y, x+radius, y);

  ctx.fill();
}


function dispQuote() 
{
  var canvas = document.getElementById('canvas1');
  var ctx = canvas.getContext('2d'); 
  drawBubble_left(ctx, 10,60,220, 220, 20);
}

function dispQuote2() 
{
  var canvas = document.getElementById('canvas2');
  var ctx = canvas.getContext('2d'); 
  drawBubble_right(ctx, 10,60,200, 90, 10);
}

function MasterFkt() {
	dispQuote();
	dispQuote2();  
}

window.onload=MasterFkt;



