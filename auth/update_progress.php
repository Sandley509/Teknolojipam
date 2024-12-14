<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}

$courseId = (int) $_GET['id'];
$userId = $_SESSION['user_id'];

// Verify enrollment
$stmt = $pdo->prepare("SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?");
$stmt->execute([$userId, $courseId]);
$enrollment = $stmt->fetch();

if (!$enrollment) {
    die("You are not enrolled in this course.");
}

// Fetch course details
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->execute([$courseId]);
$course = $stmt->fetch();

// Fetch course sections
$stmt = $pdo->prepare("SELECT * FROM sections WHERE course_id = ? ORDER BY section_number");
$stmt->execute([$courseId]);
$sections = $stmt->fetchAll();

// Fetch user's completed sections
$stmt = $pdo->prepare("SELECT COUNT(*) FROM completed_sections WHERE user_id = ? AND course_id = ?");
$stmt->execute([$userId, $courseId]);
$completedSections = $stmt->fetchColumn();

// Calculate progress
$totalSections = count($sections);
$progressPercentage = ($totalSections > 0) ? round(($completedSections / $totalSections) * 100) : 0;

// Fetch current section if set
$sectionId = isset($_GET['section']) ? (int) $_GET['section'] : 0;
$section = null;

if ($sectionId) {
    $stmt = $pdo->prepare("SELECT * FROM sections WHERE id = ? AND course_id = ?");
    $stmt->execute([$sectionId, $courseId]);
    $section = $stmt->fetch();
} else {
    // If no section is set, show the first section by default
    $section = $sections[0] ?? null;
}
?>
