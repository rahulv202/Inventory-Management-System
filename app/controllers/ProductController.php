<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Suppliers;
use App\Models\Products;

class ProductController extends Controller
{
    public function addProduct()
    {
        $supplier_model = Suppliers::getInstance();
        $suppliers = $supplier_model->getDataColumnName(['id', 'name']);
        $this->view('products/add', ['suppliers' => $suppliers]);
    }

    public function createProduct()
    {
        $name = sanitize($_POST['name']);
        //$quantity = sanitize($_POST['quantity']);
        $price = sanitize($_POST['price']);
        $supplier_id = sanitize($_POST['supplier_id']);
        $name = htmlspecialchars($name);
        //$quantity = htmlspecialchars($quantity);
        $price = htmlspecialchars($price);
        $supplier_id = htmlspecialchars($supplier_id);
        if (!validateRequired($name) ||  !validateRequired($price) || !validateRequired($supplier_id)) {
            //!validateRequired($quantity) ||
            $error = "All fields are required.";
            $this->view('products/add', ['error' => $error]);
            return;
        }
        $product_model = Products::getInstance();
        //'quantity',  $quantity,
        if ($product_model->save(['name',  'price', 'supplier_id'], [$name, $price, $supplier_id])) {
            $this->redirect('/manage-products');
        } else {
            $error = "Failed to add product.";
            $this->view('products/add', ['error' => $error]);
        }
    }

    public function manageProducts()
    {
        $product_model = Products::getInstance();
        $products = $product_model->getAllData();
        $supplier_model = Suppliers::getInstance();
        $suppliers = $supplier_model->getDataColumnName(['id', 'name']);
        $this->view('products/list', ['products' => $products, 'suppliers' => $suppliers]);
    }

    public function editProduct($id)
    {
        $product_model = Products::getInstance();
        $product = $product_model->find('id', $id);
        $supplier_model = Suppliers::getInstance();
        $suppliers = $supplier_model->getDataColumnName(['id', 'name']);
        $this->view('products/edit', ['product' => $product, 'suppliers' => $suppliers]);
    }

    public function updateProduct()
    {
        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $price = sanitize($_POST['price']);
        $supplier_id = sanitize($_POST['supplier_id']);
        $name = htmlspecialchars($name);
        $price = htmlspecialchars($price);
        $supplier_id = htmlspecialchars($supplier_id);
        $id = htmlspecialchars($id);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if (!validateRequired($name) || !validateRequired($price) || !validateRequired($supplier_id)) {
            $error = "All fields are required.";
            $this->view('products/edit', ['product' => $_POST, 'error' => $error]);
            return;
        }
        $product_model = Products::getInstance();
        if ($product_model->update(['name' => $name, 'price' => $price, 'supplier_id' => $supplier_id], $id)) {
            $this->redirect('/manage-products');
        } else {
            $error = "Failed to update product.";
            $this->view('products/edit', ['product' => $_POST, 'error' => $error]);
        }
    }

    public function deleteProduct($id)
    {
        $product_model = Products::getInstance();
        if ($product_model->delete($id)) {
            $this->redirect('/manage-products');
        } else {
            $error = "Failed to delete product.";
            $this->view('products/list', ['error' => $error]);
        }
    }
}
