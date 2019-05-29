# Module Contact Us for Bluz Skeleton
## Achievements

[![Latest Stable Version](https://img.shields.io/packagist/v/bluzphp/module-contact-us.svg?label=version&style=flat)](https://packagist.org/packages/bluzphp/module-contact-us)

[![Build Status](https://img.shields.io/travis/bluzphp/module-contact-us/master.svg?style=flat)](https://travis-ci.org/bluzphp/module-contact-us)

[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/bluzphp/module-contact-us.svg?style=flat)](https://scrutinizer-ci.com/g/bluzphp/module-contact-us/)

[![Total Downloads](https://img.shields.io/packagist/dt/bluzphp/module-contact-us.svg?style=flat)](https://packagist.org/packages/bluzphp/module-contact-us)

[![License](https://img.shields.io/packagist/l/bluzphp/module-contact-us.svg?style=flat)](https://packagist.org/packages/bluzphp/module-contact-us)

## Usage
### Install module
To install the module run the command:
  
```bash
php /vendor/bin/bluzman module:install contact-us
php /vendor/bin/bluzman db:migrate
```

### Configure
Create an application at Admin panel (https://www.google.com/recaptcha/admin), 
than setup *App ID* and *App Secret* in configuration file `modules/contact-us/config.php`.

### Remove module
To remove the module, run the command:
    
```bash
php /vendor/bin/bluzman module:remove contact-us
```
