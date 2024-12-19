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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>