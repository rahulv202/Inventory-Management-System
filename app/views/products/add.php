<div class="container">
    <h1 class="mt-5">Add Product</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form method="POST" action="/add-product" class="mt-4">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <!-- <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
        </div> -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <!-- <input type="text" class="form-control" id="category" name="category" placeholder="Category" required> -->
            <select class="form-control" id="supplier_id" name="supplier_id">
                <option value="">select supplier</option>
                <?php foreach ($suppliers as $supplier) : ?>
                    <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>