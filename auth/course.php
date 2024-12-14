<?php require('./header.php'); ?>
<?php
require 'db.php';


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
$stmt = $pdo->prepare("SELECT * FROM sections WHERE course_id = ? ORDER BY id ASC"); // Based on the auto-increment id
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

// Mark section as complete when the user clicks "Complete and Continue"
if (isset($_GET['complete']) && isset($section)) {
    // Insert the completed section into the completed_sections table
    $stmt = $pdo->prepare("SELECT * FROM completed_sections WHERE user_id = ? AND course_id = ? AND section_id = ?");
    $stmt->execute([$userId, $courseId, $sectionId]);
    $completed = $stmt->fetch();

    if (!$completed) {
        // Insert the completed section if not already done
        $stmt = $pdo->prepare("INSERT INTO completed_sections (user_id, course_id, section_id) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $courseId, $sectionId]);
    }

    // Redirect to the next section after marking as complete
    header('Location: course.php?id=' . $courseId . '&section=' . ($sectionId + 1));
    exit;
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./profile.php">Profile</a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <!-- Course List -->
        <div class="col-md-3 col-lg-2 bg-default course-list py-4 mt-2">
            <h1><?= htmlspecialchars($course['title']) ?></h1>
            <div class="text-center fw-bolder">
            <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?= $progressPercentage ?>%" aria-valuenow="<?= $progressPercentage ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= $progressPercentage ?>% COMPLETE
                    </div>
                </div>
            </div>
            <hr>
            <ul class="list-group mt-2">
                <?php foreach ($sections as $sec): ?>
                    <li class="list-group-item">
                        <a href="course.php?id=<?= $courseId ?>&section=<?= $sec['id'] ?>" class="course-link">
                            <?= htmlspecialchars($sec['title']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Course Content -->
        <div class="col-md-9 col-lg-10 course-content p-4 mt-4 text-center">
            <!-- previous and continue -->
            <div class="d-flex justify-content-end">
                   <!-- Previous Button -->
               <?php if ($section && $section['id'] != $sections[0]['id']): ?>
                    <a href="course.php?id=<?= $courseId ?>&section=<?= $sectionId - 1 ?>" class="btn btn-secondary">Previous</a>
                <?php else: ?>
                    <span></span> <!-- Placeholder to align buttons -->
                <?php endif; ?>

                <!-- Complete and Continue Button -->
                <?php if ($section && $section['id'] != end($sections)['id']): ?>
                    <a href="course.php?id=<?= $courseId ?>&section=<?= $sectionId + 1 ?>&complete=true" class="btn btn-primary">Complete and Continue</a>
                <?php endif; ?>
            </div>
            <div class="ratio ratio-16x9 mt-4">
                <?php if ($section): ?>
                    <video controls width="auto">
                        <source src="../videos/<?= htmlspecialchars($section['video_file']) ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <p>No video available for this section.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
