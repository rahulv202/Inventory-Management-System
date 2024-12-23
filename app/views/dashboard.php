<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Welcome, <?php echo $user['name']; ?></h1>
            <p>Your email: <?php echo $user['email']; ?></p>
            <?php if ($user['role'] === 'supplier') { ?>
                <p>Your phone: <?php echo $user['phone']; ?></p>
                <p>Your address: <?php echo $user['address']; ?></p>
            <?php } ?>
            <p>Your role: <?php echo $user['role']; ?></p>
        </div>
    </div>
    <?php if ($user['role'] === 'admin') { ?>

        <a href="/manage-users" class="btn btn-primary">Manage Users</a>
        <a href="/manage-products" class="btn btn-primary">Manage Products</a>
        <a href="/manage-suppliers" class="btn btn-primary">Manage Suppliers</a>
        <a href="/add-product" class="btn btn-primary">Add Product</a>


    <?php } ?>
    <?php if ($user['role'] === 'manager') { ?>
        <a href="/manage-inventory" class="btn btn-primary">Manage Inventory</a>
        <!-- <a href="/manage-suppliers" class="btn btn-primary">Manage Suppliers</a> -->
        <a href="/manage-orders" class="btn btn-primary">Manage Orders</a>
    <?php } ?>
    <?php if ($user['role'] === 'staff') { ?>
        <a href="/manage-inventory-list" class="btn btn-primary">Manage Inventory</a>
        <a href="/add-inventory" class="btn btn-primary">Add Inventory</a>
    <?php } ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>