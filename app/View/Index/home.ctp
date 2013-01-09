
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="intro-<?php echo($skip);?>"> Hier steht der Beschreibungstext falls das Intro abgebrochen wurde...</div>
	<div class="container">         
		<!--This is the header-->
		<div class="row header">
			<div class="span9 heading">
				<div id="conference-header-line-one"><?php echo($con['Conference']['title']); ?></div> 
				<div id="conference-header-line-two"><?php echo($con['Conference']['subtitle']); ?></div>                             
			</div>
			<div class="span3 logo">
				<a href="http://www.typo3.org"><img src="img/t3-logo.png"/></a>
			</div>
		</div>
		<div class="row">
			<div class="span3">&nbsp;</div>
			<div class="span8 daytext">
                            <?php
                                if ($day="Friday"){
                                    echo("<a class=\"menu_active\" href=\"index?day=Friday&conference_id=".$con['Conference']['id']."\">Friday</a> / <a class=\"menu_passiv\" href=\"index?day=Saturday&conference_id=".$con['Conference']['id']."\">Saturday</a>");
                                } 
                                else{
                                    echo("<a class=\"menu_passiv\" href=\"index?day=Friday&conference_id=".$con['Conference']['id']."\">Friday</a> / <a class=\"menu_active\" href=\"index?day=Saturday&conference_id=".$con['Conference']['id']."\">Saturday</a>");                                
                                }
                            ?>
                            
                        </div>
                       
		</div>

		<!-- Here starts the main content-->
		<div class="row">
			<!--This is the left sidecontent (for the bubbles)-->
			<div class="span3 sidebar">
				<div class="bubble left-floating bubble-left" id="bubble-2">
          <canvas id="canvas1" class="bubbleborder" width="240" height="200" >
          </canvas>
          <div class="bubbletext bubbletext-left">
            <h3 class="title title-left">Der Titel des Vortrags</h3>
            <div class="speaker-name speaker-name-left">Liesa Burgey</div>
            <div class="bubble-content bubble-content-left">
              <p class="bubble-text bubble-text-left"> Dies ist ein Satz in welchem der Inhalt beschrieben ist.</p>
            </div>
            <div class="button button-left"> Info »</div>
          </div>
        </div>
			</div>
			
			<!--Here is the centered content-->
			<div class="span6 center-content">
				<div class="row">
					<div class="span6 content-heading">
						<div class="left-floating heading-text">
							Business/Community Track
						</div>
						<div class="right-floating heading-text">
							Technical Track
						</div>
					</div>
				</div>

                                    <?php
                                foreach($points as $value){
     
                                        if($value['programpoints']['topic_id']=="7"){
                                          echo("<div class=\"row\">"); 
                                             echo("<div class=\"span6 content-heading bordered-line\">");
                                                    echo("<div class=\"left-floating heading-text\" id=\"".$value['programpoints']['id']."\">");
							echo($value['programpoints']['title']);
                                                   echo(" </div>
                                                </div>
                                            </div>");
                                           // echo ("<font color=\"#FF0000\">Pause</font>");
                                        }
                                        elseif($value['programpoints']['column']=="1"){
                                            
                                            if(!isset($value['referent1']['id'])){
                                                $referent="";
                                                
                                            }
                                            elseif(isset($value['referent2']['id'])){
                                                
                                                $referent="(".$value['referent1']['firstname']." ".$value['referent1']['lastname'].", ".$value['referent2']['firstname']." ".$value['referent2']['lastname'].")";
                                            }
                                            else{
                                                $referent="(".$value['referent1']['firstname']." ".$value['referent1']['lastname'].")";
                                            }
                                               echo(" <div class=\"row\">");
                                                   echo("<div class=\"span6\">");
                                                            echo("<div class=\"keynote-time\">");
                                                                echo(substr($value['programpoints']['start_time'],0,5)."-<br/>".substr($value['programpoints']['end_time'],0,5));
                                                            echo("</div>");
                                                           echo("<div class=\"keynote-track ".$value['topics']['color']."-track\" id=\"".$value['programpoints']['id']."\">");
                                                            echo("<div class=\"track-title\">".$value['programpoints']['title']."</div>");
                                                            echo("<div class=\"track-speaker\">".$referent."</div>");
                                                           echo("</div>
                                                     </div>
                                                </div>");
                                           // echo ("<font color=\"#FF0000\">Vortrag ganz durchgehend</font>");
                                        }
                                        elseif($value['programpoints']['column']=="2" && $value['programpoints']['subcolumn']=="1"){
                                            if(isset($value['referent2']['id'])){
                                                
                                                $referent="(".$value['referent1']['firstname']." ".$value['referent1']['lastname'].", ".$value['referent2']['firstname']." ".$value['referent2']['lastname'].")";
                                            }
                                            else{
                                                $referent="(".$value['referent1']['firstname']." ".$value['referent1']['lastname'].")";
                                            }
                                           echo(" <div class=\"row\">
                                                <div class=\"span6\">
                                                    <div class=\"left-floating ".$value['topics']['color']."-track track\" id=\"".$value['programpoints']['id']."\">
							<div class=\"track-title\">".$value['programpoints']['title']."</div> 
							<div class=\"track-speaker\">".$referent."</div>
                                                    </div>
						<div class=\"left-floating middle-field first-field\">
							".substr($value['programpoints']['start_time'],0,5)."-<br/>".substr($value['programpoints']['end_time'],0,5)." 
						</div>");
                                          //  echo ("<font color=\"#FF0000\">Vortrag linke Spalte</font>");
                                        }
                                        elseif($value['programpoints']['column']=="2" && $value['programpoints']['subcolumn']=="2"){
                                            if(isset($value['referent2']['id'])){
                                                
                                                $referent="(".$value['referent1']['firstname']." ".$value['referent1']['lastname'].", ".$value['referent2']['firstname']." ".$value['referent2']['lastname'].")";
                                            }
                                            else{
                                                $referent="(".$value['referent1']['firstname']." ".$value['referent1']['lastname'].")";
                                            }
                                            
                                           echo(" <div class=\"left-floating ".$value['topics']['color']."-track track\" id=\"".$value['programpoints']['id']."\">
							<div class=\"track-title\">".$value['programpoints']['title']."</div>
							<div class=\"track-speaker\">".$referent."</div>
                                                    </div>
                                                    </div>
                                                    </div>");
                                           // echo ("<font color=\"#FF0000\">Vortrag rechte Spalte</font>");
                                        }
                                  //  print_r($value);
                                    //exit;
                                    
                                 //   echo ("</div></div>");
                                    
                                }
?>





			
				<div class="row">
					<div class="span6">
						<div class="legend" id="legend-yellow">Business and <br/>Best Practices</div>
						<div class="legend" id="legend-purple">Mobile Development</div>
						<div class="legend" id="legend-blue">TYPO3 Enterprise CMS</div>
						<div class="legend" id="legend-green">FLOW3 PHP <br/>Framework</div>
						<div class="legend" id="legend-orange">Design and UX</div>
						<div class="legend" id="legend-red">Community / General</div>
					</div>
				</div>
			</div>

			<!--This is the right sidecontent (for the bubbles)-->
			<div class="span3 sidebar">
				<div class="bubble left-floating bubble-right" id="bubble-1">
					<canvas id="canvas2" class="bubbleborder" width="240" height="200" >
					</canvas>
					<div class="bubbletext bubbletext-right">
						<h3>Der Titel des Vortrags</h3>
						<div class="speaker-name speaker-name-right">Liesa Burgey</div>
						<div class="bubble-content bubble-content-right">
							<p class="bubble-text bubble-text-right"> Dies ist ein Satz in welchem der Inhalt beschrieben ist.</p>
						</div>
						<div class="button button-right"> Info »</div>
					</div>
				</div>
			</div>
		</div>
	</div>  

      	

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
