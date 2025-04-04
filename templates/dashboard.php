<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Club - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS AdminLTE & Bootstrap -->
    <link rel="stylesheet" href="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/css/adminlte.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="/wp-content/plugins/espace-gestion-clubs/assets/css/custom.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed espace-club-dashboard sidebar-collapse">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/espace-club"><i class="fas fa-home"></i> Accueil</a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <img src="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/img/user2-160x160.jpg" alt="Logo" class="brand-image img-circle">
            <span class="brand-text font-weight-light">C91 Comité</span>
        </a>

        <div class="sidebar-ct91">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Connecté</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-folder"></i><p>Documents</p></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-ticket-alt"></i><p>APY / Assoconnect</p></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-toolbox"></i><p>Outils Clubs</p></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-calendar-alt"></i><p>Calendrier</p></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-comments"></i><p>Partage</p></a></li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Espace Président - CT91 Escalade</h1>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">PV & Documents Officiels</h3>
                            </div>
                            <div class="card-body">
                                <p>Consultez les comptes-rendus des réunions du CT91 et téléchargez les documents utiles pour votre club.</p>
                                <a href="#" class="btn btn-primary btn-smooth">Consulter les documents <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-success text-white">
                                <h3 class="card-title">Achat de Places & Paiement APY</h3>
                            </div>
                            <div class="card-body">
                                <p>Gérez les réservations et paiements via Assoconnect pour vos créneaux ou événements club.</p>
                                <a href="#" class="btn btn-success btn-smooth">Accéder à Assoconnect <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-info">
                            <div class="card-header bg-info text-white">
                                <h3 class="card-title">Boîte à Outils</h3>
                            </div>
                            <div class="card-body">
                                <p>Téléchargez des modèles de conventions, statuts, et autres documents de gestion de club.</p>
                                <a href="#" class="btn btn-info btn-smooth">Télécharger <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-secondary">
                            <div class="card-header bg-secondary text-white">
                                <h3 class="card-title">Partage entre Clubs</h3>
                            </div>
                            <div class="card-body">
                                <p>Partagez vos bonnes pratiques et inspirez-vous des projets des autres clubs.</p>
                                <a href="#" class="btn btn-secondary btn-smooth">Voir les retours <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/wp-content/plugins/espace-gestion-clubs/assets/adminlte/js/adminlte.min.js"></script>
<script src="/wp-content/plugins/espace-gestion-clubs/assets/js/dashboard.js"></script>
</body>
</html>
