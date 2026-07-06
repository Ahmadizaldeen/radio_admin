<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD']==="POST"){
    #print_r($_SERVER);
    $name = $_POST['name'] ?? '';
    $genre_id = $_POST['genre']?? '';
    $stream_url = $_POST['stream_url']?? '';
    $web_url = $_POST['web_url']?? '';
    $logo_url = $_POST['logo_url']?? '';
echo "<pre>";
if (!empty($name) && !empty($genre_id) && !empty($stream_url)){
    $stmt = $pdo->prepare("INSERT INTO stations (name,genre_id, stream_url, web_url, logo) VALUES 
    (:name, :genre_id, :stream_url, :web_url, :logo) ");
    $stmt->execute([
        'name'=> $name,
        'genre_id'=> $genre_id,
        'stream_url' => $stream_url,
        'logo' => $logo_url,
        'web_url' => $web_url]);
}

print_r($_POST);
if(!empty($post))
 print_r($_POST);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    <form action="" method ="post" >
        
        Name: <input type ="text" name ="name"><br>
        Genre: <select name="genre">
    <option value="1">Rock</option>
    <option value="2">Techno</option>
    <option value="3">Metal</option>
</select>

        Stream URL: <input type="text" name = "stream_url"><br>
        
Web URL: <input type="text" name = "web_url"><br>
        Logo URL: <input type="text" name="logo_url"><br>
        <Button type ="submit" name ="btn">Speichern</Button>
    
    </form>

</body>
</html>
