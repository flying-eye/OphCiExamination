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

/**
 * This is the model class for table "et_ophciexamination_posteriorsegment".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $eye_id
 * @property string $left_eyedraw
 * @property string $left_description
 * @property string $left_cd_ratio_id
 * @property string $right_eyedraw
 * @property string $right_description
 * @property string $right_cd_ratio_id
 *
 * The followings are the available model relations:
 */

class Element_OphCiExamination_PosteriorSegment extends SplitEventTypeElement {
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'et_ophciexamination_posteriorsegment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('event_id, left_description, left_cd_ratio_id, right_description, right_cd_ratio_id, eye_id, left_eyedraw, left_description, right_eyedraw, right_description', 'safe'),
				array('left_eyedraw, left_description', 'requiredIfSide', 'side' => 'left'),
				array('right_eyedraw, right_description', 'requiredIfSide', 'side' => 'right'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, event_id, left_eyedraw, right_eyedraw, left_description, left_cd_ratio_id, right_description, right_cd_ratio_id, eye_id', 'safe', 'on' => 'search'),
		);
	}

	public function sidedFields() {
		return array('description', 'cd_ratio_id', 'eyedraw', 'description');
	}
	
	public function sidedDefaults() {
		return array('cd_ratio_id' => 5);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
				'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
				'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
				'eye' => array(self::BELONGS_TO, 'Eye', 'eye_id'),
				'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
				'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
				'left_cd_ratio' => array(self::BELONGS_TO, 'OphCiExamination_PosteriorSegment_CDRatio', 'left_cd_ratio_id'),
				'right_cd_ratio' => array(self::BELONGS_TO, 'OphCiExamination_PosteriorSegment_CDRatio', 'right_cd_ratio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'event_id' => 'Event',
				'left_eyedraw' => 'Eyedraw',
				'left_description' => 'Description',
				'left_cd_ratio_id' => 'C/D Ratio',
				'right_eyedraw' => 'Eyedraw',
				'right_description' => 'Description',
				'right_cd_ratio_id' => 'C/D Ratio',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);

		$criteria->compare('left_eyedraw', $this->left_eyedraw);
		$criteria->compare('left_description', $this->left_description);
		$criteria->compare('left_cd_ratio_id', $this->left_cd_ratio_id);
		$criteria->compare('right_eyedraw', $this->right_eyedraw);
		$criteria->compare('right_description', $this->right_description);
		$criteria->compare('right_cd_ratio_id', $this->right_cd_ratio_id);

		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
		));
	}

	protected function beforeSave() {
		return parent::beforeSave();
	}

	protected function afterSave() {
		return parent::afterSave();
	}

	protected function beforeValidate() {
		return parent::beforeValidate();
	}

	public function getLetter_string() {
		return "Posterior segment:\nright: ".$this->right_description."\nleft: ".$this->left_description."\n";
	}
}
