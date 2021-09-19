<?php 
namespace models;

use models\Mapper_Shim;

class WorkDay extends Mapper_Shim{
    public function __construct(\DB\SQL $DB) {
		$DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		parent::__construct($DB, 'workdays');
		$this->beforeInsert(function($self, $pkeys) {
		});
		$this->beforeUpdate(function($self, $pkeys) {
		});
	}
}