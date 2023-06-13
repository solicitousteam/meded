<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="https://ai24x7.com/uploads/checklist.png" style="height: 44px; width: 44px;"alt="user-image"> &nbsp; Instructor Feedback
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="card">
    <div class="card-body">
        <p><b>Course objectives stated clearly</b> : <?php echo $categories["star1"] ?></p>
        <p><b>Instructor demonstrates adequate knowledge of course</b> : <?php echo $categories["star2"] ?></p>
        <p><b>Instructor uses appropriate teaching methods</b> : <?php echo $categories["star3"] ?></p>
        <p><b>Video Quality</b> : <?php echo $categories["star4"] ?></p>
        <p><b>Content Presentation</b> : <?php echo $categories["star5"] ?></p>
        <p><b>Rate the Instructors overall teaching performance of the course</b> : <?php echo $categories["rating"] ?></p>
        
        <br><br>
        <b>Suggestions</b>
        <p><?php echo $categories["suggestions"] ?></p>
    </div>
</div>