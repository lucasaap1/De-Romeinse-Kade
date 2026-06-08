<?php
require_once ('../../../De-Romeinse-Kade/main/db/db.php');
class Account
{
    public function register($username, $email, $password)
    {
        $dbClass = new Database();
        $db = $dbClass->connection();

        $stmt = $db->prepare("INSERT INTO accounts (naam, email, wachtwoord) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function login($email, $password)
    {
    }

    public function logout()
    {
    }
}

class read
{
    public function allAccounts()
    {
        $dbClass = new Database();
        $db = $dbClass->connection();
        $stmt = $db->prepare("SELECT * FROM accounts");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "ID: " . $row['ID'] . "<br>";
            echo "Naam: " . $row['naam'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Wachtwoord: " . $row['wachtwoord'] . "<br>";
        }
    }
}
?>