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
}
