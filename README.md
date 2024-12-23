# Inspector Example

```php
use HEXagonTool\Inspector\Inspector;

Inspector::init(['templates_path' => __DIR__ . '/templates_test']);
Inspector::message('Что бы увидеть информацию запустите инспертор Inspector::start()');

Inspector::start();
Inspector::message("<div style='background-color: green; padding: 10px; margin-bottom: 10px'><h1>Hello, Inspector!</h1></div>");
Inspector::dump(Inspector::$config, 'Inspector::$config');

Inspector::stop();
Inspector::message('Это сообщение не будет видно т.к. инспектор не активен');
