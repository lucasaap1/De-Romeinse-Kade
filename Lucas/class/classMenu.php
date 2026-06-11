<?php
require_once '../../../De-Romeinse-Kade/main/db/db.php';

class ShoppingCart
{
    private PDO $db;

    public function __construct()
    {
        $dbClass = new Database();
        $this->db = $dbClass->connection();
    }
    public function readItems(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM items");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addItem(string $item, float $prijs, string $omschrijving): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO items (item, prijs, omschrijving)
            VALUES (:item, :prijs, :omschrijving)
        ");
        return $stmt->execute([
            ':item' => $item,
            ':prijs' => $prijs,
            ':omschrijving' => $omschrijving
        ]);
    }

    public function addToOrder(int $customerId, int $itemId): bool
    {
        $stmt = $this->db->prepare("
        INSERT INTO bestellingen (bestelling_ID, item)
        VALUES (:customer_id, :item)
    ");

        return $stmt->execute([
            ':customer_id' => $customerId,
            ':item' => $itemId
        ]);
    }

    public function deleteItem(int $id): bool
    {
        if ($id <= 0) {
            return false;
        }

        $stmt = $this->db->prepare("
        DELETE FROM bestellingen
        WHERE item = :id
        LIMIT 1
    ");

        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function updateItem(
        int $id,
        string $item,
        float $prijs,
        string $omschrijving
    ): bool {
        $stmt = $this->db->prepare("
            UPDATE items
            SET
                item = :item,
                prijs = :prijs,
                omschrijving = :omschrijving
            WHERE ID = :id
        ");

        return $stmt->execute([
            ':id' => $id,
            ':item' => $item,
            ':prijs' => $prijs,
            ':omschrijving' => $omschrijving
        ]);
    }
}
