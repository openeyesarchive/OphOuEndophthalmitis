<?php

class m131206_150662_soft_deletion extends CDbMigration
{
	public function up()
	{
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
	}

	public function down()
	{
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
	}
}
