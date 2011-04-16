<?php
class UnlimitedLinkPlugin {
    var $ld;
		var $rep;
		var $xmlsOb;
    // ==========================================================================
    function UnlimitedLinkPlugin() 
	{
        $this->ld = new LocalData();
        $this->xmlsOb = new xmlsOb();
        $this->xmlsOb->GenerateFnames();
    }
    // ==========================================================================
    function GetForm(){
	$UnlimitedLink = (array)$this->ld->GetPlSettings('UnlimitedLink');
        echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
        <title>UnlimitedLink</title>
        <script src="..\..\codebase-php\jquery-1.4.2.min.js"></script>
        <script src="..\..\codebase-php\jquery.json-2.2.min.js"></script>
		<script type="text/javascript" src="style/plugin.js"></script>
		<style type="text/css">
		  h2.pos_left
			{
			position:relative;
			left:-20px;
			}
			h2.pos_right
			{
			position:relative;
			left:20px;
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
			<style type="text/css">
			body
			{
			background-color:#3244fe;
			}
			h4
			{
			color:black;
			text-align:center;
			}
		    </style>
		    </head>
			<style type="text/css">
			table, td, th
			{			
			border:1px solid brown;
			}
			td
			{
			padding:15px;
			}
			th
			{
			background-color:brown;
			color:white;
			}
			</style>
			</head>
			<style type="text/css">
			p.ex {color:rgb(128,0,0);}
			</style>
			</head>
			<style type="text/css">
			p.bl {color:rgb(045,045,150);}
			</style>
			</head>
			<style type="text/css">
			p.ta {color:rgb(045,045,150);}
			</style>
			</head>
			<style type="text/css">
			p.ce
			{
			position:absolute;
			left:450px;
			top:207px;
			}
			</style>
			</head>
			<style type="text/css">
			p.le
			{
			position:absolute;
			left:450px;
			top:797px;
			}
			</style>
			</head>
			<style type="text/css">
			p.ri
			{
			position:absolute;
			left:450px;
			top:1387px;
			}
			</style>
			</head>
			<style type="text/css">
			div.ex
			{
			width:440px;
			padding:10px;
			border:4px solid purple;
			margin:0px;
			}
			</style>
			</head>
			<style type="text/css">
			p.bro {color:rgb(128,0,0);}
			</style>
			 </head>
			 <style>
			body{
                background-color: rgb(200, 200, 300);
                font-size: 10pt;
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
            .el{
                float: left;
                width: 6px;
                height: 6px;
                border-bottom: 1px solid white;
                border-right: 1px solid white;
                cursor: pointer;
                background-color: blue;
				
            }
			 <style type="text/css">
			a:link 	  {color:#55005F;}  /* unvisited link  */
			a:visited {color:#55005F;}  /* visited link    */
			a:hover   {color:#8700FF;}  /* mouse over link */
			a:active  {color:#6600FF;}  /* selected link   */
			</style>
			 </head>
           </style>	
        <script>
        //==============================================================
        window.reload = function(){
                var l=window.location.toString();
                var indx=l.indexOf(\'?\');
                window.location=l.slice(0, indx)+"?action=refresh&tmp="+Math.random();
        }
		
        //==============================================================
            $(document).ready(function(){
                //==============================================================
                $("#btn_save").click(function(){
                var req=new Object();
                    req["link"]=$("#link").val();
                    data=$.toJSON(req);
                    var l=window.location.toString();
                    var indx=l.indexOf(\'?\');
                    var nurl=l.slice(0, indx)+"?action=save&tmp="+Math.random();
                    $.post(nurl, data);
                    
                    return false;
                });
            });
        </script>

    </head>
    <body>';
echo '<html>
 <body>
   <var><h5><p class="pos_fixed"><bdo dir="rtl">!!!726p yb</bdo></p></h5></var>
   <div class="zag" height="35">Unlimited Link 2.1 (2011-02-27)<hr></div><br>

<tr BGCOLOR="red"><p class="sansserif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b><u>6 IMPORTANT STEPS TO GET UNLIMITED MATERIAL.</tr></u></b><br><br><b><div class="ex"><li>FIND YOUR ITEM TO GET UNLIMITED AND CLICK ON IT NOW WAIT TO<br><br><li>OPEN THE INTERNET EXPLORER AND COPY THE LINK FROM THE TAB.<br><br><li>LOOK HOW MANY TABS 
TO OPEN ( 12 , 10 , 9 ) AND PASTE THE LINKS.<br><br><li>SELECT YOUR DUMMY ACCOUNT AND CLICK TO SEND (IN ALL TABS).<br><br><li>CONNECT TO YOUR DUMMY ACCOUNT AND ACCEPT THE HELP REQU.<br><br><li>NOW GO TO YOUR MAIN ACCOUNT AND LOOK IN YOUR INVERTORY..<br></div>';
echo '<br><body><table><tr><th><h3>Request name</th><th><h3>Item icon</th><th><h3>Tab and Hour to send again</th></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_badge&requestType=municipal_material_badge&overlayed=true" class="postlink" target="blue_black">BADGE</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/bbb4c2a7506d52de47c72eb549317cdc.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_ball_and_chain&requestType=municipal_material_ball_and_chain&overlayed=true" class="postlink" target="blue_black">BALL AND CHAIN</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/961c607234ecf65a7aa55faf296c2f19.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_outfit&requestType=municipal_material_outfit&overlayed=true" class="postlink" target="blue_black">OUTFIT</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/56f7b8bc0e024289d2c4638593de4ffe.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_siren&requestType=municipal_material_siren&overlayed=true" class="postlink" target="blue_black">SIREN</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/45cd339db6f8b22ed954729d5db71276.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_whistle&requestType=municipal_material_whistle&overlayed=true" class="postlink" target="blue_black">WHISTLE</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/f340442ba69e16c763f4ea76d53128ee.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr></table></body></html>';
echo '<br><body><table><tr><th><h3>Request name</th><th><h3>Item icon</th><th><h3>Tab and Hour to send again</th></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_folders&requestType=municipal_material_folders&overlayed=true" class="postlink" target="blue_black">MANILA FOLDER</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/58e87eb656bf8e851da1c4231b0d43b6.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_inkpad&requestType=municipal_material_inkpad&overlayed=true" class="postlink" target="blue_black">INKPAD</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/6bea084063c142ed1a34c0daf795c4fc.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_visor&requestType=municipal_material_visor&overlayed=true" class="postlink" target="blue_black">VISOR</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/1aaff5ac341be6ab45a3ee7af1b7a916.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr></table></body></html>';
echo '<br><body><table><tr><th><h3>Request name</th><th><h3>Item icon</th><th><h3>Tab and Hour to send again</th></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_safety_goggles&requestType=municipal_material_safety_goggles&overlayed=true" class="postlink" target="blue_black">SAFETY GOGGLES</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/cc57c6316ef48fd1a6959984c2e1d23c.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_conveyor_belt&requestType=municipal_material_conveyor_belt&overlayed=true" class="postlink" target="blue_black">CONVEYOR BELT</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/3677e94d7d9e8f29989d6bbc11e8cac9.png" alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_work_uniforms&requestType=municipal_material_work_uniforms&overlayed=true" class="postlink" target="blue_black">WORK UNIFORM</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/66490310df9ef73c68cc8af461fbfbf1.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_robotic_arm&requestType=municipal_material_robotic_arm&overlayed=true" class="postlink" target="blue_black">ROBOTIC ARM</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/67a19de77ff214903788e360a8d22c5a.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_lunchbox&requestType=municipal_material_lunchbox&overlayed=true" class="postlink" target="blue_black">LUNCHBOX</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/b35d20d4736449d252a38157a438e732.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_hard_hat&requestType=municipal_material_hard_hat&overlayed=true" class="postlink" target="blue_black">HARD HAT</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/4b666240a61f57bbab44d1fe015e1f2b.png" alt="Image"></a></td></td>
<td><h4><p class="bl">Open 10 tabs <br> To send again in 4 hour.</td></tr></table></body></html>';
echo '<br><body><table><tr><th><h3>Request name</th><th><h3>Item icon</th><th><h3>Tab and Hour to send again</th></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_gold_plating&requestType=municipal_material_gold_plating&overlayed=true" class="postlink" target="blue_black">GOLD PLATIING</td>
<td><a class="postlink" target="blue_blank"><img src="http://www.cityvillechat.com/wp-content/uploads/2011/01/3ea4538b1ac94329af37ec82e3cf7ece.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 9 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_permit&requestType=municipal_material_permit&overlayed=true" class="postlink" target="blue_black">BUILD GRAND</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/12b1bd581828b0c48a8a5b25fcb73bd1.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 9 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_city_seal&requestType=municipal_material_city_seal&overlayed=true" class="postlink" target="blue_black">CITY SEAL</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.cityville.zynga.com/hashed/9fe9cfc673c2a8dd69f816e6bd687480.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 9 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_marble&requestType=municipal_material_marble&overlayed=true" class="postlink" target="blue_black">MARBLE</td>
<td><a class="postlink" target="blue_blank"><img src="http://assets.playersedge.com/v7/images/apps/171149826239950/marble.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 9 tabs <br> To send again in 4 hour.</td></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=material_ribbon&requestType=municipal_material_ribbon&overlayed=true" class="postlink" target="blue_black">RIBBON</td>
<td><a class="postlink" target="blue_blank"><img src="http://www.cityvillechat.com/wp-content/uploads/2011/01/0307fbf5a85085d46acb530a309ff33c.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 9 tabs <br> To send again in 4 hour.</td></tr></table></body></html>';
echo '<br><body><table><tr><th><h3>Request it. name</th><th><h3>Item icon</th><th><h3>Tab and Hour to send again</th></tr><tr>
<td><h5><a href="http://apps.facebook.com/cityville/request.php?itemName=energy_3&requestType=municipal_material_permit&overlayed=true" class="postlink" target="blue_black">ENERGY + 3</td>
<td><a class="postlink" target="blue_blank"><img src="http://cityvillefb.static.zgncdn.com/hashed/e0251948be3adf988f26042f07d74a2f.png"alt="Image"></a></td></td>
<td><h4><p class="bl">Open 12 tabs <br> To send again in 4 hour.</td></tr></table></body></html>
<br><td><b><u><h4><p class="ex">Send material many times and complete your Municipal building faster.</p></b></td></table></h4></u></tr>';
echo'<hr><div class="zag"><br><a href="http://bit.ly/eW6S7j" class="postlink" target="blue_black">
IF YOU LIKE MY PLUGIN CLICK AND SEND ME 1 ENERGY!!!<br>
<a href="http://bit.ly/eW6S7j" class="postlink" target="blue_black"><br>
<img src="http://www.ginopaoli.co.za/images/facebook.gif"alt="Image"></a><br>
   <hr>
 </body>
</html>';
    }
  }
?>