$(document).ready(function() {

  /*Bubble whith an arrow that points to the  right */
  function drawBubble_right(ctx, x, y, w, h, radius)
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

  /*Bubble whith an arrow that points to the left*/
  function drawBubble_left(ctx, x, y, w, h, radius)
  {
    var r = x + w;
    var b = y + h;
    ctx.fillStyle = "#6F9A37"; 
    ctx.beginPath();

    /*Creates Arrow*/
    ctx.moveTo(x, y+radius*3);
    ctx.lineTo(x-11, y+radius*2);
    ctx.lineTo(x * 2, y);
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

  /*Generating the bubbles*/
  function bubble1_drawing() 
  {
    var content_height = $(".bubble-text").height();
    var canvas = document.getElementById('canvas2');
    var ctx = canvas.getContext('2d'); 
    drawBubble_left(ctx, 10,60,200, content_height +65, 10);
  }

  /* Master Function for the bubbles*/
  function MasterFkt() {
    bubble1_drawing();  
  }

  window.onload=MasterFkt;

  /*Hover-Effect for Tracks*/
  $(".track").mouseenter(function(){
    $(this).css('background', '#9d9f9e');
  });
  $(".track").mouseleave(function(){
    $(this).css('background', '#cacccb');
  });

  /* Placing Bubbles to the tracks */
  $(".keynote-track").click(function(){
    /* remove text from button and bubble to load in the new text*/
    $(".button").empty();
    $(".bubble-content").empty();

    /* Add Animation to Bubble*/
    $('#bubble-1').fadeIn('600', function() {
        $(".bubble-content").animate({
          left: '+=50',
          height: 'toggle'
          }, 1000, function() {
              $(".bubble-content").text("Dies ist ein Satz in welchem der Inhalt beschrieben ist.");
              $(".button").animate({
              left: '+=50',
              height: 'toggle'
              }, 1000, function() {
                  $(".button").text("Info »");
              });
          });
    });
    $("#bubble-1").css('margin-top','30px');
  })

});