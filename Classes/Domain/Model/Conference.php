<?php
namespace Eike\FrabIntegration\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Eike Starkmann <eikestarkmann@web.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Conference
 */
class Conference extends AbstractValueObject
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * start
     *
     * @var \DateTime
     */
    protected $start = null;

    /**
     * end
     *
     * @var \DateTime
     */
    protected $end = null;

    /**
     * daysCount
     *
     * @var int
     */
    protected $daysCount = 0;

    /**
     * timeslotDuration
     *
     * @var \DateTime
     */
    protected $timeslotDuration = 0;

    /**
     * days
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Day>
     * @cascade remove
     */
    protected $days = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     */
    protected function initStorageObjects()
    {
        $this->days = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the start
     *
     * @return \DateTime $start
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Sets the start
     *
     * @param \DateTime $start
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;
    }

    /**
     * Returns the end
     *
     * @return \DateTime $end
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Sets the end
     *
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end)
    {
        $this->end = $end;
    }

    /**
     * Returns the daysCount
     *
     * @return int $daysCount
     */
    public function getDaysCount()
    {
        return $this->daysCount;
    }

    /**
     * Sets the daysCount
     *
     * @param int $daysCount
     */
    public function setDaysCount($daysCount)
    {
        $this->daysCount = $daysCount;
    }

    /**
     * Returns the timeslotDuration
     *
     * @return \DateTime $timeslotDuration
     */
    public function getTimeslotDuration()
    {
        return $this->timeslotDuration;
    }

    /**
     * Sets the timeslotDuration
     *
     * @param \DateTime $timeslotDuration
     */
    public function setTimeslotDuration(\DateTime $timeslotDuration)
    {
        $this->timeslotDuration = $timeslotDuration;
    }

    /**
     * Adds a Day
     *
     * @param \Eike\FrabIntegration\Domain\Model\Day $day
     */
    public function addDay(\Eike\FrabIntegration\Domain\Model\Day $day)
    {
        $this->days->attach($day);
    }

    /**
     * Removes a Day
     *
     * @param \Eike\FrabIntegration\Domain\Model\Day $dayToRemove The Day to be removed
     */
    public function removeDay(\Eike\FrabIntegration\Domain\Model\Day $dayToRemove)
    {
        $this->days->detach($dayToRemove);
    }

    /**
     * Returns the days
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Day> $days
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Sets the days
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Eike\FrabIntegration\Domain\Model\Day> $days
     */
    public function setDays(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $days)
    {
        $this->days = $days;
    }
}
