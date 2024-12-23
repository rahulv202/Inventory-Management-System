<div class="container">
    <h1>Add Inventory</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/add-inventory" method="POST">
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                <?php foreach ($products as $product) { ?>
                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                <?php } ?>
            </select>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add Inventory</button>
    </form>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>