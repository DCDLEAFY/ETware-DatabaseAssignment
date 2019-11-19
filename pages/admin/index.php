<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<div class="jumbotron">
    <h1>Admin Portal</h1>
    <div class="card">
        <div class="card">
            <div class="card-body text-center">
                <h3 class="card-title">View/Edit Users</h3>
                <a href="users.php" class="btn btn-primary stretched-link">View</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <h3 class="card-title">View/Edit Products</h3>
                <a href="product_view.php" class="btn btn-primary stretched-link">View</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <h3 class="card-title">Staff Manager</h3>
                <a href="staff_manager.php" class="btn btn-primary stretched-link">View</a>
            </div>
        </div>
        
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>