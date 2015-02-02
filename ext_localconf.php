<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:varnish/Configuration/TypoScript/setup.txt">');

$GLOBALS['TYPO3_CONF_VARS']['BE']['AJAX']['tx_varnish::banAll'] = '\\Portrino\\Varnish\\Hook\\Ajax->banAll';

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = '\\Portrino\\Varnish\\Hook\\TypoScriptFrontendController->sendHeader';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions'][] = '\\Portrino\\Varnish\\Hook\\ClearCacheMenu';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][] = '\\Portrino\\Varnish\\Hook\\DataHandler->clearCachePostProc';
