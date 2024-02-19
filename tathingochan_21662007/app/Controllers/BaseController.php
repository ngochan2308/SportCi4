<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    protected function isLoggedIn()
    {
        return $this->session->has('logged_in') && $this->session->get('logged_in') === true;
        
    }
}
