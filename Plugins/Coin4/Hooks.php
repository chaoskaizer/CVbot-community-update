<?php
$this->AddHook('other_work', 'Coin4');

function Coin4($bot) {
    if ($bot->firstrun)
      { //not work if it's first bot cycle
        $Name = "Coin4"; $Version = "0.9"; $Date = "2011-02-26";
        $bot->ld->UpdatePluginVersion($bot, $Name, $Version, $Date )  ;
        return;
      }
    $bot->ReloadConfig();
    $data = $bot->ld->GetPlSettings("Coin4");

    //==========================================================================
    if ($data->cuttree == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if (($obj["className"] == "Wilderness")){
                                 //$bot->SendMsg('cut tree.' .$obj["id"]);
                $bot->clearWilderness($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }

    //==========================================================================
    if ($data->collectMu == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if ((($obj["className"] == "Municipal"))){
             if ($obj["state"] == "grown"){
                $bot->collectMu($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
               }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }

	//==========================================================================
    if ($data->collectLM == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if ((($obj["className"] == "Landmark"))){
             if ($obj["state"] == "grown"){
                $bot->collectLM($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
               }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }

	//==========================================================================
    if ($data->collectRent == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if ((($obj["className"] == "Residence"))){
             if ($obj["state"] == "grown"){
                $bot->collectRentx($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
               }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }

	//==========================================================================
    if ($data->clearWithered == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if (($obj["className"] == "Plot") && ($obj["state"] == "withered") ){
                                 //$bot->SendMsg('Clear withered.' .$obj["id"]);
                $obj["state"] = "plowed";
                $bot->clearWithered($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }

	//==========================================================================
    if ($data->harvestsrops == "1" && $StopHarvest == 0 ) {
        foreach ($bot->fobjects as $obj) {
            if (($obj["className"] == "Plot") && ($obj["state"] != "withered") && ($obj["state"] != "plowed")){
             if ($data->InstantGrow == "1" || ($obj["state"] == "grown") ){
                            //$bot->SendMsg('harvest crops success.' .$obj["id"]);
                $obj["state"] = "grown";
                $bot->harvest($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
               }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }

	//==========================================================================
    if ($data->collectBusiness == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if ((($obj["className"] == "Business"))){
             if ($obj["state"] == "closedHarvestable"){
                $bot->collectBusiness($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
               }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }
	
	//==========================================================================
    if ($data->seedplot == "1" ) {
        foreach ($bot->fobjects as $obj) {
            if (($obj["className"] == "Plot")){
                                 //$bot->SendMsg('seed plot.' .$obj["id"]);
                $bot->seedplot($obj); $bot->streakBonus2();
                $reload = 1;
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
            }
        }
    }
    if($reload ==1){ $bot->ReloadConfig(); }
	
	//==========================================================================
	
	// accept neighbors work.
    if (isset($data->AcceptN))
       {
         if ($data->AcceptN == 1)
         {
           if(is_array($bot->order_visitor_help))
             {
               $bot->SendMsg('Start accepting work from Neighbors.');
               foreach ($bot->order_visitor_help as $Nuid => $val)
                {
                  $Nuid = $val['senderID']; //senderID
                  //$bot->SendMsg('Accepting work from :' . $Nuid);

                  if(is_array($val['helpTargets']) && $val['status'] == "unclaimed" && count($val['helpTargets']) > 0)
                  {                                                   //status  String
                    $bot->redeemVisitorHelpAction($val['helpTargets'], $Nuid) ;
                    // all streakBonus moved to botclass, please look there
                  }
               }
			}
		 }	 
	  }

	//==========================================================================
	if (isset($data->Run)) { $Run = $data->Run; }else {$bot->SendMsg('Coin 4 not activated.'); return;}
    if (!isset($data->Run)) { $bot->SendMsg('Coin 4 not activated...'); return;}
    if (!$data->Run) { $bot->SendMsg('Coin 4 not activated to make business ready.'); return;}
    if (isset($data->RunTime)) { $RunTime = $data->RunTime; }else {$RunTime = 120;}

    if (isset($data->Debug)) {$Debug = false;}else{$Debug = true;}
    if ($data->Debug) {$Debug = false;}else{$Debug = true;}
    //var_dump($data->bus);
    if(count($data->bus) == 0){ $bot->SendMsg('Coin 4 no Business selected.'); return;}
    $now = time();
    $stop = $now + $RunTime;
    $bot->CheckDoober = TRUE;
    $bot->SendMsg('Coin 4: start to make a business ready.');
    $bot->SendMsg('Coin 4: Running for: ' .$RunTime. ' Sec');
    $bot->dooberItem = array();
    $bot->dooberItems = 0;

	//==========================================================================

    // prepare all Business buildings
            $bot->SendMsg('Coin 4: Prepare Business buildings.');
            foreach ($bot->fobjects as $obj)
            {
                if (($obj["className"] == "Business") && ($obj["state"] == "open") && in_array($obj["itemName"], $data->bus)) {
                  $bot->processVisits($obj ,$Debug);
                }
            }
            $bot->ReloadConfig();

    While ($now < $stop)
    {
            $reload = 0;
            $bot->SendMsg('Making business buildings ready (before supply)');
            foreach ($bot->fobjects as $obj) {
                if (($obj["className"] == "Business") && ($obj["state"] == "open") && in_array($obj["itemName"], $data->bus)) {
                  $bot->processVisits($obj, $Debug);
                    $reload++;
                }
                if (isset($bot->error_msg)) { $bot->ReloadConfig();   $stop = $now; break; }
            }
          $bot->ReloadConfig();
          //if($reload > 0) $bot->ReloadConfig();
          //
            $reload = 0;
            $bot->SendMsg('Collecting business buildings starting');
            $i =0;
            foreach ($bot->fobjects as $obj) {
                if (($obj["className"] == "Business") && ($obj["state"] == "closedHarvestable") && in_array($obj["itemName"], $data->bus)) {
                    $bot->collectBB($obj, $Debug);
                    if($bot->dooberItems > 8)
                      { $bot->dooberItems = 0; //$bot->dooberItems -32;
                        $bot->streakBonus3();
                      }
                    $reload++;
                }
                if (isset($bot->error_msg)) { $bot->ReloadConfig();  $stop = $now; break; }
            }
          $bot->ReloadConfig();
          //if($reload > 0) $bot->ReloadConfig();
          //
            $bot->SendMsg('Supply business buildings starting');
            foreach ($bot->fobjects as $obj) {
                if (($obj["className"] == "Business") && ($obj["state"] == "closed") && in_array($obj["itemName"], $data->bus)) {
                    $bot->supplyBB($obj, $Debug);
                }
                if (isset($bot->error_msg)) { $bot->ReloadConfig(); $stop = $now;  break;  }
            }
          $bot->ReloadConfig();
          $now = time();
    }
	// ending
    $bot->CheckDoober = FALSE;
    // show stats.
	$bot->SendMsg('Coin 4: running for ' .$RunTime. ' Sec.');
	$bot->SendMsg('Coin 4: -------------------------------------------.');
	$bot->SendMsg('Coin 4: ----------- end time -----------.');
    $bot->SendMsg('Coin 4: complete all steps success.');
	$bot->SendMsg('Coin 4: --------- cost energy -------.');
	$bot->SendMsg('Coin 4: -------------------------------------------.');

    $bot->pm->RefreshMePlugin("coin4");
  }
?>