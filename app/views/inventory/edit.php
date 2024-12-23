<div class="container">
    <h1>Edit Inventory</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/update-inventory" method="POST">
        <input type="hidden" name="id" value="<?php echo $inventory['id']; ?>">
        <div class="form-group">
            <label for="product_id">Product</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $inventory['product_name']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $inventory['product_price']; ?>" readonly>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $inventory['quantity']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="/manage-inventory-list" class="btn btn-primary">Back to Inventory List</a>
</div>