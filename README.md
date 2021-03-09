# Install
```bash
composer require bermudaphp/registry
````

# Set
```php
Registry::set('message', 'Hello World');

Registry::getInstance()->offsetSet('message', 'Hello World!');
Registry::getInstance()['message'] = 'Hello, Jane!';

````

# Get
```php
Registry::get('MessaGe', 'default value'); // default value

Registry::getInstance()->offsetGet('message'); // Hello, Jane!
Registry::getInstance()['message']; // Hello, Jane!;

````

# Exists
```php
Registry::has('appVersion'); // false

Registry::getInstance()->offsetExists('message'); // true
isset(Registry::getInstance()['message']); // true;

````

# Unset
```php
Registry::remove('message');

Registry::getInstance()->offsetUnset('message'); 
unset(Registry::getInstance()['message']);

````
