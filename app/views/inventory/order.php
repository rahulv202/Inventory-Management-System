<div class="container">
    <h1>Order Product</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/order-product" method="post">
        <!-- <input type="hidden" name="inventory_id" value="<?php echo $inventory['id']; ?>">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>"> -->
        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
        <div class="form-group">
            <label for="product">Product</label>
            <input type="text" class="form-control" id="product" name="product" value="<?php echo $product['name']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required value="<?php echo $inventory['quantity']; ?>">
        </div>
        <div class="form-group">
            <label for="supplier">Supplier</label>
            <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo $supplier['name']; ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Order</button>
    </form>
</div>