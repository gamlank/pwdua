<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri - {{ $biodata['nama'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            /* Latar Belakang GIF dengan Overlay Marun Gelap */
            background-image: url("{{ asset('images/bg.gif') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Kartu Profil Utama */
        .card {
            background-color: rgba(89, 12, 46, 0.95);
            border: 1px solid #800f2f;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
            padding: 32px 24px;
            width: 100%;
            max-width: 340px;
            text-align: center;
            backdrop-filter: blur(8px);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: #ff758f;
        }

        .profile-img-wrapper {
            position: relative;
            width: 110px;
            height: 110px;
            margin: 0 auto 20px;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ff758f;
            box-shadow: 0 4px 14px rgba(255, 117, 143, 0.3);
        }

        .card h2 {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .badge-nim {
            display: inline-block;
            background-color: #2b0213;
            color: #ff758f;
            border: 1px solid #800f2f;
            font-size: 13px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 24px;
        }

        .btn-detail {
            width: 100%;
            background-color: #a4133c;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(164, 19, 60, 0.4);
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-detail:hover {
            background-color: #800f2f;
        }

        .btn-detail:active {
            transform: scale(0.98);
        }

        /* Modal / Pop-up Detail */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(43, 2, 19, 0.85);
            backdrop-filter: blur(6px);
            display: none;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1000;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background-color: #590c2e;
            border: 1px solid #800f2f;
            padding: 28px;
            border-radius: 16px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.6);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        .modal-header {
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #800f2f;
        }

        .modal-header h3 {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
        }

        .detail-grid {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            background-color: #2b0213;
            padding: 12px 16px;
            border-radius: 8px;
            border: 1px solid #800f2f;
        }

        .detail-label {
            font-size: 11px;
            font-weight: 600;
            color: #ff758f;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 500;
            color: #f8edeb;
        }

        .btn-close {
            margin-top: 24px;
            width: 100%;
            background-color: #800f2f;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-close:hover {
            background-color: #a4133c;
        }
    </style>
</head>
<body>

    <!-- Kartu Utama -->
    <div class="card">
        <div class="profile-img-wrapper">
            <img src="{{ asset($biodata['foto']) }}" alt="Foto Profil" class="profile-img">
        </div>
        <h2>{{ $biodata['nama'] }}</h2>
        <span class="badge-nim">NIM: {{ $biodata['nim'] }}</span>
        <button class="btn-detail" onclick="openModal()">Lihat Lebih Lengkap</button>
    </div>

    <!-- Pop-up Detail Biodata -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Data Diri</h3>
            </div>
            
            <div class="detail-grid">
                <div class="detail-item">
                    <span class="detail-label">Jurusan & Angkatan</span>
                    <span class="detail-value">{{ $biodata['jurusan'] }} ({{ $biodata['angkatan'] }})</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $biodata['email'] }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Telepon</span>
                    <span class="detail-value">{{ $biodata['telepon'] }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Alamat</span>
                    <span class="detail-value">{{ $biodata['alamat'] }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Deskripsi</span>
                    <span class="detail-value">{{ $biodata['deskripsi'] }}</span>
                </div>
            </div>

            <button class="btn-close" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById('detailModal');
            modal.classList.add('active');
        }

        function closeModal() {
            const modal = document.getElementById('detailModal');
            modal.classList.remove('active');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('detailModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>