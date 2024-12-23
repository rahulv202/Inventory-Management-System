<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Edit Product</h1>
            <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
            <form action="/update-product" method="POST">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>">
                </div>
                <div class="form-group">
                    <label for="supplier_id">Supplier</label>
                    <!-- <input type="text" class="form-control" id="category" name="category" placeholder="Category" required> -->
                    <select class="form-control" id="supplier_id" name="supplier_id">
                        <option value="">select supplier</option>
                        <?php foreach ($suppliers as $supplier) : ?>
                            <option value="<?php echo $supplier['id']; ?>" <?php if ($product['supplier_id'] == $supplier['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $supplier['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>