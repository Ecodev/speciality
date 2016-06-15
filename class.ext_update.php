<?php
namespace Ecodev\Speciality;

/*
 * This file is part of the Ecodev\Speciality project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
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

        $lines[] = $this->updatePagesTemplate();
        $lines[] = $this->updateContentTemplatefile();
        return implode('<br/>', $lines);
    }

    /**
     * @return string
     * @throws \InvalidArgumentException
     */
    private function updatePagesTemplate()
    {

        // Fetch records that needs to be updated
        $records = $this->getDatabaseConnection()->exec_SELECTgetRows(
            'uid, tx_fed_page_controller_action, tx_fed_page_controller_action_sub',
            'pages',
            'tx_fed_page_controller_action != "" OR tx_fed_page_controller_action_sub != "" AND deleted = 0'
        );

        $counter = 0;
        foreach ($records as $record) {

            $values = [];
            if (preg_match('/speciality->/', $record['tx_fed_page_controller_action'])) {
                $parts = explode('->', $record['tx_fed_page_controller_action']);
                $values['tx_fed_page_controller_action'] = ucfirst($parts[0]) . '->' . lcfirst($parts[1]);
            }

            if (preg_match('/speciality->/', $record['tx_fed_page_controller_action_sub'])) {
                $parts = explode('->', $record['tx_fed_page_controller_action_sub']);
                $values['tx_fed_page_controller_action_sub'] = ucfirst($parts[0]) . '->' . lcfirst($parts[1]);
            }

            if (count($values) > 0) {
                $counter++;
                $this->getDatabaseConnection()->exec_UPDATEquery('pages', 'uid = ' . $record['uid'], $values);
            }
        }

        if ($counter > 0) {
            $result = sprintf('- %s page(s) have been updated fields "tx_fed_page_controller_action" and "tx_fed_page_controller_action_sub".', count($records));
        } else {
            $result = '- After checking no update was necessary in pages.';
        }

        return $result;
    }

    /**
     * @return string
     * @throws \InvalidArgumentException
     */
    private function updateContentTemplatefile()
    {
        $result = '- Extension "fluidbootstraptheme" is still enabled. I will  not do anything!';
        if (!\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('fluidbootstraptheme')) {

            $records = $this->getDatabaseConnection()->exec_SELECTgetRows('uid, tx_fed_fcefile', 'tt_content', 'tx_fed_fcefile LIKE "FluidBT.Fluidbootstraptheme%"');
            foreach ($records as $record) {

                $values['tx_fed_fcefile'] = str_replace('FluidBT.Fluidbootstraptheme', 'speciality', $record['tx_fed_fcefile']);

                $this->getDatabaseConnection()->exec_UPDATEquery('tt_content', 'uid = ' . $record['uid'], $values);
            }

            if (count($records) > 0) {
                $result = sprintf('- %s record(s) have been updated with value "FluidBT.Fluidbootstraptheme" by "speciality" in field "tx_fed_fcefile".', count($records));
            } else {
                $result = '- After checking no update was necessary in tt_content.';
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
