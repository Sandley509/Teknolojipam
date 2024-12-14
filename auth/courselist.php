<?php  
require('header.php');
require('nav.php');
require 'db.php';

// Fetch search query if it's set
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Modify SQL query to include the search filter
if ($search_query) {
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE title LIKE ?");
    $stmt->execute(["%$search_query%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM courses");
}

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- course display -->
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <center>
                <div class="text-center fs-1 fw-bolder">
                    Appran Kijan Pou Kode 
                </div>
                <p>Kit ou bezwen appran fe sit intènèt, Aplikasyon mobil, ak tout lot zouti teknoloji yo oubyen tou ou bezwen kode, ebyen gen yon kou pou ou kanmèm</p>
            </center>
            <!-- Search Input -->
            <div class="input-group mt-4">
                <form method="GET" action="">
                    <div id="search-autocomplete" class="form-outline">
                        <input type="search" name="search" id="form1" class="form-control" placeholder="Chèche yon kou" value="<?= htmlspecialchars($search_query) ?>" />
                        <label class="form-label" for="form1"></label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4" id="courses-list">
        <?php foreach ($courses as $course): ?>  
            <div class="col-lg-4 mb-4">
                <a href="single.php?id=<?= $course['id'] ?>" class="text-decoration-none">
                    <div class="card" style="width: 23rem;">
                        <img src="../uploads/<?= $course['image'] ?>" alt="Course Image" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                            <div class="text-end fw-bolder">
                                100% <br>
                                <span>COMPLETE</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div> 
        <?php endforeach; ?>
    </div>
</div> 

<script>
// JavaScript to handle the search filter dynamically
const searchInput = document.getElementById('form1');
const coursesList = document.getElementById('courses-list');

// This function will filter the courses based on the search input
searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase();
    
    // Get all the course cards
    const courseCards = coursesList.getElementsByClassName('col-lg-4');
    
    Array.from(courseCards).forEach(function(card) {
        const courseTitle = card.querySelector('.card-title').textContent.toLowerCase();
        
        // Show card if course title matches the search term
        if (courseTitle.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>
