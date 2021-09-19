<?php 
namespace models;

use models\Mapper_Shim;

class DoctorAppointments extends Mapper_Shim{
    public function __construct(\DB\SQL $DB) {
		$DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		parent::__construct($DB, 'citasdedoctor');
		$this->beforeInsert(function($self, $pkeys) {
		});
		$this->beforeUpdate(function($self, $pkeys) {
		});
	}
}