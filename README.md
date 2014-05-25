urodoz/truncateHTML
============

> PHP library to handle truncate action on HTML strings


Features
--------

- Truncates an HTML string keeping consistency on open/close tags
- No external dependencies.
- PSR-4 compatible.
- Compatible with PHP >= 5.3.3 and
- Integrations for [Symfony2](http://symfony.com) and [Twig](http://twig.sensiolabs.org).


Installation
------------

You can install urodoz/truncateHTML through [Composer](https://getcomposer.org):

```shell
$ composer require urodoz/truncate-html:@stable
```

Usage
-----

Truncate an HTML string:

```php
use Urodoz\Truncate\TruncateService;

$truncateService = new TruncateService();
echo $truncateService->truncate($htmlString, 100); //Truncating to 100 characters
```

Integrations
------------

### Symfony2

TruncateHTML contains a Symfony2 bundle and service definition that allow you to use it as a service in your Symfony2 application.
The code resides in the `Urodoz\Truncate\Bridge\Symfony` namespace and you only need to add the bundle class to your `AppKernel.php`:

```php
# app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Urodoz\Truncate\Bridge\Symfony\UrodozTruncateBundle(),
        );
        // ...
    }

    // ...
}
```

You can now use the `urodoz_truncate` service everywhere in your application, for example, in your controller:

```php
$truncatedString = $this->get('urodoz_truncate')->truncate($htmlString, 100);
```

### Twig

If you use the Symfony2 framework with Twig you can use the Twig filter `truncateHTML` in your templates after you have setup Symfony2 integrations (see above).

```twig
{{ truncateHTML(content, 250) }}
```

If you use Twig outside of the Symfony2 framework you first need to add the extension to your environment:

```php
use Urodoz\Truncate\Bridge\Twig\TruncateExtension;
use Urodoz\Truncate\TruncateService;

$twig = new Twig_Environment($loader);
$twig->addFunction(new TruncateExtension(TruncateService::create()));
```

You can find more information about registering extensions in the [Twig documentation](http://twig.sensiolabs.org/doc/advanced.html#creating-an-extension).

Author
-------

- [Albert Lacarta](https://github.com/urodoz)


License
-------

The MIT License (MIT)

Copyright (c) 2014 Albert Lacarta

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
