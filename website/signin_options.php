<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .signin-container {
            margin-top: 150px;
            animation: fadein 1s ease-in-out;
        }

        .signin-card {
            border-radius: 10px;
            border: 1px solid #dee2e6;
            padding: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .signin-card:hover {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .signin-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        @keyframes fadein {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container signin-container">
        <h1 class="text-center mb-4">Choose Sign In</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card signin-card">
                    <div class="text-center">
                        <i class="fas fa-user-shield signin-icon"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Admin Sign In</h5>
                        <a href="/admin/index.php" class="btn btn-primary btn-block">Sign In as Admin</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card signin-card">
                    <div class="text-center">
                        <i class="fas fa-user signin-icon"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Sales Sign In</h5>
                        <a href="/user/login_user.php" class="btn btn-secondary btn-block">Sign In as Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
