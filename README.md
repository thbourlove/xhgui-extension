## What?

It's an extension for [xhgui](https://github.com/perftools/xhgui).

## How?

```sh
wget https://raw.github.com/thbourlove/xhgui-extension/master/Extension.php
```

example
```php
<?php
require "Extension.php";
$mongo = new MongoClient();
$xhprof = new \Thb\Xhgui\Extension($mongo->xhprof);
$xhprof->start();
print 1;
$xhprof->save('print');
```

### With Composer
```json
"require-dev": {
    "thbourlove/xhgui-extension": "dev-master"
}
```

example
```php
<?php
require "vendor/autoload.php";
$mongo = new MongoClient();
$xhprof = new \Thb\Xhgui\Extension($mongo->xhprof);
$xhprof->start();
print 1;
$xhprof->save('print');
```
