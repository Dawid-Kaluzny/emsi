<?php

namespace App\Models;

use PDO;

/**
 * Employee's delegation model
 *
 * PHP version 7.0
 */
class Delegation extends \Core\Model
{
	/**
	 * Get employee's delegation list
	 *
	 * @return array employee's delegation
	 */
	public function getEmployeeDelegation()
	{
		$sql = 'SELECT e.first_name, e.last_name, d.id, d.date_from, d.date_to, d.place_departure, d.place_arrival FROM employees AS e INNER JOIN delegations AS d ON e.id = d.user_id ';
		
		$db = static::getDB();
		$stmt = $db->prepare($sql);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
}