<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Код</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Відцентрування тексту */
        }

        h1 {
            margin-bottom: 20px; /* Додати відступ знизу */
        }

        .qr-code {
            margin: 20px 0; /* Відступи навколо QR-коду */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s; /* Анімація переходу */
        }

        .btn:hover {
            background-color: #0056b3; /* Темніший колір при наведенні */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ваш QR Код</h1>
        <div class="qr-code">
            {!! $qrCodeImage !!}
        </div>
        <div class="mt-4">
            <a href="{{ route('portfolios.index') }}" class="btn">Мої портфоліо</a> <!-- Кнопка для повернення до портфоліо -->
        </div>
    </div>
</body>
</html>
