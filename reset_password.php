<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - FOKRI PTK</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            padding: 20px;
        }
        .reset-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        .reset-container h2 {
            font-size: 28px;
            color: #1e3a8a;
            margin-bottom: 15px;
        }
        .reset-container p {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }
        .form-group input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #d1e9f7;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }
        .form-group input:focus {
            border-color: #64b5f6;
            box-shadow: 0 0 0 4px rgba(100, 181, 246, 0.2);
        }
        .reset-button {
            width: 100%;
            padding: 15px;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }
        .reset-button:hover {
            background: #1a2f6b;
            transform: translateY(-2px);
        }
        .back-to-login {
            margin-top: 25px;
            font-size: 15px;
        }
        .back-to-login a {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 600;
        }
        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Lupa Password Anda?</h2>
        <p>Masukkan email Anda di bawah ini dan kami akan mengirimkan instruksi untuk mereset password Anda.</p>
        <div class="form-group">
            <label for="resetEmail">Email</label>
            <input type="email" id="resetEmail" placeholder="Masukkan email terdaftar Anda" required>
        </div>
        <button class="reset-button" onclick="sendResetLink()">Kirim Link Reset</button>
        <p class="back-to-login">
            <a href="index.html">Kembali ke Login</a>
        </p>
    </div>

    <script>
        function sendResetLink() {
            const email = document.getElementById('resetEmail').value.trim();

            if (!email) {
                alert("Mohon masukkan alamat email Anda.");
                return;
            }

            // Ini hanya simulasi. Dalam aplikasi nyata, ini akan mengirim permintaan ke server
            // untuk mengirim email reset password.
            alert(`Jika email "${email}" terdaftar, link reset password akan dikirimkan ke alamat tersebut. (Simulasi)`);
        }
    </script>
</body>
</html>