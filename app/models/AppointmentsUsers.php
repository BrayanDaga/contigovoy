<?php 
namespace models;

use models\Mapper_Shim;

class AppointmentsUsers extends Mapper_Shim{
    public function __construct(\DB\SQL $DB) {

		parent::__construct($DB, 'appointmentsusers');
		$this->beforeInsert(function($self, $pkeys) {
		});
		$this->beforeUpdate(function($self, $pkeys) {
		});
	}
}