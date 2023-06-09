<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb0bd688c1f1ecd33ca4e3794d541b641
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitb0bd688c1f1ecd33ca4e3794d541b641', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb0bd688c1f1ecd33ca4e3794d541b641', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb0bd688c1f1ecd33ca4e3794d541b641::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
