<?php
// table für alles absender
require_once "navi.php";
require_once "Station.php";
#echo "<pre>";#
#print_r($allStations);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>logo</th>
            <th>name</th>
            <th>genre</th>
            <th>stream Url</th>
            <th>Web URL</th>
        </tr>
        <?php
        #print_r($allStations);exit;

        foreach ($allStations as ['id' => $id, 'name' => $name, 'genre_id' => $genre_id, 'stream_url' => $stream_url, 'web_url' => $web_url, 'logo' => $logo]) {

        ?>

            <tr>
                <td><?= $id ?> </td>
                <td><img src=<?= $logo ?> alt=<?= $name ?> width="50" height="50"> </td>
                <td><?= $name ?></td>
                <td><?= $genre_id ?></td>
                <td>
                    <audio controls>
                        <source src=<?= $stream_url ?> type="audio/mpeg">
                    </audio>
                </td>
                <td><a href=<?= $web_url ?>> <?= $name . "Web URL" ?></a></td>

            </tr>
        <?php
        }
        ?>


    </table>

</body>

</html>