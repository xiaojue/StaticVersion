# StaticVersion
Auto static file version or manual manage the version with PHP.

```php
//test/localTest.php
$myStatic = new localStaticVersion("ver.json",dirname(__FILE__));
$myStatic->autoVersion("static/b.js");
//static/b.js?v=cb8df6261770256c7f9c73608645898b
```

```php
//test/remoteTest.php
$myStatic = new remoteStaticVersion("ver.json","http://cdn.rawgit.com/xiaojue/StaticVersion/master/test/");
$myStatic->autoVersion("static/b.js");
//http://cdn.rawgit.com/xiaojue/StaticVersion/master/test/static/b.js?v=cb8df6261770256c7f9c73608645898b
```
