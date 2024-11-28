<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Page</title>
    {{ assets.outputCss() }}
</head>
<body>
<header>
    <div class="container">
        <h1>Foglalj orvost</h1>
    </div>
</header>
<main>
    <div class="container">
        {{ content() }}
    </div>
</main>
<footer>
    <div class="container">
        <p>&copy; 2024 Foglalj orvost. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
