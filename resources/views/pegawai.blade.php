<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(120deg, #4e73df, #1cc88a);
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            width: 80%;
            max-width: 800px;
            margin: 60px auto;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #2e59d9;
            font-size: 28px;
            margin-bottom: 25px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #f8f9fc;
            margin-bottom: 12px;
            padding: 12px 18px;
            border-left: 6px solid #4e73df;
            border-radius: 8px;
            font-size: 16px;
        }

        li strong {
            color: #1cc88a;
        }

        .hobbies ul {
            margin-top: 8px;
            padding-left: 20px;
        }

        .motivasi {
            text-align: center;
            background: #1cc88a;
            color: white;
            font-weight: bold;
            padding: 15px;
            border-radius: 8px;
            margin-top: 25px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #eee;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Data Pegawai</h2>
        <ul>
            <li><strong>Nama:</strong> {{ $name }}</li>
            <li><strong>Umur:</strong> {{ $my_age }} tahun</li>
            <li class="hobbies">
                <strong>Hobi:</strong>
                <ul>
                    @foreach ($hobbies as $hobi)
                        <li>{{ $hobi }}</li>
                    @endforeach
                </ul>
            </li>
            <li><strong>Tanggal Harus Wisuda:</strong> {{ $tgl_harus_wisuda }}</li>
            <li><strong>Jarak Hari ke Wisuda:</strong> {{ $time_to_study_left }} hari</li>
            <li><strong>Semester Saat Ini:</strong> {{ $current_semester }}</li>
            <li><strong>Cita-cita:</strong> {{ $future_goal }}</li>
        </ul>

        <div class="motivasi">
            {{ $motivasi }}
        </div>
    </div>

    <footer>
        © {{ date('Y') }} Sistem Informasi Pegawai — Laravel Project
    </footer>
</body>
</html>
