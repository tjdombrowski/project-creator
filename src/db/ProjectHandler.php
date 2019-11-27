<?php
require_once('dbInfo.php');

class ProjectHandler {
    public function addProject($name) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "INSERT INTO project(name) VALUES(:name)";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":name", $name);
    
            $query->execute();
        } catch(Ex $ex) {
            echo "<div>{$ex->getMessage()}</div>";
        }
        return $db->lastInsertId();
   
    }

    public function deleteProject($projectId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "DELETE from project WHERE id=:id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $projectId);
            $query->execute();
        }   catch(Ex $ex) {
            echo "<div>{$ex->getMessage()}</div>";
        }
    }

    public function updateProject($projectId, $name) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "UPDATE project SET name = :name WHERE id = :id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":name", $name);
            $query->bindParam(":id", $projectId);
            $query->execute();
        } catch(Ex $ex) {
            echo "<div>{$ex->getMessage()}</div>";
        }
    }

    public function read($projectId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "SELECT id, name, dateCreated FROM project WHERE id = :id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $projectId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $jsonResults = json_encode($results, JSON_PRETTY_PRINT); //
        } catch (Ex $ex) {
            
        }

        return $jsonResults;
    }

    public function readAll() {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "SELECT * FROM project";

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
}

?>