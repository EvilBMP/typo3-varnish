<?php
namespace Portrino\Varnish\Utility;

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
 * This class contains controls communication between TYPO3 and Varnish
 *
 * @author Andri Steiner  <support@snowflake.ch>
 * @author Axel Boeswetter <boeswetter@portrino.de>
 * @package TYPO3
 * @subpackage tx_varnish
 */
class CommandUtility {

    /**
     * @var array TYPO3 Extension Configuration
     */
    protected $extConf;

    /**
     * Load Configuration and assing default values
     */
    public function __construct() {
            // load extension configuration
        $this->extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['varnish']);

            // assign default values
        if (empty($this->extConf['instanceHostnames'])) {
            $this->extConf['instanceHostnames'] = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_HOST');
        }

        $this->extConf['instanceHostnames'] = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->extConf['instanceHostnames'], TRUE);
    }


    /**
     * clearCache
     * Executed by the clearCachePostProc Hook
     *
     * @param string $cacheCmd
     * @return void
     */
    public function clearCache($cacheCmd) {
        \Portrino\Varnish\Utility\GeneralUtility::devLog('clearCache', array('cacheCmd' => $cacheCmd));

            // if cacheCmd is a single Page, issue BAN Command on this pid
            // all other Commands ("page", "all") led to a BAN of the whole Cache
        $cacheCmd = (int)$cacheCmd;
        $banCmd = array(
            $cacheCmd > 0 ? 'Varnish-Ban-TYPO3-Pid: ' . $cacheCmd : 'Varnish-Ban-All: 1',
            'Varnish-Ban-TYPO3-Sitename: ' . \Portrino\Varnish\Utility\GeneralUtility::getSitename()
        );

            // issue command on every Varnish Server
        /* @var $httpUtility \Portrino\Varnish\Utility\HttpUtility */
        $httpUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\\Portrino\\Varnish\\Utility\\HttpUtility');
        foreach ($this->extConf['instanceHostnames'] as $currentHost) {
            $httpUtility->addCommand('BAN', $currentHost, $banCmd);
            \Portrino\Varnish\Utility\GeneralUtility::devLog('banCmd', array('Request-Type' => 'BAN', 'Host' => $currentHost, 'Request-Header' => $banCmd, 'cURL Command for shell testing' => 'curl -X BAN -H "' . implode('" -H "', $banCmd) . '" ' . $currentHost));
        }
    }

}
