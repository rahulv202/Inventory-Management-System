<div class="container">
    <h1>Manage Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">supplier Name</th>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $key => $order) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $order['product_supplier_name'] ?></td>
                    <td><?= $order['product_id'] ?></td>
                    <td><?= $order['product_name'] ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['product_price'] ?></td>
                    <td>
                        <a href="/edit-order/<?= $order['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="/delete-order/<?= $order['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>