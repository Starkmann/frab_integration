<?php

namespace Eike\FrabIntegration\Tests\Unit\Domain\Model;

use \Eike\FrabIntegration\Domain\Model\Day;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Eike Starkmann <eikestarkmann@web.de>
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
 * Test case for class Eike\FrabIntegration\Domain\Model\Conference.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Eike Starkmann <eikestarkmann@web.de>
 */
class ConferenceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var Eike\FrabIntegration\Domain\Model\Conference
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new Eike\FrabIntegration\Domain\Model\Conference();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getStart()
		);
	}

	/**
	 * @test
	 */
	public function setStartForDateTimeSetsStart() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setStart($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'start',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEndReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getEnd()
		);
	}

	/**
	 * @test
	 */
	public function setEndForDateTimeSetsEnd() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setEnd($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'end',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDaysCountReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getDaysCount()
		);
	}

	/**
	 * @test
	 */
	public function setDaysCountForIntegerSetsDaysCount() {
		$this->subject->setDaysCount(12);

		$this->assertAttributeEquals(
			12,
			'daysCount',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTimeslotDurationReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getTimeslotDuration()
		);
	}

	/**
	 * @test
	 */
	public function setTimeslotDurationForIntegerSetsTimeslotDuration() {
		$this->subject->setTimeslotDuration(12);

		$this->assertAttributeEquals(
			12,
			'timeslotDuration',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDaysReturnsInitialValueForDay() {
		$newObjectStorage = new \\TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDays()
		);
	}

	/**
	 * @test
	 */
	public function setDaysForObjectStorageContainingDaySetsDays() {
		$day = new Day();
		$objectStorageHoldingExactlyOneDays = new \\TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDays->attach($day);
		$this->subject->setDays($objectStorageHoldingExactlyOneDays);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDays,
			'days',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDayToObjectStorageHoldingDays() {
		$day = new Day();
		$daysObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$daysObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($day));
		$this->inject($this->subject, 'days', $daysObjectStorageMock);

		$this->subject->addDay($day);
	}

	/**
	 * @test
	 */
	public function removeDayFromObjectStorageHoldingDays() {
		$day = new Day();
		$daysObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$daysObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($day));
		$this->inject($this->subject, 'days', $daysObjectStorageMock);

		$this->subject->removeDay($day);

	}
}
