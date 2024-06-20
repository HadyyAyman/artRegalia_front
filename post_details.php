<?php require_once("functions/connection.php");


if (isset($_GET['post_id'])) {
    $sql_select = "SELECT * FROM `posts` where `id`=" . $_GET['post_id'] . " ";
    $select_query = mysqli_query($conn, $sql_select) or die('ERROR in details' . mysqli_error());
    if (!$select_query) {
        die('ERROR in details' . mysqli_error($conn));
    } else {
        $result_post_details = mysqli_fetch_array($select_query);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArtRegalia</title>
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css">
  <script src="https://kit.fontawesome.com/a014b52ca8.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/akar-icons-fonts"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->

  <style>
    .posts_social_links {
      color: var(--color9);
      font-size: 24px;
    }

    .social_links_icon:hover {
      text-decoration: underline;
      transition: .3s ease-in-out;
    }

    .content-item {
      padding: 30px 0;
      background-color: #FFFFFF;
    }

    .content-item.grey {
      background-color: #F0F0F0;
      padding: 50px 0;
      height: 100%;
    }

    .content-item h2 {
      font-weight: 700;
      font-size: 35px;
      line-height: 45px;
      text-transform: uppercase;
      margin: 20px 0;
    }

    .content-item h3 {
      font-weight: 400;
      font-size: 20px;
      color: #555555;
      margin: 10px 0 15px;
      padding: 0;
    }

    .content-headline {
      height: 1px;
      text-align: center;
      margin: 20px 0 70px;
    }

    .content-headline h2 {
      background-color: #FFFFFF;
      display: inline-block;
      margin: -20px auto 0;
      padding: 0 20px;
    }

    .grey .content-headline h2 {
      background-color: #F0F0F0;
    }

    .content-headline h3 {
      font-size: 14px;
      color: #AAAAAA;
      display: block;
    }


    img.img-responsive {
      display: block;
      max-width: 100%;
      height: auto;
    }

    form.comments_form {
      display: block !important;
      width: max(100%, 300px);
      border-bottom: 1px solid var(--color9);
    }

    #comments {
      box-shadow: 0 -1px 6px 1px rgba(0, 0, 0, 0.1);
      background-color: #FFFFFF;
      margin-right: 20px;
    }

    #comments form {
      margin-bottom: 30px;
    }

    #comments .btn {
      margin-top: 7px;
    }

    #comments form fieldset {
      clear: both;
    }

    #comments form textarea {
      height: 100px;
    }

    #comments .media {
      border-top: 1px dashed #DDDDDD;
      padding: 20px 0;
      margin: 0;
    }

    #comments .media>.pull-left {
      margin-right: 20px;
    }

    #comments .media img {
      max-width: 100px;
    }

    #comments .media h4 {
      margin: 0 0 10px;
    }

    #comments .media h4 span {
      font-size: 14px;
      float: right;
      color: #999999;
    }

    #comments .media p {
      margin-bottom: 15px;
      text-align: justify;
    }

    #comments .media-detail {
      margin: 0;
      display: flex;
      gap: 5px;
    }

    #comments .media-detail li {
      color: #AAAAAA;
      font-size: 12px;
      padding-right: 10px;
      font-weight: 600;
    }

    #comments .media-detail a:hover {
      text-decoration: underline;
    }

    #comments .media-detail li:last-child {
      padding-right: 0;
    }

    #comments .media-detail li i {
      color: #666666;
      font-size: 15px;
      margin-right: 10px;
    }

    #comments .media-detail li i:hover {
      color: rgb(34, 34, 139);
    }

    .media-body {
      display: table-cell;
      vertical-align: top;
    }
  </style>
<?php include("includes/header.php") ?>



  <main class="posts_main" style="min-height: 500px; padding-top: 100px; margin-left: 20px;">


    <div class="post_divider col-md-12" style="display: flex; justify-content: space-between; margin-top: 30px;">

      <div class="col-md-6" style="width: 60%;">

        <article class="blog-post">
        <img class="img-responsive" src="images/<?= $result_post_details['image'] ?>" />

          <h2 class="display-5 link-body-emphasis mb-1"><?= $result_post_details['name'] ?></h2>
          <p class="blog-post-meta"><?= $result_post_details['created_at'] ?> 
          <!-- by <a href="#">Mark</a> -->
        </p>

          <p><?= $result_post_details['description'] ?></p>

      </div>

      <div class="col-md-4" style="margin-right: 20px;">
        <div class="position-sticky">
          <div class="p-4 mb-3 bg-body-tertiary rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication,
              writers,
              content, or something else entirely. Totally up to you.</p>
          </div>

          <div>
            <h4 class="fst-italic">Recent posts</h4>
            <ul class="list-unstyled">
            <?php
        $posts_statement = "SELECT  * from `posts`  WHERE id != ".$_GET['post_id']." ORDER by `id` DESC LIMIT 3 ";
        $post_wishlist_query = mysqli_query($conn, $posts_statement) or die('users_error' . mysqli_error());

        while ($result = mysqli_fetch_array($post_wishlist_query)) {




        ?>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="post_details.php?post_id=<?= $result['id'] ?>">
                  <!-- <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg> -->
                  <img height="96" width="150px" style="object-fit: cover;" src="images/<?= $result['image'] ?>" alt="">
                  <div class="col-lg-8">
                    <h6 class="mb-0"><?= $result['name'] ?></h6>
                    <small class="text-body-secondary"><?= $result['created_at'] ?></small>
                  </div>
                </a>
              </li>
              <?php }?>
              
            </ul>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Elsewhere</h4>
            <ol class="list-unstyled" style="display: flex; gap:15px; margin-left: 5px;">
              <li><a href="https://www.instagram.com" target="_blank" class="posts_social_links"><i
                    class="fa-brands fa-instagram social_links_icon"></i></a></li>
              <li><a href="https://www.twitter.com" target="_blank" class="posts_social_links"><i
                    class="fa-brands fa-x-twitter social_links_icon"></i></a></li>
              <li><a href="https://www.facebook.com" target="_blank" class="posts_social_links"><i
                    class="fa-brands fa-facebook-f social_links_icon"></i></a></li>
            </ol>
          </div>
        </div>
      </div>

    </div>

    <!-- <section class="content-item" id="comments">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <form>
              <h3 class="pull-left">New Comment</h3>
              <button type="submit" class="btn btn-normal pull-right">Comment</button>
              <fieldset>
                <div class="row">
                  <div class="col-sm-3 col-lg-2 hidden-xs">
                    <img class="img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  </div>
                  <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                    <textarea class="form-control" id="message" placeholder="Your message" required=""></textarea>
                  </div>
                </div>
              </fieldset>
            </form>

            <h3>4 Comments</h3> -->

            <!-- COMMENT 1 - START -->
            <!-- <div class="media">
              <a class="pull-left" href="#"><img class="media-object"
                  src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></a>
              <div class="media-body">
                <h4 class="media-heading">John Doe</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                  adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,
                  consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                  dolor sit amet, consectetur adipiscing elit.</p>
                <ul class="list-unstyled list-inline media-detail pull-left">
                  <li><i class="fa fa-calendar"></i>27/02/2014</li>
                  <li><a href=""><i class="fa fa-thumbs-up"></a></i>13</li>
                </ul>
                <ul class="list-unstyled list-inline media-detail pull-right">
                  <li class=""><a href=""
                      style="text-decoration: none; color:var(--color9); font-weight: 600;">Reply</a></li>
                </ul>
              </div>
            </div> -->
            <!-- COMMENT 1 - END -->
          <!-- </div>
        </div>
      </div>
    </section> -->

  </main>

  <?php include("includes/footer.php") ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="./javascript/sp.js" charset="UTF-8"></script> -->

</body>

</html>