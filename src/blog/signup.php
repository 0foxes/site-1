<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel='icon' href="https://picsum.photos/256?random=1" type='image/x-icon' />
        <title>About Me</title>
        <!-- Mobile-friendly navbar -->
        <nav class="navbar navbar-expand-lg navbar-expand-xl navbar-expand-md navbar-dark bg-dark shadow-sm sticky-top">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainbar">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="mainbar">
                <a class="navbar-brand" href="/"></a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!-- Change this -->
                    <a class="nav-item nav-link" href="/">Home</a>
                    <a class="nav-item nav-link" href="/about/">About Me</a>
                    <a class="nav-item nav-link" href="/resume/">My Resume</a>
                    <a class="nav-item nav-link" href="/projects/">My Projects</a>
                    <a class="nav-item nav-link active" href="/blog/">My Blog</a>
                    <a class="nav-item nav-link" href="/contact/">Contact Me</a>
                </ul>
                <ul class="navbar-nav navbar-right">
                </ul>
            </div>
        </nav>
    </head>
    <div class="container">
        <div class="page-header" style="padding-top:1em; margin:auto;">
            <h1>Post Notifications</h1>
        </div>
        <hr>
        <!-- Header ends here -->
        <body>
            <div class="text">
                <?php
                    // Display all errors
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    // Get user IP
                    function getUserIP(){
                      $clientIp  = @$_SERVER['HTTP_CLIENT_IP'];
                      $forwardIp = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                      $remoteIp  = $_SERVER['REMOTE_ADDR'];

                      if(filter_var($clientIp, FILTER_VALIDATE_IP))
                      {
                          $ip = $clientIp;
                      }
                      elseif(filter_var($forwardIp, FILTER_VALIDATE_IP))
                      {
                          $ip = $forwardIp;
                      }
                      else
                      {
                          $ip = $remoteIp;
                      }

                      return $ip;
                    }

                    // Connection to database
                    $user = "cg";
                    $password = "A334757465z.";
                    $host = "127.0.0.1";
                    $dbase = "main";
                    $table = "emails";
                    $dbc = mysqli_connect($host, $user, $password, $dbase)
                    or die("Database connection error.");

                    // Info from the form
                    $name = mysqli_real_escape_string($dbc, filter_var($_POST['userName'], FILTER_SANITIZE_STRING));
                    $email = mysqli_real_escape_string($dbc, filter_var($_POST['userEmail'], FILTER_SANITIZE_STRING));
                    $userIp = getUserIP();
                    $userTime = time();

                    // Do the database stuff
                    $query = "INSERT IGNORE INTO $table(name, email, ip, signuptime)". "VALUES ('$name', '$email', '$userIp', '$userTime')";

                    mysqli_query ($dbc, $query)
                    or die ("Database query error.");
                    echo 'You have been successfully signed up.' . '<br>';
                    echo 'To unsubscribe, email <a href="mailto:@gmail.com">@gmail.com</a>.';
                    mysqli_close($dbc);

                    // Notify me by email
                    $sender = 'message@.com';
                    $to 	 = "@gmail.com";
                    $headers = 'From:' . $sender;
                    $subject    = 'New User Signed Up:';
                    $body 			= "New User Signed Up:";
                    $body .= "\r\nUser IP: " . $userIp;
                    $body .= "\r\nSignup Time: " . $userTime;
                    $body .= "\r\nUser Name: " . $name;
                    $body .= "\r\nUser Email: " . $email;
                    mail($to, $subject, $body, $headers);

                    ?>
            </div>
            <hr>
            <!-- Footer starts here -->
    </div>
    </body>
    <footer class="page-footer footer">
        <div class="container text-center">
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a href="https://.com" class="text-dark"><i class="zoom fa fa-globe fa-2x px-2"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/" class="text-dark"><i class="zoom fab fa-github fa-2x px-2"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="mailto:@gmail.com" class="text-dark"><i class="zoom fa fa-envelope fa-2x px-2"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://pastebin.com/raw/exZuYWUq" class="text-dark"><i class="zoom fab fa-discord fa-2x px-2"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="/contact/pgp/" class="text-dark"><i class="zoom fas fa-key fa-2x px-2"></i></a>
                </li>
            </ul>
        </div>
        <div class="text-center text-secondary" style="font-size: 0.75rem; color: black!important;">
            <p>Copyright , 2020</p>
        </div>
        </div>
    </footer>
    <!-- Various JS libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
