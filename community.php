<?php
require_once("functions/connection.php");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css">
  <script src="https://kit.fontawesome.com/a014b52ca8.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/akar-icons-fonts"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

</head>

<body>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->

  <?php
include("includes/header.php");
?>

  <script src="./javascript/search.js" charset="UTF-8"></script>


  <main class="com-container">

    <!-- CAROUSEL BLOG POST -->
    <div class=" post-slide p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
      <div class="row">
        <?php
        $posts_statement = "SELECT  * from `posts` order by `id` DESC LIMIT 1";
        $post_wishlist_query = mysqli_query($conn, $posts_statement) or die('users_error' . mysqli_error());

        while ($result = mysqli_fetch_array($post_wishlist_query)) {




        ?>
            <div class="col-lg-6 px-0">
              <h1 class="display-4 fst-italic"><?php echo $result['name'] ?></h1>
              <p class="lead my-3"><?php echo $result['description'] ?></p>
              <p class="lead mb-0">
                <a href="post_details.php?post_id=<?php echo $result['id'] ?>" class="btn btn-primary com-btn">Continue reading
                  <i class="fa-solid fa-chevron-right"></i>
                </a>
              </p>
            </div>
        <?php } ?>
        <!-- <div class="carousel-item">
          <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">Another featured blog post</h1>
            <p class="lead my-3">This is some additional paragraph placeholder content to keep the demo flowing.</p>
            <p class="lead mb-0">
              <button class="btn btn-primary com-btn">Continue reading
                <i class="fa-solid fa-chevron-right"></i>
              </button>
            </p>
          </div>
        </div> -->
      </div>
      <!-- <button class="carousel-control-prev post-carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next post-carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button> -->
    </div>

    <!-- SEARCH BAR -->

    <div class="col-12 d-flex justify-content-center">
      <div class="col-md-4 mb-4 ">
          <form action="" class="d-block border-0" method="GET">

            <input type="text" name="search_query" class="form-control blog-search" placeholder=" Blog Search ">
            <button class="btn btn-outline-secondary blog-srch-btn" type="submit" id="button-addon2">
              <i class="fa fa-search "></i>
            </button>
            <hr>
          </form>

      </div>
    </div>

    <!-- BLOG POSTS SECTION -->
    <div class="row g-5">
    <?php

        $search_query = isset($_GET['search_query']) ? mysqli_real_escape_string($conn, $_GET['search_query']) : '';

        // Default query (no search)
        $posts_statement = "SELECT * FROM ( SELECT * FROM `posts` ORDER BY `id` DESC ) AS subquery LIMIT 1, 18446744073709551615;"; 

        // Modify query if a search term exists
        if (!empty($search_query)) {
            $posts_statement = "SELECT * FROM `posts` WHERE `name` LIKE '%$search_query%' ORDER BY `id` DESC;";
        }
        $post_wishlist_query = mysqli_query($conn, $posts_statement) or die('users_error' . mysqli_error($conn));

        while ($result = mysqli_fetch_array($post_wishlist_query)) {




        ?>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <div class="row">
              <div class="col-md-7">
                <h3 class="mb-0"><?php echo $result['name'] ?></h3>
                <div class="mb-1 text-body-secondary"><?php echo $result['created_at'] ?></div>
                <p class="card-text mb-auto"><?php echo $result['description'] ?></p>
                <a href="">
                  <a href="post_details.php?post_id=<?php echo $result['id'] ?>" class="btn btn-primary com-btn">Continue reading
                    <i class="fa-solid fa-chevron-right"></i>
                  </a>
                </a>

              </div>
              <div class="col-md-5">
                <img height="250" class="w-100" style="object-fit: cover;" src="images/<?php echo $result['image'] ?>" alt="">

              </div>
            </div>
            <!-- <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong> -->
          </div>
          <div class="col-auto d-none d-lg-block">
          </div>
        </div>
      </div>
          <?php } ?>


   


      <section class="blog-section" style="overflow: hidden;">


        <div class="mbr-fallback-image disabled" style="display: none;"></div>
        <div class="mbr-overlay" style="display: none; opacity: 0.5; background-color: rgb(255, 255, 255);"></div>

        <div class="text-center blog-container">
          <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-4">
              <img src="https://r.mobirisesite.com/463604/assets/images/photo-1621194327164-62ec8d09775c.jpeg" alt="Mobirise Website Builder">
            </div>
          </div>
          <div class="row blog-row justify-content-center">
            <div class="col-md-12 content-head">
              <h1 class="mbr-section-title mbr-fonts-style mb-4 display-2">
                <b>Unleash Your Creativity with Us!</b>
              </h1>
              <p class="mbr-text mbr-fonts-style mb-4 display-7">Join our artisan community and share your unique
                stories, videos, and images.
              </p>
              <div class="mbr-section-btn mt-4">
                <a class="btn btn-primary blog-btn display-7" href="#">Start Writing Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>

  </main>







  <?php
include("includes/footer.php");
?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="./javascript/sp.js" charset="UTF-8"></script> -->

</body>

</html>


<!-- <div class="row mb-2">
      <div class="col-md-8">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
            <h3 class="mb-0">Featured post</h3>
            <div class="mb-1 text-body-secondary">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to
              additional content.</p>
            <button class="btn btn-primary com-btn">Continue reading
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text>
            </svg>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
            <h3 class="mb-0">Post title</h3>
            <div class="mb-1 text-body-secondary">Nov 11</div>
            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional
              content.</p>
            <button class="btn btn-primary com-btn">Continue reading
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
          <div class="col-auto d-none d-lg-block thumbnail-image">
            <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect><text class="text" x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text>
            </svg>
          </div>
        </div>
      </div>
    </div> -->


<!-- <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          From the Firehose
        </h3> -->

<!-- <article class="blog-post">
          <h2 class="display-5 link-body-emphasis mb-1">Sample blog post</h2>
          <p class="blog-post-meta">January 1, 2021 by <a href="#">Mark</a></p>

          <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
            typography, lists, tables, images, code, and more are all supported as expected.</p>
          <hr>
          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <h2>Blockquotes</h2>
          <p>This is an example blockquote in action:</p>
          <blockquote class="blockquote">
            <p>Quoted text goes here.</p>
          </blockquote>
          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <h3>Example lists</h3>
          <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other
            highly
            repetitive body text used throughout. This is an example unordered list:</p>
          <ul>
            <li>First list item</li>
            <li>Second list item with a longer description</li>
            <li>Third list item to close it out</li>
          </ul>
          <p>And this is an ordered list:</p>
          <ol>
            <li>First list item</li>
            <li>Second list item with a longer description</li>
            <li>Third list item to close it out</li>
          </ol>
          <p>And this is a definition list:</p>
          <dl>
            <dt>HyperText Markup Language (HTML)</dt>
            <dd>The language used to describe and define the content of a Web page</dd>
            <dt>Cascading Style Sheets (CSS)</dt>
            <dd>Used to describe the appearance of Web content</dd>
            <dt>JavaScript (JS)</dt>
            <dd>The programming language used to build advanced Web sites and applications</dd>
          </dl>
          <h2>Inline HTML elements</h2>
          <p>HTML defines a long list of available inline tags, a complete list of which can be found on the <a
              href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element">Mozilla Developer Network</a>.</p>
          <ul>
            <li><strong>To bold text</strong>, use <code
                class="language-plaintext highlighter-rouge">&lt;strong&gt;</code>.</li>
            <li><em>To italicize text</em>, use <code class="language-plaintext highlighter-rouge">&lt;em&gt;</code>.
            </li>
            <li>Abbreviations, like <abbr title="HyperText Markup Language">HTML</abbr> should use <code
                class="language-plaintext highlighter-rouge">&lt;abbr&gt;</code>, with an optional <code
                class="language-plaintext highlighter-rouge">title</code> attribute for the full phrase.</li>
            <li>Citations, like <cite>— Mark Otto</cite>, should use <code
                class="language-plaintext highlighter-rouge">&lt;cite&gt;</code>.</li>
            <li><del>Deleted</del> text should use <code class="language-plaintext highlighter-rouge">&lt;del&gt;</code>
              and <ins>inserted</ins> text should use <code
                class="language-plaintext highlighter-rouge">&lt;ins&gt;</code>.</li>
            <li>Superscript <sup>text</sup> uses <code class="language-plaintext highlighter-rouge">&lt;sup&gt;</code>
              and subscript <sub>text</sub> uses <code class="language-plaintext highlighter-rouge">&lt;sub&gt;</code>.
            </li>
          </ul>
          <p>Most of these elements are styled by browsers with few modifications on our part.</p>
          <h2>Heading</h2>
          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <h3>Sub-heading</h3>
          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <pre><code>Example code block</code></pre>
          <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other
            highly
            repetitive body text used throughout.</p>
        </article>

        <article class="blog-post">
          <h2 class="display-5 link-body-emphasis mb-1">Another blog post</h2>
          <p class="blog-post-meta">December 23, 2020 by <a href="#">Jacob</a></p>

          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <blockquote>
            <p>Longer quote goes here, maybe with some <strong>emphasized text</strong> in the middle of it.</p>
          </blockquote>
          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <h3>Example table</h3>
          <p>And don't forget about tables in these posts:</p>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Upvotes</th>
                <th>Downvotes</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Alice</td>
                <td>10</td>
                <td>11</td>
              </tr>
              <tr>
                <td>Bob</td>
                <td>4</td>
                <td>3</td>
              </tr>
              <tr>
                <td>Charlie</td>
                <td>7</td>
                <td>9</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td>Totals</td>
                <td>21</td>
                <td>23</td>
              </tr>
            </tfoot>
          </table>

          <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other
            highly
            repetitive body text used throughout.</p>
        </article>

        <article class="blog-post">
          <h2 class="display-5 link-body-emphasis mb-1">New feature</h2>
          <p class="blog-post-meta">December 14, 2020 by <a href="#">Chris</a></p>

          <p>This is some additional paragraph placeholder content. It has been written to fill the available space
            and
            show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the
            demonstration flowing, so be on the lookout for this exact same string of text.</p>
          <ul>
            <li>First list item</li>
            <li>Second list item with a longer description</li>
            <li>Third list item to close it out</li>
          </ul>
          <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other
            highly
            repetitive body text used throughout.</p>
        </article> -->

<!-- <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
        <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
      </nav> -->

<!-- </div> -->

<!-- <div class="col-md-4">
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
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="#">
                  <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg>
                  <div class="col-lg-8">
                    <h6 class="mb-0">Example blog post title</h6>
                    <small class="text-body-secondary">January 15, 2024</small>
                  </div>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="#">
                  <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg>
                  <div class="col-lg-8">
                    <h6 class="mb-0">This is another blog post title</h6>
                    <small class="text-body-secondary">January 14, 2024</small>
                  </div>
                </a>
              </li>
              <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                  href="#">
                  <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                  </svg>
                  <div class="col-lg-8">
                    <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                    <small class="text-body-secondary">January 13, 2024</small>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2021</a></li>
              <li><a href="#">February 2021</a></li>
              <li><a href="#">January 2021</a></li>
              <li><a href="#">December 2020</a></li>
              <li><a href="#">November 2020</a></li>
              <li><a href="#">October 2020</a></li>
              <li><a href="#">September 2020</a></li>
              <li><a href="#">August 2020</a></li>
              <li><a href="#">July 2020</a></li>
              <li><a href="#">June 2020</a></li>
              <li><a href="#">May 2020</a></li>
              <li><a href="#">April 2020</a></li>
            </ol>
          </div>

          <div class="p-4">
            <h4 class="fst-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div>
      </div> -->