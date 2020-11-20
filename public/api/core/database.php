<?php
// Connect To Database And Excetute Query and Return DATA!
class DB
{
    private static function database_config() {
        return array(
            "hostname" => "localhost",
            "db_name" => "atti_api_dev",
            "username" => "root",
            "password" => ""
        );
    }
    // Make a Connection to the Database
    private static function connect() {
        $db = self::database_config();
        try {
            $conn = new PDO("mysql:host=$db[hostname];dbname=$db[db_name]", $db["username"], $db["password"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
            die();
        }
    }

    // Prepare and excecute the query!
    public static function query($query, $params = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        $queryArray = explode(" ", $query);
        if ($queryArray[0] == 'SELECT') {
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}