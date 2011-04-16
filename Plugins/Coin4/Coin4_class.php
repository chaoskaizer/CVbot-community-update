<?php
class Coin4Plugin {
    var $ld;
		var $rep;
		var $xmlsOb;
    // ==========================================================================
    function Coin4Plugin() 
	{
        $this->ld = new LocalData();
        $this->xmlsOb = new xmlsOb();
        $this->xmlsOb->GenerateFnames();
    }
    // ==========================================================================
    function GetForm(){
	$Coin4 = (array)$this->ld->GetPlSettings('Coin4');
         echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
    <head>
		<title>Coin4</title>
        <script src="..\..\codebase-php\jquery-1.4.2.min.js"></script>
        <script src="..\..\codebase-php\jquery.json-2.2.min.js"></script>
        <style>
            body{
                background-color: rgb(200, 200, 300);
                font-size: 12pt;
            }
			img {
			-ms-interpolation-mode : nearest-neighbor;
			margin: 0;
			padding: 0;
			} 
			div#line { display: block;
			margin: 0;
			padding: 0;
			}
			br{
				margin: 0;
			}
            .zag{
                font-size: 15pt;
                font-weight: bold;
            }
            .zag2{
                font-size: 13pt;
                font-weight: bold;
                width: 300px;
            }
			div#map
			{
			width: 510px;
			height: 510px;
			}
			
            #maint{
				//border-style: solid;
            }
			</style>
			 </head>
			<style type="text/css">
			div.ex
			{
			width:390px;
			padding:10px;
			border:5px solid purple;
			margin:0px;
			}
			</style>
			 </head>
			<style type="text/css">
			h4
			{
			position:absolute;
			left:215px;
			top:225px;
			}
			</style>
			 </head>
			<style type="text/css">
			p.pos_fixed
			{
			position:fixed;
			top:30px;
			right:5px;
			}
			</style>
			 </head>
			<body>
			<h4><= Use Ctrl to select multiple<br>&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and save energy.</h4>
			</body>
			    </html>
					<script>
							$(document).ready(function(){                                                                                  

                            window.settings=eval(' . json_encode($this->ld->GetPlSettings('Coin4')) . ');

                              if ((window.settings!==null) && (window.settings!==undefined)){
                                $("#RunTime").val(window.settings.RunTime);

                                if ((window.settings.Run!==null) && (window.settings.Run!==undefined)){
                                    if(window.settings["Run"]==1){
                                        $("#Run").attr("checked", true);
                                    }
									if(window.settings["collectRent"]==1){
                                        $("#collectRent").attr("checked", true);
                                    }
									if(window.settings["collectMu"]==1){
										$("#collectMu").attr("checked", true);
                                    }
									if(window.settings["collectBusiness"]==1){
										$("#collectBusiness").attr("checked", true);
                                    }
									if(window.settings["collectLM"]==1){
										$("#collectLM").attr("checked", true);
                                    }
									if(window.settings["cuttree"]==1){
										$("#cuttree").attr("checked", true);
                                    }
									if(window.settings["clearWithered"]==1){
										$("#clearWithered").attr("checked", true);
                                    }
									if(window.settings["harvestsrops"]==1){
										$("#harvestsrops").attr("checked", true);
                                    }
									if(window.settings["AcceptN"]==1){
										$("#AcceptN").attr("checked", true);
                                    }
									if(window.settings["InstantGrow"]==1){
										$("#InstantGrow").attr("checked", true);
                                    }
									if(window.settings["Debug"]==1){
										$("#Debug").attr("checked", true);
                                    }
									if(window.settings["seedplot"]==1){
										$("#seedplot").attr("checked", true);
                                    }
								  }
								}
                            //==============================================================

                            $("#btn_save").click(function(){
                            var req=new Object();
                            req.bus=new Array();

                            $("input:text").each(function(){
                                    req[$(this).attr("id")]=$(this).val();
                            });

                            $("#bus option:selected").each(function(){
                                    req.bus.push($(this).attr("id")+""+$(this).val());
                                });

                            $(":checkbox").each(function(){
                                 var par=$(this).attr("id");
                                 req[par]=$(this).attr("checked");
                              });
                                    data=$.toJSON(req);
                                    var l=window.location.toString();
                                    var indx=l.indexOf(\'?\');
                                    var nurl=l.slice(0, indx)+"?action=save&tmp="+Math.random();
                                    $.post(nurl, data);

                                    return false;
                            });
    });
</script>    
    <body>
			   <var><h5><p class="pos_fixed"><bdo dir="rtl">!!!726p yb</bdo></var></h5></p>
               <div class="zag" height="35">Coin4 ver 0.9 (2011-02-26)<hr></div></div></div><br>
               Coins 4 works with buildings, tree, plot & neighbors help. (Collecting coin with StreakBonus3)<br>';
              // var_dump($Coin4);
 $SelBus = (array)$Coin4['bus'];
 echo '        <form>
               <input id="Run" type="checkbox" value="0" > Run the coin 4 (Check run only business.)<br>
               Select the business that you like to supply & collect.<br><br>
               <select size="9" multiple name="bus" id="bus">';

        $Business = array();
        $res=$this->ld->GetSelect("select * from objects");
        foreach ($res as $val){
            $v=(string)$val[1];
            $obj=unserialize(base64_decode($v));        //className  String  Business
            if($obj['className'] == "Business")
            {
              $Business[$obj['itemName']] = "have";
            }
        }

       foreach($Business as $Bus => $item)
        {

          if(in_array($Bus, $SelBus)){$selected = " SELECTED ";}else{$selected = "";}

          echo '<option value="'. $Bus . '" '.$selected.' >'. $Bus .'</option>';

        }

      echo    '</select><br><br>
	        <input id="RunTime"         type="text" value="0" size="2">&nbsp;How long to run coin 4? (enter numb.) <br>It will run every cycle. recommanded 120 Second. <br><br>
            <input id="Debug"           type="checkbox" value="0"> Enable this to have less logging.<br><br>
			//==============================================											<br>
			<div class="ex">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>PLOT,TREE & NEIGHBORS HELP</u><br><br>
			<input id="seedplot" 		type="checkbox" value="0"> Seed peas in empty plots?     	
			&nbsp;&nbsp;&nbsp;<input id="InstantGrow" 			type="checkbox" value="0"> Use instant grow in 5sec?  		    <br>
			<input id="clearWithered"   type="checkbox" value="0"> Clear all wiithered crops?		
			&nbsp;&nbsp;&nbsp;&nbsp;<input id="harvestsrops" 	type="checkbox" value="0"> Harvest all ready crops?				<br>				
	        <input id="cuttree" 		type="checkbox" value="0"> Cut the trees in your city?			
			&nbsp;&nbsp;&nbsp;&nbsp;<input id="AcceptN" 		type="checkbox" value="0"> Accept neighbors work?           	<br>		<br> </div>
			//==============================================											<br>
			<div class="ex">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>COLLECT BUILDINGS</u><br><br>
			<input id="collectRent"     type="checkbox" value="0"> Collect house rent buildings?  	
			<input id="collectMu" 		type="checkbox" value="0"> Collect municipal building?  		<br>
			<input id="collectLM"       type="checkbox" value="0"> Collect landmarks buildings? 		
			<input id="collectBusiness" type="checkbox" value="0"> Collect business buildings?			<br>        		    			<br> </div>
			//==============================================											<br>
          <div width="100%" align="center"><br>
		  <button id="btn_save" style="color:white;background-color:#13a89e;border-width:1px;border-style:solid; ">&nbsp; Save settings&nbsp;</button></div>';
		echo'<br><td><hr><h3>
		<a href="http://bit.ly/eW6S7j" class="postlink" target="_black">IF YOU LIKE MY PLUGIN CLICK AND SENT ME 1 ENERGY!!!</var><br>
		<a href="http://bit.ly/eW6S7j" class="postlink" target="_black"><br>
		<img src="http://www.ginopaoli.co.za/images/facebook.gif" alt="Image"></a></td></br></td><hr>
        </form>
    </body>
</html>';
    }
  }
?>