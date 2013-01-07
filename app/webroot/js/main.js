$(document).ready(function() {

  /*Bubble whith an arrow that points to the  right */
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

  /*Bubble whith an arrow that points to the left*/
  function drawBubble_right(ctx, x, y, w, h, radius)
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
    var content_height = $(".bubble-text-right").height();
    console.log($(".bubbletext-right").height());
    var canvas = document.getElementById('canvas2');
    var ctx = canvas.getContext('2d'); 
    drawBubble_right(ctx, 10,60,200, content_height +65, 10);
  }

  function bubble2_drawing() 
  {
    var content_height = $(".bubble-text-left").height();
    var canvas = document.getElementById('canvas1');
    var ctx = canvas.getContext('2d'); 
    drawBubble_left(ctx, 10,60,200, content_height +65, 10);
  }

  /* Master Function for the bubbles*/
  function MasterFkt() {
    bubble1_drawing(); 
    bubble2_drawing();  
  }

  window.onload=MasterFkt;

  /*Hover-Effect for Tracks*/
  $(".track").mouseenter(function(){
    $(this).css('background', '#9d9f9e');
  });
  $(".track").mouseleave(function(){
    $(this).css('background', '#cacccb');
  });


  /*global variables for bubble contents*/
  var short_description;
  var add_content;

  /*Animate the right bubble*/  
  function Animate_Bubble(){
    /* remove text from button and bubble to load in the new text*/
    $(".button-right").empty();
    $(".bubble-content-right").empty();

    /* Add Animation to Bubble*/
    $('#bubble-1').fadeIn('600', function() {
      $(".bubble-content-right").text(short_description);
        
      $(".bubble-content-right").animate({ left: '+=50', height: 'toggle' }, 1000, function() {
        $(".bubble-content-right").css('color','#000000');
        /*Button Animation*/
        $(".button-right").animate({ left: '+=50', height: 'toggle' }, 1000, function() {
          $(".button-right").text("Info »");
        });
      });
    });
  };

  /*Additional Animation for info-button*/
  $(".button-right").click(function(){
    $(".button-right").css("display","none")
    $(".bubble-content-right").append(add_content);

    $(".additional-content-right").animate({ left: '+=50', height: 'toggle' }, 1000, function() {
      $(".additional-content-right").css('color','#000000');
    });       
  });

  /* Placing Bubbles to the tracks */
  $(".keynote-track").click(function(){
      short_description = "Dies ist ein kurzer Text der den Inhalt der Veranstaltung beschreibt";
      add_content = "<div class='additional-content additional-content-right'>Hallo</div>";
      $("#bubble-1").css('margin-top','30px');
      Animate_Bubble();
  });

});