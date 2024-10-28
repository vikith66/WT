<?php
$targetDir = "upload/";
$targetFile = $targetDir . basename($_FILES["resume"]["name"]);
$uploadOk = 1;

$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if ($fileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["resume"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["resume"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Your file was not uploaded.";
}
?>
