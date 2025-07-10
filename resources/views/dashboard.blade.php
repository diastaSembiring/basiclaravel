<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kartu Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(45deg, #667eea, #764ba2) !important;
        }
        .welcome-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .btn-create {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 15px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">🎓 Kartu Ujian</a>
            <div class="navbar-nav ms-auto">
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold text-primary mb-3">
                        Selamat Datang! 👋
                    </h1>
                    <p class="lead mb-4">
                        Sistem pembuatan kartu ujian digital untuk mahasiswa. 
                        Buat kartu ujian dengan mudah dan praktis.
                    </p>
                    <a href="{{ route('exam-card.create') }}" class="btn btn-primary btn-create">
                        📝 Buat Kartu Ujian
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-icon">🎯</div>
                    <h5>Mudah & Cepat</h5>
                    <p class="text-muted">Buat kartu ujian hanya dalam beberapa klik</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon">📋</div>
                        <h5>Input Data</h5>
                        <p class="text-muted">Masukkan data mahasiswa dan mata kuliah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon">🎨</div>
                        <h5>Generate Kartu</h5>
                        <p class="text-muted">Sistem akan membuat kartu ujian otomatis</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="feature-icon">🖨️</div>
                        <h5>Cetak/Download</h5>
                        <p class="text-muted">Kartu siap untuk dicetak atau diunduh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>