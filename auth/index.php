<?php require('./header.php'); ?>


<?php 
require('nav.php');
require 'db.php';


// if (!isset($_SESSION['user_id'])) {
//     header('Location: ./login.php');
//     exit;
// }

// Fetch courses
$stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<body >
    <br><br><br>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class=" fw-bolder text-uppercase headText">
                    Vin Appran  <span class="bg-default p-2">kode</span>  avec  <span class="text-primary">teknolojipam</span></div>
                    <p>Kou estriktire, ki pratik, fèt pou ba ou konpetans reyèl ak yon chemen klè pou reyisit ou.</p>
                    <div class="btn btn-primary btn-lg">
                        enskri gratis
                    </div>

            </div>
            <div class="col-lg-6 d-flex justify-content-start">
                <!-- <div class="codeSnippet">
                <pre>
                     <code class="language-html">
                        &lt;!DOCTYPE html&gt;
                        &lt;html lang="en"&gt;
                        &lt;head&gt;
                            &lt;meta charset="UTF-8"&gt;
                            &lt;title&gt;Your App&lt;/title&gt;
                        &lt;/head&gt;
                        &lt;body&gt;
                            &lt;h1&gt;Hello World&lt;/h1&gt;
                        &lt;/body&gt;
                        &lt;/html&gt;
                    </code> -->
                 </pre>

                </div> 
            </div>
        </div>
    </div>

    <!-- course display -->
    <!-- <br><br>
<div class="container mt-4 ">
    <div class="text-center">
        
    </div>
    <div class="row">
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
</div> -->

<br><br>
            <!-- about Section -->
             <div class="container mt-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center fs-3 text-uppercase text-primary">
                            Sak ap Fèt
                        </div>
                        <div class="text-center text-uppercase fs-1 mt-2 fw-bolder">
                           Mw Se Sandley
                        </div>
                        <div class="text-center">
                        <center>
                        <p style="width:800px; text-align:center;color:#9A9B9D; font-weight:bolder"> Mwen se yon web devlopè ki gen eksperyans nan kreyasyon sit entènèt ak zouti tankou Django, React, ak lòt teknoloji modèn.
                             Mwen gen yon pasyon pou ede moun aprann kodaj, devlope aplikasyon, ak amelyore karyè yo nan teknoloji. 
                            Platfòm sa a fèt pou pataje konesans mwen pou ede ou konstwi avni ou ak ranfòse finans ou.</p>
                        </center>
                        </div>
                    </div>
                </div>
             </div>
             <hr>
            <br><br>
             <div class="container mt-4">
                <div class="row">
                    <div class="text-center fs-3 text-primary">
                        Men rezon pou ou swiv kou nou yo
                    </div>
                    <div class="text-center fs-1">
                        kalite | Plis Pratik | Rezilta
                    </div>
                </div>
              
                <div class="row "style="margin-top:100px">
                    <div class="col-lg-6">
                    <span><i class="fa-solid fa-video bg-default p-4 fs-2 rounded"></i></span>
                    <div class="text-primary mt-2">
                        <p>Nou kreye koteni de kalite ki kout e efikas !</p>
                        
                    </div>
                    <div class="mt-2" style="color:#9A9B9D; font-size:25px">
                            <p>Wap jwen konteni de kalite ki pwal montrew kijan pou itilize yo
                            nan la vi reyel kap edew grandi talanw nan kode peti a peti.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="../assets/img/1.svg" class="img-fluid" alt="" srcset="" width="80%">
                    </div>
                </div>
                
                <div class="row " style="margin-top:200px">
                    <div class="col-lg-6">
                            <img src="../assets/img/2.svg" class="img-fluid" alt="" srcset="" width="80%">
                        </div>
                    <div class="col-lg-6">
                        <span><i class="fa-solid fa-terminal bg-default p-4 fs-2 rounded"></i></span>
                        <div class="text-primary mt-2">
                            <p>Plis pratik !</p>
                            
                        </div>
                        <div class="mt-2" style="color:#9A9B9D; font-size:25px">
                                <p>Nan kou nou mw yo wap appran pandan wap pratike wap jwen plis pratik ke teyori
                                    paske sak pi enpotan pou nou c montrew tout saw ap bezwen konen
                                </p>
                            </div>
                        </div>
                        
                </div>

                <div class="row " style="margin-top:200px">
                    
                    <div class="col-lg-6">
                        <span><i class="fa-solid fa-square-poll-vertical bg-default p-4 fs-2 rounded"></i></span>
                        <div class="text-primary mt-2">
                            <p>Rezilta!</p>
                            
                        </div>
                        <div class="mt-2" style="color:#9A9B9D; font-size:25px">
                                <p>Nou asire nou ke ou jwen rezilta avec sa wap appran yo non selman ou appran epi
                                    ou mete yo an pratik ou jwen bon rezilta
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="../assets/img/4.svg" class="img-fluid" alt="" srcset="" width="80%">
                        </div>
                        
                </div>

             </div>

             <div class="container" style="margin-top:100px">
                <div class="text-center text-primary">Anpil kote konen nou</div>
                <div class="fs-1 text-center">Anpil konpayi fè nou konfyans</div>
                    <center>
                    <p style="color:#9A9B9D; font-size:25px;">Majorite elèv nou yo gentan ap travay swa an freelance , swa pou kek konpayi oubyen tou yo lanse prop bizniss
                    yo pou yo kreye sistèm dijital pou biznis. </p>
                    </center>
                   <div class="text-center">
                    <div class="btn btn-primary btn-lg">
                            <a href="./courseprice.php" style="text-decoration:none;color:white">lis kou nou yo</a>
                        </div>
                        <div class="btn btn-secondary">
                        <a href="./coursprice.php" style="text-decoration:none;color:#000"> Enskri gratis</a>
                           
                        </div>
                   </div>
             </div>
    
</body>

<?php require('footer.php'); ?>