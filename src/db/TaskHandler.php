<?php
require_once('dbInfo.php');

class TaskHandler {
    public function addTask($description) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "INSERT INTO task(description) VALUES(:description)";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":description", $description);
    
            $query->execute();
        } catch(Ex $ex) {
            //
        }
        return $db->lastInsertId();
   
    }

    public function deleteTask($taskId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "DELETE from task WHERE id=:id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $taskId);
            $query->execute();
        }   catch(Ex $ex) {
            echo "<div>{$ex->getMessage()}</div>";
        }
    }

    public function updateTask($taskId, $description) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "UPDATE task SET description = :description WHERE id = :id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":description", $description);
            $query->bindParam(":id", $taskId);
            $query->execute();
        } catch(Ex $ex) {
            echo "<div>{$ex->getMessage()}</div>";
        }
    }

    public function readAll() {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "SELECT * FROM task";

        try {
            $query = $db->prepare($sql);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $jsonResults = json_encode($results, JSON_PRETTY_PRINT); //
        } catch(Ex $ex) {
            //
        }

        return $jsonResults;
    }

    public function read($taskId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "SELECT id, description, dateCreated from task WHERE id = :id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $taskId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $jsonResults = json_encode($results, JSON_PRETTY_PRINT); //
        } catch (Ex $ex) {
            
        }

        return $jsonResults;
    }
}

?>