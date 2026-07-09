<h2>
<?php

if(!isset($page_title)) $page_title = "Genres Verwalten";
echo ($page_title); ?>
</h2>

<form action="<?= $form_action ?? "index.php?page=genre&action=add"; ?>" method="post"> <!--// edit_genre OR save_genre-->
    
    <label for="name">Genre-Name:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($genre['name'] ?? ''); ?>" >
    
    <button type="submit">Speichern</button>
</form>