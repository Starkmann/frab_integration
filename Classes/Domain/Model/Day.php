<?php
namespace Eike\FrabIntegration\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
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
 * Day
 */
class Day extends AbstractValueObject
{

    /**
     * index
     *
     * @var int
     */
    protected $index = 0;

    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * dayStart
     *
     * @var \DateTime
     */
    protected $dayStart = null;

    /**
     * dayEnd
     *
     * @var \DateTime
     */
    protected $dayEnd = null;

    /**
     * rooms
     *
     * @var ObjectStorage<Room>
     */
    protected $rooms = null;

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
        $this->rooms = new ObjectStorage();
    }

    /**
     * Returns the index
     *
     * @return int $index
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Sets the index
     *
     * @param int $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        setlocale(LC_TIME, 'de_DE');
        return strftime('%A, %d.%m.%Y', $this->date->getTimestamp());
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the dayStart
     *
     * @return \DateTime $dayStart
     */
    public function getDayStart()
    {
        return $this->dayStart;
    }

    /**
     * Sets the dayStart
     *
     * @param \DateTime $dayStart
     */
    public function setDayStart(\DateTime $dayStart)
    {
        $this->dayStart = $dayStart;
    }

    /**
     * Returns the dayEnd
     *
     * @return \DateTime $dayEnd
     */
    public function getDayEnd()
    {
        return $this->dayEnd;
    }

    /**
     * Sets the dayEnd
     *
     * @param \DateTime $dayEnd
     */
    public function setDayEnd(\DateTime $dayEnd)
    {
        $this->dayEnd = $dayEnd;
    }

    /**
     * Adds a Room
     *
     * @param Room $room
     */
    public function addRoom(Room $room)
    {
        $this->rooms->attach($room);
    }

    /**
     * Removes a Room
     *
     * @param Room $roomToRemove The Room to be removed
     */
    public function removeRoom(Room $roomToRemove)
    {
        $this->rooms->detach($roomToRemove);
    }

    /**
     * Returns the rooms
     *
     * @return ObjectStorage<Room> $rooms
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Sets the rooms
     *
     * @param ObjectStorage<Room> $rooms
     */
    public function setRooms(ObjectStorage $rooms)
    {
        $this->rooms = $rooms;
    }
}
