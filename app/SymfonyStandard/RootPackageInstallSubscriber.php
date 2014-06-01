<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SymfonyStandard;

use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Script\ScriptEvents;
use Composer\Script\CommandEvent;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler;
use Symfony\Component\Filesystem\Filesystem;

class RootPackageInstallSubscriber implements EventSubscriberInterface
{
    /**
     * Composer variables are declared static so that an event could update
     * a composer.json and set new options, making them immediately available
     * to forthcoming listeners.
     */
    private static $options = array(
        'symfony-web-dir' => 'web'
    );

    public static function installAcmeDemoBundle(CommandEvent $event)
    {
        ScriptHandler::installAcmeDemoBundle($event);
    }

    public static function setupNewDirectoryStructure(CommandEvent $event)
    {
        $options = self::getOptions($event);

        // Create dummy app_dev.php to stay compatible with Symfony's post install file
        $fs = new Filesystem();
        $webDir = $options['symfony-web-dir'];
        $fs->dumpFile($webDir.'/app_dev.php', '');

        ScriptHandler::defineDirectoryStructure($event);

        // Remove the dummy app_dev.php file
        $fs->remove($webDir.'/app_dev.php');
    }

    public static function getSubscribedEvents()
    {
        return array(
            ScriptEvents::POST_INSTALL_CMD => array(
                array('setupNewDirectoryStructure', 512),
                array('installAcmeDemoBundle', 0)
            ),
        );
    }

    protected static function getOptions(CommandEvent $event)
    {
        $options = array_merge(self::$options, $event->getComposer()->getPackage()->getExtra());

        return $options;
    }
}
