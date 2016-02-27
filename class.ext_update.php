<?php
namespace Ecodev\Speciality;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Class ext_update
 */
class ext_update
{

    /**
     * @return boolean
     */
    public function access()
    {
        return false;
    }

    /**
     * @return string
     */
    public function main()
    {

        $result = 'Extension "fluidbootstraptheme" is still enabled. I will  not do anything!';
        if (!\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('fluidbootstraptheme')) {

            $records = $this->getDatabaseConnection()->exec_SELECTgetRows('uid, tx_fed_fcefile', 'tt_content', 'tx_fed_fcefile LIKE "FluidBT.Fluidbootstraptheme%"');
            foreach ($records as $record) {

                $values['tx_fed_fcefile'] = str_replace('FluidBT.Fluidbootstraptheme', 'speciality', $record['tx_fed_fcefile']);

                $this->getDatabaseConnection()->exec_UPDATEquery('tt_content', 'uid = ' . $record['uid'], $values);
            }


            if (count($records) > 0) {
                $result = sprintf('%s record(s) have been updated with value "FluidBT.Fluidbootstraptheme" by "speciality" in field "tx_fed_fcefile".', count($records));
            } else {
                $result = 'After checking no update was necessary.';
            }
        }
        return $result;
    }

    /**
     * Returns a pointer to the database.
     *
     * @return \TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }

}

