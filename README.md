# Bagisto Package Generator

## 1. Introduction

Bagisto Package Generator will create a sample package for you with a single command

It packs in lots of demanding features that allows your business to scale in no time:

* Create package with a single command.

## 2. Requirements

* **Bagisto**: v1.1.2 or higher.

## 3. Installation

### Install with composer

Go to the root folder of **Bagisto** and run the following command

~~~php
composer require bagisto/bagisto-package-generator
~~~

> That's it, now just execute the project on your specified domain.

## 4. Summary

After setting up, you will see that there are list of package commands which help you to make your package creation smooth.

Below are the list of commands,

| S. No. | Commands                              | Info                                                                                                            | Required Arguments                     | Optional Arguments  |
|:-------|:--------------------------------------|:----------------------------------------------------------------------------------------------------------------| :------------------------------------- | :------------------ |
| 01.    | bagisto:make:all                      | [Create a new package.](#1-create-a-new-package)                                                                |  package-name                          | --force, --plain    |
| 02.    | bagisto:make:shop-controller          | [Create a new shop controller.](#4-create-a-new-shop-controller)                                                |  controller-name, package-name         | --force             |
| 03.    | bagisto:make:admin-controller         | [Create a new admin controller.](#5-create-a-new-shop-routes-file)                                              |  package-name                          | --force             |
| 04.    | bagisto:make:shop-route               | [Create a new shop routes file.](#5-create-a-new-shop-routes-file)                                              |  package-name                          | --force             |
| 05.    | bagisto:make:admin-route              | [Create a new admin routes file.](#5-create-a-new-shop-routes-file)                                             |  package-name                          | --force             |
| 06.    | bagisto:make:shop-request             | [Create a new shop request file.](#5-create-a-new-shop-routes-file)                                             |  package-name                          | --force             |
| 07.    | bagisto:make:admin-request            | [Create a new admin request file.](#5-create-a-new-shop-routes-file)                                            |  package-name                          | --force             |
| 08.    | bagisto:make:model                    | [Create a new model class.](#6-create-a-new-model-class)                                                        |  model-name, package-name              | --force             |
| 09.    | bagisto:make:shop-all                 | [Create a new shop-request shop-controller and shop-route file.](#6-create-a-new-model-class)                   |  model-name, package-name              | --force             |
| 10.    | bagisto:make:admin-all                | [Create a new admin-request admin-controller and admin-route file.](#6-create-a-new-model-class)                |  model-name, package-name              | --force             |
| 11.    | bagisto:make:migration                | [Create a new migration class.](#9-create-a-new-migration-class)                                                |  migration-name, package-name          |                     |
| 12.    | bagisto:make:seeder                   | [Create a new seeder class.](#10-create-a-new-seeder-class)                                                     |  seeder-name, package-name             | --force             |
| 13.    | bagisto:make:middleware               | [Create a new middleware class.](#12-create-a-new-middleware-class)                                             |  middleware-name, package-name         | --force             |
| 14.    | bagisto:make:datagrid                 | [Create a new datagrid class.](#13-create-a-new-datagrid-class)                                                 |  datagrid-name, package-name           | --force             |
| 15.    | bagisto:make:repository               | [Create a new repository class.](#14-create-a-new-repository-class)                                             |  repository-name, package-name         | --force             |
| 16.    | bagisto:make:provider                 | [Create a new service provider class.](#15-create-a-new-service-provider-class)                                 |  provider-name, package-name           | --force             |
| 17.    | bagisto:make:event                    | [Create a new event class.](#16-create-a-new-event-class)                                                       |  event-name, package-name              | --force             |
| 18.    | bagisto:make:listener                 | [Create a new listener class.](#17-create-a-new-listener-class)                                                 |  listener-name, package-name           | --force             |
| 19.    | bagisto:make:notification             | [Create a new notification class.](#18-create-a-new-notification-class)                                         |  notification-name, package-name       | --force             |
| 20.    | bagisto:make:mail                     | [Create a new mail class.](#19-create-a-new-mail-class)                                                         |  mail-name, package-name               | --force             |
| 21.    | bagisto:make:command                  | [Create a new command class.](#20-create-a-new-command-class)                                                   |  command-name, package-name            | --force             |
| 22.    | bagisto:payment                       | [Create a new payment class.](#21-create-a-new-payment-class)                                                   |  payment-name, package-name            | --force             |
| 23.    | bagisto:shipping                      | [Create a new shipping class.](#22-create-a-new-shipping-class)                                                 |  shipping-name, package-name           | --force             |
| 24.    | bagisto:make:module-provider          | [Create a new module service provider class.](#23-create-a-new-module-service-provider-class)                   |  provider-name, package-name           | --force             |
| 25.    | bagisto:make:payment-method           | [Create a new payment method package.](#24-create-a-new-payment-method-package)                                 |  payment-package-name                  | --force             |
| 26.    | bagisto:make:payment-method-provider  | [Create a new payment method service provider class.](#25-create-a-new-payment-method-service-provider-class)   |  provider-name, payment-package-name   | --force             |
| 27.    | bagisto:make:shipping-method          | [Create a new shipping method package.](#26-create-a-new-shipping-method-package)                               |  shipment-package-name                 | --force             |
| 28.    | bagisto:make:shipping-method-provider | [Create a new shipping method service provider class.](#27-create-a-new-shipping-method-service-provider-class) |  provider-name, shipment-package-name  | --force             |


**--force** : To overwrite the files

**--plain** : When you need only directory structure template, files are not included when this argument is passed

## 5. Usage

### Let's get started with our first command

#### 1. Create a new package

For e.g., If you want to create a package which named as '**TestPackage**', and all dependency then you need to use the command like this,

~~~php
php artisan bagisto:make:all name package Webkul/TestPackage
~~~

##### New package with force command

If somehow folder or package is already present, then simple command won't work. So to overcome this problem we need to use force command.

~~~php
php artisan bagisto:make:all Webkul/TestPackage --force
~~~


#### 4. Create a new shop controller

This command will generate a new controller for your shop portion i.e. '**packages/Webkul/RestApi/src/Http/Controllers/V1/Test**'.

~~~php
php artisan bagisto:make:shop-controller ShopTestController V1/Test
~~~

##### Create a new shop controller with force command

If controller is already present, then you need to use the force command.

~~~php
php artisan bagisto:make:shop-controller ShopTestController V1/Test --force
~~~

#### 5. Create a new shop routes file

If you want to create a shop route, then you need to use this command and then register your routes file in the api.php i.e. require 'V1/api.php';.

~~~php
php artisan bagisto:make:shop-route V1/Test
~~~

##### Create a new shop routes file with force command

If shop routes file already present and you want to override this, then you need to use force command.

~~~php
php artisan bagisto:make:shop-route V1/Test --force
~~~

#### 6. Create a new model class

This command will create a following files,

* New model class in '**packages/Package/src/Models**' directory.

~~~php
php artisan bagisto:make:model TestModel Package
~~~

##### Create a new model with force command

This command will overwrite all three files.

~~~php
php artisan bagisto:make:model TestModel Package --force
~~~


#### 9. Create a new migration class

This command will create a new migration class in '**packages/Package/src/Database/Migrations**' directory.

~~~php
php artisan bagisto:make:migration TestMigration Package
~~~

#### 10. Create a new seeder class

This command will create a new seeder class in '**packages/Package/src/Database/Seeders**' directory.

~~~php
php artisan bagisto:make:seeder TestSeeder Package
~~~

##### Create a new seeder class with force command

If seeder class already present then you can use force command for overwriting.

~~~php
php artisan bagisto:make:seeder TestSeeder Package --force
~~~

#### 11. Create a new request class

This command will create a new request class in '**packages/Package/src/Http/Requests**' directory.

~~~php
php artisan bagisto:make:request TestRequest Package
~~~

##### Create a new request class with force command

If request class already present then you can use force command for overwriting.

~~~php
php artisan bagisto:make:request TestRequest Package --force
~~~

#### 12. Create a new middleware class

This command will create a new middleware class in '**packages/Webkul/src/Http/Middleware**' directory.

~~~php
php artisan bagisto:make:middleware TestMiddleware Package
~~~

##### Create a new middleware class with force command

If middleware class already present then you can use force command for overwriting.

~~~php
php artisan bagisto:make:middleware TestMiddleware Package --force
~~~

#### 13. Create a new datagrid class

This command will create a new data grid class in '**packages/Webkul/src/Datagrids**' directory.

~~~php
php artisan bagisto:make:datagrid TestDataGrid Package
~~~

##### Create a new datagrid class with force command

If data grid class already present then you can use force command for overwriting.

~~~php
php artisan bagisto:make:datagrid TestDataGrid Package --force
~~~

#### 14. Create a new repository class

This command will create a new repository class in '**packages/Webkul/src/Repositories**' directory.

~~~php
php artisan bagisto:make:repository TestRepository Package
~~~

##### Create a new repository with force command

If repository class already present then you can use force command for overwriting.

~~~php
php artisan bagisto:make:repository TestRepository Package --force
~~~

#### 15. Create a new service provider class

This command will create a new service provider class in '**packages/Webkul/src/Providers**' directory.

~~~php
php artisan bagisto:make:provider TestServiceProvider Package
~~~

##### Create a new service provider with force command

If service provider class already present then you can use force command for overwriting.

~~~php
php artisan bagisto:make:provider TestServiceProvider Package --force
~~~

#### 16. Create a new event class

This command will create a new event class in '**packages/Webkul/src/Events**' directory.

~~~php
php artisan bagisto:make:event TestEvent Package
~~~

##### Create a new event with force command

If event class already present then you can use force command for overwriting.

~~~php
php artisan package:make:event TestEvent Package --force
~~~

#### 17. Create a new listener class

This command will create a new listener class in '**packages/Webkul/src/Listeners**' directory.

~~~php
php artisan package:make:listener TestListener Package
~~~

##### Create a new listener class with force command

If listener class already present then you can use force command for overwriting.

~~~php
php artisan package:make:listener TestListener Package --force
~~~

#### 18. Create a new notification class

This command will create a new notification class in '**packages/Webkul/src/Notifications**' directory.

~~~php
php artisan package:make:notification TestNotification Package
~~~

##### Create a new notification with force command

If notification class already present then you can use force command for overwriting.

~~~php
php artisan package:make:notification TestNotification Package --force
~~~

#### 19. Create a new mail class

This command will create a new mail class in '**packages/Webkul/src/Mail**' directory.

~~~php
php artisan package:make:mail TestMail Package
~~~

##### Create a new mail class with force command

If mail class already present then you can use force command for overwriting.

~~~php
php artisan package:make:mail TestMail Package --force
~~~

#### 20. Create a new command class

This command will create a new command class in the '**packages/Webkul/src/Console/Commands**' directory.

~~~php
php artisan package:make:command TestCommand Package
~~~

##### Create a new command class with force command

If command class already present then you can use force command for overwriting.

~~~php
php artisan package:make:command TestCommand Package --force
~~~

#### 21. Create a new payment class

This command will create a new payment class in '**packages/Webkul/src/Payment**' directory.

~~~php
php artisan package:make:payment TestPayment Package
~~~

##### Create a new payment with force command

If payment class already present then you can use force command for overwriting.

~~~php
php artisan package:make:payment TestPayment Package --force
~~~

#### 22. Create a new shipping class

This command will create a new shipping class in '**packages/Webkul/src/Carriers**' directory.

~~~php
php artisan package:make:shipping TestShipping Package
~~~

##### Create a new shipping class with force command

If shipping class already present then you can use force command for overwriting.

~~~php
php artisan package:make:shipping TestShipping Package --force
~~~

#### 23. Create a new module service provider class

This command will create a new module service provider class in '**packages/Webkul/src/Providers**' directory.

~~~php
php artisan package:make:module-provider TestServiceProvider Package
~~~

##### Create a new module service provider with force command

If module service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make:module-provider TestServiceProvider Package --force
~~~

#### 24. Create a new payment method package

This command will create a whole new payment package for you in  '**packages/Webkul/Stripe**' directory.

~~~php
php artisan package:make:payment-method Webkul/Stripe
~~~

##### Create a new payment method with force command

This command will overwrite whole directory structure.

~~~php
php artisan package:make:payment-method Webkul/Stripe --force
~~~

#### 25. Create a new payment method service provider class

This command will create a new payment method service provider class in '**packages/Webkul/Stripe/src/Providers**' directory.

~~~php
php artisan package:make:payment-method-provider TestPaymentMethodServiceProvider Webkul/Stripe
~~~

##### Create a new payment method service provider class with force command

If payment method service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make:payment-method-provider TestPaymentMethodServiceProvider Webkul/Stripe --force
~~~

#### 26. Create a new shipping method package

This command will create a whole new shipment package in '**packages/Webkul/FedEx**' directory.

~~~php
php artisan package:make:shipping-method Webkul/FedEx
~~~

##### Create a new shipping method with force command

This command will override whole directory structure.

~~~php
php artisan package:make:shipping-method Webkul/FedEx --force
~~~

#### 27. Create a new shipping method service provider class

This command will create a new shipping method service provider class '**packages/Webkul/FedEx/src/Providers**' directory.

~~~php
php artisan package:make:shipping-method-provider TestShippingMethodServiceProvider Webkul/FedEx
~~~

##### Create a new shipping method service provider with force command

If shipping method service provider class already present then you can use force command for overwriting.

~~~php
php artisan package:make:shipping-method-provider TestShippingMethodServiceProvider Webkul/FedEx --force
~~~


