<?php


namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user has the required role to access the route
        $session = session();
        $role = $session->get('role');

        if (empty($role) || !in_array($arguments['role'], explode('|', $role))) {
            // User doesn't have the required role, redirect to login or show an error page
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}
