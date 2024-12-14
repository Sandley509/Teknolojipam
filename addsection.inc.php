<?php
require './auth/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseId = (int)$_POST['course_id'];
    $sectionTitle = $_POST['section_title'];
    $sectionNumber = (int)$_POST['section_number'];

    // Define upload directory
    $uploadDir = 'videos/';

    // Check if directory exists, create if not
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Create directory with appropriate permissions
    }

    // Handle file upload
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['video_file']['tmp_name'];
        $fileName = uniqid() . '-' . $_FILES['video_file']['name'];
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            try {
                // Insert into sections table
                $sql = "INSERT INTO sections (course_id, section_number, title, video_file) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$courseId, $sectionNumber, $sectionTitle, $fileName]);

                echo "Section added successfully!";
                header('Location: success.php'); // Redirect to success page
                exit;
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Invalid request.";
}

?>
