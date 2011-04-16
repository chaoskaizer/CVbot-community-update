<?php

$this->AddHook('other_work', 'Factory');

function Factory($bot)
{
    if ($bot->firstrun)
    { //Will not run on first cycle
        $Name = "Factory";
        $Version = "0.1";
        $Date = "2011-03-05";
        $bot->ld->UpdatePluginVersion($bot, $Name, $Version, $Date);
        return;
    }
    $bot->ReloadConfig();
    $data = $bot->ld->GetPlSettings("Factory");
    if (!isset($data))
        return;
    $NoHarvestIfFull = 0;
    if (isset($data->NoHarvestIfFull))
    {
        if ($data->NoHarvestIfFull == "1")
        {
            $NoHarvestIfFull = 1;
        }
    }

    $StopHarvest = 0;
    $FactoryMaxGood = 1000;
    if (($FactoryMaxGood * 0.9) <= $bot->PremiumMax)
    {
        if ($NoHarvestIfFull == 1)
        {
            $StopHarvest = 1;
            $bot->SendMsg('Premium Goods storage > 90% Full. Not Harvesting.' . $bot->PremiumMax . "/" . $FactoryMaxGood);
        }
    }

    //==========================================================================
    //Harvesting Factory
    //==========================================================================
    /*   if ($data->harvestsfactory == "1" && $StopHarvest == 0 ) {
    foreach ($bot->fobjects as $obj) {
    if (($obj["className"] == "Factory") && ($obj["state"] != "plowed")){
    if ($data->InstantGrow == "1" || ($obj["state"] == "grown") ){
    //$bot->SendMsg('harvest crops success.' .$obj["id"]);
    $obj["state"] = "grown";
    $bot->harvestFactory($obj); $bot->streakBonus2();
    $reload = 1;
    if (isset($bot->error_msg)) { $bot->ReloadConfig(); break; }
    }
    }
    }
    }
    if($reload ==1){ $bot->ReloadConfig(); }
    //==========================================================================
    //Sending Task to Factory
    //==========================================================================
    if ($data->placeContract == "1" && $StopHarvest == 0)
    {
    if (isset($data->factorylist))
    {
    $tmp = explode("|", $data->factorylist);
    print_r($data->factorylist);
    print_r($tmp);
    $item = $tmp[0];       
    foreach ($bot->fobjects as $obj)
    {
    if (($obj["className"] == "Factory") && ($obj["state"] == "plowed"))
    {
    $bot->SendMsg('Sending Task to Factory');
    $bot->startFactoryContract($obj, $item);
    if (isset($bot->error_msg))
    {
    $bot->ReloadConfig();
    break;
    }
    }
    }
    }
    }
    if($reload ==1){ $bot->ReloadConfig(); }*/
    //==========================================================================
    if (isset($data->Run))
    {
        $Run = $data->Run;
    } else
    {
        $bot->SendMsg('Factory is not activated #1.');
        return;
    }
    if (!isset($data->Run))
    {
        $bot->SendMsg('Factory is not activated #2.');
        return;
    }
    if (!$data->Run)
    {
        $bot->SendMsg('Factory is not activated #3');
        return;
    }
    if (isset($data->RunTime))
    {
        $RunTime = $data->RunTime;
    } else
    {
        $RunTime = 90;
    }

    if (isset($data->Debug))
    {
        $Debug = false;
    } else
    {
        $Debug = true;
    }
    if ($data->Debug)
    {
        $Debug = false;
    } else
    {
        $Debug = true;
    }
    if (count($data->harvestsfactory) == 0)
    {
        $bot->SendMsg('Factory not harvesting.');
        return;
    }
    $now = time();
    $stop = $now + $RunTime;
    $bot->CheckDoober = true;
if ($StopHarvest == "0")
{
    foreach ($bot->fobjects as $objd)
    {
if (($objd["className"] == "Factory"))
        {
            $bot->SendMsg('Factory: Siap Jalan Komandan.');
            $bot->SendMsg('Factory: Running for: ' . $RunTime . ' sec');
            $bot->dooberItem = array();
            $bot->dooberItems = 0;
			break;
		}    
    }
}


if ($StopHarvest == "0")
{
    foreach ($bot->fobjects as $objx)
    {
if (($objd["className"] != "Factory"))
        {
  $bot->SendMsg('Factory: You did not have any factory sire.');
				$StopHarvest = 1;
                $stop = $now;
                break;
		}     
    }
}
    //==========================================================================

    //==========================================================================
    //								Harvesting Factory
    //==========================================================================
    while ($now < $stop && $StopHarvest == 0)
    {
        $reload = 0;

        if (($FactoryMaxGood * 0.9) <= $bot->PremiumMax)
        {
            if ($NoHarvestIfFull == 1)
            {
                $StopHarvest = 1;
                $bot->SendMsg('Premium Goods storage > 90% Full. Not Harvesting.' . $bot->PremiumMax . "/" . $FactoryMaxGood);
            }
        }

        if ($data->harvestsfactory == "1" && $StopHarvest == 0)
        {
            foreach ($bot->fobjects as $obj)
            {
                if (($obj["className"] == "Factory") && ($obj["state"] != "plowed"))
                {
                    if ($data->InstantGrow == "1" || ($obj["state"] == "grown"))
                    {
                        $obj["state"] = "grown";
                        $bot->harvestFactory($obj);
                        $bot->streakBonus2();
                        $reload++;
                        if (isset($bot->error_msg))
                        {
                            $bot->ReloadConfig();
                            $stop = $now;
                            break;
                        }
                    }
                }
            }
        }
        if ($reload == 1)
        {
            $bot->ReloadConfig();
        }
        //==========================================================================
        //								Sending Contract
        //==========================================================================
        if ($data->placeContract == "1" && $StopHarvest == 0)
        {
            if (isset($data->factorylist))
            {
                $tmp = explode("|", $data->factorylist);
                //	          print_r($data->factorylist);
                //			  print_r($tmp);
                $item = $tmp[0];
                foreach ($bot->fobjects as $obj)
                {
                    if (($obj["className"] == "Factory") && ($obj["state"] == "plowed"))
                    {
                        $bot->SendMsg('Sending Contract to Factory');
                        $bot->startFactoryContract($obj, $item);
                        if (isset($bot->error_msg))
                        {
                            $bot->ReloadConfig();
                            $stop = $now;
                            break;
                        }
                    }
                }
            }
        }
        $bot->ReloadConfig();
        $now = time();
    }
    // end
    if ($StopHarvest == 0)
    {
        $bot->CheckDoober = false;
        // show stats.
        $bot->SendMsg('Factory: was running for ' . $RunTime . ' sec.');
        $bot->SendMsg('Factory: Selesai Komandan.');
        $bot->pm->RefreshMePlugin("Factory");
    }
}
?>