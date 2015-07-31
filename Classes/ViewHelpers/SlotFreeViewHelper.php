<?php


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Eike Starkmann
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
 *
 * @author Eike Starkmann
 */
class Tx_FrabIntegration_ViewHelpers_SlotFreeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage<Tx_FrabIntegration_Domain_Model_Event> $events
	 * @params \DateTime $timeslot
	 * return \boolean
	 */
	public function render(\Tx_Extbase_Persistence_ObjectStorage $events, \DateTime $timeslot) {
		$localEvents = clone $events;
		foreach($localEvents as $event){
			if($event->getStart()->format('H:i') == $timeslot->format('H:i')){
				return false;
			}
			if($event->getStart()->format('H:i') < $timeslot->format('H:i') && $event->getEnd()->format('H:i') > $timeslot->format('H:i')){
				return false;
			}
		}
		return true;
		
		
	}

}