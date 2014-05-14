<?php
namespace TYPO3\CMS\Speciality\Content;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Fabien Udriot <fabien.udriot@ecodev.ch>
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
 * Class which generates an anchor link put besides a menu.
 *
 * @package Speciality
 * @subpackage Controller
 * @route off
 */

class MenuAnchor {

	/**
	 * The backReference to the mother cObj object set at call time
	 *
	 * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
	 */
	public $cObj;

	/**
	 * Generate an anchor link to be put besides a menu.
	 *
	 * @param string $content
	 * @param array $conf
	 * @return string
	 */
	function main($content, $conf) {
		return sprintf('<a class="anchor hidden" href="#c%s"><span class="glyphicon glyphicon-asterisk"></span></a>',
			$content
		);
	}
}
?>