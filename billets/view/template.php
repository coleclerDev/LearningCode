<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <title><?= $title ?></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

        

    <body>

          <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Navbar</a>             
        	</nav>

          <div class="container">
            <br />
            <div class="row">
                <h1><?= $title ?></h1>
            </div>



            <?= $content ?>


          </div>
    </body>

</html>