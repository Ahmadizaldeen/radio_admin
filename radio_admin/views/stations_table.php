<table border="1">
    <tr>
        <th>id</th>
        <th>logo</th>
        <th>name</th>
        <th>genre</th>
        <th>stream Url</th>
        <th>Web URL</th>
        <th>Action</th>

    </tr>
    <?php
    if (!isset($stations)){
        $stations = [];
        echo "Fehler bei Stations laden";
    }
    foreach ($stations as $station) {// $stationen wird übergeben von index.php UND page=station&action=edit
    ?>

        <tr>
            <td><?= $station['id'] ?> </td>
            <td><img src=<?= $station['logo'] ?> alt=<?= $station['name'] ?> width="50" height="50"> </td>
            <td><?= $station['name'] ?></td>
            <td><?= $station['genre_id'] ?></td>
            <td>
                <audio controls>
                    <source src=<?= $station['stream_url'] ?> type="audio/mpeg">
                </audio>
            </td>
            <td><a href=<?= $station['web_url'] ?>> <?= $station['name'] . "Web URL" ?></a></td>
            <td><a href="index.php?page=station&action=edit&id=<?= $station['id'] ?>">edit</a> | <a href="index.php?page=station&action=delete&id=<?= $station['id'] ?>">delete</a></td>

        </tr>
    <?php
    }
    ?>


</table>