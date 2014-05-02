<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        );

        if (static::isDebugEnabledForEnvironment($this->getEnvironment())) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    public static function isDebugEnabledForEnvironment($environment)
    {
        return in_array($environment, static::getDebugEnabledEnvironments());
    }

    public static function getDebugEnabledEnvironments()
    {
        return array('dev', 'test');
    }

    public static function getEnvironmentNameFromEnvVars($defaultEnv = 'prod')
    {
        $varnames = self::getEnvironmentVariableNames();

        if (!is_array($varnames)) {
            $varnames = array($varnames);
        }

        foreach ($varnames as $name) {
            $env = getenv($name);

            if (!empty($env)) {
                return $env;
            }
        }

        return $defaultEnv;
    }

    public static function getEnvironmentVariableNames()
    {
        return array('APPLICATION_ENV', 'APP_ENV');
    }
}
