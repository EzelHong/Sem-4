<!DOCTYPE html>
<html>
<head>
    <title>Food</title>
    <link rel="stylesheet" href="Final.css">
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        img {
            width: 150px;
            height: 150px;
        }
        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        table{
            background-color: white;
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
        <li><a href="#">Cart</a></li>
        <li><a href="FA_Login.html">Login</a></li>
    </ul>
</nav><br>

<div class="wrapper">
    <h1>Select Food Category</h1><br><hr><br>   
    <center>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Western Food</td>
                <td><img src="images/pic1.jpg"></td>
                <td><button class="button" onclick="location.href='FA_WesternFood.php'">Next</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Japanese Food</td>
                <td><img src="images/pic2.jpg"></td>
                <td><button class="button" onclick="location.href='FA_JPFood.php'">Next</button></td>
            </tr>
        </table>
    </center>
</div>
</body>
</html>
