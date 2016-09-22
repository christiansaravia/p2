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
        <p class="text-center lead"><mark><?php echo $password; ?></mark></p>
        <br>
        <!-- End of Password Generated -->


        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">

                <!-- Form -->
                <form class="" action="index.php" method="GET">
                    <div class="form-group has-error">
                        <label># of words</label>
                        <input type="text" name="one" class="form-control" placeholder="Maximum 9" aria-describedby="textBlock1">
                        <span id="textBlock1" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Add a number
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Add a symbol
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
