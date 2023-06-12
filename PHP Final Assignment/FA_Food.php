<!DOCTYPE html>
<html>
<head>
    <title>Food</title>
    <link rel="stylesheet" href="Final.css">
    <style>
        body{
            background-image: url('images/food.jpg');
            background-repeat: 1;
            background-size: 112%;
            background-position: center;
            font-family: Times, sans-serif;
        }

        .wrapper {
            width: 800px;
            padding: 30px;
            margin: 20px auto;
            background-color: lightyellow;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 40px;
        }

        table {
            background-color: white;
            border-collapse: collapse;
            width: 600px;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        img {
            width: 200px;
            height: 150px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .button:hover{
            background-color: #45a049;
        }
        
        footer {
            background-color: darkred;
            padding: 20px;
            text-align: center;
            margin-top: auto;
            bottom: 0;
        }

        .footer-content {
            font-size: 15px;
            color: white;
        }
    </style>
</head>
<body>
<nav>
    <label class="logo">Foodie Express</label>
    <ul>
        <li><a href="FA_Home.php">Home</a></li>
        <li><a href="FA_About.php">About</a></li>
        <li><a class="active" href="FA_Food.php">Food</a></li>
        <li><a href="FA_Cart.php">Cart</a></li>
        <li><a href="FA_Login.html">Logout</a></li>
    </ul>
</nav><br>

<div class="wrapper">
    <h1>Select Food Category</h1><br><hr><br> 
    <center>
        <table>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Western Cuisine</td>
                <td><img src="images/fc1.jpg"></td>
                <td><button class="button" onclick="location.href='FA_WFood.php'">Next</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Japanese Cuisine</td>
                <td><img src="images/fc2.jpg"></td>
                <td><button class="button" onclick="location.href='FA_JPFood.php'">Next</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Malaysian Cuisine</td>
                <td><img src="images/fc3.jpg"></td>
                <td><button class="button" onclick="location.href='FA_MYFood.php'">Next</button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Thailand Cuisine</td>
                <td><img src="images/fc4.jpg"></td>
                <td><button class="button" onclick="location.href='FA_ThaiFood.php'">Next</button></td>
            </tr>
        </table><br><hr>
    </center>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
