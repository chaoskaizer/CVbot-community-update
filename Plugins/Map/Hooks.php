<?php
  
function Map($bot){
    if ($bot->firstrun)
      { //not work if it's first bot cycle
        $Name = "Map"; $Version = "1.7"; $Date = "2011-02-26";
        $bot->ld->UpdatePluginVersion($bot, $Name, $Version, $Date )  ;
        return;
      }
    $bot->ReloadConfig();
    $data = $bot->ld->GetPlSettings("Map");
     }

 $this->AddHook('other_work', 'Map');
?>