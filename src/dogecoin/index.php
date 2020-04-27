<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap" integrity="sha384-PHCoZ/bRWiIovGAuKPKZFL/l1eRlN1W/Pr2Ie07om/E6uzfGdy8CZ4HP82Rc2aH0" crossorigin="anonymous">
        <link rel='icon' href="https://picsum.photos/256?random=1" type='image/x-icon' />
        <title>Dogecoin Node</title>
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
                    <a class="nav-item nav-link" href="/">Home</a>
                    <a class="nav-item nav-link active" href="/about/">About Me</a>
                    <a class="nav-item nav-link" href="/resume/">My Resume</a>
                    <a class="nav-item nav-link" href="/projects/">My Projects</a>
                    <a class="nav-item nav-link" href="/blog/">My Blog</a>
                    <a class="nav-item nav-link" href="/contact/">Contact Me</a>
                    <a class="nav-item nav-link" href="/dogecoin/">Dogecoin Node</a>
                </ul>
                <ul class="navbar-nav navbar-right">
                </ul>
            </div>
        </nav>
    </head>
    <div class="container">
        <div class="page-header" style="padding-top:1em; margin:auto;">
            <h1>Dogecoin Node (testnet)</h1>
        </div>
        <hr>
        <!-- Header ends here -->
        <body>
            <div class="text">
                <!-- This is where the fun begins -->
                <?php
                  // Initial setup
                  require '../vendor/autoload.php';
                  use ftab\Dogecoin\Client as DogecoinClient;
                  $dogecoind = new DogecoinClient([
                    'scheme'        => 'http',
                    'host'          => 'localhost',
                    'port'          => 44555,
                    'user'          => 'cg',
                    'password'      => 'a6702db208dcf42de40d8d198192f887b6e20fa785c1a5ce8796a5cdbd4fd594',
                    'ca'            => '/etc/ssl/certs/_com.ca-bundle', // Fix this later
                  ]);

                  // Do stuff
                  $info = $dogecoind->getblockchaininfo();
                  echo "<pre>" . json_encode($info,JSON_PRETTY_PRINT) . "</pre>";
                ?>
                <!-- This is where the fun ends -->
                <br>
                <small>Work in progress.</small>
                <!-- Footer starts here -->
            </div>
            <hr>
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
                        <a href="/contact/discord/" class="text-dark"><i class="zoom fab fa-discord fa-2x px-2"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="/contact/pgp/" class="text-dark"><i class="zoom fas fa-key fa-2x px-2"></i></a>
                    </li>
                </ul>
            </div>
            <div class="text-center text-secondary" style="font-size: 0.8rem; color: black!important;">
                <p>Copyright , 2020</p>
            </div>
    </div>
    </footer>
    <!-- Various JS libraries -->
    <script src="/assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</html>
