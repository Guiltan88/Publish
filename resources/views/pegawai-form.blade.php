<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 5px rgba(79,70,229,0.3);
        }
        .btn {
            background: #4f46e5;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }
        .btn:hover {
            background: #3730a3;
        }
        .note {
            font-size: 0.9rem;
            color: #666;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Input Data Mahasiswa</h1>

        @if ($errors->any())
            <div style="background: #fee2e2; color: #dc2626; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <ul style="margin: 0; padding-left: 1rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
            </div>

            <div class="form-group">
                <label for="hobi">Hobi (pisahkan dengan koma)</label>
                <input type="text" id="hobi" name="hobi" value="{{ old('hobi') }}" placeholder="Contoh: Membaca, Olahraga, Musik, Programming, Traveling" required>
                <div class="note">Minimal 5 hobi, pisahkan dengan koma</div>
            </div>

            <div class="form-group">
                <label for="tgl_harus_wisuda">Tanggal Harus Wisuda</label>
                <input type="date" id="tgl_harus_wisuda" name="tgl_harus_wisuda" value="{{ old('tgl_harus_wisuda') }}" required>
            </div>

            <div class="form-group">
                <label for="current_semester">Semester Saat Ini</label>
                <input type="number" id="current_semester" name="current_semester" value="{{ old('current_semester') }}" min="1" max="14" required>
            </div>

            <div class="form-group">
                <label for="future_goal">Cita-cita</label>
                <input type="text" id="future_goal" name="future_goal" value="{{ old('future_goal') }}" placeholder="Contoh: Menjadi Software Engineer" required>
            </div>

            <button type="submit" class="btn">Submit Data</button>
        </form>
    </div>
</body>
</html>
