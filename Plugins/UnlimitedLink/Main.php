<?php
include('codebase-php\bot_api.php');
include('codebase-php\Utils.php');
include('codebase-php\LocalDataClass.php');
include('codebase-php\GetSettingsFromXml.php');

AutoStart($argv);

include('Plugins/UnlimitedLink/ULink_class.php');
$ulink = new UnlimitedLinkPlugin();
if (isset($getP['action'])) {
    if ($getP['action'] == 'refresh') {
        $ulink->ld->userId=$CurrentUserId;
        $ulink->ld->EasyConnect();
        $ulink->GetForm();
    }
    if ($getP['action'] == 'save') {
        $ulink->ld->userId=$CurrentUserId;
          $ulink->ld->EasyConnect();
        $ulink->ld->SavePlSettings('UnlimitedLink', $postdata);
    }
  }
?>