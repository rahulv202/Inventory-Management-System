<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Users;
use App\Models\Suppliers;

class DashboardController extends Controller
{
    public function index()
    {
        if ($_SESSION['user_role'] == "supplier") {
            $userModel = Suppliers::getInstance();
        } else {
            $userModel = Users::getInstance();
        }
        $user = $userModel->find('email', $_SESSION['user_email']);
        $this->view('dashboard', ['user' => $user]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
