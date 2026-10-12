<!-- Tugas 4 -->
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jockie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1117 !important;
            color: #ffffff !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-custom {
            background-color: #161b22 !important;
            border: 1px solid #30363d !important;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
        }
        .text-cyan {
            color: #38bdf8 !important;
        }
        .btn-cyan {
            background-color: #0284c7 !important;
            color: #ffffff !important;
            border: 1px solid #38bdf8 !important;
            font-weight: 600;
        }
        .btn-cyan:hover {
            background-color: #0369a1 !important;
            color: #ffffff !important;
        }
        .table-custom {
            color: #ffffff !important;
            margin-bottom: 0;
        }
        .table-custom th {
            background-color: #0d1117 !important;
            color: #38bdf8 !important;
            border-bottom: 2px solid #38bdf8 !important;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }
        .table-custom td {
            background-color: #161b22 !important;
            color: #ffffff !important;
            border-color: #30363d !important;
            vertical-align: middle;
        }
        .badge-cyan {
            background-color: rgba(56, 189, 248, 0.2) !important;
            color: #7dd3fc !important;
            border: 1px solid #38bdf8 !important;
        }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-white mb-1"><i class="fa-solid fa-music me-2 text-cyan"></i>Jockie Studio</h2>
                <p class="text-secondary mb-0">Manajemen data artis dan musisi studio</p>
            </div>
            <a href="{{ route('artists.create') }}" class="btn btn-cyan px-4 py-2 rounded-3">
                <i class="fa-solid fa-plus me-2"></i>Tambah Band / Musisi
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success bg-dark border-info text-info alert-dismissible fade show mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th class="text-center py-3">No</th>
                                <th class="py-3">Nama Band</th>
                                <th class="py-3">Genre</th>
                                <th class="py-3">Label Rekaman</th>
                                <th class="text-center py-3">Tahun Debut</th>
                                <th class="text-center py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($artists as $key => $artist)
                                <tr>
                                    <td class="text-center fw-bold text-cyan">{{ $key + 1 }}</td>
                                    <td class="fw-bold text-white">{{ $artist->stage_name }}</td>
                                    <td>
                                        <span class="badge badge-cyan px-3 py-2 rounded-pill fw-semibold">
                                            {{ $artist->genre->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-cyan px-3 py-2 rounded-pill fw-semibold">
                                            {{ $artist->labelRecord->name ?? 'Independen' }}
                                        </span>
                                    </td>
                                    <td class="text-center text-white fw-medium">{{ $artist->debut_year }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-sm btn-outline-info me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data musisi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-secondary">
                                        <i class="fa-solid fa-compact-disc fa-3x mb-3 d-block text-cyan"></i>
                                        Belum ada data musisi yang tersimpan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>