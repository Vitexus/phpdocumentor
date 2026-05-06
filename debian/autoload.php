<?php
require_once '/usr/share/php/Composer/Autoload/ClassLoader.php';
require_once '/usr/share/php/Composer/InstalledVersions.php';

$loader = new \Composer\Autoload\ClassLoader('/usr/lib/phpdocumentor/vendor');

// phpDocumentor application classes take priority; library classes (reflection, etc.) are fallback
$loader->addPsr4('phpDocumentor\\', [
    '/usr/lib/phpdocumentor/src/phpDocumentor/',
    '/usr/share/php/phpDocumentor/',
]);

$loader->addPsr4('Flyfinder\\',        ['/usr/share/php/Flyfinder/']);
$loader->addPsr4('Jean85\\',           ['/usr/share/php/Jean85/']);
$loader->addPsr4('League\\',           ['/usr/share/php/League/']);
$loader->addPsr4('Monolog\\',          ['/usr/share/php/Monolog/']);
$loader->addPsr4('PhpParser\\',        ['/usr/share/php/PhpParser/']);
$loader->addPsr4('PharIo\\',           ['/usr/share/php/PharIo/']);
$loader->addPsr4('Psr\\',              ['/usr/share/php/Psr/']);
$loader->addPsr4('Symfony\\',          ['/usr/share/php/Symfony/']);
$loader->addPsr4('Twig\\',             ['/usr/share/php/Twig/']);
$loader->addPsr4('Webmozart\\Assert\\', ['/usr/share/php/Webmozart/Assert/']);

$loader->register(true);

// File-based autoloads and InstalledVersions registration for installed packages
foreach ([
    '/usr/share/php/Jawira/PlantUmlEncoding/autoload.php',
    '/usr/share/php/Jawira/Plantuml/autoload.php',
    '/usr/share/php/phpDocumentor/FileSystem/autoload.php',
    '/usr/share/php/phpDocumentor/GraphViz/autoload.php',
    '/usr/share/php/phpDocumentor/Guides/autoload.php',
    '/usr/share/php/phpDocumentor/JsonPath/autoload.php',
    '/usr/share/php/phpDocumentor/autoload-reflection.php',
    '/usr/share/php/Flyfinder/autoload.php',
    '/usr/share/php/Jean85/autoload.php',
    '/usr/share/php/League/Tactician/autoload.php',
    '/usr/share/php/PharIo/Manifest/autoload.php',
    '/usr/share/php/PharIo/Version/autoload.php',
    '/usr/share/php/PhpParser/autoload.php',
    '/usr/share/php/Psr/Cache/autoload.php',
    '/usr/share/php/Psr/EventDispatcher/autoload.php',
    '/usr/share/php/Psr/Log/autoload.php',
    '/usr/share/php/Webmozart/Assert/autoload.php',
] as $al) {
    if (file_exists($al)) {
        require_once $al;
    }
}

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $name    = 'unknown';
    $version = '0.0.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'project', 'install_path' => '/usr/lib/phpdocumentor/',
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'project', 'install_path' => '/usr/lib/phpdocumentor/',
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();

return $loader;
