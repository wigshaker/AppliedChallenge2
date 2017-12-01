<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1eed959dd1b84236be34849aefad7584
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PiPHP\\GPIO\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PiPHP\\GPIO\\' => 
        array (
            0 => __DIR__ . '/..' . '/piphp/gpio/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'Q' => 
        array (
            'QuantumPHP' => 
            array (
                0 => __DIR__ . '/..' . '/frankforte/quantumphp',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1eed959dd1b84236be34849aefad7584::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1eed959dd1b84236be34849aefad7584::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1eed959dd1b84236be34849aefad7584::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
