<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Manage Users</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($users as $user) {
                        $i = $i + 1; ?>
                        <tr>
                            <th scope="row"><?php echo $i; //$user['id']; 
                                            ?></th>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td>
                                <a href="/edit-user/<?php echo $user['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/delete-user/<?php echo $user['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="/dashboard" class="btn btn-primary">Back to Dashboard</a>
</div>