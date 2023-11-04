
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foothills International School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='css/admin.css'/>
    
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>

<body>
    <style>
        body {
            background-color: #f2f2f2;
        }
      
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 50px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }
      
        .form-group {
            margin-bottom: 20px;
        }
      
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
      
        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
      
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .logo label {
            display: block;
            font-size: 20px;
            font-weight: bold;
            color: lightblue;
        }
      
        .submit-btn {
            margin-top: 20px;
            text-align: center;
        }
      
        .submit-btn input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .switchform{
            margin-top: 20px;
            text-align: center;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;

        }
    </style>

<body>
    <div class="container">
        <div class="logo">
            <img src="assests/foothills logo.jpeg" alt="Logo">
            <label>FOOTHILLS INTERNATIONAL SCHOOL</label>
        </div>
        <form action="loginacc.php" method="POST" autocomplete="off">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" autocomplete="off" required>
            </div>
   
            <div class="submit-btn">
                <input type="submit" value="Sign In">
                <a class='switchform' href="index.php">Sign Up</a>

            </div>
        </form>
</body>
</html>



