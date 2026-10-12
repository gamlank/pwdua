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
        .form-label {
            color: #ffffff !important;
            font-weight: 600;
        }
        .form-control-dark, .form-select-dark {
            background-color: #0d1117 !important;
            border: 1px solid #30363d !important;
            color: #ffffff !important;
            border-radius: 8px;
        }
        .form-control-dark:focus, .form-select-dark:focus {
            background-color: #0d1117 !important;
            border-color: #38bdf8 !important;
            color: #ffffff !important;
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.3);
        }
        .form-select-dark option {
            background-color: #0d1117 !important;
            color: #ffffff !important;
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
    </style>
</head>
<body class="py-5">
    <div class="container" style="max-width: 600px;">
        <div class="card card-custom">
            <div class="card-header bg-transparent border-bottom border-secondary p-4">
                <h4 class="fw-bold text-white mb-0"><i class="fa-solid fa-pen-to-square text-cyan me-2"></i>Edit Data Musisi</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('artists.update', $artist->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Panggung</label>
                        <input type="text" name="stage_name" class="form-control form-control-dark py-2" value="{{ $artist->stage_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genre</label>
                        <select name="genre_id" class="form-select form-select-dark py-2" required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $artist->genre_id == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Label Rekaman</label>
                        <select name="label_record_id" class="form-select form-select-dark py-2">
                            <option value="">-- Tanpa Label (Independen) --</option>
                            @foreach($labels as $label)
                                <option value="{{ $label->id }}" {{ $artist->label_record_id == $label->id ? 'selected' : '' }}>
                                    {{ $label->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Tahun Debut</label>
                        <input type="number" name="debut_year" class="form-control form-control-dark py-2" value="{{ $artist->debut_year }}" required>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('artists.index') }}" class="btn btn-outline-secondary px-4 text-white">Batal</a>
                        <button type="submit" class="btn btn-cyan px-4"><i class="fa-solid fa-rotate me-2"></i>Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>