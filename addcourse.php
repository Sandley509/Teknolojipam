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
        <div class=" fs-2 fw-bolder mt-4">
            Lets add a courses
        </div>
        <div class="row mt-2">
            <div class="col-lg-6">
            <form action="addcourse.inc.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="courseTitle" id="" class="form-control" placeholder="Course title">
                </div>
                <div class="form-group">
                    <input type="text" name="courseDescription" id="" class="form-control mt-2" placeholder="Course Description">
                </div>
                <div class="form-group mt-3">
            <label for="course_image">Course Image:</label>
            <input type="file" class="form-control" id="course_image" name="courseImage" accept="image/*" required>
        </div>
                 <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-4">Add Course</button>
            </form>

            </div>
        </div>
    </div>



   
    
</body>
</html>