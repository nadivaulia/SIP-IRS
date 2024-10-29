<!-- resources/views/dashboard/mahasiswa.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - SIP-IRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0d9488;
            --secondary-color: #99f6e4;
            --accent-color: #fef3c7;
        }

        .sidebar {
            background-color: var(--primary-color);
            min-height: 100vh;
            width: 280px;
            color: white;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            background-color: var(--accent-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .nav-link {
            color: white !important;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .status-card {
            background-color: var(--accent-color);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .stats-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .period-banner {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            border-radius: 10px;
            padding: 15px 20px;
        }

        .btn-logout {
            background-color: var(--accent-color);
            color: var(--primary-color);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            opacity: 0.9;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            background-color: #22c55e;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .wave-decoration {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 0.1;
        }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-4 position-relative">
            <div class="text-center mb-4">
                <div class="profile-img mb-3">
                    <span class="material-icons" style="font-size: 48px; color: var(--primary-color)">person</span>
                </div>
                <h5 class="mb-1">{{ $data['mahasiswa']['name'] }}</h5>
                <p class="small mb-1">NIM. {{ $data['mahasiswa']['nim'] }}</p>
                <p class="small mb-1">{{ $data['mahasiswa']['program_studi'] }}</p>
                <p class="small mb-1">{{ $data['user']['name'] }}</p>
                <p class="small">NIP. {{ $data['user']['nip'] }}</p>
            </div>

            <nav class="nav flex-column gap-2 mb-4">
                <a href="#" class="nav-link active rounded d-flex align-items-center">
                    <span class="material-icons me-3">home</span>
                    Beranda
                </a>
                <a href="#" class="nav-link rounded d-flex align-items-center">
                    <span class="material-icons me-3">description</span>
                    Rencana Studi
                </a>
                <a href="#" class="nav-link rounded d-flex align-items-center">
                    <span class="material-icons me-3">assessment</span>
                    Hasil Studi
                </a>
            </nav>

            <button class="btn btn-logout w-100">
                <span class="material-icons align-middle me-2">logout</span>
                Keluar
            </button>

            <!-- Wave decoration -->
            <div class="wave-decoration">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
                </svg>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-1">Selamat Datang {{ $data['mahasiswa']['name'] }} 👋</h1>
                    <p class="text-muted mb-0">Semester Akademik {{ $data['semester']['current'] }}</p>
                </div>
                <div class="position-relative">
                    <button class="btn btn-primary rounded-circle p-2">
                        <span class="material-icons">notifications</span>
                    </button>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">Notifikasi baru</span>
                    </span>
                </div>
            </div>

            <!-- Period Banner -->
            <div class="period-banner mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-medium">Periode Pengisian IRS</span>
                    <span class="fw-medium">{{ $data['semester']['period'] }}</span>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="stats-card text-center">
                        <h6 class="text-muted mb-2">Semester Studi</h6>
                        <h2 class="mb-0">{{ $data['stats']['semester'] }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card text-center">
                        <h6 class="text-muted mb-2">IPK</h6>
                        <h2 class="mb-0">{{ $data['stats']['ipk'] }}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card text-center">
                        <h6 class="text-muted mb-2">SKSk</h6>
                        <h2 class="mb-0">{{ $data['stats']['sksk'] }}</h2>
                    </div>
                </div>
            </div>

            <!-- Status Cards -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="stats-card">
                        <div class="d-flex align-items-center mb-3">
                            <span class="material-icons text-primary me-2">calendar_today</span>
                            <h5 class="mb-0">Kalender Akademik</h5>
                        </div>
                        <a href="#" class="btn btn-outline-primary">Lihat Kalender</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stats-card">
                        <h5 class="mb-3">Status IRS</h5>
                        @if($data['status']['irs'] === 'ditolak')
                            <div class="alert alert-danger mb-0">
                                Isian Rencana Studi Ditolak
                                <a href="#" class="btn btn-danger mt-2">Lihat Detail</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Registration Status -->
            <div class="stats-card mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <span class="material-icons text-primary me-2">how_to_reg</span>
                        <h5 class="mb-0">Registrasi</h5>
                    </div>
                    @if($data['status']['registrasi'])
                        <span class="badge bg-success">Sudah Registrasi</span>
                    @else
                        <span class="badge bg-danger">Belum Registrasi</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>