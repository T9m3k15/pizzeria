<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie Zamówienia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .confirmation {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .confirmation h1 {
            color: #4CAF50;
        }
        .confirmation p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <h1>Twoje zamówienie zostało złożone!</h1>
        <p>Dziękujemy za zamówienie, {{ $order['name'] }}!</p>
        <p>Adres dostawy: {{ $order['address'] }}</p>
        <p>Numer telefonu: {{ $order['phone'] }}</p>
        <p>Sposób płatności: {{ $order['payment'] === 'cash' ? 'Gotówka' : 'Karta kredytowa' }}</p>
        <p>Całkowity koszt zamówienia: {{ number_format($totalPrice, 2) }} PLN</p>
        <p><a href="/">Wróć do strony głównej</a></p>
    </div>
</body>
</html>
