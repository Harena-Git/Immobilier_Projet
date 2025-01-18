<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanih_Cadeaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles généraux */
        :root {
            --primary-color: #ff4b6e;
            --secondary-color: #7e2eef;
        }

        /* Animation pour les éléments */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hero section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            padding-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url('data:image/svg+xml,<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"><rect width="20" height="20" fill="none"/><circle cx="3" cy="3" r="1" fill="rgba(255,255,255,0.2)"/></svg>') repeat;
            opacity: 0.3;
        }

        .floating-image {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
        }

        /* Cards */
        .feature-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Contact section */
        .contact-card {
            border: 2px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        /* Boutons */
        .btn-custom {
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="/"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#accueil">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#a-propos">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login-admin-form">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="accueil" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-white">
                    <h1 class="display-4 fw-bold mb-4 fade-in">Give the gift of magic for Christmas</h1>
                    <p class="lead mb-5 fade-in">Transform your contributions into unforgettable moments with our personalized gifts.</p>
                    <div class="fade-in">
                        <a href="login-user-form" class="btn btn-custom btn-primary me-3">Connect</a>
                        <a href="inscription-form" class="btn btn-custom btn-outline-light">Register</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="/assets/images/Papa.jpg" alt="Christmas gifts" class="img-fluid floating-image">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="a-propos" class="py-5 bg-light">
        <div class="container py-5">
            <h2 class="text-center mb-5 fade-in">About us</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100 fade-in">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-gift fa-3x mb-3 text-primary"></i>
                            <p class="card-text">Deposit money and receive personalized Christmas gifts for your loved ones!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 fade-in">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-magic fa-3x mb-3 text-primary"></i>
                            <p class="card-text">A quick and easy way to please those you love with unique gifts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 fade-in">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-heart fa-3x mb-3 text-primary"></i>
                            <p class="card-text">Transform your contributions into magical moments with our tailor-made Christmas gifts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container py-5">
            <h2 class="text-center mb-5 fade-in">Contact us</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="contact-card text-center p-4 fade-in">
                        <i class="fas fa-phone fa-2x mb-3 text-primary"></i>
                        <h3 class="h5">Phone</h3>
                        <p class="mb-0">+261 38 29 674 12</p>
                        <p class="mb-0">+261 32 95 149 52 </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-card text-center p-4 fade-in">
                        <i class="fas fa-envelope fa-2x mb-3 text-primary"></i>
                        <h3 class="h5">Email</h3>
                        <p class="mb-0">faniriantsoaharena@gmail.com</p>
                        <p class="mb-0">vatosoaranadison@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-card text-center p-4 fade-in">
                        <i class="fab fa-facebook fa-2x mb-3 text-primary"></i>
                        <h3 class="h5">Facebook</h3>
                        <p class="mb-0"><a href="https://facebook.com/noel" class="text-decoration-none">https://www.facebook.com/zuck/</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; Harena : ETU -> 003268 </p>
            <p>&copy; Vatosoa : ETU -> 003330 </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation au défilement
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(element => {
            observer.observe(element);
        });
    </script>
</body>
</html>