<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    
    <title>Login</title>
</head>
<body class="text-center">
    <h1>CAQ about the ECT</h1>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-3 col-sm-1"></div>
        <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">เข้าสู่ระบบ</div>
                <div class="card-body">
                    <div class="form-login">
                        <form  action="page1.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="username" placeholder="">
                                <label for="floatingInput">Email address</label> 
                              </div>
                              <div class="form-floating">
                                <input type="password" class="form-control" id="password" placeholder="">
                                <label for="floatingPassword">Password</label>
                            </div>                
                            <button type="submit" class="btn btn-success w-70 mt-3" href="page1.php">Login</button>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-1"></div>
    </div>
    
</body>
</html>