<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "varnish".
 *
 * Auto generated 29-04-2014 16:16
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Varnish Connector',
	'description' => 'This extension is fork from snowflake/typo3-varnish and managed on GitHub. Feel free to get in touch at https://github.com/EvilBMP/typo3-varnish/',
	'category' => 'misc',
	'shy' => 0,
	'version' => '1.1.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.3.0-0.0.0',
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'state' => 'stable',
	'author' => 'Andri Steiner, Axel Boeswetter',
	'author_email' => 'varnish@snowflake.ch, boeswetter@portrino.de',
	'author_company' => 'snowflake, portrino GmbH',
	'_md5_values_when_last_written' => 'a:15:{s:16:"ext_autoload.php";s:4:"a0ec";s:21:"ext_conf_template.txt";s:4:"78a9";s:12:"ext_icon.gif";s:4:"a993";s:17:"ext_localconf.php";s:4:"cf97";s:13:"locallang.xml";s:4:"2529";s:10:"README.rst";s:4:"f6be";s:39:"Classes/CommandUtility.php";s:4:"6c71";s:33:"Classes/HttpUtility.php";s:4:"1e50";s:45:"Classes/Hook/Ajax.php";s:4:"82d2";s:55:"Classes/Hook/ClearCacheMenu.php";s:4:"95b8";s:48:"Classes/Hook/DataHandler.php";s:4:"9abd";s:49:"Classes/Hook/TypoScriptFrontendController.php";s:4:"6f01";s:53:"Classes/Utility/GeneralUtility.php";s:4:"6c64";s:15:"Resources/default.vcl";s:4:"9699";s:16:"TypoScript/setup.txt";s:4:"69d1";}',
);

?>