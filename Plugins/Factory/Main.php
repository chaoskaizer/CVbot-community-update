<?php
include('codebase-php\bot_api.php');
include('codebase-php\Utils.php');
include('codebase-php\LocalDataClass.php');
include('codebase-php\GetSettingsFromXml.php');

AutoStart($argv);

include('Plugins/Factory/Factory_class.php');
$factory = new FactoryPlugin();
if (isset($getP['action'])) {
    if ($getP['action'] == 'refresh') {
        $factory->ld->userId=$CurrentUserId;
        $factory->ld->EasyConnect();
        $factory->GetForm();
    }
    if ($getP['action'] == 'save') {
        $factory->ld->userId=$CurrentUserId;
          $factory->ld->EasyConnect();
        $factory->ld->SavePlSettings('Factory', $postdata);
    }
  }
?>