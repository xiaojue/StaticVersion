<?php
/**
 * @author xiaojue[designsor@gmail.com]
 * @date 20150611
 * @fileoverview static file content version manage class
 */
class staticVersion {

  public $verData,$verHashFile,$path;

  function __construct($verHashFile,$path){
    $this->path = $path;
    $this->verHashFile = $verHashFile;
    $content = $this->getContent();
    $json = json_decode($content);
    $this->verData = is_null($json) ? new stdClass() : $json;
  }

  function autoVersion($filename){
    echo $this->getUrl($filename);
  }

  function getUrl($filename){
    $version = $this->getVersion($filename);
    $output;
    if(is_null($version)){
      $output = $filename;
    }else{
      $output = $filename."?v=".$version;
    }
    return $output;
  }

  function getVersion($filename){
    if($this->verData->$filename){
      return $this->verData->$filename; 
    }
    return NULL;
  }

}

class remoteStaticVersion extends staticVersion {

  private $timeout = 10;

  function remote_file_exists($url){
    $curl = curl_init($url);
    $result = curl_exec($curl);
    $found = false;
    if ($result !== false) {
      $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
      if ($statusCode == 200) {
        $found = true;
      }
    }
    curl_close($curl);
    return $found;
  }

  function getContent(){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $this->verHashFile);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
    $result = curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
    curl_close($curl);
    if($statusCode == 200) return $result;
    else return "";
  }

  function autoVersion($filename){
    $output = $this->getUrl($filename);
    $output += $this->path.$output;
    echo $output;
  }

}

class localStaticVersion extends staticVersion {
  function getContent(){
    if(file_exists($this->verHashFile)) return file_get_contents($this->verHashFile);
    else return "";
  }
}

?>
