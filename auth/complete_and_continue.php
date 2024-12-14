<?php 
// Update progress in the database when a student completes a section
$nextSectionId = (int) $_GET['section'];  // Get the next section ID
$stmt = $pdo->prepare("UPDATE enrollments SET current_video = ? WHERE user_id = ? AND course_id = ?");
$stmt->execute([$nextSectionId, $userId, $courseId]);

// Redirect to next section
header("Location: course.php?id=$courseId&section=$nextSectionId");
exit;

?>