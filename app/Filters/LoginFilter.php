<?php

namespace App\Filters;

use \CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('logged_user')) {
            return redirect()->to(base_url() . "/login-routes");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}