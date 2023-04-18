<?php
    function copyImageToServer($src, $des)
    {
        $size = filesize($src);
        $extension = getNameExtension($src);
        $filename = date("ymd").'_'.date("smh").$extension;

        if(strcmp($extension,".jpg") != 0 && 
            strcmp($extension,".jpeg") != 0 &&
            strcmp($extension,".png") != 0){
                return false;
        }
        $myfileRead = fopen($src, "r") or die("Unable to open file!");
        $myfileWrite = fopen($des.$filename, "w") or die("Unable to open file!");
        fwrite($myfileWrite,fread($myfileRead,$size));
        return $filename;
    }

    function getNameExtension($src){
        $i = 0;
        for ($i = 0;$i < strlen($src);$i++){
            if(strcmp($src[$i],".") == 0){
               break;
            }
        }
        return substr($src,$i,strlen($src)-$i);
    }
?>