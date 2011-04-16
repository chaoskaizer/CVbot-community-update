<?php
$this->AddHook('other_work', 'UnlimitedLink');

function UnlimitedLink($bot){
    if ($bot->firstrun)
      { //not work if it's first bot cycle
        $Name = "UnlimitedLink"; $Version = "2.1"; $Date = "2011-02-27";
        $bot->ld->UpdatePluginVersion($bot, $Name, $Version, $Date )  ;
        return;
      }
    $bot->ReloadConfig();
    $data = $bot->ld->GetPlSettings("UnlimitedLink");

  }
?>