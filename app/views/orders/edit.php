<div class="container">
    <h1>Edit Order</h1>
    <form action="/edit-order" method="post">
        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
        <div class="form-group">
            <label for="product">Product</label>
            <input type="text" class="form-control" id="product" name="product" value="<?php echo $order['product_name']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $order['product_price']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required value="<?php echo $order['quantity']; ?>">
        </div>
        <div class="form-group">
            <label for="supplier">Supplier</label>
            <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo $order['product_supplier_name']; ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>