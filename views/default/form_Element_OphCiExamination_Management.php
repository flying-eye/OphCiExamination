<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<div id="div_<?php echo get_class($element)?>_laser"
	class="eventDetail">
	<div class="label">
		<?php echo $element->getAttributeLabel('laser_id') ?>:
	</div>
	<div class="data">
		<?php 
		$html_options = array('empty'=>'- Please select -', 'options' => array());
		foreach (OphCiExamination_Management_Laser::model()->findAll(array('order'=>'display_order')) as $opt) {
			$html_options['options'][(string)$opt->id] = array('data-deferred' => $opt->deferred);
		}
		echo CHtml::activeDropDownList($element,'laser_id', CHtml::listData(OphCiExamination_Management_Laser::model()->findAll(array('order'=>'display_order')),'id','name'), $html_options)?> 
	</div>
</div>
<div id="div_<?php echo get_class($element)?>_laserdeferral_reason"
	class="eventDetail" 
	<?php if (!($element->laser && $element->laser->deferred)) { ?>
	style="display: none;"
	<?php }?>
	>
	<div class="label">
		<?php echo $element->getAttributeLabel('laserdeferral_reason_id')?>:
	</div>
	<div class="data">
		<?php 
		$html_options = array('empty'=>'- Please select -', 'options' => array());
		foreach (OphCiExamination_Management_LaserDeferral::model()->findAll(array('order'=>'display_order')) as $opt) {
			$html_options['options'][(string)$opt->id] = array('data-other' => $opt->other);
		}
		echo CHtml::activeDropDownList($element,'laserdeferral_reason_id', CHtml::listData(OphCiExamination_Management_LaserDeferral::model()->findAll(array('order'=>'display_order')),'id','name'), $html_options)?>
	</div>
</div>
<div id="div_<?php echo get_class($element)?>_laserdeferral_reason_other"
	class="eventDetail"
	<?php if (!($element->laserdeferral_reason && $element->laserdeferral_reason->other)) { ?>
		style="display: none;"
	<?php } ?>
	>
		<div class="label">
			&nbsp;
		</div>
		<div class="data">
			<?php echo $form->textArea($element, 'laserdeferral_reason_other', array('rows' => "3", 'cols' => "80", 'class' => 'autosize', 'nowrapper' => true) ) ?>
		</div>
	</div>
<div id="div_<?php echo get_class($element)?>_comments"
	class="eventDetail">
	<div class="label">
		<?php echo $element->getAttributeLabel('comments')?>:
	</div>
	<div class="data">
		<?php echo $form->textArea($element, 'comments', array('rows' => "3", 'cols' => "80", 'class' => 'autosize', 'nowrapper'=>true)) ?>
	</div>
</div>
