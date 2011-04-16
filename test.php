<?php
        define('AMFPHP_BASE', 'amfphp/core/');
        require_once(AMFPHP_BASE . "shared/util/CharsetHandler.php");
        require_once(AMFPHP_BASE . "amf/util/AMFObject.php");
        require_once(AMFPHP_BASE . "shared/util/CompatPhp5.php");
        require_once(AMFPHP_BASE . "shared/util/MessageBody.php");
        require_once(AMFPHP_BASE . "shared/app/Constants.php");
        require_once(AMFPHP_BASE . "shared/app/Globals.php");
        require_once(AMFPHP_BASE . "amf/io/AMFDeserializer.php");
        require_once(AMFPHP_BASE . "amf/io/AMFSerializer.php");
    try {
            $f = fopen('tmp_dir\neighbor.amf', 'r');
            $size = filesize('tmp_dir\neighbor.amf');
            $amf = new AMFObject(fread($f, $size));
            fclose($f);
        } catch (Exception $e) {
            $this->SendMsg($e->getMessage());
            exit;
        }

        $deserializer = new AMFDeserializer($amf->rawData);
        $deserializer->deserialize($amf);

        $bod = new MessageBody();
        $bod = $amf->_bodys[0];
        print_r($bod);

//$x="eNrNnUtv48gVRvf5FUZWCQLEvl9VsUjE6U2SXQIMMLM31LamWxhbMiQZk/n3sex++CGJo9L5HO8kmiYvi7y3DoslnvObye2HP5ycnM8nN9PTh0+Tu/XnxfLDejmdrO6W0/PTLws2f7uari6Xs9v1bDF/XPlycb36kM7OTx8+bJYsF78+Lnn4sFlyPflturxfdn765dNm4c3iavrhpy/7OPnX1Wy9WJ6fPizd/Pl2cj1drx8+33+bztfL306W05+ny+n8cvr3P5798fEvXwL/8ON0cn768Onr4tnN5NP0H5vNraaTi4+T1fSvt/NP56fflz9u+vRh27v2Ey/2czW9XFxcLS5/2bm3b2u07E7bdvdxMVnv391mjZbdpW27u2+u5X34N9Or2d3N/v0+W7UlgPzyNN5fZ9Od+/zLn1abv19M/7u++HWzu799+X71aXoxf7Vk9XTJ1wvgz4eGWNpC3BkAH2FnjfBiQsRYTTHeXwmrVzG3hdg3hTibry+muwPc8fXg4IYXwf1wPZnNV3uiu31Y4UmqfF3wJFeeLlo9W7SJ8+KyKdJ4WZpXn5d3Hy8Wy8vPs6vdNfrJSk11OprO3vfj9J6+UOv5235unp2+bznw7H8aA03N7fgGrfiyu1itJ8v1xfXicrIBkt0X17PVmi6v0n55fRwrsVOogEXnLxJfkuVpmfjYFmzdWibu/z4fKRKbVZrOIVfg953T9qt7MNaI3ascHKd2FfjJ/NP037Pr30aL/NcVmwg5Glvp+3nc0UYPJ3bCNNHLcv/P2XJ98sNk/XlPnFf369zer/IkHZ8tmr9etHq9qDHg1NiqWxvxckdv9GJRI2AoG7oothKruFhya+U5PL6OTKLXfQKTRBW8Jj0R9raseV2MNk3/a1uYAxTmIxZMx7K7uQqlMz98tjdjCiK6p224s/S0t6CYAZVv3c3zoYDL7QdyeJgJI9Vvke4mnaMizVthZzJff75bzu5u/rN/lGzr2k0jdUyPsvm+MrBrwjqU7xHS1TrV9nu4l2NgWwfFjm5EtDv56GnE4W3GBx4b+ODw8tkbMUN7N5KD7Y2fn2i0P87y9Hi7Vzg8xK2PMNazX2Y/TJaT1eJ6/wOMJys2Pb7I7cPa830dLtlC5Zhhhfn+3nYPIR4e6Ms+ZL2cTi9uJ9e7u9dvazSdvEpc3a4eNVOdga9DzYOp2OJDBgW7sXiNwNigQQmqmLxaQl2URWAteVxkGjwob/Qco/WCzKbU2WT7nGnBYmjB7+EdeyV2W2dK3C1++3R3PdLpf12rpdMo1dybPh/0OaY/LdYeZHveHh7k2/chbXMszt6eohprS/eyH/npbvnznkDX939+MrDy7ev8+dfV86+NzSjXNckVvi69UeFrfHLa5eOeE+7vcdHZBB05eeo5eoETf7rONz7+6rI8pqJ3lTzzr1KIPfX9MTT76lybbo67wVjW0XNfz7jZATuf42DD5pV8VvLsYnhZSI+KUnxP+aQdvy9ojS9B5fPlIAVZPWvmLszfXZIa0aiWlhO+55TCeFQ7dgjAOFpRKz4UYMT3+rI3+jRZTx9Gfy9ul/ebWu6etPRqzZbbxjrYxnawW+r+zHpGtwJ6Yx73cUxh3PfwDpyW34uE34lr1nui7yZeTP8iobLPriF7Zl5VX95y0L7x/rHfOnT262Jx9dN9lfvxZnJ9/ePibs9UxR3rt9TFvv4f5h22tVp/XHV8Ma7nHQLqBxd+k5OVhmMe1m852fPfcQX8rmDPT5/8+vB8PbuenlxufnJ4svz+w8PHHzU+/0niyerzdLp++DSb/7z45/R2/Xnz7fGXkqebDW3ZYuBbFL7FhG8x41ss+BY7fIsV32KPb3Hgr3BD0vBZE3zaBJ83wSdO8JkTfOoEnzvBJ0/w2SM+e2Toc/jsEZ894rNHfPaIzx7x2SM+e0RmT+C8FjivBc5rgfNa4LwWOK8FzmuB81rgvBY4rwXPa8HzWvC8FjyvBc9rwfNa8LwWPK8Fz2vB81rwvBY8rwXPa8HzWvC8FjyvBc9rwfNa8LwWPK8J5zXhvCac14TzmnBeE85rwnlNOK8J5zXhvCae18TzmnheE89r4nlNPK+J5zXxvCae18TzmnheE89r4nlNPK+J5zXxvCae18TzmnheE89rCee1hPNawnkt4byWcF5LOK8lnNcSzmsJ57WE81rieS3xvJZ4Xks8ryWe1xLPa4nntcTzWuJ5LfG8lnheSzyvJZ7XEs9riee1xPNa4nkt8byWeF5LPK9lnNcyzmsZ57WM81rGeS3jvJZxXss4r2Wc1zLOa5nntczzWuZ5LfO8lnleyzyvZZ7XMs9rmee1zPNa5nkt87yWeV7LPK9lntcyz2uZ57XM81rmeS3zvFZwXis4rxWc1wrOawXntYLzWsF5reC8VnBeKzivFZ7XCs9rhee1wvNa4Xmt8LxWeF4rPK8VntcKz2uF57XC81rhea3wvFZ4Xis8rxWe1wrPa4XntcLzWofzWofzWofzWofzWofzWofzWofzWofzWofzWofzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsfzWsV5reK8VnFeqzivVZzXKs5rFee1ivNaxXmt4rxWeV6rPK9Vntcqz2uV57XK81rlea3yvFZ5Xqs8r1We1yrPa5XntcrzWuV5rfK8VnleqzyvVZ7XKs9rPc5rPc5rPc5rPc5rPc5rPc5rPc5rPc5rPc5rPc5rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rPc9rA85rA85rA85rA85rA85rA85rA85rA85rA85rA85rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rA89rg+F9ubzgIHjDQfCKg+AdB8FLDoK3HASvOQjecxC86CB400EYVAdhcB2EQXYQBttBHKs72PYv8e1f4sAwChmGmsMwpGoYcjUMyRqGbJUhW+Xo7QzZKkO2ytDhydDjyZBHMuSRDHnEMqNBsmCwLBg0CwbPgkG0YDAtGFQLBteCQbZgsC04dAvH+ha2/Us6HFgcjgaHpGHU0pDHm2tx+cvJ7Grrohjd8+7kLOY9787hzrzn3alezXs2VIQwlAQZSoIcXaohv2XIbxl6VRm6VRn6VRk6VhnyiAVT3iYRvE4ieJ9E8EKJ4I0SwSslgndKBC+VCN4qEbxWIgxeiTCIJcJglohRtYSNCEcNFP3h6D7s+JfYM0p6th/3jz7A3Wkf0TCoq/FDPCrc3SUlUkO42dy6u8tVFPOVayhrYahrMtQ1ObjAUNdkIAMZ0EAGNpABDmSgAxnyiKVr3v0RvPwjePtH8PqP4P0fwQtAgjeABK8ACd4BErwEJAwWkDBoQGLUA5Ib8KdrANLqQqZRLUk0IHc0MLfOzIeYUeZWNBziLk4XdIgF5XQl121FIm4rjtr17pqrbN61oTaHoTjLUJzlgBsD3ciANzLwjQyAIwPhyIA4MuQRe4vA62aC980EL5wJ3jgTvHImeOdM8NKZ4K0zwWtngvfOhEE8E6PmmWwZXm7DhVGnjUoD03XmcBOLoNUcLnxT0JvDhQF/eE93oqPeoXTmIvNRP1EK864N1TgM5ViGciwHzhh4RgagkYFoZEAaGZhGBqiRIY/YmwLeaRS81Ch4q1HwWqPgvUbBi42CNxsFrzYK3m0UvNwoRu1GSQ1zu9PhGJRscxhGbUupAfuTDftHTU6pNoTbm8PdXYbScHi4+cwcbj6KiV+FG+Zwd5fPLBdHj1qwUsP9XE7mLDeU8DDU8DAUcRkYSA4IMlCQDBgkAwfJAEIykJAMeSRDHrG3ErxuK3jfVvDCreCNW8Ert4J3bgUv3QreuhW8dit471YYxFsxat7KDQ8Ycjn89iR3LnAZNYHlBt7P/XsaiO4cTzKy7TnRqPWs2MbNDXa0MOjRwuBHC4MgLQyGtDAo0sLgSAuDJC0MlrQwaNLC4EkLgygtDKa0MKjSwuBKC16WFrwtLXhdWvC+tOCFacEb04JXpgXvTAtemha8NS0M2rQweNNiVJxWGoYRi97TdPhRkVtpwNuSXXg7Kokr5T39YnZUQGd7v4vBUxfHiuq2nq/u8HcpGex2YdDbhcFvFwbBXRgMd2FQ3IXBcRcGyV0YLHdh0NyFwXMXBtFd8Ka74FV3wbvugpfdBW+7C153F7zvLnjhXfDGu+CVd2Fw3oVBehej1ruW4fJS39Nw+aiFr2W4vNimx4wa/lqGvstgDrf8H37MabAMhkEzGAbPYBhEg2EwDYZBNRgG12AYZINhsA2GQTcYBt9gGISDYTAOhkE5GLxzMHjpYPDWweC1g8F7B4MXDwZvHgxePRi8ezB4+WAY7INh0A+GwT8YowLCFhrvzg6n8S7GX5PydgQ/KlFsIfjONv48KmjsGgi+y+Zwu7d/BfyoI7Jz79pQDMNQDWWohnLQhKEaysATMgCFDEQhA1LIwBQy5BHK5OK1kuK1kuK1kuK1kuK1kuK1kuK1kuK1kuK1kuK1kjJoJWXQSsqglZRBK6lRreRbTVK3vWVdZ8TvEF/xYPeOZvFoVIfZdFviet2ORk2bxUXbGhVyVvOeDdVQhmooB00YqqEM1VAGoJCBKGRAChmYQgaoYJmc13aK13aK13aK13aK13aK13aK13aK13aK13aK13bKoO1UGJjc4OCUwcGpOFL1vmebhhza581seFt8955eQ6hRQWfLvUM9e0eTkjRqAq3xNodYdfiTHtublzQqM60Nj05qbmiWYvIEyOBWlcGtKoNbVQa3qgxuVRncqjK4VWVwq8rgVpXBrSrerSrerSrerSrerSrerSrerSrerSrerSrerSrerSqDW1UGt6oMblXJcPcgw92DDHcP4udMS/ycaRlcnhp1edauAS4bfutQ+xZ+/rSczNdjdGlwi8rgFpXBLSqDW1QGt6gMblEZ3KIyuEVlcIvK4BYV7xYV7xYV7xYV7xYV7xYV7xYV7xYV7xYV7xYV7xaVwS0qg1tUyUCXyUCXyUCXyUCXyUCXyUCXBg2kRjWQteG15v0BrzWP0X5idz728f4Ms+PHs7sW9A0PCPpEtrWhpshQU2SoKTLUFBlqigw1RYaawpItr8QUr8QUr8QUr8QUr8QUr8QUr8QUr8QUr8QUr8SUQYmpbCDbbCDbbCDbbCDbbCDbbCDbbCBbg8tQoy7DN5utXhF6HPUo9g3H0zccT9+RxxNHvYLlVWwVoWGDC1IGF6QMLkgZXJAyuCBlcEHK4IKUwQUp3gUp3gUp3gUp3gUp3gUp3gUp3gUp3gUp3gUp3gWpYqDhYqDhYqDhYqDhYqDhYqDhYqBhg45PBh2fDDo+jer4Wgi77xGCG9X69Q3j2sMZGZshr2XIaxnyWoa8liGvZchrGfKapUteDyheDyheDyheDyheDyheDyheDyheDyheDyheDyiDHlCdgS47A112BrrsDHRp0M/JoJ+TQT8ng35OBv2cDPo5GfRzMujnZNDPyaCfk0E/J4N+Tgb9nAz6ORn0c+L1c+L1c+L1c+L1c+L1c+L1c+L1c+L1c+L1c+L1czLo52TQz6kaaK4aaK4aaK4aaM7gRFM10JzBbyaD30wGv5kMfjMZ/GYy+M1k8JvJ4DeTwW8mg99MBr+ZDH4z8X4z8X4z8X4z8X4z8X4z8X4z8X4z8X4z8X4z8X4zGfxmMvjN1BtorjfQXG+gud5AcwbnlgzOLRmcWzI4t2Rwbsng3JLBuSWDc0sG55YMzi0ZnFsyOLdkcG7J4NwS79wS79wS79wS79wS79wS79wS79wS79wS79wS79ySwbklg3NLBueWBgPNDQaaGww0NxhobjDQnMHWJIOtSQZbkwy2JhlsTTLYmmSwNclga5LB1iSDrUkGW5NAW9Pqcjm7Xd8vPT+9mdx++B/0hRs/";
//$k=gzuncompress(base64_decode($x));
//print_r($k);
//exit;
//$xml = simplexml_load_string($k);
//foreach ($xml->tile as $t){
//    foreach ($t->layer as $l){
//        if (((string)$l["reference"]=="0") || ((string)$l["reference"]=="2")  || ((string)$l["reference"]=="3"))            break;
//
//        unset($tmp);
//        $tmp["x"]=(string)$t["c"];
//        $tmp["y"]=(string)$t["r"];
//        $arr[]=$tmp;
//        break;
//    }
//}
//echo count($arr) . "\n";
//print_r($arr);
//$fn = 'tmp_dir\flashLocaleXml.xml';
//$fl = fopen($fn, 'r');
//$s = fread($fl, filesize($fn));
//fclose($fl);
//$s = str_replace("&aring;&iquest;&laquo;&auml;&frac34;&egrave;&copy;&brvbar;&ccedil;&copy;&aring;&uml;&ccedil;&aelig;&aring;&curren;&sect;&aelig;&aelig;&pound;&ccedil;&aring;&frac34;&middot;&aring;&middot;&aelig;&sup2;&aring;&eacute;&aelig;&sup2; - &aelig;&aelig;&deg;&auml;&cedil;&shy;&aelig;&ccedil;&ccedil;&frac34;&aring;&middot;&sup3;&ccedil;&raquo;&aring;&nbsp;&acute;&atilde;", '', $s);
//$s = str_replace("&aring;&frac34;&middot;&aring;&middot;&aelig;&sup2;&aring;&auml;&cedil;&shy;&aelig;&ccedil;&eacute;&auml;&ordm;&reg;&ccedil;&raquo;&aring;&nbsp;&acute;&aring;&brvbar;&iuml;&frac14;", '', $s);
//$xml = simplexml_load_string($s);
//
//foreach ($xml->bundle as $bundle) {
//    $bname = (string) $bundle['name'];
//    foreach ($bundle->bundleLine as $item) {
//        $key = (string) $item['key'];
//        if (strpos($key, '_friendlyName') !== false) {
//            $key = substr($key, 0, strpos($key, '_friendlyName'));
//        }
//        $arr[$bname][$key]['name'] = $key;
//        $arr[$bname][$key]['fname'] = (string) $item->value;
//    }
//}
//$fn="c:\xxx.txt";
//$fl=fopen($fn, 'r');
//$data=fread($fl, filesize($fn));
//fclose($fl);
//print_r(unserialize($data));
//$d[1]=1;
//$d["xxx"]=2;
//$k=serialize($d);
//print_r($k);
//$l=unserialize($k);
//print_r($l);
//$arr["test"][]=1;
//$arr["test"][]=2;
//$arr["test"]["xx"]=4;
//echo count($arr["test"]) . "\n";
//echo count($arr["test"]["xx"]);
//include('codebase-php/GetSettingsFromXml.php');
//$xmlsOb= new xmlsOb();
//echo $xmlsOb->GetStreak(11);
//
//$name="Gunter's Homestead";
//echo $name . "\n";
//$name=strrev($name);
//$name=substr($name, strpos($name, "'")+1, strlen($name));
//$name=strrev($name);
//echo $name . "\n";
//function getmicrotime()
//{
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
//list($usec, $sec) = explode(" ", microtime());
//echo (string)$sec . substr((string)$usec, 2, 3);
//$tmp=explode('.', microtime(1)) ;
//echo microtime(1) . "\n";
//sleep(10);
//echo microtime(1);
//$x=json_decode('{"q":"123", "w":"dddd"}');
//print_r($x->q . "\n");
//$x->q='ffffffff';
//print_r($x->q . "\n");
//print_r(json_encode($x));
//$xml = simplexml_load_file('tmp_dir\gameSettings.xmlgz');
//foreach ($xml->levels->children() as $level){
//    if ($level['num']==10)
//    echo (string)$level['streakScaleFactor'] . "\n";
//}
//echo $xml->levels->children()[10]['streakScaleFactor'];
//$crop['pumpkin']['time']=60;
//$crop['potatoes']['time']=240;
//$maxE=15;
//1) если энергия вся прям ща
//2) если других кропс нету
//ждать пока энергия будет вся
//если другие есть, то ждать пока они созреют, собрать весь урожай
//
//if ($crop['potatoes']['time']>60){
//    $mc=$maxE+$crop['potatoes']['time']/60*11;
//}
//else{
//    $mc=$maxE+$crop['potatoes']['time']/5;
//}
//$xml = simplexml_load_file('tmp_dir\gameSettings.xmlgz');
//foreach ($xml->items->item as $item) {
//    if (($item['name'] == 'peachfront') && ($item['className'] == 'FrontierTree')){
//        foreach ($item->states->children() as $state) {
//          echo $state["name"] . "\n";
//        }
//        //print_r($item);
//    }
////}
//include('codebase-php/xml.php');
//$fl=fopen('tmp_dir\gameSettings.xmlgz', 'r');
////$xml = simplexml_load_file('tmp_dir\test.xml');
//$xml=fread($fl, filesize('tmp_dir\gameSettings.xmlgz'));
//fclose($fl);
//$data = XML_unserialize($xml);
//print_r($data);
//            include 'codebase-php/GetSettingsFromXml.php';
//            $xmlsOb=new xmlsOb();
//            $xmlsOb->GenerateFnames();
//print_r($xmlsOb->GetFname("clover"));
//print_r($xmlsOb->GetName("Clover"));
//print_r($xmlsOb->fnames);
//print_r($xmlsOb->fnames["clover"]["fname"]);
//$t=$xmlsOb->GetItemObject('cherryfront');
//print_r($xmlsOb->GetTreeGrowTime('cherryfront', 'large'));
//            //print_r($xmlsOb->gsXML);
//function test(){
//    return;
//    echo "2" . "\n";
//}
//echo "1" . "\n";
////test();
//include('codebase-php\Utils.php');
//var_dump(GetPost());
?>