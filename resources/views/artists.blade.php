<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Artis - Music Hub</title>
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
            padding: 24px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
            margin-bottom: 24px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid #334155;
            color: #f8fafc;
            background-color: transparent;
            transition: all 0.2s;
        }

        .btn:hover {
            background-color: #334155;
        }

        .btn-danger {
            border-color: rgba(239, 68, 68, 0.4);
            color: #ef4444;
        }

        .btn-danger:hover {
            background-color: rgba(239, 68, 68, 0.15);
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            background-color: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
            margin-bottom: 12px;
        }

        .list-group {
            list-style: none;
            border: 1px solid #334155;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .list-item {
            padding: 12px 16px;
            background-color: #0f172a;
            border-bottom: 1px solid #334155;
            font-size: 14px;
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .bio-box {
            background-color: #0f172a;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #334155;
            line-height: 1.6;
            margin-bottom: 24px;
            color: #cbd5e1;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #334155;
        }

        .text-secondary { color: #94a3b8; }
        .fw-bold { font-weight: 700; }
        .alert {
            padding: 16px;
            border-radius: 8px;
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            text-align: center;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container nav-container">
            <a class="navbar-brand" href="/songs">🎵 MusicHub</a>
            <div class="nav-links">
                <a class="nav-link" href="/songs">Lagu</a>
                <a class="nav-link active" href="/artists">Artis</a>
                <a class="nav-link" href="/playlists">Playlist</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 style="margin-bottom: 24px;">Katalog Artis</h2>

        @if(isset($artist))
            @if($artist)
                <div class="card">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
                        <div style="width: 50px; height: 50px; background-color: rgba(239, 68, 68, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                            🎤
                        </div>
                        <div>
                            <h2 class="fw-bold">{{ $artist['name'] }}</h2>
                            <small class="text-secondary">{{ $artist['origin'] }} • <span style="color: #ef4444;">{{ $artist['genre'] }}</span></small>
                        </div>
                    </div>

                    <div class="bio-box">
                        {{ $artist['bio'] }}
                    </div>

                    @if(isset($tracks))
                        <h4 style="margin-bottom: 12px; color: #ef4444;">Top Tracks</h4>
                        <ul class="list-group">
                            @foreach($tracks as $track)
                                <li class="list-item">🎵 {{ $track }}</li>
                            @endforeach
                        </ul>
                    @elseif(isset($albums))
                        <h4 style="margin-bottom: 12px; color: #ef4444;">Daftar Album</h4>
                        <ul class="list-group">
                            @foreach($albums as $album)
                                <li class="list-item">💿 {{ $album }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="/artists" class="btn">← Kembali ke Daftar Artis</a>
                </div>
            @else
                <div class="alert">Artis tidak ditemukan.</div>
            @endif

        @elseif(isset($artists))
            <div class="grid">
                @foreach($artists as $item)
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between; margin-bottom: 0;">
                    <div>
                        <h3 class="fw-bold" style="margin-bottom: 4px; font-size: 18px;">{{ $item['name'] }}</h3>
                        <span class="badge">{{ $item['genre'] }}</span>
                        <p class="text-secondary" style="font-size: 13px; line-height: 1.5;">{{ Str::limit($item['bio'], 90) }}</p>
                    </div>
                    <div class="card-actions">
                        <a href="/artists/{{ $item['id'] }}" class="btn">Bio</a>
                        <a href="/artists/{{ $item['id'] }}/top-tracks" class="btn btn-danger">Top Tracks</a>
                        <a href="/artists/{{ $item['id'] }}/albums" class="btn">Album</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>