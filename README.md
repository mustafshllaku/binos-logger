
# Binos Logger

Binos Logger is a logging component that provides a way of logging events.
#### Available log levels:

  - [x] ALERT
  - [x] ERROR
  - [x] INFO
  - [x] NOTICE
  - [x] DEBUG

#### Available log writers:

  - [x] File

#### Available file formats:

  - [x] JSON
  - [x] LOG

# Install
Install using Composer
```sh
$ composer require binos/logger
```

# Usage
Setting up a log file is pretty simple.
```php
use Binos\Logger\Log;
use Binos\Logger\Writer\File;

$file = dirname(__DIR__).'/logs/application.log';

$logger = new Log(new File($file));
$logger->alert('Something serious happened!');
```