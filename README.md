## What?

It's a easy external for [xhgui](https://github.com/perftools/xhgui).

## How?

```sh
wget https://raw.github.com/thbourlove/xhgui-external/master/External.php
```

example
```php
<?php
require "External.php";
$mongo = new MongoClient();
$xhprof = new \Thb\Xhgui\External($mongo->xhprof);
$xhprof->start();
print 1;
$xhprof->save();
```

### With Composer
```json
"require-dev": {
    "thbourlove/xhgui-external": "dev-master"
}
```

example
```php
<?php
require "vendor/autoload.php";
$mongo = new MongoClient();
$xhprof = new \Thb\Xhgui\External($mongo->xhprof);
$xhprof->start();
print 1;
$xhprof->save();
```
