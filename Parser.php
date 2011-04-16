<?php
include('Plugins\PluginsManager\PM_class.php');
include('codebase-php\LocalDataClass.php');
include('codebase-php\BotClass.php');
include('codebase-php\bot_api.php');
include('codebase-php\Utils.php');
include('codebase-php\GetSettingsFromXml.php');
set_include_path(get_include_path() . PATH_SEPARATOR . "codebase-php");
include('Zend\config.php');
include('Zend\Config\Writer\Xml.php');

AutoStart($argv);
// ------------------------------------------------------------------------------
$bot = new Bot();
$bot->Init();   // first phase of the init. no UID know yet 2011-02-17 Z update.
$bot->ReloadConfig();
$bot->Init2();  // second phase of init : now we have the UID of the user
$bot->UpdateXML();
$bot->UserInfo();
//            foreach ($bot->fobjects as $obj) {
//                //echo "try \n";
//                if ($obj["className"] == "Business") {
//                   print_r($obj);
//                }
//            }
//echo "PC=".$bot->xmlsOb->GetBuildingsProductCount("bus_bakery");
//exit;
$bot->IncludeAllHooks();
$bot->DoWork();
$bot->ld->Disconnect();
$bot->pm->OpenTabForPlugin('PluginsManager');
$bot->pm->OpenTabForAllPlugins();
$bot->pm->RefreshMePlugin("GameInfo");
$bot->ShowReportMsgInTray();
?>