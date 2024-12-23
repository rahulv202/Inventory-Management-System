<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Models\Suppliers;
use App\Models\Inventory;
use App\Models\Products;
use App\Models\Orders;

class OrderController extends Controller
{
    public function orderProduct($id)
    {
        $inventory_model = Inventory::getInstance();
        $inventory = $inventory_model->find('id', $id);
        $product_model = Products::getInstance();
        $product = $product_model->find('id', $inventory['product_id']);
        $supplier_model = Suppliers::getInstance();
        $supplier = $supplier_model->find('id', $product['supplier_id']);
        $this->view('inventory/order', ['inventory' => $inventory, 'product' => $product, 'supplier' => $supplier]);
    }

    public function editOrder($id)
    {
        $order_model = Orders::getInstance();
        $order = $order_model->find('id', $id);
        $product_model = Products::getInstance();
        $product = $product_model->find('id', $order['product_id']);
        $supplier_model = Suppliers::getInstance();
        $supplier = $supplier_model->find('id', $product['supplier_id']);
        $order['product_name'] = $product['name'];
        $order['product_price'] = $product['price'];
        $order['product_supplier_name'] = $supplier['name'];

        $this->view('orders/edit', ['order' => $order]);
    }

    public function createOrder()
    {
        $product_id = sanitize($_POST['product_id']);
        $quantity = sanitize($_POST['quantity']);
        $product_id = htmlspecialchars($product_id);
        $quantity = htmlspecialchars($quantity);

        if (!validateRequired($product_id) ||  !validateRequired($quantity)) {
            //!validateRequired($quantity) ||
            $error = "All fields are required.";
            $this->view('inventory/order', ['error' => $error]);
            return;
        }
        $order_model = Orders::getInstance();
        if ($order_model->save(['product_id', 'quantity'], [$product_id, $quantity])) {
            $this->redirect('/manage-orders');
        } else {
            $error = "Failed to order product.";
            $this->view('inventory/order', ['error' => $error]);
        }
    }

    public function updateOrder()
    {
        $id = sanitize($_POST['order_id']);
        $quantity = sanitize($_POST['quantity']);
        $quantity = htmlspecialchars($quantity);
        $id = htmlspecialchars($id);
        if (!validateRequired($quantity) || !validateRequired($id)) {
            $error = "All fields are required.";
            $this->view('orders/edit', ['error' => $error]);
            return;
        }
        $order_model = Orders::getInstance();
        if ($order_model->update(['quantity' => $quantity], $id)) {
            $this->redirect('/manage-orders');
        } else {
            $error = "Failed to update order.";
            $this->view('orders/edit', ['error' => $error]);
        }
    }
    public function deleteOrder($id)
    {
        $order_model = Orders::getInstance();
        if ($order_model->delete($id)) {
            $this->redirect('/manage-orders');
        } else {
            $error = "Failed to delete order.";
            $this->view('orders/list', ['error' => $error]);
        }
    }

    public function manageOrders()
    {
        $order_model = Orders::getInstance();
        $orders = $order_model->getAllData("status = 'pending'");
        $product_model = Products::getInstance();
        $inventory_model = Inventory::getInstance();
        $supplier_model = Suppliers::getInstance();
        foreach ($orders as $key => $order) {
            $product = $product_model->find('id', $order['product_id']);
            $inventory = $inventory_model->find('product_id', $order['product_id']);
            $supplier = $supplier_model->find('id', $product['supplier_id']);
            $orders[$key]['product_name'] = $product['name'];
            $orders[$key]['product_price'] = $product['price'];
            $orders[$key]['product_supplier_name'] = $supplier['name'];
            $orders[$key]['inventory_quantity'] = $inventory['quantity'];
        }
        $this->view('orders/list', ['orders' => $orders]);
    }
}
