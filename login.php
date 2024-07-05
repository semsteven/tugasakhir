<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "db_crud"; 


    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }   


    $username = $_POST['username'];
    $password = $_POST['password'];

 
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        
        $email = $row['email'];

     
        header("Location: index.php?email=" . urlencode($email)); 
        exit();
    } else {
        $error = "Username atau password salah.";
    }

   
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .wrapper {
            width: 100%;
            max-width: 850px;
            margin: 20px auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }
        .container.main {
            display: flex;
            flex-direction: row;
            height: 100%;
        }
        .side-image {
           
            position: relative;
        }
        .side-image .text {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
            font-size: 1.5rem;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }
        .right {
            width: 50%;
            padding: 40px 30px;
        }
        .input-box {
            width: 100%;
        }
        .input-box header {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }
        .input-field {
            position: relative;
            margin-bottom: 25px;
        }
        .input-field label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        .input-field .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .input-field .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
        .input-field .btn:hover {
            background-color: #0056b3;
        }
        .signin {
            text-align: center;
            margin-top: 20px;
        }
        .signin span {
            color: #666;
        }
        .signin a {
            color: #007bff;
            text-decoration: none;
        }
        .signin a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .container.main {
                flex-direction: column;
            }
            .side-image, .right {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="bm.png" alt="">
                    <div class="text">
                        <p><b><i>~ SELAMAT DATANG DI SMA BM</b></i></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <header>Login</header>
                            <div class="input-field">
                                <label for="username">Username</label>
                                <input type="text" class="input" id="username" name="username" required autocomplete="off">
                            </div>
                            <div class="input-field">
                                <label for="password">Password</label>
                                <input type="password" class="input" id="password" name="password" required>
                            </div>

                            <?php if(isset($error)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>

                            <div class="input-field">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="signin">
                                <span>Don't have an account? <a href="Register.php">Register Here</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
