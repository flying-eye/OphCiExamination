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

<?php
$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
		'doodleToolBarArray' => array(
			array('HardDrusen', 'Geographic', 'CNV', 'RPEDetachment', 'EpiretinalMembrane', 'MacularHole', 'MacularDystrophy', 'Macroaneurysm', 'RetinalVeinOcclusionPostPole', 'RetinalArteryOcclusionPostPole'),
			array('Microaneurysm', 'BlotHaemorrhage', 'HardExudate', 'IRMA', 'Circinate', 'MacularThickening', 'CystoidMacularOedema', 'PreRetinalHaemorrhage', 'CottonWoolSpot', 'DiabeticNV', 'VitreousOpacity', 'FibrousProliferation', 'TractionRetinalDetachment'),
			array('SwollenDisc', 'Telangiectasis', 'ChoroidalHaemorrhage', 'ChoroidalNaevus'),
			array('LaserSpot', 'FocalLaser', 'MacularGrid', 'SectorPRPPostPole', 'PRPPostPole'),
			// This is only required for 1.6
			// See OE-3216 and OE-3748 and
			//array('RRD','UTear','RoundHole','Dialysis','GRT','MacularHole','StarFold','AntPVR','Lattice','Cryo','LaserCircle','Buckle','Retinoschisis','OuterLeafBreak','InnerLeafBreak'),
		),
		'onReadyCommandArray' => array(
			array('addDoodle', array('PostPole')),
			array('deselectDoodles', array()),
		),
		'listenerArray' => array('posteriorListener'),
		'idSuffix' => $side.'_'.$element->elementType->id,
		'side' => ($side == 'right') ? 'R' : 'L',
		'mode' => 'edit',
		'model' => $element,
		'attribute' => $side.'_eyedraw',
	));
?>
