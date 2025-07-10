<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kartu Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(45deg, #667eea, #764ba2) !important;
        }
        .form-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .btn-generate {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .form-label {
            font-weight: 600;
            color: #333;
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .back-btn {
            background: linear-gradient(45deg, #6c757d, #495057);
            border: none;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">🎓 Kartu Ujian</a>
            <div class="navbar-nav ms-auto">
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary fw-bold">📝 Buat Kartu Ujian</h2>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary back-btn">
                    ← Kembali
                </a>
            </div>
            
            <form method="POST" action="{{ route('exam-card.generate') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nim" class="form-label">
                                🆔 Nomor Induk Mahasiswa (NIM)
                            </label>
                            <input type="text" 
                                   class="form-control @error('nim') is-invalid @enderror" 
                                   id="nim" 
                                   name="nim" 
                                   value="{{ old('nim') }}" 
                                   required 
                                   placeholder="Contoh: 2021001234">
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_mahasiswa" class="form-label">
                                👤 Nama Mahasiswa
                            </label>
                            <input type="text" 
                                   class="form-control @error('nama_mahasiswa') is-invalid @enderror" 
                                   id="nama_mahasiswa" 
                                   name="nama_mahasiswa" 
                                   value="{{ old('nama_mahasiswa') }}" 
                                   required 
                                   placeholder="Contoh: Ahmad Susanto">
                            @error('nama_mahasiswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mata_kuliah" class="form-label">
                                📚 Mata Kuliah
                            </label>
                            <input type="text" 
                                   class="form-control @error('mata_kuliah') is-invalid @enderror" 
                                   id="mata_kuliah" 
                                   name="mata_kuliah" 
                                   value="{{ old('mata_kuliah') }}" 
                                   required 
                                   placeholder="Contoh: Pemrograman Web">
                            @error('mata_kuliah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_ujian" class="form-label">
                                📅 Tanggal Ujian
                            </label>
                            <input type="date" 
                                   class="form-control @error('tanggal_ujian') is-invalid @enderror" 
                                   id="tanggal_ujian" 
                                   name="tanggal_ujian" 
                                   value="{{ old('tanggal_ujian') }}" 
                                   required>
                            @error('tanggal_ujian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-generate">
                        🎯 Generate Kartu Ujian
                    </button>
                </div>
            </form>
            
            <div class="mt-4 p-3 bg-light rounded">
                <h6 class="text-primary">💡 Tips:</h6>
                <ul class="mb-0 text-muted">
                    <li>Pastikan NIM diisi dengan benar dan lengkap</li>
                    <li>Nama mahasiswa harus sesuai dengan data resmi</li>
                    <li>Pilih tanggal ujian yang tepat</li>
                    <li>Periksa kembali semua data sebelum generate</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>