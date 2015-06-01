<?php
$md5Data = new stdClass();
function listMd5($dir){
  if(is_dir($dir)){
    if($dh = opendir($dir)){
      while(($file = readdir($dh)) !== false){
        if((is_dir($dir."/".$file)) && $file != "." && $file !=".." ){
           listMd5($dir."/".$file."/");
        }else{
          if($file != "." && $file != ".." && (pathinfo($file, PATHINFO_EXTENSION) === 'js' || pathinfo($file,PATHINFO_EXTENSION) === 'css')){
            $filename = $dir."/".$file;
            global $md5Data;
            $md5Data->$filename = md5_file($filename); 
          } 
        } 
      }  
      closedir($dh);
    } 
  }
}

listMd5('static');
$file = fopen("ver.json","w");
fwrite($file,json_encode($md5Data));
fclose($file);
?>
