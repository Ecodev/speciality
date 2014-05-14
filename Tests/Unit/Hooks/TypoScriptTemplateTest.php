<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 kontakt@gebruederheitz.de
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
 * Test case for class TYPO3\CMS\Speciality\Hooks\TypoScriptTemplate.
 *
 * @author Fabien Udriot <fabien.udriot@ecodev.ch>
 * @package TYPO3
 */
class TypoScriptTemplateTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 * @var \TYPO3\CMS\Speciality\Hooks\TypoScriptTemplate
	 */
	private $fixture;

	public function setUp() {
		$this->fixture = new TYPO3\CMS\Speciality\Hooks\TypoScriptTemplate();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function theStaticTemplatesAreEmptyByDefault() {
		$this->assertEmpty($this->fixture->getStaticTemplates());
	}

	/**
	 * @test
	 */
	public function isRegisterReturnsFalseForANotRegisteredRandomValue() {
		$this->assertFalse($this->fixture->isRegistered(uniqid()));
	}

	/**
	 * @test
	 */
	public function addARandomValueAsStaticTemplateAndCheckItExistsInStaticTemplates() {
		$expected = uniqid();
		$this->fixture->addStaticTemplate($expected);
		$this->assertSame(array($expected), $this->fixture->getStaticTemplates());
	}

	/**
	 * @test
	 */
	public function addMultipleValuesAsStaticTemplateAndCheckItExistsInStaticTemplates() {
		$expected = array(
			uniqid(),
			uniqid(),
		);
		$this->fixture->addStaticTemplates($expected);
		$this->assertSame($expected, $this->fixture->getStaticTemplates());
	}

}
?>