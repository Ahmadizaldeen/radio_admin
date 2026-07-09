    <?php
    /**
     * Diese View wird von 2 Actionen verwendet :
     *  save()
     *  edit<view>->update()
     */

    if (!isset($station)){ // $station von page=station&action=edit oder leer für neue Station
        $station = [];
    }
    if (!isset($page_title)){ //$page_title = Add Station ?? Edit Station
        $page_title = "Add Station ";
    }
    if (!isset($genres)){ // von page=station&action=edit oder leer für neue Station
        $genres = [];
        echo "Fehler bei Genres laden";
    }
    
    

    ?>
    <h2><?=$page_title?></h2>
    <form action=<?=$form_action ?? "index.php?page=station&action=add"?> method="post">

        Name: <input type="text" name="name" placeholder="requierd" value="<?=htmlspecialchars( $station['name']??'' )?>"><br>
        Genre: <select name="genre_id">
            
            <?php
            foreach ($genres as $genre) { // kommt per index
            ?>

                <option value=<?=htmlspecialchars( $genre['id']??'' ) ?>><?=htmlspecialchars( $genre['name']??'' ) ?></option>
            <?php
            }
            ?>
        </select><br>

        Stream URL: <input type="text" name="stream_url" placeholder="requierd" value="<?= htmlspecialchars( $station['stream_url']??'' ) ?>"><br>

        Web URL: <input type="text" name="web_url" value="<?=htmlspecialchars( $station['web_url']??'')  ?>"><br>
        Logo URL: <input type="text" name="logo_url" value="<?=htmlspecialchars( $station['logo'] ??'') ?>"><br>
        <Button type="submit" name="btn">Speichern</Button>

    </form>