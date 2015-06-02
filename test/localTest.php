<?php
include_once("../StaticVersion.php");
$myStatic = new localStaticVersion("ver.json",dirname(__FILE__));
$myStatic->autoVersion("static/b.js");
?>
