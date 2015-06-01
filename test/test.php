<?php
include_once("../StaticVersion.php");
$myStatic = new staticVersion("ver.json",dirname(__FILE__),0);
$myStatic->autoVersion("static/b.js");
?>
