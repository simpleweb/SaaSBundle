Getting Started With SimplewebSaaSBundle
========================================

## Prerequisites

This bundle has only been tested with Symfony 2.4.

### Translations

If you wish to use default texts provided in this bundle, you have to make
sure you have translator enabled in your config.

``` yaml
# app/config/config.yml

framework:
    translator: ~
```

For more information about translations, check [Symfony documentation](http://symfony.com/doc/current/book/translation.html).

## Installation

Installation is a quick (I promise!) 7 step process:

1. Download SimplewebSaaSBundle using composer
2. Enable the Bundle
3. Add the Subscriber trait to your User class
4. Configure the SimplewebSaaSBundle
5. Import SimplewebSaaSBundle routing
6. Update your database schema

### Step 1: Download SimplewebSaaSBundle using composer

Add SimplewebSaaSBundle in your composer.json:

```js
{
    "require": {
        "simpleweb/saas-bundle": "~0.1@dev"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
php composer.phar update simpleweb/saas-bundle
```

Composer will install the bundle to your project's `vendor/simpleweb` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Simpleweb\SaaSBundle\SimplewebSaaSBundle(),
    );
}
```

### Step 3: Add the Subscriber trait to your User class

``` php
<?php
// src/Acme/UserBundle/Entity/User.php

namespace Acme\UserBundle\Entity;

use Simpleweb\SaaSBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    use Simpleweb\SaaSBundle\Entity\Traits\Subscriber;
}
```

### Step 5: Configure the SimplewebSaaSBundle

...

### Step 6: Import SimplewebSaaSBundle routing

...

### Step 7: Update your database schema

Now that the bundle is configured, the last thing you need to do is update your
database schema because you have added a new trait, to the `User` class which you
added in Step 4.

``` bash
php app/console doctrine:schema:update --force
```

### Next Steps

...
