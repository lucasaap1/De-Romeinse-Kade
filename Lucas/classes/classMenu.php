<?php
require_once '../../../De-Romeinse-Kade/main/db/db.php';

class Menu
{
    public function readItems()
    {
        $dbClass = new Database();
        $db = $dbClass->connection();

        $stmt = $db->prepare("SELECT * FROM items");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addToMenu() {}

    public function deleteItemFromMenu() {}
}
