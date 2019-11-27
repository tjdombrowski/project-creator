<?php
require_once('dbInfo.php');

class ProjectTaskHandler {
    public function addProjectTask($taskId, $projectId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "INSERT INTO projecttask(projectId, taskId) VALUES(:projectId, :taskId)";
    
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":projectId", $projectId);
            $query->bindParam(":taskId", $taskId);

            $query->execute();
        } catch(Ex $ex) {

        }

        return $db->lastInsertId();
    }

    public function deleteProjectTask($projectTaskId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "DELETE from projecttask WHERE id=:id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $projectTaskId);
            $query->execute();
        }   catch(Ex $ex) {
            echo "<div>{$ex->getMessage()}</div>";
        }
    }

    public function readAll() {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "SELECT * FROM projecttask";

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

    public function read($projectTaskId) {
        $db = new PDO(DB_INFO, USER, PASS);

        $sql = "SELECT id, taskId, projectId from projecttask WHERE id = :id";

        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $projectTaskId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $jsonResults = json_encode($results, JSON_PRETTY_PRINT); //
        } catch (Ex $ex) {
            
        }

        return $jsonResults;
    }
}
?>