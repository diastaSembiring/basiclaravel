<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Ujian - {{ $data['nama_mahasiswa'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(45deg, #667eea, #764ba2) !important;
        }
        .card-container {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }
        .exam-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 600px;
            border: 3px solid #667eea;
            position: relative;
            overflow: hidden;
        }
        .exam-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        .university-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e9ecef;
        }
        .university-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .card-title {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .student-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
        }
        .info-row:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }
        .info-label {
            font-weight: 600;
            color: #495057;
            flex: 1;
        }
        .info-value {
            flex: 2;
            text-align: right;
            font-weight: bold;
            color: #333;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #e9ecef;
        }
        .signature-box {
            text-align: center;
            width: 45%;
        }
        .signature-line {
            border-top: 1px solid #333;
            margin-top: 3rem;
            padding-top: 0.5rem;
        }
        .btn-actions {
            text-align: center;
            margin-top: 2rem;
        }
        .btn-print {
            background: linear-gradient(45deg, #28a745, #20c997);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        .btn-print:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-back {
            background: linear-gradient(45deg, #6c757d, #495057);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            transform: translateY(-2px);
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 4rem;
            color: rgba(102, 126, 234, 0.05);
            font-weight: bold;
            z-index: 1;
            pointer-events: none;
        }
        .card-content {
            position: relative;
            z-index: 2;
        }
        @media print {
            .navbar, .btn-actions {
                display: none !important;
            }
            body {
                background: white !important;
            }
            .exam-card {
                box-shadow: none !important;
                border: 2px solid #333 !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark no-print">
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

    <div class="container card-container">
        <div class="exam-card">
            <div class="watermark">KARTU UJIAN</div>
            
            <div class="card-content">
                <div class="university-header">
                    <div class="university-name">🏛️ UNIVERSITAS PRIMA INDONESIA</div>
                    <div class="text-muted">Fakultas SAINS DAN TEKNOLOGI</div>
                </div>
                
                <div class="card-title">
                    🎓 KARTU UJIAN MAHASISWA
                </div>
                
                <div class="student-info">
                    <div class="info-row">
                        <div class="info-label">🆔 NIM:</div>
                        <div class="info-value">{{ $data['nim'] }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">👤 Nama Mahasiswa:</div>
                        <div class="info-value">{{ $data['nama_mahasiswa'] }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">📚 Mata Kuliah:</div>
                        <div class="info-value">{{ $data['mata_kuliah'] }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">📅 Tanggal Ujian:</div>
                        <div class="info-value">{{ date('d F Y', strtotime($data['tanggal_ujian'])) }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">🕒 Waktu Ujian:</div>
                        <div class="info-value">08:00 - 10:00 WIB</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">🏢 Ruang Ujian:</div>
                        <div class="info-value">Ruang 101</div>
                    </div>
                </div>
                
                <div class="alert alert-info" role="alert">
                    <strong>📋 Ketentuan Ujian:</strong>
                    <ul class="mb-0 mt-2">
                        <li>Harap datang 15 menit sebelum ujian dimulai</li>
                        <li>Bawa kartu identitas dan kartu ujian ini</li>
                        <li>Dilarang membawa alat komunikasi</li>
                        <li>Patuhi protokol kesehatan yang berlaku</li>
                    </ul>
                </div>
                
                <div class="signature-section">
                    <div class="signature-box">
                        <div>Koordinator Ujian</div>
                        <div class="signature-line">
                            <strong>Dr. Ahmad Susanto, M.Kom</strong>
                        </div>
                    </div>
                    <div class="signature-box">
                        <div>Mahasiswa</div>
                        <div class="signature-line">
                            <strong>{{ $data['nama_mahasiswa'] }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="btn-actions">
            <button onclick="window.print()" class="btn btn-success btn-print">
                🖨️ Cetak Kartu
            </button>
            <a href="{{ route('exam-card.create') }}" class="btn btn-secondary btn-back">
                📝 Buat Kartu Baru
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-back">
                🏠 Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto focus print dialog after 1 second
        setTimeout(() => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('print') === 'true') {
                window.print();
            }
        }, 1000);
    </script>
</body>
</html>