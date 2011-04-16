<?php

class FactoryPlugin
{
    var $ld;
    var $rep;
    var $xmlsOb;
    // ==========================================================================
    function FactoryPlugin()
    {
        $this->ld = new LocalData();
        $this->xmlsOb = new xmlsOb();
        $this->xmlsOb->GenerateFnames();
    }
    function GetOptionsByTypeName($name)
    {
        $xmlsOb = new xmlsOb();
        $res = "";
        foreach ($xmlsOb->gsXML->items->item as $item)
        {
            if ((string )$item['type'] == $name)
            {
                $res = $res . "<option>" . (string )$item['name'] . "</option>";
            }
        }
        return $res;
    }
    // ==========================================================================
    function GetForm()
    {
        $PlVersion = (array )$this->ld->GetPlVersion('Factory');
        $Factory = (array )$this->ld->GetPlSettings('Factory');
        echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
    <head>
		<title>Factory</title>
        <script src="..\..\codebase-php\jquery-1.4.2.min.js"></script>
        <script src="..\..\codebase-php\jquery.json-2.2.min.js"></script>
		<script type="text/javascript" src="helpers/validation.js"></script>
        <style>
            body{
                background-color: rgb(236, 221, 186);
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
			h3 {
	color: #43273B;
	font-size: 12pt;
	margin: 0 0 0 10px;
	white-space: nowrap;
	font-weight: bold;
}
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
			</body>
			    </html>
					<script>
							$(document).ready(function(){                                                                                  

                            window.settings=eval(' . json_encode($this->ld->GetPlSettings('Factory')) . ');

                              if ((window.settings!==null) && (window.settings!==undefined)){
                                $("#RunTime").val(window.settings.RunTime);

                                if ((window.settings.Run!==null) && (window.settings.Run!==undefined)){
									$("#factorylist").val(window.settings.factorylist);
     
                                    if(window.settings["Run"]==1){
                                        $("#Run").attr("checked", true);
                                    }
									if(window.settings["NoHarvestIfFull"]==1){
                                        $("#NoHarvestIfFull").attr("checked", true);
                                    }
									if(window.settings["placeContract"]==1){
										$("#placeContract").attr("checked", true);
                                    }
									if(window.settings["harvestsfactory"]==1){
										$("#harvestsfactory").attr("checked", true);
                                    }
									if(window.settings["InstantGrow"]==1){
										$("#InstantGrow").attr("checked", true);
                                    }
									if(window.settings["Debug"]==1){
										$("#Debug").attr("checked", true);
                                    }
								  }
								}
                            //==============================================================

                            $("#btn_save").click(function(){
                            var req=new Object();

							$("input:text").each(function(){
                                    req[$(this).attr("id")]=$(this).val();
                            });

                            $(":checkbox").each(function(){
                                 var par=$(this).attr("id");
                                 req[par]=$(this).attr("checked");
                              });
									req["factorylist"]=$("#factorylist").val();
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
			   <div class="zag" height="35">Factory Plugin Version ' . $PlVersion['version'] . ' (' . $PlVersion['date'] . ') by Phreaker<br> <hr></div>
               Get Premium Goods without waiting for hours, Need energy </div></div>';
        echo ' <hr></div> <form>
		1) <input id="Run" type="checkbox" value="0" title="Do you want to run the Factory Plugin?" > Run Factory?<br>
			 &nbsp;&nbsp;&nbsp;&nbsp;<input id="RunTime" type="text" value="0" size="2" title="Enter number in second here">&nbsp;How long you want to run the plugin? It will run every cycle. recommended 90 second. <br>
			 
          
           <br>
		2) <input type="checkbox" id="placeContract" title="Choose the contract"> Place Contract, choose your contract:&nbsp;<select id="factorylist" title="Contract 1 = 25 Premium Goods                                      Contract 2 = 40 Premium Goods                         Contract 3 = 55 Premium Goods                               Contract 4 = 75 Premium Goods                                     Contract 5 = 90 Premium Goods">' . $this->GetOptionsByTypeName("factory_contract") . '</select> <br></td>
			&nbsp;&nbsp;&nbsp;&nbsp;<input id="harvestsfactory" type="checkbox" title="Do you want to harvest the factory?">Harvest factory?<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="NoHarvestIfFull" type="checkbox" title="Check if you want to stop if premium goods are more than 90%"> Stop Harvest if premium goods total is 90% full.<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="InstantGrow" type="checkbox" title="Do you want to make the factory instant ready to harvest?"> Use instant grow (Harvest within 5 Sec.)<br><br>
		3) <input id="Debug" type="checkbox" value="0" title="Less logging if checked"> Enable this to have less logging.<br>
			  <hr><div ><h3>Capture Bandits</h3></div>
			<input DISABLED type="checkbox" id="CaptureBandit">Do you want to capture bandits?<br><br>
			  <hr>
            <div width="100%" align="center">
            <br><br><br>
		  <button id="btn_save" style="color:white;background-color:#13a89e;border-width:1px;border-style:solid; " title="Click to save your settings">&nbsp; Save settings&nbsp;</button></div>
		  </form><br><br><br><br><br><br><br><br><br><br><br>';

echo '
    </body>
</html>';
    }
}

?>
