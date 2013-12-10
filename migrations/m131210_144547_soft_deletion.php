<?php

class m131210_144547_soft_deletion extends CDbMigration
{
	public function up()
	{
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
	}
}
