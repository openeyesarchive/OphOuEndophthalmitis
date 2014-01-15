<?php 
class m130404_084614_event_type_OphOuEndophthalmitis extends CDbMigration
{
	public function up() {

		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphOuEndophthalmitis'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Outcomes'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphOuEndophthalmitis', 'name' => 'Endophthalmitis','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphOuEndophthalmitis'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Diagnosis',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Diagnosis','class_name' => 'Element_OphOuEndophthalmitis_Diagnosis', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Diagnosis'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Treatment',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Treatment','class_name' => 'Element_OphOuEndophthalmitis_Treatment', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Treatment'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Notification',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Notification','class_name' => 'Element_OphOuEndophthalmitis_Notification', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Notification'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Outcome',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Outcome','class_name' => 'Element_OphOuEndophthalmitis_Outcome', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Outcome'))->queryRow();

		// element lookup table ophouendophthalmitis_diagnosis_clinical
		$this->createTable('ophouendophthalmitis_diagnosis_clinical', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophouendophthalmitis_diagnosis_clinical_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophouendophthalmitis_diagnosis_clinical_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophouendophthalmitis_diagnosis_clinical_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophouendophthalmitis_diagnosis_clinical_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('ophouendophthalmitis_diagnosis_clinical',array('name'=>'Uveitis','display_order'=>1));
		$this->insert('ophouendophthalmitis_diagnosis_clinical',array('name'=>'TASS','display_order'=>2));
		$this->insert('ophouendophthalmitis_diagnosis_clinical',array('name'=>'Infection','display_order'=>3));

		// element lookup table ophouendophthalmitis_diagnosis_culture
		$this->createTable('ophouendophthalmitis_diagnosis_culture', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophouendophthalmitis_diagnosis_culture_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophouendophthalmitis_diagnosis_culture_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophouendophthalmitis_diagnosis_culture_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophouendophthalmitis_diagnosis_culture_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('ophouendophthalmitis_diagnosis_culture',array('name'=>'Not done','display_order'=>1));
		$this->insert('ophouendophthalmitis_diagnosis_culture',array('name'=>'No growth','display_order'=>2));
		$this->insert('ophouendophthalmitis_diagnosis_culture',array('name'=>'Positive','display_order'=>3));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophouendophthalmitis_diagnosis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'clinical_id' => 'int(10) unsigned NOT NULL', // Clinical
				'culture_id' => 'int(10) unsigned NOT NULL', // Culture
				'growth' => 'varchar(50) DEFAULT \'\'', // Growth
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophouendophthalmitis_diagnosis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophouendophthalmitis_diagnosis_cui_fk` (`created_user_id`)',
				'KEY `et_ophouendophthalmitis_diagnosis_ev_fk` (`event_id`)',
				'KEY `ophouendophthalmitis_diagnosis_clinical_fk` (`clinical_id`)',
				'KEY `ophouendophthalmitis_diagnosis_culture_fk` (`culture_id`)',
				'CONSTRAINT `et_ophouendophthalmitis_diagnosis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_diagnosis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_diagnosis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophouendophthalmitis_diagnosis_clinical_fk` FOREIGN KEY (`clinical_id`) REFERENCES `ophouendophthalmitis_diagnosis_clinical` (`id`)',
				'CONSTRAINT `ophouendophthalmitis_diagnosis_culture_fk` FOREIGN KEY (`culture_id`) REFERENCES `ophouendophthalmitis_diagnosis_culture` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		// element lookup table et_ophouendophthalmitis_treatment_site
		$this->createTable('et_ophouendophthalmitis_treatment_site', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophouendophthalmitis_treatment_site_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophouendophthalmitis_treatment_site_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophouendophthalmitis_treatment_site_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_treatment_site_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('et_ophouendophthalmitis_treatment_site',array('name'=>'Outpatient','display_order'=>1));
		$this->insert('et_ophouendophthalmitis_treatment_site',array('name'=>'Inpatient (Local)','display_order'=>2));
		$this->insert('et_ophouendophthalmitis_treatment_site',array('name'=>'Inpatient (Other)','display_order'=>3));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophouendophthalmitis_treatment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'site_id' => 'int(10) unsigned NOT NULL', // Site
				'biopsy' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Biopsy
				'intraocular_antiobiotics' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Intraocular antiobiotics
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophouendophthalmitis_treatment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophouendophthalmitis_treatment_cui_fk` (`created_user_id`)',
				'KEY `et_ophouendophthalmitis_treatment_ev_fk` (`event_id`)',
				'KEY `et_ophouendophthalmitis_treatment_site_fk` (`site_id`)',
				'CONSTRAINT `et_ophouendophthalmitis_treatment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_treatment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_treatment_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_treatment_site_fk` FOREIGN KEY (`site_id`) REFERENCES `et_ophouendophthalmitis_treatment_site` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophouendophthalmitis_notificatio', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medical_director_informed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Medical Director Informed
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophouendophthalmitis_notificatio_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophouendophthalmitis_notificatio_cui_fk` (`created_user_id`)',
				'KEY `et_ophouendophthalmitis_notificatio_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophouendophthalmitis_notificatio_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_notificatio_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_notificatio_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		// element lookup table ophouendophthalmitis_outcome_visual_acuity
		$this->createTable('ophouendophthalmitis_outcome_visual_acuity', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophouendophthalmitis_outcome_visual_acuity_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophouendophthalmitis_outcome_visual_acuity_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophouendophthalmitis_outcome_visual_acuity_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophouendophthalmitis_outcome_visual_acuity_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/5','display_order'=>1));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/6','display_order'=>2));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/9','display_order'=>3));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/12','display_order'=>4));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/18','display_order'=>5));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/24','display_order'=>6));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/36','display_order'=>7));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'6/60','display_order'=>8));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'CF','display_order'=>9));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'HM','display_order'=>10));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'PL','display_order'=>11));
		$this->insert('ophouendophthalmitis_outcome_visual_acuity',array('name'=>'NPL','display_order'=>12));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophouendophthalmitis_outcome', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'visual_acuity_id' => 'int(10) unsigned NOT NULL', // Visual acuity
				'phthisis' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Phthisis
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophouendophthalmitis_outcome_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophouendophthalmitis_outcome_cui_fk` (`created_user_id`)',
				'KEY `et_ophouendophthalmitis_outcome_ev_fk` (`event_id`)',
				'KEY `ophouendophthalmitis_outcome_visual_acuity_fk` (`visual_acuity_id`)',
				'CONSTRAINT `et_ophouendophthalmitis_outcome_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_outcome_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophouendophthalmitis_outcome_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophouendophthalmitis_outcome_visual_acuity_fk` FOREIGN KEY (`visual_acuity_id`) REFERENCES `ophouendophthalmitis_outcome_visual_acuity` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

	}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophouendophthalmitis_diagnosis');


		$this->dropTable('ophouendophthalmitis_diagnosis_clinical');
		$this->dropTable('ophouendophthalmitis_diagnosis_culture');

		$this->dropTable('et_ophouendophthalmitis_treatment');


		$this->dropTable('et_ophouendophthalmitis_treatment_site');

		$this->dropTable('et_ophouendophthalmitis_notificatio');



		$this->dropTable('et_ophouendophthalmitis_outcome');


		$this->dropTable('ophouendophthalmitis_outcome_visual_acuity');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphOuEndophthalmitis'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphOuEndophthalmitis does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
?>
