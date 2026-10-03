<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist - Music Hub</title>
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
        }

        .nav-link:hover, .nav-link.active {
            color: #f8fafc;
        }

        .card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 48px 24px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 600px;
            margin: 40px auto 0 auto;
        }

        .badge-danger {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
            margin: 12px 0 20px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.2s;
            margin: 0 4px;
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
            background-color: #334155;
        }

        .text-secondary { color: #94a3b8; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container nav-container">
            <a class="navbar-brand" href="/songs">🎵 MusicHub</a>
            <div class="nav-links">
                <a class="nav-link" href="/songs">Lagu</a>
                <a class="nav-link" href="/artists">Artis</a>
                <a class="nav-link active" href="/playlists">Playlist</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div style="font-size: 64px; margin-bottom: 16px;">🎧</div>
            <h1 style="margin-bottom: 8px;">Fitur Playlist</h1>
            <div>
                <span class="badge-danger">COMING SOON</span>
            </div>
            <p class="text-secondary" style="margin-bottom: 32px; line-height: 1.6;">
                Pengelolaan playlist favorit Anda akan segera tersedia setelah integrasi database selesai dikembangkan.
            </p>
            <div>
                <a href="/songs" class="btn btn-primary">Jelajahi Lagu</a>
                <a href="/artists" class="btn btn-outline">Lihat Artis</a>
            </div>
        </div>
    </div>

</body>
</html>