<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Caveat&display=swap');

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    padding: 150px;
    width: 300px;
}

h2 {
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    color: #555;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 15px;
    margin-top: 10px;
    border-radius: 3px;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    background-color: #0056b3;
}

.logo {
    max-width: 100%; /* Maksimum lebar gambar adalah 100% lebar elemen yang mengandungnya */
    height: auto; /* Menjaga perbandingan aspek gambar saat mengubah lebar */
}

p {
    font-family: Caveat;
    font-size: 18px;
}
</style>
</head>
<body>
    <img src="img/logo.png" height="200" style="margin-right: 55px;">
    <div class="login-container">
        <h2>Management Apps</h2>
        <form action="proses_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="footer">
            <p>Hak Cipta &copy; 2023 Mstore | Developed by Rusdi</p>
        </div>
    </div>
    
</body>
</html>
