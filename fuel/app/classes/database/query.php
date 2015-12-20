<?php

class Database_Query extends \Fuel\Core\Database_Query
{
	public function execute($db = null)
	{
		if ($this->_connection !== null and $db === null)
		{
			$db = $this->_connection;
		}

		if ( ! is_object($db) && \DB::in_transaction())
		{
			$db = \Database_Connection::instance($db, null, true);
		}

		return parent::execute($db);		
	}
}
