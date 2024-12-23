<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Products</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Supplier ID</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($products as $product) {
                        $i = $i + 1;
                        foreach ($suppliers as $supplier) {
                            if ($product['supplier_id'] == $supplier['id']) {
                                $product['supplier_name'] = $supplier['name'];
                            }
                        }
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i; //$user['id']; 
                                            ?></th>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['supplier_id']; ?></td>
                            <td><?php echo $product['supplier_name']; ?></td>
                            <td>
                                <a href="/edit-product/<?php echo $product['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/delete-product/<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>