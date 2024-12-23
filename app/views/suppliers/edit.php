<div class="container">
    <h1>Edit Supplier</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form action="/update-supplier" method="POST">
        <input type="hidden" name="id" value="<?php echo $supplier['id']; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $supplier['name']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $supplier['email']; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $supplier['phone']; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $supplier['address']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="/manage-suppliers" class="btn btn-secondary">Back to Suppliers</a>
</div>