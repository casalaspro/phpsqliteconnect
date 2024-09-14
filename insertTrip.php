<?php

// require 'vendor/autoload.php';

// use App\SQLiteConnection;

// $pdo = (new SQLiteConnection())->connect();
// if ($pdo != null)
//     echo 'Connected to the SQLite database successfully!';
// else
//     echo 'Whoops, could not connect to the SQLite database!';


require 'vendor/autoload.php';

use App\SQLiteConnection as SQLiteConnection;
use App\SQLiteInsertNations;

// $dropTable = new SQLiteDropTable((new SQLiteConnection())->connect());
// $dropTable->dropTables();


$sqliteInsertNation = new SQLiteInsertNations((new SQLiteConnection())->connect());

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="sqlitetutorial.net">
        <title>PHP SQLite CREATE TABLE Demo</title>
        <link href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Entering Nations</h1>
            </div>

            <!-- <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tables</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // foreach ($tables as $table) : ?> -->
                        <tr>

                            <td><?php // echo $table ?></td>
                        </tr>
                    <?php // endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>