<table border="1">
    <tr>
        <th>id</th>
        <th>genre</th>
        <th>update</th>
        <th>delete</th>
        <th>favorit</th>

    </tr>
    <?php
    #print_r($allStations);exit;
    #require_once "Genre.php";
    $obj = new Genre('');// objekt leer, nur für Daten holen
    $genres = $obj->get_genres();

    foreach ($genres as $genre) {
        #foreach ($allStations as $station) {
        #htmlspecialchar()


    ?>

        <tr>
            <td><?= $genre['id'] ?> </td>
            <td><?= $genre['name'] ?> </td>
            <td><a href="index.php?page=genre&action=edit&id=<?= $genre['id'] ?>">edit</a></td>
            <td><a href="index.php?page=genre&action=delete&id=<?= $genre['id'] ?>" onclick=alert("löschen?")>delete</a></td>
            <td><input type="checkbox"></a></td>

        </tr>
    <?php
    }
    ?>


</table>