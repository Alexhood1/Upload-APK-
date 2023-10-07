<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; // Directory where uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["apkfile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["apkfile"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, the file is too large.";
        $uploadOk = 0;
    }

    // Allow only APK files
    if ($fileType != "apk") {
        echo "Sorry, only APK files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES["apkfile"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["apkfile"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
