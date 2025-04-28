<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT ChipiChapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 text-center" style="background-color: #92CCED">
        <div>
            <h1 class="display-4 fw-bold mb-3">Welcome to PT ChipiChapa</h1>
            <p class="lead mb-4">A website that makes your life easier</p>
            <a href="<?php echo e(route('login.page')); ?>" class="btn btn-primary btn-lg m-2">Login</a>
            <a href="<?php echo e(route('signup.page')); ?>" class="btn btn-outline-secondary btn-lg m-2">Register</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Laravel\FinalProject\resources\views/welcome.blade.php ENDPATH**/ ?>