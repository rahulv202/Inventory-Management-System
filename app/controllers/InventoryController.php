<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Inventory;
use App\Models\Products;


class InventoryController extends Controller
{
    public function manageInventory()
    {
        $inventory_model = Inventory::getInstance();
        $inventory = $inventory_model->getAllData();
        $product_model = Products::getInstance();
        $products = $product_model->getAllData();
        $this->view('inventory/list', ['inventory' => $inventory, 'products' => $products]);
    }

    public function addInventory()
    {
        $product_model = Products::getInstance();
        $products = $product_model->getAllData();
        $this->view('inventory/add', ['products' => $products]);
    }

    public function createInventory()
    {
        $product_id = sanitize($_POST['product_id']);
        $quantity = sanitize($_POST['quantity']);
        $product_id = htmlspecialchars($product_id);
        $quantity = htmlspecialchars($quantity);
        if (!validateRequired($product_id) || !validateRequired($quantity)) {
            $error = "All fields are required.";
            $this->view('inventory/add', ['error' => $error]);
            return;
        }
        $inventory_model = Inventory::getInstance();
        if ($inventory_model->find('product_id', $product_id)) {
            $error = "Inventory already exists for this product.";
            $this->view('inventory/add', ['error' => $error]);
            return;
        }
        if ($inventory_model->save(['product_id', 'quantity'], [$product_id, $quantity])) {
            // $success = "Inventory added successfully.";
            // $this->view('inventory/add', ['success' => $success]);
            $this->redirect('/manage-inventory-list');
        } else {
            $error = "Failed to add inventory.";
            $this->view('inventory/add', ['error' => $error]);
        }
    }

    public function editInventory($id)
    {
        $inventory_model = Inventory::getInstance();
        $inventory = $inventory_model->find('id', $id);
        $product_model = Products::getInstance();
        $products = $product_model->find('id', $inventory['product_id']);
        $inventory['product_name'] = $products['name'];
        $inventory['product_price'] = $products['price'];
        $this->view('inventory/edit', ['inventory' => $inventory]);
    }

    public function updateInventory()
    {
        $id = sanitize($_POST['id']);
        //$product_id = sanitize($_POST['product_id']);
        $quantity = sanitize($_POST['quantity']);
        //$product_id = htmlspecialchars($product_id);
        $quantity = htmlspecialchars($quantity);
        if (!validateRequired($id) || !validateRequired($quantity)) {
            $error = "All fields are required.";
            $this->view('inventory/edit', ['error' => $error]);
            return;
        }
        $inventory_model = Inventory::getInstance();
        if ($inventory_model->update(['quantity' => $quantity], $id)) {
            $this->redirect('/manage-inventory-list');
        } else {
            $error = "Failed to update inventory.";
            $this->view('inventory/edit', ['error' => $error]);
        }
    }

    public function deleteInventory($id)
    {
        $inventory_model = Inventory::getInstance();
        if ($inventory_model->delete($id)) {
            $this->redirect('/manage-inventory-list');
        } else {
            $error = "Failed to delete inventory.";
            $this->view('inventory/list', ['error' => $error]);
        }
    }
}
