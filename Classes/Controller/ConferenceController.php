<?php
namespace Eike\FrabIntegration\Controller;

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
 * ConferenceController
 */
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use Eike\FrabIntegration\Domain\Model\Conference;
use Eike\FrabIntegration\Domain\Model\Day;
use Eike\FrabIntegration\Domain\Model\Event;
use Eike\FrabIntegration\Domain\Model\Room;
use Eike\FrabIntegration\Domain\Repository\FrabRepository;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ConferenceController extends ActionController
{

    /**
     * @var FrabRepository
     */
    protected $frabRepository;

    public function injectFrabRepository(FrabRepository $frabRepository)
    {
        $this->frabRepository = $frabRepository;
    }

    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        $conferences = $this->frabRepository->findConference(
                $this->settings['conferenceParameters']['frabUri'],
                $this->settings['conferenceParameters']['conference'],
                $this->settings['conferenceParameters']['userAgent'],
                $this->settings['conferenceParameters']['accept']
                );

        $this->view->assign('conferences', $conferences);
        return $this->htmlResponse();
    }

    /**
     * @param int $currentDay
     * @throws \Exception
     */
    public function sheduleAction(int $currentDay = 1): ResponseInterface
    {
        $conferences = $this->frabRepository->findConference(
                $this->settings['conferenceParameters']['frabUri'],
                $this->settings['conferenceParameters']['userAgent'],
                $this->settings['conferenceParameters']['accept']
        );
        $day = $this->frabRepository->findDayByIndex(
                $currentDay,
                $this->settings['conferenceParameters']['frabUri'],
                $this->settings['conferenceParameters']['userAgent'],
                $this->settings['conferenceParameters']['accept']
        );

        $timeline = $this->generateTimeline($day->getDayStart(), $day->getDayEnd(), 15);

        $table = [];
        foreach($conferences as $conference){
            /** @var $conference Conference*/
            foreach ($conference->getDays() as $day){
                /** @var $day Day */
                if($day->getIndex() == $currentDay){
                    foreach ($timeline as $timeslot){
                        foreach ($day->getRooms() as $room){
                            $eventFoundForRoom = false;
                            /** @var $room Room */
                            if($room->getEvents()->count()>0) {
                                /** @var $event Event*/
                                foreach ($room->getEvents() as $event) {
                                    if($event->getStart()->format('H:i') <= $timeslot->format('H:i')
                                        && $event->getEnd()->format('H:i') >= $timeslot->format('H:i')
                                    ){
                                        $table[$timeslot->format('H:i')][] = $event;
                                        $eventFoundForRoom = true;
                                    }
                                }
                                if($eventFoundForRoom == false){
                                    $table[$timeslot->format('H:i')][] = '';
                                }
                            }
                        }
                    }

                }
            }
        }
        $this->view->assign('conferences', $conferences);
        $this->view->assign('currentDay', $currentDay);
        $this->view->assign('table', $table);
        $this->view->assign('timeline', $timeline);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param Conference $conference
     */
    public function showAction(Conference $conference): ResponseInterface
    {
        $this->view->assign('conference', $conference);
        return $this->htmlResponse();
    }

    /**
     * @param \DateTime $begin
     * @param \DateTime $end
     * @param int $step
     * @return array
     * @throws \Exception
     */
    protected function generateTimeline(\DateTime $begin, \DateTime $end, int $step)
    {
        $timeSolts = [];
        $timeSolts[] = $begin;
        $currentTime = clone $begin;

        while ($currentTime<$end) {
            $currentTime->add(new \DateInterval('PT' . $step . 'M'));
            $timeSolts[] = clone $currentTime;
        }
        return $timeSolts;
    }
}
