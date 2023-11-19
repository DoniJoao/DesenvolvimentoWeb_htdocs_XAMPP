<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $uploadDirectory = "uploads/"; // Specify the directory where you want to save uploaded files

    $uploadedFile = $_FILES["file"];

    if ($uploadedFile["error"] === UPLOAD_ERR_OK) {
        $uploadedFileName = $uploadedFile["name"];
        $destination = $uploadDirectory . $uploadedFileName;

        if (move_uploaded_file($uploadedFile["tmp_name"], $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error moving the file.";
        }
    } else {
        echo "Error uploading the file.";
    }
}
?>
