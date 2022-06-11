<?php
if (!defined('ABSPATH')) exit;
// autoload_real.php @generated by Composer
class ComposerAutoloaderInit4e82318c2cce635b3d339eae275c0644
{
 private static $loader;
 public static function loadClassLoader($class)
 {
 if ('Composer\Autoload\ClassLoader' === $class) {
 require __DIR__ . '/ClassLoader.php';
 }
 }
 public static function getLoader()
 {
 if (null !== self::$loader) {
 return self::$loader;
 }
 require __DIR__ . '/platform_check.php';
 spl_autoload_register(array('ComposerAutoloaderInit4e82318c2cce635b3d339eae275c0644', 'loadClassLoader'), true, true);
 self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
 spl_autoload_unregister(array('ComposerAutoloaderInit4e82318c2cce635b3d339eae275c0644', 'loadClassLoader'));
 require __DIR__ . '/autoload_static.php';
 call_user_func(\Composer\Autoload\ComposerStaticInit4e82318c2cce635b3d339eae275c0644::getInitializer($loader));
 $loader->register(true);
 $includeFiles = \Composer\Autoload\ComposerStaticInit4e82318c2cce635b3d339eae275c0644::$files;
 foreach ($includeFiles as $fileIdentifier => $file) {
 composerRequire4e82318c2cce635b3d339eae275c0644($fileIdentifier, $file);
 }
 return $loader;
 }
}
function composerRequire4e82318c2cce635b3d339eae275c0644($fileIdentifier, $file)
{
 if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
 $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
 require $file;
 }
}
