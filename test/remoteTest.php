<?php
include_once("../StaticVersion.php");
$myStatic = new remoteStaticVersion("ver.json","http://cdn.rawgit.com/xiaojue/StaticVersion/master/test/");
$myStatic->autoVersion("static/b.js");
?>
