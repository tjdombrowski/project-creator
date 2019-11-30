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
        $description = $_POST['description'];

        $taskHandler->addTask($description);

        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $updatedData);

        $id = $updatedData['id'];
        $description = $updatedData['id'];

        $taskHandler->updateTask($id, $description);

        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $taskId);
        $id = $taskId['id'];

        $taskHandler->deleteTask($id);

        break;
    default:
        break;
}

?>