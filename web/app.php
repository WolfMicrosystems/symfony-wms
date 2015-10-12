<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;

/**
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../app/bootstrap.php.cache';

// Enable APC for autoloading to improve performance.
// You should change the ApcClassLoader first argument to a unique prefix
// in order to prevent cache key conflicts with other applications
// also using APC.
/*
$apcLoader = new Symfony\Component\ClassLoader\ApcClassLoader(sha1(__FILE__), $loader);
$loader->unregister();
$apcLoader->register(true);
*/

require_once __DIR__.'/../app/AppKernel.php';

$environment = AppKernel::getEnvironmentNameFromEnvVars();

if (AppKernel::isDebugEnabledForEnvironment($environment)) {
    Debug::enable();
} else {
    /*
    // Enable Symfony's handling of uncaught errors in Production mode
    // DON'T FORGET TO MODIFY THE ERROR TEMPLATE
    Debug::enable();
    */
}

$kernel = new AppKernel($environment, AppKernel::isDebugEnabledForEnvironment($environment));
$kernel->loadClassCache();
/*
if(AppKernel::isDebugEnabledForEnvironment($environment) === false) {
    require_once __DIR__.'/../app/AppCache.php';
    $kernel = new AppCache($kernel);
    // When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
    Request::enableHttpMethodParameterOverride();
}
*/
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
