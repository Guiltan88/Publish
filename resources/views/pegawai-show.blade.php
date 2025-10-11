<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
        }
        .data-card {
            background: #f8fafc;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .data-item {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .data-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .label {
            font-weight: bold;
            color: #4f46e5;
            display: block;
            margin-bottom: 0.25rem;
        }
        .value {
            color: #333;
        }
        .hobby-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }
        .hobby-item {
            background: #4f46e5;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        .message {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 1rem;
            border-radius: 4px;
            margin: 1rem 0;
        }
        .btn-back {
            display: inline-block;
            background: #6b7280;
            color: white;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 1rem;
        }
        .btn-back:hover {
            background: #4b5563;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>

        <div class="data-card">
            <div class="data-item">
                <span class="label">Nama:</span>
                <span class="value">{{ $name }}</span>
            </div>

            <div class="data-item">
                <span class="label">Umur:</span>
                <span class="value">{{ $my_age }} tahun</span>
            </div>

            <div class="data-item">
                <span class="label">Hobi:</span>
                <div class="hobby-list">
                    @foreach ($hobbies as $hobby)
                        <span class="hobby-item">{{ $hobby }}</span>
                    @endforeach
                </div>
            </div>

            <div class="data-item">
                <span class="label">Tanggal Harus Wisuda:</span>
                <span class="value">{{ $tgl_harus_wisuda }}</span>
            </div>

            <div class="data-item">
                <span class="label">Jadwal Wisuda:</span>
                <span class="value">{{ $time_to_study_left }}</span>
            </div>

            <div class="data-item">
                <span class="label">Semester Saat Ini:</span>
                <span class="value">Semester {{ $current_semester }}</span>
            </div>

            <div class="data-item">
                <span class="label">Pesan Akademik:</span>
                <div class="message">{{ $semester_message }}</div>
            </div>

            <div class="data-item">
                <span class="label">Cita-cita:</span>
                <span class="value">{{ $future_goal }}</span>
            </div>
        </div>

        <a href="{{ route('pegawai.index') }}" class="btn-back">Input Data Lagi</a>
    </div>
</body>
</html>
