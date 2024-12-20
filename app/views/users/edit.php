<div class="container mt-5">
    <h1>Edit User</h1>
    <?php if (!empty($error)) echo "<div class='alert alert-danger'>{$error}</div>"; ?>
    <form method="post" action="/edit-user">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" id="role">
                <option value="manager" <?php echo $user['role'] === 'manager' ? 'selected' : ''; ?>>Manager</option>
                <option value="staff" <?php echo $user['role'] === 'staff' ? 'selected' : ''; ?>>Staff</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>