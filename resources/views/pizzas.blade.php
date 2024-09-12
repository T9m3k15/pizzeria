<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wybierz Pizzę i Dodatki</title>
    <style>
        .pizza-box, .addon-box {
            width: 200px;
            padding: 20px;
            margin: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            display: inline-block;
            text-align: center;
            cursor: pointer;
        }

        .pizza-image, .addon-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        h3, p {
            margin: 10px 0;
        }

        .quantity-controls {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .quantity-controls button {
            margin: 0 5px;
            padding: 5px 10px;
            font-size: 16px;
        }

        #order-summary-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        #order-summary {
            font-size: 18px;
            margin-right: 20px; /* Odstęp między podsumowaniem a przyciskiem */
        }

        #order-button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #order-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Wybierz swoją pizzę</h1>

    @foreach ($pizzas as $pizza)
        <div class="pizza-box" data-pizza="{{ $pizza['name'] }}" data-price="{{ $pizza['price'] }}">
            <img src="{{ asset('images/' . $pizza['image']) }}" alt="{{ $pizza['name'] }}" class="pizza-image">
            <h3>{{ $pizza['name'] }}</h3>
            <p>Cena: {{ $pizza['price'] }} PLN</p>

            <div class="quantity-controls">
                <button class="minus">-</button>
                <span class="quantity" data-pizza="{{ $pizza['name'] }}">0</span>
                <button class="plus">+</button>
            </div>
        </div>
    @endforeach

    <h2>Dodaj dodatki</h2>

    <div id="addons">
        @foreach ($addons as $addon)
            <div class="addon-box" data-addon="{{ $addon['name'] }}" data-price="{{ $addon['price'] }}">
                <img src="{{ asset('images/' . $addon['image']) }}" alt="{{ $addon['name'] }}" class="addon-image">
                <h3>{{ $addon['name'] }}</h3>
                <p>Cena: {{ $addon['price'] }} PLN</p>

                <div class="quantity-controls">
                    <button class="minus-addon">-</button>
                    <span class="quantity-addon" data-addon="{{ $addon['name'] }}">0</span>
                    <button class="plus-addon">+</button>
                </div>
            </div>
        @endforeach
    </div>

    <div id="order-summary-container">
        <p id="order-summary">Zamówienie: 0 PLN</p>
        <button id="order-button">Zamów</button>
    </div>

    <script>
        let totalPrice = 0;

        // Aktualizacja zamówienia pizzy
        const pizzaBoxes = document.querySelectorAll('.pizza-box');
        pizzaBoxes.forEach(box => {
            const plusButton = box.querySelector('.plus');
            const minusButton = box.querySelector('.minus');
            const quantityDisplay = box.querySelector('.quantity');
            const pizzaPrice = parseFloat(box.getAttribute('data-price'));
            let quantity = 0;

            function updateOrderSummary() {
                document.getElementById('order-summary').textContent = `Zamówienie: ${totalPrice.toFixed(2)} PLN`;
            }

            plusButton.addEventListener('click', () => {
                quantity++;
                quantityDisplay.textContent = quantity;
                totalPrice += pizzaPrice;
                updateOrderSummary();
            });

            minusButton.addEventListener('click', () => {
                if (quantity > 0) {
                    quantity--;
                    quantityDisplay.textContent = quantity;
                    totalPrice -= pizzaPrice;
                    updateOrderSummary();
                }
            });
        });

        // Aktualizacja zamówienia dodatków
        const addonBoxes = document.querySelectorAll('.addon-box');
        addonBoxes.forEach(box => {
            const plusAddonButton = box.querySelector('.plus-addon');
            const minusAddonButton = box.querySelector('.minus-addon');
            const quantityAddonDisplay = box.querySelector('.quantity-addon');
            const addonPrice = parseFloat(box.getAttribute('data-price'));
            let quantity = 0;

            function updateOrderSummary() {
                document.getElementById('order-summary').textContent = `Zamówienie: ${totalPrice.toFixed(2)} PLN`;
            }

            plusAddonButton.addEventListener('click', () => {
                quantity++;
                quantityAddonDisplay.textContent = quantity;
                totalPrice += addonPrice;
                updateOrderSummary();
            });

            minusAddonButton.addEventListener('click', () => {
                if (quantity > 0) {
                    quantity--;
                    quantityAddonDisplay.textContent = quantity;
                    totalPrice -= addonPrice;
                    updateOrderSummary();
                }
            });
        });

        // Przekierowanie do formularza zamówienia
        document.getElementById('order-button').addEventListener('click', () => {
            if (totalPrice > 0) {
                window.location.href = '/order'; // Przekierowuje do formularza zamówienia
            } else {
                alert('Proszę dodać coś do zamówienia.');
            }
        });
    </script>
</body>
</html>
