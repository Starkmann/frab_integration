<?php
namespace Eike\FrabIntegration\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Eike\FrabIntegration\Domain\Repository\FrabRepository;
use Psr\Http\Message\ResponseInterface;
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
 * EventController
 */
class EventController extends ActionController
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
        $events = $this->frabRepository->findEvents(
                $this->settings['conferenceParameters']['frabUri'],
                $this->settings['conferenceParameters']['userAgent'],
                $this->settings['conferenceParameters']['accept']
                );
        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }

    /**
     * @param string $eventGuid
     * @throws \Exception
     */
    public function showAction(string $eventGuid): ResponseInterface
    {
        $event = $this->frabRepository->findEvent(
                $this->settings['conferenceParameters']['frabUri'],
                $eventGuid,
                $this->settings['conferenceParameters']['userAgent'],
                $this->settings['conferenceParameters']['accept']
                );
        //debug($event);
        $this->view->assign('event', $event);
        return $this->htmlResponse();
    }
}
