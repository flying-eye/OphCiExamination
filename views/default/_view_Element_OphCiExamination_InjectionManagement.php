<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<div class="sub-element-data row">
	<div class="row data-row">
		<div class="large-4 column">
			<div class="data-label">
				<?php echo $element->getAttributeLabel('injection_status_id')?>:
			</div>
		</div>
		<div class="large-8 column">
			<div class="data-value">
				<?php echo $element->injection_status?>
			</div>
		</div>
	</div>
	<?php if ($element->injection_status && $element->injection_status->deferred) {?>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label">
					<?php echo $element->getAttributeLabel('injection_deferralreason_id')?>:
				</div>
			</div>
			<div class="large-8 column">
				<div class="data-value">
					<?= Yii::app()->format->Ntext($element->getInjectionDeferralReason()) ?>
				</div>
			</div>
		</div>
	<?php }?>
</div>
