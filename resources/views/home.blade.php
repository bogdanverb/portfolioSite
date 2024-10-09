<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна</title>
    <!-- Підключення Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #343a40; /* Темний фон */
            color: white; /* Білий текст */
        }
        .container {
            margin-top: 100px;
            text-align: center;
        }
        .btn-custom {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .hero {
            background-color: #495057; /* Темніший фон для блоку */
            border-radius: 10px;
            padding: 50px 20px;
        }
        h1 {
            font-size: 2.5rem; /* Збільшений розмір заголовка */
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="hero">
            <h1>Ласкаво просимо!</h1>
            <p class="lead">Тут ви можете створити своє портфоліо та наповнити його прикладами своїх робіт.</p>
            <a href="{{ url('/portfolios') }}" class="btn btn-custom">Перейти до портфоліо</a>
        </div>
    </div>

    <!-- Підключення Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
