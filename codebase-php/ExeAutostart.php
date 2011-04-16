<?php
include 'bot_api.php';
include('Plugins/PluginsManager/PM_class.php');
include('codebase-php\Utils.php');

AutoStart($argv);

$pm = new PluginManager();
$pm->GetConfiguration();
$pm->OpenTabForPlugin('Settings');
$pm->OpenTabForPlugin('wikia');
function GetParamByName($name)
{
    $fl = file('options.txt');
    foreach ($fl as $line)
    {
        if (strpos($line, $name) !== false)
        {
            $pos = strpos($line, '=');
            $val = trim(substr($line, $pos + 1, strlen($line)));
        }
    }
    return $val;
}

function Autostartbot()
{
    $DoStartAuto = GetParamByName("autostarz");
    if ($DoStartAuto == 1)
    {
        echo "Auto Run is Active. \n";
        SendApi('BotApi.RUNNOW');
    } else
    {
		echo "Auto Run is Deactivate. \n";
    }
}


Autostartbot();
?>