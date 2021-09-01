<?php

namespace App\Controllers;

use \App\Models\Contractor;
use \App\Models\Delegation;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Home/index.html');
    }
	
	/**
     * Show the different HTML controls page
     *
     * @return void
     */
    public function differentHtmlControlsAction()
    {
        View::renderTemplate('Home/html_controls.html');
    }
	
	/**
     * Show the employee table page
     *
     * @return void
     */
    public function employeeTableAction()
    {
        View::renderTemplate('Home/employee_table.html');
    }
	
	/**
     * Show the invoice table page
     *
     * @return void
     */
    public function invoiceTableAction()
    {
        View::renderTemplate('Home/invoice_table.html');
    }
	
	/**
     * Show the delegation table page
     *
     * @return void
     */
    public function delegationTableAction()
    {
        $delegation = new Delegation();
        $data = $delegation->getEmployeeDelegation();
        View::renderTemplate('Home/delegation_table.html', [
            'delegations' => $data
        ]);
    }
	
	/**
     * Show the contractors data page
     *
     * @return void
     */
    public function contractorsDataAction()
    {
		$contractor = new Contractor();
		$data = $contractor->getContractors();
        View::renderTemplate('Home/contractors_data.html', [
			'contractors' => $data
		]);
    }
	
	/**
     * Get the constractor by its nip
     *
     * @return void
     */
    public function getContractorAction()
    {
		$contractor = new Contractor();
		$contractor->getContractor();
    }
	
	/**
     * Add contractor
     *
     * @return void
     */
    public function addContractorAction()
    {
		$contractor = new Contractor();
		$contractor->addContractor($_POST);
		$this->contractorsDataAction();
    }
	
	/**
     * Edit contractor
     *
     * @return void
     */
    public function editContractorAction()
    {
		$contractor = new Contractor();
		$contractor->editContractor($_POST);
		$this->contractorsDataAction();
    }
	
	/**
     * Delete contractor
     *
     * @return void
     */
    public function deleteContractorAction()
    {
		$contractor = new Contractor();
		$contractor->deleteContractor($_POST);
		$this->contractorsDataAction();
    }
}
