<?php
require "../db/db-connection.php";
require "../utils/response-handler/response-handler.php";
$responseHandler = new ResponseHandler();

$imageUrl = '';
$title = '';
$desc = '';

$addErrors = [
    'imageUrl' => '',
    'title' => '',
    'desc' => ''
];
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $imageUrl = isset($_POST['imageUrl']) ? trim(htmlspecialchars($_POST['imageUrl'])) : '';
    $title = isset($_POST['title']) ? trim(htmlspecialchars($_POST['title'])) : '';
    $desc = isset($_POST['description']) ? trim(htmlspecialchars($_POST['description'])) : '';

    $addErrors['imageUrl'] = empty($imageUrl) ? "Image URL field cannot be empty!" : '';
    $addErrors['title'] = empty($title) ? "Title field cannot be empty!" : '';
    $addErrors['desc'] = empty($desc) ? "Description field cannot be empty!" : '';

    if (empty($addErrors['imageUrl']) && empty($addErrors['title']) && empty($addErrors['desc'])) {
        $stmt = $conn->prepare("INSERT INTO dashboard_data (imageUrl, title, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $imageUrl, $title, $desc);

        if ($stmt->execute()) {
            header('Content-Type: application/json');

            echo  json_encode($response = $responseHandler->successResponse("Posted successfully", [
                'imageUrl' => $imageUrl,
                'title' => $title,
                'description' => $desc
            ]));
            $imageUrl = '';
            $title = '';
            $desc = '';
        } else {
            $dbError = "Something went wrong. Please try again later.";
            echo  json_encode($responseHandler->errorResponse("Error posting data", $dbError, 500));
        }

        $stmt->close();
    } else {
        echo json_encode($responseHandler->errorResponse("Validation errors", $addErrors, 400));
    }
}