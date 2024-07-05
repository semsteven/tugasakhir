<?php
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username_db = "root"; 
    $password_db = ""; 
    $dbname = "db_crud"; 


    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


  
    if ($password !== $confirm_password) {
        $error = "Konfirmasi password tidak sesuai.";
    } else {
        
        
        $check_query = "SELECT * FROM login WHERE username='$username' OR email='$email'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $error = "Username atau email sudah terdaftar.";
        } else {
    
            $insert_query = "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$confirm_password')";

            if ($conn->query($insert_query) === TRUE) {
                
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }

    
    $conn->close();
}


function verify_password($submitted_password, $hashed_password_from_database) {
    return password_verify($submitted_password, $hashed_password_from_database);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            color: #333;
            margin-bottom: 10px;
        }
        .input-group-text {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 0.25rem 0 0 0.25rem;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 0 0.25rem 0.25rem 0;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert-danger {
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Register</h2>
                <form class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                       <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>

                    <?php if(!empty($error)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                    
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>