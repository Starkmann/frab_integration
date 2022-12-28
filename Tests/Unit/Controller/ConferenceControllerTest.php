<?php
namespace Eike\FrabIntegration\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use Eike\FrabIntegration\Controller\ConferenceController;
use Eike\FrabIntegration\Tests\Unit\Controller\Eike\FrabIntegration\Domain\Model\Conference;
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
 * Test case for class Eike\FrabIntegration\Controller\ConferenceController.
 *
 * @author Eike Starkmann <eikestarkmann@web.de>
 */
class ConferenceControllerTest extends UnitTestCase
{

    /**
     * @var ConferenceController
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = $this->getMock('Eike\\FrabIntegration\\Controller\\ConferenceController', ['redirect', 'forward', 'addFlashMessage'], [], '', false);
    }

    protected function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function listActionFetchesAllConferencesFromRepositoryAndAssignsThemToView()
    {
        $allConferences = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', [], [], '', false);

        $conferenceRepository = $this->getMock('', ['findAll'], [], '', false);
        $conferenceRepository->expects($this->once())->method('findAll')->will($this->returnValue($allConferences));
        $this->inject($this->subject, 'conferenceRepository', $conferenceRepository);

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $view->expects($this->once())->method('assign')->with('conferences', $allConferences);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenConferenceToView()
    {
        $conference = new Conference();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('conference', $conference);

        $this->subject->showAction($conference);
    }
}
