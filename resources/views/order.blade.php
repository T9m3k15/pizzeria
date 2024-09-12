<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Zamówienia</title>
    <style>
        /* Stylizacja formularza */
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Formularz Zamówienia</h1>
    <form action="/submit-order" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Imię i nazwisko:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Adres:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="phone">Numer telefonu:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="payment">Sposób płatności:</label>
            <select id="payment" name="payment" required>
                <option value="cash">Gotówka</option>
                <option value="card">Karta kredytowa</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Złóż zamówienie</button>
        </div>
    </form>
</body>
</html>
