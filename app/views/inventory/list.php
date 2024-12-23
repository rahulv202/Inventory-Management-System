<div class="container">
    <h1>Inventory List</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventory as $key => $value) {
                foreach ($products as $k => $v) {
                    if ($v['id'] == $value['product_id']) {
                        $value['name'] = $v['name'];
                        $value['price'] = $v['price'];
                    }
                }
            ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['quantity']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                    <td>
                        <a href="/order-product/<?php echo $value['id']; ?>" class="btn btn-sm btn-primary">Order</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>