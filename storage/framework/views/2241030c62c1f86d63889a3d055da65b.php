<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS (optional for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .section {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar (optional) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('userActivity')); ?>">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('cms.index')); ?>">CMS</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('createUser')); ?>">Create User</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('myaccount')); ?>">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main container -->
    <div class="container section">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Bootstrap JS (optional for components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /var/www/LoginAssigment/resources/views/layouts/dashboard.blade.php ENDPATH**/ ?>