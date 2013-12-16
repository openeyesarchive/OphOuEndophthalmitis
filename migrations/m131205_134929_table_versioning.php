<?php

class m131205_134929_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophouendophthalmitis_diagnosis_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`clinical_id` int(10) unsigned NOT NULL,
	`culture_id` int(10) unsigned NOT NULL,
	`growth` varchar(50) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophouendophthalmitis_diagnosis_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophouendophthalmitis_diagnosis_cui_fk` (`created_user_id`),
	KEY `acv_et_ophouendophthalmitis_diagnosis_ev_fk` (`event_id`),
	KEY `acv_ophouendophthalmitis_diagnosis_clinical_fk` (`clinical_id`),
	KEY `acv_ophouendophthalmitis_diagnosis_culture_fk` (`culture_id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_diagnosis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_diagnosis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_diagnosis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_ophouendophthalmitis_diagnosis_clinical_fk` FOREIGN KEY (`clinical_id`) REFERENCES `ophouendophthalmitis_diagnosis_clinical` (`id`),
	CONSTRAINT `acv_ophouendophthalmitis_diagnosis_culture_fk` FOREIGN KEY (`culture_id`) REFERENCES `ophouendophthalmitis_diagnosis_culture` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophouendophthalmitis_diagnosis_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouendophthalmitis_diagnosis_version');

		$this->createIndex('et_ophouendophthalmitis_diagnosis_aid_fk','et_ophouendophthalmitis_diagnosis_version','id');
		$this->addForeignKey('et_ophouendophthalmitis_diagnosis_aid_fk','et_ophouendophthalmitis_diagnosis_version','id','et_ophouendophthalmitis_diagnosis','id');

		$this->addColumn('et_ophouendophthalmitis_diagnosis_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouendophthalmitis_diagnosis_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouendophthalmitis_diagnosis_version','version_id');
		$this->alterColumn('et_ophouendophthalmitis_diagnosis_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouendophthalmitis_notificatio_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`medical_director_informed` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophouendophthalmitis_notificatio_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophouendophthalmitis_notificatio_cui_fk` (`created_user_id`),
	KEY `acv_et_ophouendophthalmitis_notificatio_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_notificatio_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_notificatio_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_notificatio_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophouendophthalmitis_notificatio_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouendophthalmitis_notificatio_version');

		$this->createIndex('et_ophouendophthalmitis_notificatio_aid_fk','et_ophouendophthalmitis_notificatio_version','id');
		$this->addForeignKey('et_ophouendophthalmitis_notificatio_aid_fk','et_ophouendophthalmitis_notificatio_version','id','et_ophouendophthalmitis_notificatio','id');

		$this->addColumn('et_ophouendophthalmitis_notificatio_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouendophthalmitis_notificatio_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouendophthalmitis_notificatio_version','version_id');
		$this->alterColumn('et_ophouendophthalmitis_notificatio_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouendophthalmitis_outcome_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`visual_acuity_id` int(10) unsigned NOT NULL,
	`phthisis` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophouendophthalmitis_outcome_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophouendophthalmitis_outcome_cui_fk` (`created_user_id`),
	KEY `acv_et_ophouendophthalmitis_outcome_ev_fk` (`event_id`),
	KEY `acv_ophouendophthalmitis_outcome_visual_acuity_fk` (`visual_acuity_id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_outcome_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_outcome_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_outcome_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_ophouendophthalmitis_outcome_visual_acuity_fk` FOREIGN KEY (`visual_acuity_id`) REFERENCES `ophouendophthalmitis_outcome_visual_acuity` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophouendophthalmitis_outcome_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouendophthalmitis_outcome_version');

		$this->createIndex('et_ophouendophthalmitis_outcome_aid_fk','et_ophouendophthalmitis_outcome_version','id');
		$this->addForeignKey('et_ophouendophthalmitis_outcome_aid_fk','et_ophouendophthalmitis_outcome_version','id','et_ophouendophthalmitis_outcome','id');

		$this->addColumn('et_ophouendophthalmitis_outcome_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouendophthalmitis_outcome_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouendophthalmitis_outcome_version','version_id');
		$this->alterColumn('et_ophouendophthalmitis_outcome_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouendophthalmitis_treatment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`site_id` int(10) unsigned NOT NULL,
	`biopsy` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`intraocular_antiobiotics` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophouendophthalmitis_treatment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophouendophthalmitis_treatment_cui_fk` (`created_user_id`),
	KEY `acv_et_ophouendophthalmitis_treatment_ev_fk` (`event_id`),
	KEY `acv_et_ophouendophthalmitis_treatment_site_fk` (`site_id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_treatment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_treatment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_treatment_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_treatment_site_fk` FOREIGN KEY (`site_id`) REFERENCES `et_ophouendophthalmitis_treatment_site` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophouendophthalmitis_treatment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouendophthalmitis_treatment_version');

		$this->createIndex('et_ophouendophthalmitis_treatment_aid_fk','et_ophouendophthalmitis_treatment_version','id');
		$this->addForeignKey('et_ophouendophthalmitis_treatment_aid_fk','et_ophouendophthalmitis_treatment_version','id','et_ophouendophthalmitis_treatment','id');

		$this->addColumn('et_ophouendophthalmitis_treatment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouendophthalmitis_treatment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouendophthalmitis_treatment_version','version_id');
		$this->alterColumn('et_ophouendophthalmitis_treatment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophouendophthalmitis_treatment_site_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophouendophthalmitis_treatment_site_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophouendophthalmitis_treatment_site_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_treatment_site_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophouendophthalmitis_treatment_site_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophouendophthalmitis_treatment_site_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophouendophthalmitis_treatment_site_version');

		$this->createIndex('et_ophouendophthalmitis_treatment_site_aid_fk','et_ophouendophthalmitis_treatment_site_version','id');
		$this->addForeignKey('et_ophouendophthalmitis_treatment_site_aid_fk','et_ophouendophthalmitis_treatment_site_version','id','et_ophouendophthalmitis_treatment_site','id');

		$this->addColumn('et_ophouendophthalmitis_treatment_site_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophouendophthalmitis_treatment_site_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophouendophthalmitis_treatment_site_version','version_id');
		$this->alterColumn('et_ophouendophthalmitis_treatment_site_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouendophthalmitis_diagnosis_clinical_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophouendophthalmitis_diagnosis_clinical_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophouendophthalmitis_diagnosis_clinical_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophouendophthalmitis_diagnosis_clinical_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophouendophthalmitis_diagnosis_clinical_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophouendophthalmitis_diagnosis_clinical_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouendophthalmitis_diagnosis_clinical_version');

		$this->createIndex('ophouendophthalmitis_diagnosis_clinical_aid_fk','ophouendophthalmitis_diagnosis_clinical_version','id');
		$this->addForeignKey('ophouendophthalmitis_diagnosis_clinical_aid_fk','ophouendophthalmitis_diagnosis_clinical_version','id','ophouendophthalmitis_diagnosis_clinical','id');

		$this->addColumn('ophouendophthalmitis_diagnosis_clinical_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouendophthalmitis_diagnosis_clinical_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouendophthalmitis_diagnosis_clinical_version','version_id');
		$this->alterColumn('ophouendophthalmitis_diagnosis_clinical_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouendophthalmitis_diagnosis_culture_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophouendophthalmitis_diagnosis_culture_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophouendophthalmitis_diagnosis_culture_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophouendophthalmitis_diagnosis_culture_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophouendophthalmitis_diagnosis_culture_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophouendophthalmitis_diagnosis_culture_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouendophthalmitis_diagnosis_culture_version');

		$this->createIndex('ophouendophthalmitis_diagnosis_culture_aid_fk','ophouendophthalmitis_diagnosis_culture_version','id');
		$this->addForeignKey('ophouendophthalmitis_diagnosis_culture_aid_fk','ophouendophthalmitis_diagnosis_culture_version','id','ophouendophthalmitis_diagnosis_culture','id');

		$this->addColumn('ophouendophthalmitis_diagnosis_culture_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouendophthalmitis_diagnosis_culture_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouendophthalmitis_diagnosis_culture_version','version_id');
		$this->alterColumn('ophouendophthalmitis_diagnosis_culture_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophouendophthalmitis_outcome_visual_acuity_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophouendophthalmitis_outcome_visual_acuity_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophouendophthalmitis_outcome_visual_acuity_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophouendophthalmitis_outcome_visual_acuity_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophouendophthalmitis_outcome_visual_acuity_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophouendophthalmitis_outcome_visual_acuity_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophouendophthalmitis_outcome_visual_acuity_version');

		$this->createIndex('ophouendophthalmitis_outcome_visual_acuity_aid_fk','ophouendophthalmitis_outcome_visual_acuity_version','id');
		$this->addForeignKey('ophouendophthalmitis_outcome_visual_acuity_aid_fk','ophouendophthalmitis_outcome_visual_acuity_version','id','ophouendophthalmitis_outcome_visual_acuity','id');

		$this->addColumn('ophouendophthalmitis_outcome_visual_acuity_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophouendophthalmitis_outcome_visual_acuity_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophouendophthalmitis_outcome_visual_acuity_version','version_id');
		$this->alterColumn('ophouendophthalmitis_outcome_visual_acuity_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophouendophthalmitis_diagnosis','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_diagnosis_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_notificatio','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_notificatio_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_outcome','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_outcome_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_treatment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_treatment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_treatment_site','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouendophthalmitis_treatment_site_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophouendophthalmitis_diagnosis_clinical','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouendophthalmitis_diagnosis_clinical_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouendophthalmitis_diagnosis_culture','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouendophthalmitis_diagnosis_culture_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouendophthalmitis_outcome_visual_acuity','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophouendophthalmitis_outcome_visual_acuity_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophouendophthalmitis_diagnosis_clinical','deleted');
		$this->dropColumn('ophouendophthalmitis_diagnosis_clinical_version','deleted');
		$this->dropColumn('ophouendophthalmitis_diagnosis_culture','deleted');
		$this->dropColumn('ophouendophthalmitis_diagnosis_culture_version','deleted');
		$this->dropColumn('ophouendophthalmitis_outcome_visual_acuity','deleted');
		$this->dropColumn('ophouendophthalmitis_outcome_visual_acuity_version','deleted');

		$this->dropColumn('et_ophouendophthalmitis_diagnosis','deleted');
		$this->dropColumn('et_ophouendophthalmitis_diagnosis_version','deleted');
		$this->dropColumn('et_ophouendophthalmitis_notificatio','deleted');
		$this->dropColumn('et_ophouendophthalmitis_notificatio_version','deleted');
		$this->dropColumn('et_ophouendophthalmitis_outcome','deleted');
		$this->dropColumn('et_ophouendophthalmitis_outcome_version','deleted');
		$this->dropColumn('et_ophouendophthalmitis_treatment','deleted');
		$this->dropColumn('et_ophouendophthalmitis_treatment_version','deleted');
		$this->dropColumn('et_ophouendophthalmitis_treatment_site','deleted');
		$this->dropColumn('et_ophouendophthalmitis_treatment_site_version','deleted');

		$this->dropTable('et_ophouendophthalmitis_diagnosis_version');
		$this->dropTable('et_ophouendophthalmitis_notificatio_version');
		$this->dropTable('et_ophouendophthalmitis_outcome_version');
		$this->dropTable('et_ophouendophthalmitis_treatment_version');
		$this->dropTable('et_ophouendophthalmitis_treatment_site_version');
		$this->dropTable('ophouendophthalmitis_diagnosis_clinical_version');
		$this->dropTable('ophouendophthalmitis_diagnosis_culture_version');
		$this->dropTable('ophouendophthalmitis_outcome_visual_acuity_version');
	}
}
