<?php
require_once('objects/Project.php');
require_once('ProjectHandler.php');

$projectHandler = new ProjectHandler();

$httpVerb = $_SERVER['REQUEST_METHOD'];

switch ($httpVerb) {
    case 'GET':
        header('Content-Type: application/json');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            echo $projectHandler->read($id);
        } else {
            echo $projectHandler->readAll();
        }
        break;
    case 'POST':
        $newProjectData = json_decode(file_get_contents("php://input"));

        $name = $newProjectData->name;

        $projectHandler->addProject($name);
        break;
    case 'PUT': 
        $updatedProjectData = json_decode(file_get_contents("php://input"));

        $id = $updatedProjectData->id;
        $name = $updatedProjectData->name;

        $projectHandler->updateProject($id, $name);

        break;
    case 'DELETE':
        $deletedProjectData = json_decode(file_get_contents("php://input"));
        $id = $deletedProjectData->id;

        $projectHandler->deleteProject($id);
        break;
    default:
        break;
}

?>