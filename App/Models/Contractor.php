<?php

namespace App\Models;

use PDO;

/**
 * Contractor model
 *
 * PHP version 7.0
 */
class Contractor extends \Core\Model
{
	/**
	 * Get contractors list
	 *
	 * @return array contractors
	 */
	public function getContractors()
	{
		$sql = 'SELECT c.nip, c.regon, c.name, c.is_vat, c.street, c.home_nr, c.apartment_nr FROM contractors AS c WHERE c.is_active=1';
		
		$db = static::getDB();
		$stmt = $db->prepare($sql);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
	/**
	 * Get contractor by nip
	 *
	 * @return array constractor
	 */
	public function getContractor()
	{
		$nip = $_POST['nip'];
		
		$sql = 'SELECT c.nip, c.regon, c.name, c.is_vat, c.street, c.home_nr, c.apartment_nr FROM contractors AS c WHERE c.nip=:nip AND c.is_active=1';
		
		$db = static::getDB();
		$stmt = $db->prepare($sql);
		
		$stmt->bindValue(':nip', $nip, PDO::PARAM_STR);
		
		$stmt->execute();
		
		$contractor = $stmt->fetch();
		
		echo json_encode($contractor);
	}
	
	/**
     * add contractor to database
     *
     * @param array $data Data from the add contractor form
     *
     * @return boolean  True if the data was updated, false otherwise
     */
    public function addContractor($data)
    {
		if (isset($data['nip'])) {
			$this->nip = $data['nip'];
			$this->regon = $data['regon'];
			$this->name = $data['name'];
			$this->vat = $data['vat'];
			$this->street = $data['street'];
			$this->home_nr = $data['home_nr'];
			$this->apartment_nr = $data['apartment_nr'];
			
			$sql = 'INSERT INTO contractors (nip, regon, name, is_vat, street, home_nr, apartment_nr) VALUES (:nip, :regon, :name, :vat, :street, :home_nr, :apartment_nr)';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

			$stmt->bindValue(':nip', $this->nip, PDO::PARAM_STR);
			$stmt->bindValue(':regon', $this->regon, PDO::PARAM_STR);
			$stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
			$stmt->bindValue(':vat', $this->vat, PDO::PARAM_STR);
			$stmt->bindValue(':street', $this->street, PDO::PARAM_STR);
			$stmt->bindValue(':home_nr', $this->home_nr, PDO::PARAM_STR);
			$stmt->bindValue(':apartment_nr', $this->apartment_nr, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;
    }
	
	/**
     * edit contractor in the database
     *
     * @param array $data Data from the edit contractor form
     *
     * @return boolean  True if the data was updated, false otherwise
     */
    public function editContractor($data)
    {
		if (isset($data['old-nip'])) {
			$this->old_nip = $data['old-nip'];
			$this->new_nip = $data['new-nip'];
			$this->regon = $data['regon'];
			$this->name = $data['name'];
			$this->vat = $data['vat'];
			$this->street = $data['street'];
			$this->home_nr = $data['home_nr'];
			$this->apartment_nr = $data['apartment_nr'];
			
			$sql = 'UPDATE contractors SET nip=:new_nip, regon=:regon, name=:name, is_vat=:vat, street=:street, home_nr=:home_nr, apartment_nr=:apartment_nr WHERE nip=:old_nip';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

			$stmt->bindValue(':old_nip', $this->old_nip, PDO::PARAM_STR);
			$stmt->bindValue(':new_nip', $this->new_nip, PDO::PARAM_STR);
			$stmt->bindValue(':regon', $this->regon, PDO::PARAM_STR);
			$stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
			$stmt->bindValue(':vat', $this->vat, PDO::PARAM_STR);
			$stmt->bindValue(':street', $this->street, PDO::PARAM_STR);
			$stmt->bindValue(':home_nr', $this->home_nr, PDO::PARAM_STR);
			$stmt->bindValue(':apartment_nr', $this->apartment_nr, PDO::PARAM_STR);

            return $stmt->execute();
        }
		
        return false;
    }
	
	/**
     * delete contractor (set is_active to 0)
     *
     * @param array $data Data from the delete contractor form
     *
     * @return boolean  True if the data was updated, false otherwise
     */
    public function deleteContractor($data)
    {
		if (isset($data['nip'])) {
			$this->nip = $data['nip'];
			
			$sql = 'UPDATE contractors SET is_active=0 WHERE nip=:nip';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

			$stmt->bindValue(':nip', $this->nip, PDO::PARAM_STR);

            return $stmt->execute();
        }
		
        return false;
    }
}