<?php
namespace Portrino\Varnish\Utility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 snowflake productions gmbh <support@snowflake.ch>
 *      2014 Axel Boeswetter <boeswetter@portrino.de>, portrino GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * Helper class for varnish
 *
 * @author Sascha Hepp <support@snowflake.ch>
 * @author Axel Boeswetter <boeswetter@portrino.de>
 * @package TYPO3
 * @subpackage tx_varnish
 */
class GeneralUtility {

    /**
     * Devlog if enabled
     *
     * @param string $functionName
     * @param string $additionalData
     */
    public static function devLog($functionName, $additionalData = '') {
        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['varnish']);
        if ($extConf['enableDevLog']) {
            \TYPO3\CMS\Core\Utility\GeneralUtility::devLog($functionName, 'varnish', 0, $additionalData);
        }
    }

    /**
     * Returns HMAC of the sitename
     *
     * @return mixed
     */
    public static function getSitename() {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::hmac($GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename']);
    }

}
