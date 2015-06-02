# StaticVersion
Auto static file version or manual manage the version with PHP.

```php
//test/localTest.php
$myStatic = new localStaticVersion("ver.json",dirname(__FILE__));
$myStatic->autoVersion("static/b.js");
```

```php
//test/remoteTest.php
$myStatic = new remoteStaticVersion("ver.json","http://cdn.rawgit.com/xiaojue/StaticVersion/master/test/");
$myStatic->autoVersion("static/b.js");
```
