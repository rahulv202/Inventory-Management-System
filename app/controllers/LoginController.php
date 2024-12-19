<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Users;
use App\Models\Suppliers;

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $email = sanitize($_POST['email']);
        $role = sanitize($_POST['role']);
        $password = sanitize($_POST['password']);
        // Validate and sanitize inputs
        $email = htmlspecialchars($email);
        $role = htmlspecialchars($role);
        $password = htmlspecialchars($password);
        // Validate required fields
        if (!validateRequired($email) || !validateRequired($role) || !validateRequired($password)) {
            $this->view('login', ['error' => 'All fields are required.']);
            return;
        }
        // Check if user exists
        if ($role == "supplier") {
            $userModel = Suppliers::getInstance();
        } else {
            $userModel = Users::getInstance();
        }
        $user = $userModel->find('email', $email);
        if (!$user) {
            $this->view('login', ['error' => 'Invalid email or password.']);
            return;
        }
        // Check password
        $hashedPassword = $user['password'];
        if (!password_verify($password, $hashedPassword)) {
            $this->view('login', ['error' => 'Invalid email or password.']);
            return;
        }
        // check role
        if ($user['role'] != $role) {
            $this->view('login', ['error' => 'Invalid email or password or role.']);;
            return;
        }
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['is_login'] = true;
        // Redirect to dashboard
        $this->redirect('/dashboard');
    }
}
