<?php require('header.php'); ?>
<?php require('nav.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}
$user_id = $_SESSION['user_id'];
require('db.php');
// Prepare the query to retrieve user data
$query = "SELECT * FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

// Fetch the user data
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user data was found
if (!$user) {
    echo "User not found.";
    exit;
}

?>
<link rel="stylesheet" href="./profile.css">
<div class="container">
<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="text-center border-end">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid avatar-xxl rounded-circle" alt="">
                            <h4 class="text-primary font-size-20 mt-3 mb-2"><?= htmlspecialchars($user['name']); ?></h4>
                            <h5 class=" font-size-13 mb-0">Web Designer</h5>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-9">
                        <div class="ms-3">
                            <div>
                                <h4 class="card-title mb-2">Biography</h4>
                                <p class="mb-0 ">Hi I'm Jansh,has been the industry's standard
                                    dummy text To an English person alteration text.</p>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-12">
                                    <div>
                                        <p class=" mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i><?= htmlspecialchars($user['email']); ?>
                                        </p>
                                        <p class=" fw-medium mb-0"><i class="mdi mdi-phone-in-talk-outline me-2"></i>418-955-4703
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                         
                            <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 "  href="https://bootdey.com/snippets/view/profile-projects" target="__blank">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Projects</span>
                                    </a>
                                </li><!-- end li -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 "  href="https://bootdey.com/snippets/view/profile-task-with-team-cards" target="__blank">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                        <span class="d-none d-sm-block">Tasks</span>
                                    </a>
                                </li><!-- end li -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4  active" data-bs-toggle="tab" href="#team-tab" role="tab" aria-selected="true">
                                        <span class="d-block d-sm-none"><i class="mdi mdi-account-group-outline"></i></span>
                                        <span class="d-none d-sm-block">Team</span>
                                    </a>
                                </li><!-- end li -->
                            </ul><!-- end ul -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">
            <div class="tab-content p-4">
                

                

                <div class="tab-pane active show" id="team-tab" role="tabpanel">
                    <h4 class="card-title mb-4">Team</h4>
                    <div class="row">
                        <div class="col-xl-4 col-md-6" id="team-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-4">
                                        <div class="flex-grow-1 align-items-start">
                                            <div class="avatar-group float-start flex-grow-1">
                                                
                                                <!-- i will display completed course here -->
                                                
                                            </div><!-- end avatar group -->
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger leave-team" data-id="1" data-bs-toggle="modal" data-bs-target=".bs-add-leave-team" href="javascript: void(0);">
                                                    Leave Team</a>
                                            </div>
                                        </div><!-- end dropdown -->
                                    </div>
                                    <div>
                                        <h5 class="mb-1 font-size-17">Marketing</h5>
                                        <p class="text-muted  font-size-13 mb-0">4 Projects</p>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                       

                        

                      
                       

                      
                    </div><!-- end row -->
                </div><!-- end tab pane -->
            </div>
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="pb-2">
                    <h4 class="card-title mb-3">About</h4>
                    <p>Hi I'm Jansh, has been the industry's standard dummy text To an English
                        person, it will seem like
                        simplified.</p>
                    <ul class="ps-3 mb-0">
                        <li>it will seem like simplified.</li>
                        <li>To achieve this, it would be necessary to have uniform pronunciation</li>
                    </ul>
                    <!-- end ul -->
                </div>
                <hr>
                <div class="pt-2">
                    <h4 class="card-title mb-4">Kou map suiv yo</h4>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge badge-soft-secondary p-2">HTML</span>
                        <span class="badge badge-soft-secondary p-2">Bootstrap</span>
                        <span class="badge badge-soft-secondary p-2">Scss</span>
                        <span class="badge badge-soft-secondary p-2">Javascript</span>
                        <span class="badge badge-soft-secondary p-2">React</span>
                        <span class="badge badge-soft-secondary p-2">Angular</span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->

        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Personal Details</h4>
                    <div class="table-responsive">
                        <table class="table  mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>Jansh Wells</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Location</th>
                                    <td>California, United States</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Language</th>
                                    <td>English</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Website</th>
                                    <td>abc12@probic.com</td>
                                </tr><!-- end tr -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Work Experince</h4>
                    <ul class="list-unstyled work-activity mb-0">
                        <li class="work-item" data-date="2020-21">
                            <h6 class="lh-base mb-0">ABCD Company</h6>
                            <p class="font-size-13 mb-2">Web Designer</p>
                            <p>To achieve this, it would be necessary to have uniform grammar, and more
                                common words.</p>
                        </li>
                        <li class="work-item" data-date="2019-20">
                            <h6 class="lh-base mb-0">XYZ Company</h6>
                            <p class="font-size-13 mb-2">Graphic Designer</p>
                            <p class="mb-0">It will be as simple as occidental in fact, it will be
                                Occidental person, it will seem like simplified.</p>
                        </li>
                    </ul><!-- end ul -->
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>
</div>