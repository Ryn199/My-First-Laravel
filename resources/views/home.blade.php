<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="icon" href="https://i.pinimg.com/564x/54/4a/27/544a2751c85f75739ce8fc7b66393951.jpg" type="image/x-icon"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        .content {
            padding: 20px;
            text-align: center;
        }
        .button {
            background-color: #007BFF;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="/homepage">Home</a>
    <a href="/profil">profil</a>
    <a href="/takumi">takumi</a>
</div>

<div class="content">
    <h1>Selamat Datang di Layanan Kami</h1>
    <p>Pilih salah satu layanan di bawah ini:</p>
    <a href="https://nextcloud.ridhoyudiana.my.id/" target="_blank"><button class="button">Cloud Storage</button></a>
    <a href="https://casaos.ridhoyudiana.my.id/" target="_blank"><button class="button">Server</button></a>
    <a href="https://database.ridhoyudiana.my.id/" target="_blank"><button class="button">Database</button></a>
</div>

<div class="footer">
    <p>&copy; 2024 Ridho Yudiana. All rights reserved.</p>
</div>

</body>
</html>
