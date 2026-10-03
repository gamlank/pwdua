<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Lagu - Music Hub</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #020617;
            border-bottom: 1px solid #1e293b;
            padding: 16px 0;
            margin-bottom: 32px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #ef4444;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-link {
            color: #94a3b8;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: #f8fafc;
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .btn-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #ef4444;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #dc2626;
        }

        .btn-outline {
            border-color: #334155;
            color: #f8fafc;
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: #1e293b;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        .card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            margin-bottom: 24px;
        }

        .card-header {
            font-size: 16px;
            font-weight: 600;
            padding-bottom: 16px;
            margin-bottom: 16px;
            border-bottom: 1px solid #334155;
            color: #94a3b8;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #cbd5e1;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            background-color: #0f172a;
            border: 1px solid #334155;
            border-radius: 6px;
            color: #f8fafc;
            font-size: 14px;
            outline: none;
        }

        .form-control:focus {
            border-color: #ef4444;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .table th, .table td {
            padding: 14px 16px;
            border-bottom: 1px solid #334155;
            font-size: 14px;
        }

        .table th {
            background-color: #0f172a;
            color: #94a3b8;
            font-weight: 600;
        }

        .table tr:hover {
            background-color: #334155;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            background-color: #334155;
            color: #f8fafc;
        }

        .badge-danger {
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .alert {
            padding: 16px;
            border-radius: 8px;
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            text-align: center;
        }

        .text-center { text-align: center; }
        .text-secondary { color: #94a3b8; }
        .fw-bold { font-weight: 700; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .max-w-600 { max-width: 600px; }
        .max-w-500 { max-width: 500px; }
        .d-flex { display: flex; }
        .justify-around { justify-content: space-around; }
        .mt-4 { margin-top: 24px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container nav-container">
            <a class="navbar-brand" href="/songs">🎵 MusicHub</a>
            <div class="nav-links">
                <a class="nav-link active" href="/songs">Lagu</a>
                <a class="nav-link" href="/artists">Artis</a>
                <a class="nav-link" href="/playlists">Playlist</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="header-actions">
            <h2>Katalog Lagu</h2>
            <div class="btn-group">
                <a href="/songs" class="btn btn-outline btn-sm">Semua Lagu</a>
                <a href="/songs/create" class="btn btn-primary btn-sm">+ Tambah Lagu</a>
            </div>
        </div>

        @if(isset($isCreate) && $isCreate)
            <div class="card max-w-600 mx-auto">
                <div class="card-header">Tambah Lagu Baru</div>
                <form action="/songs" method="GET">
                    <div class="form-group">
                        <label class="form-label">Judul Lagu</label>
                        <input type="text" name="title" class="form-control" placeholder="Masukkan judul..." required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Artis</label>
                        <input type="text" name="artist" class="form-control" placeholder="Masukkan nama artis..." required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Genre</label>
                        <input type="text" name="genre" class="form-control" placeholder="Contoh: Rock, Pop, Metal..." required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Lagu</button>
                </form>
            </div>

        @elseif(isset($song))
            @if($song)
                <div class="card max-w-500 mx-auto text-center">
                    <div style="font-size: 40px; margin-bottom: 12px;">🎵</div>
                    <h3 class="fw-bold" style="margin-bottom: 4px;">{{ $song['title'] }}</h3>
                    <p class="text-secondary" style="font-size: 18px; margin-bottom: 20px;">{{ $song['artist'] }}</p>
                    <div class="d-flex justify-around" style="border-top: 1px solid #334155; padding-top: 16px;">
                        <div>
                            <span class="text-secondary" style="font-size: 12px; display: block;">Genre</span>
                            <span class="badge badge-danger">{{ $song['genre'] }}</span>
                        </div>
                        <div>
                            <span class="text-secondary" style="font-size: 12px; display: block;">Durasi</span>
                            <span style="font-weight: 600;">{{ $song['duration'] }}</span>
                        </div>
                    </div>
                    <a href="/songs" class="btn btn-outline btn-sm mt-4">← Kembali ke Daftar</a>
                </div>
            @else
                <div class="alert">Lagu tidak ditemukan.</div>
            @endif

        @elseif(isset($songs))
            <div class="card" style="padding: 0; overflow: hidden;">
                <div class="card-header" style="padding: 16px 24px; margin-bottom: 0;">
                    Daftar Semua Lagu
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Artis</th>
                                <th>Genre</th>
                                <th>Durasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($songs as $item)
                            <tr>
                                <td style="font-weight: 600;">{{ $item['title'] }}</td>
                                <td class="text-secondary">{{ $item['artist'] }}</td>
                                <td><span class="badge">{{ $item['genre'] }}</span></td>
                                <td class="text-secondary">{{ $item['duration'] }}</td>
                                <td class="text-center">
                                    <a href="/songs/{{ $item['id'] }}" class="btn btn-outline btn-sm">Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary" style="padding: 32px;">Data lagu tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

</body>
</html>