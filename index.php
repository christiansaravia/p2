<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Christian's xkcd Password Generator</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://use.fontawesome.com/edf8d2d607.js"></script>
        <!-- PHP Logic -->
        <?php require 'logic.php'; ?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Christian's xkcd Password Generator</h1>
            <br>
            <!-- Password Generated -->
            <p class="text-center lead"><mark><?php echo $password_with_dashes; ?></mark></p>
            <!-- End of Password Generated -->
            <br>
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">

                    <!-- Form -->
                    <form action="index.php" method="GET">

                        <div class="form-group <?php echo $errorClass; ?>">
                            <label>Number of words (#)</label>
                            <input class="form-control" type="text" name="num_of_words" placeholder="Maximum 9">
                            <?php if (isset($errorMessage)) { echo $errorMessage; } ?>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="add_number"> Add a number
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="add_symbol"> Add a symbol
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success btn-md btn-block">Get a new password!</button>
                    </form>
                    <!-- End of Form -->
                </div>
            </div>
            <br>
            <p class="text-center"><a href="http://xkcd.com/936/"><i class="fa fa-key" aria-hidden="true"></i></a></p>
        </div>
    </body>
</html>
