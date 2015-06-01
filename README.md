# StaticVersion
Auto static file version or manual manage the version with PHP.

```php
//test/test.php
include_once("../StaticVersion.php");
$myStatic = new staticVersion("ver.json",dirname(__FILE__),0);
$myStatic->autoVersion("static/b.js"); //static/b.js?v=cb8df6261770256c7f9c73608645898b
```

```php
//remote hash version
$myStatic = new staticVersion("ver.json","http://static.xx.cdn/test/",1);
$myStatic->autoVersion("static/b.js");
```
