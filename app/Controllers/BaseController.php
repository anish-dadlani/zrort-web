<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form'];
	protected $session;
	protected $db;
	protected $validation;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		//$this->session = Services::session();
		
		if (session_status() == PHP_SESSION_NONE)
		{
			//echo PHP_SESSION_NONE;
			//echo session_status().'</br>'; //exit();
			$this -> session = \Config\Services::session();
			//echo session_status(); exit();
		}
		$this -> session = Services::session();
		//Initialize Validation Class /
		$this -> validation = \Config\Services::validation();
		// Initialize Database Class /
		$this -> db = \Config\Database::connect();	
	}

}
