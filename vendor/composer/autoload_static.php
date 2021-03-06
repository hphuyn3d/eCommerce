<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69482f4b30a8f21caa6f5541dbbd9792
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit69482f4b30a8f21caa6f5541dbbd9792::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69482f4b30a8f21caa6f5541dbbd9792::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
