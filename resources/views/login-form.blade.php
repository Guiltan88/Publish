<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login</title>
  <style>
    body {
      margin:0;
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #111;
    }
    .login-container {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      width: 320px;
    }
    h2 {
      margin-top: 0;
      margin-bottom: 1rem;
      font-weight: 600;
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 0.3rem;
      font-weight: 500;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.6rem 0.8rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      box-sizing: border-box;
      transition: border-color 0.2s;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #4f46e5;
      box-shadow: 0 0 5px rgba(79,70,229,0.5);
    }
    button {
      width: 100%;
      padding: 0.7rem;
      background: #4f46e5;
      border: none;
      color: white;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s;
    }
    button:hover {
      background: #3730a3;
    }
  </style>
</head>
<body>
  <main class="login-container" role="main" aria-labelledby="loginTitle">
    <h2 id="loginTitle">Login</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="username" />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="current-password" />

      <a href="resource/views/form-setelah-login.blade.php"></a>
      <button type="submit">Masuk</button>
    </form>
  </main>
</body>
</html>
