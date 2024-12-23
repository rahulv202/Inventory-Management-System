<div class="container">
    <h1>Order Details</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php
            // print_r($data);
            // print_r($products);
            // exit();
            foreach ($data as $item) {
                //print_r($item);
                foreach ($products as $product) {
                    if ($item['product_id'] == $product['id']) {
                        $item['name'] = $product['name'];
                        $item['price'] = $product['price'];
                        //$item['quantity'] = $product['quantity'];
                        $item['subtotal'] = $product['price'] * $item['quantity'];
                    }
                }
            ?>
                <tr>
                    <th scope="row"><?php echo $item['id']; ?></th>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['price']; ?></td>

                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['subtotal'];
                        $total += $item['subtotal']; ?></td>
                    <td>
                        <a href="/fulfilled-order/<?php echo $item['id']; ?>" class="btn btn-primary">Fulfilled Order</a>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?php echo $total; ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="container">
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>
</div>