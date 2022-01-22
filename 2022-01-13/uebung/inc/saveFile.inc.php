<?php 

if($_FILES['inputImage']['name'] != NULL) {
    $target_dir = "uploads/";
    $filename = basename($_FILES['inputImage']['name']);
    $target_file = $target_dir . $filename;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image File is a actual image or fake image
    $check = getimagesize($_FILES['inputImage']['tmp_name']);
    if($check !== false) {
        $successMsg = 1;
        $uploadOk = 1;
    } else {
        $errorMsg[] = "File ist not an image";
        $uploadOk = 0;
    }

// Check if file already exists
    if(file_exists($target_file)) {
        $errorMsg[] = "Sorry, file already exists";
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errorMsg[] = "Sorry, only jpg, jpeg, png & gif files are allowed";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if($uploadOk == 0) {
        $errorMsg[] = "Sorry, your file was not uploaded";
    } else {
        if(move_uploaded_file($_FILES['inputImage']['tmp_name'], $target_file)) {
            $successMsg = 1;
        } else {
            $errorMsg[] = "Sorry, there was an error uploading your file";
            $uploadOk = 0;
        }
    }

}

?>