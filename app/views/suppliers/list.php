<div class="container">
    <h1>Manage Suppliers</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier) : ?>
                <tr>
                    <td><?php echo $supplier['id']; ?></td>
                    <td><?php echo $supplier['name']; ?></td>
                    <td><?php echo $supplier['email']; ?></td>
                    <td><?php echo $supplier['phone']; ?></td>
                    <td><?php echo $supplier['address']; ?></td>
                    <td>
                        <a href="/edit-supplier/<?php echo $supplier['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/delete-supplier/<?php echo $supplier['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>