<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit34d9e9e6b65d3b4575839924c802ba4c
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit34d9e9e6b65d3b4575839924c802ba4c::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
