Symfony WMS Edition
========================

Welcome to the Symfony WMS Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

Differences between the Standard and WMS Edition
---------------------------------------------------

Symfony WMS Edition is a modified version of the Standard Symfony2
distribution. Here is an overview of the differences between the Standard
Edition and the WMS Edition

  * **Environment infered from ENV variables**  
    Symfony WMS Edition uses a system environment variable to determine the
    correct AppKernel environment. Please refer to this document
    for information on how to configure your environment.

  * **DoctrineMigrationsBundle included**  
    In order to simplify the initial setup process, this version of Symfony
    comes preconfigured with the [DoctrineMigrationsBundle][15].

Setting the Application Environment
--------------------------------------

To modify the environment used by Symfony, you need to set the `APPLICATION_ENV`
(or `APP_ENV` for Amazon EC2 instance). Please refer to your web server and OS
documentation on how to set an environment variable.

If is also possible to use [Apache httpd's `mod_env` module][14] to set the
environment variable. Such configuration would look like this in your `httpd.conf`
file:

    <Directory "/path/to/symfony/">
        SetEnv APPLICATION_ENV "dev"
    </Directory>

What's inside?
--------------

The Symfony WMS Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL (including Migrations);

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**DoctrineMigrationsBundle**][15] - Adds support for database migrations
    using Doctrine

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony WMS Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.0/book/installation.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.0/book/doctrine.html
[8]:  https://symfony.com/doc/3.0/book/templating.html
[9]:  https://symfony.com/doc/3.0/book/security.html
[10]: https://symfony.com/doc/3.0/cookbook/email.html
[11]: https://symfony.com/doc/3.0/cookbook/logging/monolog.html
[13]: https://symfony.com/doc/3.0/bundles/SensioGeneratorBundle/index.html
[14]: http://httpd.apache.org/docs/2.4/mod/mod_env.html
[15]: https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html