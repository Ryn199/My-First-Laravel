<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politeknik Takumi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .header img {
            max-height: 50px;
        }
        .nav {
            display: flex;
            justify-content: center;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }
        .nav a {
            padding: 14px 20px;
            text-decoration: none;
            color: #333;
        }
        .nav a:hover {
            background-color: #ddd;
        }
        .banner {
            position: relative;
            background-image: url('cityscape.jpg'); /* Replace with the actual image path */
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .banner h1 {
            margin: 0;
        }
        .testimonials {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 40px 20px;
        }
        .testimonial {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            width: 30%;
        }
        .testimonial img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .testimonial p {
            margin: 0;
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
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/homepage">Home</a>
        <a href="/profil">profil</a>
        <a href="/takumi">takumi</a>
    </div>
    <div class="header">
        <img src="logo.png" alt="Politeknik Takumi Logo"> <!-- Replace with the actual logo path -->
    </div>
    <div class="banner">
        <h1>MAHASISWA INDUSTRY</h1>
        <h1>Politeknik Takumi</h1>
    </div>
    <div class="testimonials">
        <div class="testimonial">
            <img src="tarmuji.jpg" alt="Tarmuji"> <!-- Replace with the actual image path -->
            <p><strong>Tetap Semangat</strong></p>
            <p>Staff Digital Marketing<br>PT Ayumi<br>Semester 3</p>
            <p>Tarmuji<br>Mahasiswa Bisnis Digital</p>
        </div>
        <div class="testimonial">
            <img src="reza.jpg" alt="Reza"> <!-- Replace with the actual image path -->
            <p><strong>Kerja ok Kuliah ok</strong></p>
            <p>Staff Digital Marketing<br>Divisi recruitment PT Minori<br>Semester 1</p>
            <p>Reza<br>Mahasiswa Bisnis Digital</p>
        </div>
        <div class="testimonial">
            <img src="karman.jpg" alt="Karman"> <!-- Replace with the actual image path -->
            <p><strong>Lintas Ilmu, Bahasa Jepang dan IT</strong></p>
            <p>Tenaga Pengajar Bahasa Jepang Minori Group<br>Semester 3</p>
            <p>Karman<br>Mahasiswa IT</p>
        </div>
    </div>
</body>
</html>
