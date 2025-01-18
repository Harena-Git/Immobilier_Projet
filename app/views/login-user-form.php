<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            min-height: 100vh;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(10px);
        }
        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        .auth-title {
            background: linear-gradient(120deg, #84fab0, #8fd3f4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }
        .form-control {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #84fab0;
            box-shadow: 0 0 0 0.25rem rgba(132, 250, 176, 0.25);
        }
        .btn-login {
            background: linear-gradient(120deg, #84fab0, #8fd3f4);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .btn-login:hover {
            background: linear-gradient(120deg, #8fd3f4, #84fab0);
            transform: translateY(-2px);
        }
        .auth-link {
            color: #666;
        }
        .auth-link a {
            color: #84fab0;
            text-decoration: none;
            font-weight: 600;
        }
        .auth-link a:hover {
            color: #8fd3f4;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#a-propos">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="auth-container p-4 p-md-5">
                    <h1 class="auth-title text-center mb-4">Welcome</h1>
                    
                    <?php if(isset($message)): ?>
                        <div class="alert alert-info">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form action="traitement-login-user" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">User name :</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="username" name="nom" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password :</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="mdp" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-login btn-primary w-100 mb-3">Connect :</button>
                        <p class="auth-link text-center mb-0">
                        No account yet? <a href="/inscription-form">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p>&copy; Harena : ETU -> 003268 </p>
            <p>&copy; Vatosoa : ETU -> 003330 </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>