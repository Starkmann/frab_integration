<?php

namespace Eike\FrabIntegration\Domain\Repository;

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

use TYPO3\CMS\Core\Charset\CharsetConverter;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FrabRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var \TYPO3\CMS\Core\Charset\CharsetConverter
     *
     */
    protected $charsetConverter;

    /**
     * @param CharsetConverter $charsetConverter
     */
    public function injectCharsetConverter(CharsetConverter $charsetConverter)
    {
        $this->charsetConverter = $charsetConverter;
    }

    /**
     * @param string $uri
     * @param string|null $useragent
     * @param string|null $accept
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     * @throws \Exception
     */
    public function findConference(string $uri, string $useragent = null , string $accept = null)
    {
        $result = $this->query($uri, $useragent, $accept);
        $result = json_decode($result, true);

        /* @var $confercences \TYPO3\CMS\Extbase\Persistence\ObjectStorage  */
        $confercences = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');

        /* @var $confercence \Eike\FrabIntegration\Domain\Model\Conference  */
        $confercence = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Conference');
        $confercence->setTitle($result['schedule']['conference']['title']);
        $confercence->setStart(new \DateTime($result['schedule']['conference']['start']));
        $confercence->setEnd(new \DateTime($result['schedule']['conference']['end']));
        $confercence->setDaysCount($result['schedule']['conference']['daysCount']);
        $confercence->setTimeslotDuration(new \DateTime($result['schedule']['conference']['timeslot_duration']));

        if (count($result['schedule']['conference']['days'])>0) {
            //Days
            foreach ($result['schedule']['conference']['days'] as $resultDay) {
                /* @var $day \Eike\FrabIntegration\Domain\Model\Day  */
                $day = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Day');
                $day->setDate(new \DateTime($resultDay['date']));
                $day->setDayEnd(new \DateTime($resultDay['day_end']));
                $day->setDayStart(new \DateTime($resultDay['day_start']));
                $day->setIndex($resultDay['index']);
                //Rooms
                if (count($resultDay['rooms'])>0) {
                    foreach ($resultDay['rooms'] as $key=>$events) {
                        /* @var $room \Eike\FrabIntegration\Domain\Model\Room  */
                        $room = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Room');
                        $room->setName($key);

                        //Events
                        if (count($events)>0) {
                            foreach ($events as $resultEvent) {
                                /* @var $event \Eike\FrabIntegration\Domain\Model\Event  */
                                $event = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Event');
                                $event->setTitle($resultEvent['title']);
                                $event->setRoom($resultEvent['room']);
                                $event->setGuid($resultEvent['guid']);
                                $event->setAbstract($resultEvent['abstract']);
                                $event->setDate(new \DateTime($resultEvent['date']));
                                $event->setDescription($resultEvent['description']);
                                $event->setAbstract($resultEvent['abstract']);
                                $event->setDuration(new \DateTime($resultEvent['duration']));
                                $event->setLanguage($resultEvent['language']);
                                $event->setLinks($resultEvent['links']);
                                $event->setStart(new \DateTime($resultEvent['start']));
                                $event->setSubtitle($resultEvent['subtitle']);
                                $event->setTrack($resultEvent['track']);
                                $event->setType($resultEvent['type']);
                                $event->setDay($resultDay);
                                $room->addEvent($event);
                            }
                        }
                        $day->addRoom($room);
                    }
                }

                $confercence->addDay($day);
            }
        }

        $confercences->attach($confercence);

        return $confercences;
    }

    /**
     * @param string $uri
     * @param string|null $useragent
     * @param string|null $accept
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     * @throws \Exception
     */
    public function findEvents(string $uri, string $useragent = null, string $accept = null)
    {
        $result = $this->query($uri, $useragent, $accept);
        $result = json_decode($result, true);

        if (count($result['schedule']['conference']['days'])>0) {
            /* @var $eventStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage  */
            $eventStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');

            //Days
            foreach ($result['schedule']['conference']['days'] as $resultDay) {
                //Rooms
                if (count($resultDay['rooms'])>0) {
                    foreach ($resultDay['rooms'] as $key=>$events) {
                        /* @var $room \Eike\FrabIntegration\Domain\Model\Room  */
                        $room = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Room');
                        $room->setName($key);

                        //Events
                        if (count($events)>0) {
                            foreach ($events as $resultEvent) {
                                /* @var $event \Eike\FrabIntegration\Domain\Model\Event  */
                                $event = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Event');
                                $event->setTitle($resultEvent['title']);
                                $event->setRoom($room);
                                $event->setGuid($resultEvent['guid']);
                                $eventStorage->attach($event);
                            }
                        }
                    }
                }
            }
        }

        return $eventStorage;
    }

    /**
     * @param string $uri
     * @param string $eventGuid
     * @param string|null $useragent
     * @param string|null $accept
     * @return \Eike\FrabIntegration\Domain\Model\Event|null
     * @throws \Exception
     */
    public function findEvent(string $uri, string $eventGuid, string $useragent = null ,string $accept = null)
    {
        $result = $this->query($uri, $useragent, $accept);
        $result = json_decode($result, true);

        if (count($result['schedule']['conference']['days'])>0) {
            //Days
            foreach ($result['schedule']['conference']['days'] as $resultDay) {
                /* @var $day \\Eike\FrabIntegration\Domain\Model\Day  */
                $day = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Day');
                $day->setDate(new \DateTime($resultDay['date']));
                $day->setDayEnd(new \DateTime($resultDay['day_end']));
                $day->setDayStart(new \DateTime($resultDay['day_start']));
                $day->setIndex($resultDay['index']);
                //Rooms
                if (count($resultDay['rooms'])>0) {
                    foreach ($resultDay['rooms'] as $key=>$events) {
                        /* @var $room \\Eike\FrabIntegration\Domain\Model\Room  */
                        $room = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Room');
                        $room->setName($key);

                        //Events
                        if (count($events)>0) {
                            foreach ($events as $resultEvent) {
                                if ($resultEvent['guid']==$eventGuid) {
                                    /* @var $event \Eike\FrabIntegration\Domain\Model\Event  */
                                    $event = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Event');
                                    $event->setTitle($resultEvent['title']);
                                    $event->setRoom($resultEvent['room']);
                                    $event->setGuid($resultEvent['guid']);
                                    $event->setAbstract($resultEvent['abstract']);
                                    $event->setDate(new \DateTime($resultEvent['date']));
                                    $event->setDescription($resultEvent['description']);
                                    $event->setAbstract($resultEvent['abstract']);
                                    $event->setDuration(new \DateTime($resultEvent['duration']));
                                    $event->setLanguage($resultEvent['language']);
                                    $event->setLinks($resultEvent['links']);
                                    $event->setStart(new \DateTime($resultEvent['start']));
                                    $event->setSubtitle($resultEvent['subtitle']);
                                    $event->setTrack($resultEvent['track']);
                                    $event->setType($resultEvent['type']);
                                    if (count($resultEvent['persons'])>0) {
                                        foreach ($resultEvent['persons'] as $resultPerson) {
                                            $event->addPerson($this->buildPerson($resultPerson));
                                        }
                                    }
                                    return $event;
                                }
                            }
                        }
                    }
                }
            }
        }
        return null;
    }

    /**
     * @param string $uri
     * @param string|null $useragent
     * @param string|null $accept
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     * @throws \Exception
     */
    public function findPersons(string $uri, string $useragent = null, string $accept = null)
    {
        $result = $this->query($uri, $useragent, $accept);
        $result = json_decode($result, true);
        if (count($result['schedule_speakers']['speakers'])>0) {
            /* @var $personStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage  */
            $personStorage = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
            foreach ($result['schedule_speakers']['speakers'] as $resultPerson) {
                $personStorage->attach($this->buildPerson($resultPerson));
            }
        }
        return $personStorage;
    }

    /**
     * @param string $uri
     * @param string $personId
     * @param string|null $useragent
     * @param string|null $accept
     * @return \Eike\FrabIntegration\Domain\Model\Person|void
     * @throws \Exception
     */
    public function findPerson(string $uri, string $personId, string $useragent = null, string $accept = null)
    {
        $result = $this->query($uri, $useragent, $accept);
        $result = json_decode($result, true);
        if (count($result['schedule_speakers']['speakers'])>0) {
            foreach ($result['schedule_speakers']['speakers'] as $resultPerson) {
                if ($resultPerson['id']==$personId) {
                    return $this->buildPerson($resultPerson);
                }
            }
        }
    }

    /**
     * @param int $index
     * @param string $uri
     * @param string|null $useragent
     * @param string|null $accept
     * @return \Eike\FrabIntegration\Domain\Model\Day
     * @throws \Exception
     */
    public function findDayByIndex(int $index, string $uri, string $useragent = null, string $accept = null)
    {
        $result = $this->query($uri, $useragent, $accept);
        $result = json_decode($result, true);
        if (count($result['schedule']['conference']['days'])>0) {
            //Days
            foreach ($result['schedule']['conference']['days'] as $resultDay) {
                if ($resultDay['index']==$index) {
                    /* @var $day \Eike\FrabIntegration\Domain\Model\Day  */
                    $day = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Day');
                    $day->setDate(new \DateTime($resultDay['date']));
                    $day->setDayEnd(new \DateTime($resultDay['day_end']));
                    $day->setDayStart(new \DateTime($resultDay['day_start']));
                    $day->setIndex($resultDay['index']);
                }
            }
        }
        return $day;
    }

    /**
     * @param array $resultPerson
     * @return \Eike\FrabIntegration\Domain\Model\Person
     */
    protected function buildPerson(array $resultPerson)
    {
        /* @var $person \Eike\FrabIntegration\Domain\Model\Person  */
        $person = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Person');
        //@TODO This is a fix because the name might differ on json you come from (full_public_name or public_name)
        if ($resultPerson['full_public_name']) {
            $person->setFullPublicName($resultPerson['full_public_name']);
        } elseif ($resultPerson['public_name']) {
            $person->setFullPublicName($resultPerson['public_name']);
        }
        $person->setId($resultPerson['id']);
        $person->setAbstract($resultPerson['abstract']);
        $person->setDescription($resultPerson['description']);
        $person->setImage($resultPerson['image']);
        if (count($resultPerson['events'])>0) {
            foreach ($resultPerson['events'] as $resultEvent) {
                /* @var $event \Eike\FrabIntegration\Domain\Model\Event  */
                $event = $this->objectManager->get('Eike\FrabIntegration\Domain\Model\Event');
                $event->setTitle($resultEvent['title']);
                $event->setType($resultEvent['type']);
                $event->setGuid($resultEvent['guid']);
                $person->addEvent($event);
            }
        }
        return $person;
    }

    /**
     * @param string $uri
     * @param string|null $useragent
     * @param string|null $accept
     * @return false|mixed|string
     * @throws \Exception
     */
    protected function query(string $uri, string $useragent = null, string $accept = null)
    {

        // Check if the json's URI is defined
        if (empty($uri)) {
            $message = 'Url not well defined.';
            throw new \Exception($message, 1299257883);
        }
        $report = [];
        // Define the headers
        $headers = false;
        if (isset($useragent)) {
            $headers = ['User-Agent: ' . $useragent];
        }
        if (isset($accept)) {
            if (is_array($headers)) {
                $headers[] = 'Accept: ' . $accept;
            } else {
                $headers = ['Accept: ' . $accept];
            }
        }

        $data = GeneralUtility::getUrl($uri, 0, $headers, $report);
        if (!empty($report['message'])) {
            $message = sprintf(
                        'Json not fetched form %s with message %s',
                        $uri,
                        $report['message']
                );
            throw new \Exception($message, 1299257894);
        }

        // Return the result
        return $data;
    }


}
