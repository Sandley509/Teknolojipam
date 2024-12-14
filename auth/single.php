<?php require('./header.php'); ?>
<?php
require 'db.php';
require('nav.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}

$courseId = (int) $_GET['id'];

// Fetch course details
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->execute([$courseId]);
$course = $stmt->fetch();

// Check if the user is already enrolled
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?");
$stmt->execute([$userId, $courseId]);
$enrollment = $stmt->fetch();

if ($enrollment) {
    // If already enrolled, redirect to the course page
    header('Location: course.php?id=' . $courseId);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert the enrollment if the user is not already enrolled
    $stmt = $pdo->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)");
    $stmt->execute([$userId, $courseId]);

    // Redirect to the course page after successful enrollment
    header('Location: course.php?id=' . $courseId);
    exit;
}

// Fetch course sections
$stmt = $pdo->prepare("SELECT * FROM sections WHERE course_id = ? ORDER BY id ASC");
$stmt->execute([$courseId]);
$sections = $stmt->fetchAll();
?>

<div class="container mt-4">
    <div class="fs-3 fw-bolder"><?= htmlspecialchars($course['title']) ?></div>
    <div class="row single mt-2">
        <div class="col-lg-6">
            <img src="../uploads/<?= htmlspecialchars($course['image']) ?>" alt="" class="img-fluid rounded">
        </div>
        <div class="col-lg-6 text-center mt-4">
            <div class="chapter">
                
                <div class="fs-2"><?= htmlspecialchars($course['title']) ?></div>
                <p><?= htmlspecialchars($course['description']) ?></p>
                <form method="POST">
                    <button type="submit" class="btn btn-primary">Enroll and Start</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-8 single">
        <h4 class="">Course Sections</h4>
            <div class="chapter">
        <ul class="list-group">
                    <?php foreach ($sections as $section): ?>
                        <li class="list-group-item mt-2 bg-primary text-white">
                            <?= htmlspecialchars($section['title']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
