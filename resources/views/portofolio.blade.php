<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
    <style>
        body {
            background-color: #ffffff;
            color: #000000;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        h1 {
            color: #0000ff;
        }

        .portfolio-item {
            margin-bottom: 20px;
        }

        .item-image {
            width: 200px;
            height: 150px;
            background-color: #0000ff;
        }

        .item-title {
            margin-top: 10px;
            font-weight: bold;
        }

        .item-description {
            margin-top: 5px;
        }


    </style>
</head>

<body>
<div class="navbar">
    <a href="/homepage">Home</a>
    <a href="/profil">profil</a>
    <a href="/takumi">takumi</a>
</div>


    <h1>Portofolio</h1>

    <div class="portfolio-item">
        <div class="item-image"></div>
        <div class="item-title">Item 1</div>
        <div class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
    </div>

    <div class="portfolio-item">
        <div class="item-image"></div>
        <div class="item-title">Item 2</div>
        <div class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
    </div>

    <div class="portfolio-item">
        <div class="item-image"></div>
        <div class="item-title">Item 3</div>
        <div class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
    </div>
</body>

</html>