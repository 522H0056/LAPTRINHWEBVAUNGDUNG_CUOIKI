<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="card-title text-white mt-2"><?php echo "Feedback for " . $courses[0]['Title']; ?></h5>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <img src="<?php echo $courses[0]['images']; ?>" class="course-image mb-3" alt="Course Image">
                <p>
                    <strong>Your opinion matters</strong>
                </p>
                <p>
                    Have some ideas how to improve our product?
                    <strong>Give us your feedback.</strong>
                </p>
            </div>
            <hr />
            <form class="px-4" action="submit_feedback.php" method="post" enctype="multipart/form-data">
                <p class="text-center"><strong>Your rating:</strong></p>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example1" />
                    <label class="form-check-label" for="radio3Example1">
                        Very good
                    </label>
                </div>
                <!-- Add more radio buttons for different ratings -->

                <p class="text-center"><strong>What could we improve?</strong></p>
                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea class="form-control" id="form4Example3" name="feedback" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Your feedback</label>
                </div>
                
                <!-- File upload -->
                <div class="mb-4">
                    <label for="fileInput" class="form-label">Upload file (optional)</label>
                    <input type="file" class="form-control" id="fileInput" name="fileInput">
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
