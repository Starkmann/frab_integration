<?php

namespace Eike\FrabIntegration\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

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
class RowspanViewHelper extends AbstractViewHelper {

	/**
	 * @param \DateTime $duratrion
	 * return \string
	 */
	public function render(\DateTime $duration) {
		$localDuration = clone $duration;
		$hours = $localDuration->format(H);
		$minutes = $localDuration->format(i);
		return ($hours*60+$minutes)/15;
	}

}