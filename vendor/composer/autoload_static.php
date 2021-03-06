<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0609c345aa252612d3a1e292666a280
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Enum\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Enum\\' => 
        array (
            0 => __DIR__ . '/../..' . '/enum',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0609c345aa252612d3a1e292666a280::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0609c345aa252612d3a1e292666a280::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0609c345aa252612d3a1e292666a280::$classMap;

        }, null, ClassLoader::class);
    }
}
