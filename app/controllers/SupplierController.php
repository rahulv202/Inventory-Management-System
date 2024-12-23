<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Suppliers;
use App\Models\Products;
use App\Models\Orders;

class SupplierController extends Controller
{
    public function manageSuppliers()
    {
        $supplier_model = Suppliers::getInstance();
        $suppliers = $supplier_model->getAllData();
        $this->view('suppliers/list', ['suppliers' => $suppliers]);
    }

    public function editSupplier($id)
    {
        $supplier_model = Suppliers::getInstance();
        $supplier = $supplier_model->find('id', $id);
        $this->view('suppliers/edit', ['supplier' => $supplier]);
    }

    public function updateSupplier()
    {
        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $phone = sanitize($_POST['phone']);
        $address = sanitize($_POST['address']);
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);
        $id = htmlspecialchars($id);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if (!validateRequired($name) || !validateRequired($email) || !validateRequired($phone) || !validateRequired($address)) {
            $error = "All fields are required.";
            $this->view('suppliers/edit', ['supplier' => $_POST, 'error' => $error]);
            return;
        }
        $supplier_model = Suppliers::getInstance();
        if ($supplier_model->update(['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address], $id)) {
            $this->redirect('/manage-suppliers');
        } else {
            $error = "Failed to update supplier.";
            $this->view('suppliers/edit', ['supplier' => $_POST, 'error' => $error]);
        }
    }

    public function deleteSupplier($id)
    {
        $supplier_model = Suppliers::getInstance();
        if ($supplier_model->delete($id)) {
            $this->redirect('/manage-suppliers');
        } else {
            $error = "Failed to delete supplier.";
            $this->view('suppliers/list', ['error' => $error]);
        }
    }

    public function manageSupplierProductsOrder()
    {
        $product_model = Products::getInstance();
        $products = $product_model->getAllData("supplier_id = " . $_SESSION['user_id']);
        $order_model = Orders::getInstance();
        $data = $order_model->getAllData("status='pending'");

        $this->view('suppliers/order', ['data' => $data, 'products' => $products]);
    }
}
