<?php
class Genre
{
    private $id;
    private string $name;
    private PDO $pdo;
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->pdo = db_conn();
    }
    public function get_genres()
    {
        $stmt = $this->pdo->query("SELECT * FROM genres");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_by_id(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM genres WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function update_genre(int $id, string $name)
    {

        $stmt = $this->pdo->prepare("UPDATE genres SET name = :name WHERE id = :id");
        $stmt->execute([
            'id' => $id,
            'name' => $name

        ]);
        #header("Location: create_genre.php");

    }
    public function delete_genre(int $id)
    {


        $stmt = $this->pdo->prepare("DELETE FROM genres WHERE id = :id");
        $stmt->execute([
            'id' => $id,
        ]);
    }
    public function insert(string $name)
    {
        $stmt = $this->pdo->prepare("INSERT INTO genres (name) VALUES (:name)");
        $stmt->execute([
            'name' => $name,

        ]);
    }
}
