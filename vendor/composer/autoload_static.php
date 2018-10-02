<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1ad1c45293afcb6b1c5432e0fbb26935
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'H' => 
        array (
            'Helper\\' => 7,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/helper',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1ad1c45293afcb6b1c5432e0fbb26935::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1ad1c45293afcb6b1c5432e0fbb26935::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
