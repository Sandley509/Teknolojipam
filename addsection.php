<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets add a courses</title>
    <!-- bootstrap link integration -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
<div class="container">
    <h2 class="mt-4">Add Section</h2>
    <form action="addsection.inc.php" method="post" enctype="multipart/form-data">
        <!-- Select Course -->
        <div class="form-group">
            <label for="course_id">Select Course</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Choose a course...</option>
                <?php
                require './auth/db.php'; // Include your database connection file

                // Query the database to fetch courses
                $query = "SELECT id, title FROM courses";
                $stmt = $pdo->query($query);

                // Loop through courses and populate the dropdown
                while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"{$course['id']}\">{$course['title']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Section Title -->
        <div class="form-group mt-2">
            <label for="section_title">Section Title</label>
            <input type="text" name="section_title" id="section_title" class="form-control" placeholder="Enter section title" required>
        </div>

        <!-- Section Number -->
        <div class="form-group mt-2">
            <label for="section_number">Section Number</label>
            <input type="number" name="section_number" id="section_number" class="form-control" placeholder="Enter section number" required>
        </div>

        <!-- Upload Video -->
        <div class="form-group mt-2">
            <label for="video_file">Upload Video</label>
            <input type="file" name="video_file" id="video_file" class="form-control" accept="video/*" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Add Section</button>
    </form>
</div>


</body>
</html>