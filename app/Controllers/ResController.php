<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Negotiate;
use Psr\Log\LoggerInterface;
use App\Libraries\Encript;
use App\Libraries\Init;
use App\Libraries\Pagging;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class ResController extends Controller
{

	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;


	public $session;


	public $db;


	public $response;


	public $encripta;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */


	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->db    			= \Config\Database::connect();
 		$this->request 		= \Config\Services::request();
 		$this->session 		= \Config\Services::session();
		$this->language 	= \Config\Services::language();
		$this->uri      	= new \CodeIgniter\HTTP\URI();

 		$this->session->start();
		
		$this->login 			= model('App\Models\Login');
		$this->table 			= model('App\Models\Datatables');
		$this->encript 		= new Encript();
		$this->init 			= new Init();
		$this->pagging		= new Pagging();


	}




}
