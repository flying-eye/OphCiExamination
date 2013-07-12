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
<?php $this->header(); ?>

<h3 class="withEventIcon">
	<?php echo $this->event_type->name ?>
</h3>

<div id="event_<?php echo $this->module->name?>">
	<?php
		$form = $this->beginWidget('BaseEventTypeCActiveForm', array(
				'id' => 'clinical-create',
				'enableAjaxValidation' => false,
				'htmlOptions' => array('class' => 'sliding'),
		));

		// Event actions
		$this->event_actions[] = EventAction::button('Save', 'save', array('colour' => 'green'));
		$this->renderPartial('//patient/event_actions');
	?>

	<div id="elements" class="form">
		<?php $this->displayErrors($errors)?>
		<div id="active_elements">
			<?php $this->renderDefaultElements($this->action->id, $form); ?>
		</div>
		<div class="optionals-header clearfix">
			<h4>Optional Elements</h4>
			<div>
				<span class="allButton"><a class="add-all" href="#">Add all</a><img
					src="<?php echo Yii::app()->createUrl('img/_elements/icons/event-optional/element-added.png')?>"
					alt="extra-element_added" width="30" height="20" /></span>
				<span class="allButton"><a class="remove-all" href="#">Remove all</a><img
					src="<?php echo Yii::app()->createUrl('img/_elements/icons/event-optional/element-remove.png')?>"
					alt="extra-element_remove" width="30" height="20" /></span>
			</div>
		</div>
		<div id="inactive_elements">
			<?php $this->renderOptionalElements($this->action->id, $form); ?>
		</div>
	</div>

	<?php $this->displayErrors($errors)?>

	<div class="cleartall"></div>
	<?php $this->endWidget(); ?>
</div>

<?php $this->footer() ?>
