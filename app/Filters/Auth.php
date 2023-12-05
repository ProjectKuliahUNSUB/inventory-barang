<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is logged in
        if (!session()->has('user')) {
            return redirect()->to('/');
        }

        // Check user role for specific routes
        $allowedRoles = $arguments ?? [];

        // Check if the user has at least one of the allowed roles
        if (empty($allowedRoles) || !in_array(session('user')['role'], $allowedRoles)) {
            return redirect()->to('/access-denied'); // Redirect to access denied page
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}
