<?php
namespace Portrino\Varnish\Hook;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Andri Steiner <support@snowflake.ch>
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
 * This class contains required hooks which are called by TYPO3
 *
 * @author Andri Steiner  <support@snowflake.ch>
 * @author Axel Boeswetter <boeswetter@portrino.de>
 * @package TYPO3
 * @subpackage tx_varnish
 */
class TypoScriptFrontendController {

    /**
     * contentPostProc-output hook to add typo3-pid header
     *
     * @param array $parameters
     * @param \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $parent
     */
    public function sendHeader(array $parameters, \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $parent) {
        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['varnish']);

            // Send Page pid which is used to issue BAN Command against
        if (\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REV_PROXY') == 1 || $extConf['alwaysSendTypo3Headers'] == 1) {
            header('TYPO3-Pid: ' . (int)$parent->id);
            header('TYPO3-Sitename: ' . \Portrino\Varnish\Utility\GeneralUtility::getSitename());
        }
    }

}
