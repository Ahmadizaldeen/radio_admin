<?php
class Station
{   
    private $id;
    private string $name;
    private string $genre_id;
    private string $stream_url;
    private string $web_url;
    private string $logo_url;

    private PDO $pdo;
    public function __construct(array $data)
    {
        $this->name = $data['name']??'';
        $this->genre_id = $data['genre']??'';
        $this->stream_url = $data['stream_url']??'';
        $this->web_url = $data['web_url']?? '#';
        $this->logo_url = $data['logo_url']?? '';
        $this->pdo = db_conn();
    }
    public function all()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM stations");
        $stmt->execute([]);
        #$allStations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    public function get_by_id(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM stations WHERE id = :id");
        $stmt->execute(['id' => $id]);
        #$allStations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function insert(array $data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO stations (name,genre_id, stream_url, web_url, logo) VALUES 
    (:name, :genre_id, :stream_url, :web_url, :logo) ");
        $stmt->execute([
            'name' => $data['name'],
            'genre_id' => $data['genre'],
            'stream_url' => $data['stream_url'],
            'logo' => $data['logo_url'],
            'web_url' => $data['web_url']
        ]);
    }

    public function update(int $id,array $data)
    {
        $stmt = $this->pdo->prepare("UPDATE stations SET name = :name, genre_id= :genre_id, stream_url = :stream_url, web_url = :web_url, logo = :logo WHERE id = :id" );
        $stmt->execute([
            'id' =>$id,
            'name' => $data['name'],
         'genre_id' => $data['genre_id'],
            'stream_url' => $data['stream_url'],
            'logo' => $data['logo_url'],
            'web_url' => $data['web_url']
        ]);
    }
    public function delete(int $id)
    {


        $stmt = $this->pdo->prepare("DELETE FROM stations WHERE id = :id");
        $stmt->execute([
            'id' => $id,
        ]);
    }
}

#$stmt = $pdo->query("SELECT ")