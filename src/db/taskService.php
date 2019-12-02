<?php
require_once('objects/Task.php');
require_once('TaskHandler.php');

$httpVerb = $_SERVER['REQUEST_METHOD'];
$taskHandler = new TaskHandler();

switch ($httpVerb) {
    case 'GET':
        header("Content-Type: application/json");

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            echo $taskHandler->read($id);
        } else {
            echo $taskHandler->readAll();
        }
        
        break;
    case 'POST': 
        $newTaskData = json_decode(file_get_contents("php://input"));

        $description = $newTaskData->description;

        $taskHandler->addTask($description);

        break;
    case 'PUT':
        $updatedTaskData = json_decode(file_get_contents("php://input"));

        $id = $updatedTaskData->id;
        $description = $updatedTaskData->description;

        $taskHandler->updateTask($id, $description);

        break;
    case 'DELETE':
        $deletedTaskData = json_decode(file_get_contents("php://input"));
        $id = $deletedTaskData->id;

        $taskHandler->deleteTask($id);

        break;
    default:
        break;
}

?>