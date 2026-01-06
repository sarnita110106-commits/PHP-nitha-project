<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavender Message Form</title>
    <style>
        :root {
            --lavender-bg: #E6E6FA;
            --iphone-purple: #BDB5D5;
            --text-color: #4A4A4A;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--lavender-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px);
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 360px;
            border: 1px solid white;
        }

        h2 { text-align: center; color: var(--text-color); margin-bottom: 20px; }

        label { display: block; margin: 10px 0 5px; font-size: 0.85rem; font-weight: 600; color: #666; }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 15px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: 0.3s;
        }

        input:focus { outline: none; border-color: var(--iphone-purple); box-shadow: 0 0 8px rgba(189, 181, 213, 0.5); }

        button {
            width: 100%;
            padding: 15px;
            margin-top: 25px;
            border: none;
            border-radius: 15px;
            background-color: var(--iphone-purple);
            color: white;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { background-color: #A699C3; transform: translateY(-2px); }
        
        .footer { text-align: center; margin-top: 15px; font-size: 0.75rem; color: #888; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Message Form</h2>
        <form action="submit.php" method="POST">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" placeholder="Contoh: Budi Santoso" required>

            <label>Email (Gmail/Yahoo):</label>
            <input type="email" name="email" placeholder="nama@gmail.com" required>

            <label>Nomor HP (Hanya Angka):</label>
            <input type="text" name="nomor" placeholder="081234567890" required>

            <label>Pesan Anda:</label>
            <textarea name="pesan" rows="3" placeholder="Tulis pesan minimal 10 karakter..." required></textarea>

            <button type="submit">Kirim Pesan</button>
        </form>
        <div class="footer">API v2.0.2 • Protected by Lavender Server</div>
    </div>
</body>
</html>