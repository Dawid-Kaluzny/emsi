<?php

namespace App\Controllers;

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
}
