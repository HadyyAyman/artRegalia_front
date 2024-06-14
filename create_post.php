<?php
ob_start(); // Start output buffering
include "includes/db.php";
session_start();
?>

<?php include "includes/head.php"; ?>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/navigation.php"; ?>

  
  <!-- Modal form to create a post -->
  <main class=post_main>
  <div class="container">
        <h1>Create a New Post</h1>

        <?php
  
  if(isset($_POST['submit'])){

    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_content = $_POST['content'];
    $post_tags = $_POST['tags'];
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "./images/$post_image");

    $query = "INSERT INTO post(post_category_id, post_title, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_date}' , '{$post_image}', '{$post_content}', '{$post_tags}', 'published')";

    $post_query = mysqli_query($connection, $query);
    if(!$post_query){
      die("Query Failed" . mysqli_error($connection));
    }else {
      echo "<p>Post created successfully!</p>";
  }


  }
  ?>

        <form action="create_post.php" method="POST" enctype="multipart/form-data" class="blog-posts-form">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="post_category" id="post_category" class="form-control" required>
                    <!-- Add your categories here -->
                    <option value="World">Artist</option>
                    <option value="Technology">Craftsmen</option>
                </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="body" class="form-control" required></textarea>
            </div>
            <script>
                ClassicEditor
                    .create(document.querySelector('#body'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Post">
            </div>
        </form>
    </div>
        </main>


  <?php include "includes/footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="./javascript/sp.js" charset="UTF-8"></script> -->

  <?php include "includes/closingtags.php" ?>
  <?php
    ob_end_flush(); // End output buffering and flush the output
  ?>