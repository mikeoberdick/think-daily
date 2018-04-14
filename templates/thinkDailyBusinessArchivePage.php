<?php /* Template Name: Think Daily Business Archive */
/**
 * The Think Daily for Businesspeople Archive Template
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="archive-wrapper">
  <div id="content" tabindex="-1">
    <div id = "thinkDaily">
      <div id = "thinkDailyArchiveHeader" class="container-fluid" style = "background:url('<?php echo get_stylesheet_directory_uri(); ?>/img/think_daily_bg.jpg');">
        <div class = "container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <a href="/think-daily-for-businesspeople"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/think_daily_logo_businesspeople.png" alt="Think Daily for Businesspeople by Larry Janesky"></a>

          <!-- ARCHIVE DROP DOWNS -->
              <div id = "archiveDropdowns" class = ".col-md-3 .offset-md-3">
                <form id = "businessArchiveDropdown">
                  <div id="monthSelectContainer">
                    <select id = "month" name = "month">
                    <?php
                    $monthName = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                    for ($i=0; $i < count($monthName); $i++)
                      { $mn = 1 + $i;
                        if($mn == date("m"))
                          { echo "<option selected value=" . $mn . ">" . $monthName[$i] . "</option> \n"; }
                        else
                          { echo "<option value=" . $mn . ">" . $monthName[$i] . "</option> \n"; } } ?> 
                    </select>
                  </div><!-- .selectContainer -->
                    
                    <div id="yearSelectContainer">
                      <select id = "year" name = "year">
                      <?php
                        $year = date("Y");
                        $minYr = $year - 7;
                        $maxYr = $year + 1;
                          echo $year;
                          echo "<br />" . $minYr . "<br />" . $maxYr . "<br />";
                            for($y=$minYr; $y < $maxYr; $y++)
                              {
                            if($y==$year)
                              { echo "<option selected value" . $y . ">" . $y . "</option> \n"; }
                            else
                              {echo "<option value" . $y . ">" . $y . "</option> \n"; } } ?> 
                      </select>
                    </div><!-- .selectContainer -->
                    
                    <a href = "#" id = "archiveFormSubmit">Go</a>
                </form>   
              </div><!-- #archiveDropdowns --> 
            </div><!-- .col-sm-12 -->
          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- .container-fluid -->

<main id = "main" class = "site-main">
  <div id = "postContainer" class="container">
    <?php
        $args = array(
          'cat' => '2',
          'posts_per_page' => '10'
          );
        
        //Need to make sure comments are being pulled in for this query
        global $withcomments; $withcomments = true;

        $args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;
          
          $archiveQuery = new WP_Query( $args );

          // Pagination fix
            $temp_query = $wp_query;
            $wp_query   = NULL;
            $wp_query   = $archiveQuery;

          // SET A VARIABLE TO KEEP TRACK OF THE POST NUMBER
          $postCount = 0;
          
          // The Loop
          while ( $archiveQuery->have_posts() ) : $archiveQuery->the_post(); ?>

  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if ( $postCount % 2 != 0 ): ?>
      <div class = "col-md-6 even">
    <?php else : ?>
      <div class = "col-md-6 offset-md-6 odd">
        <?php endif; ?>
        <div class="postCard">
          <div class = "postDate" style = "background: #9e7d0b url('<?php the_post_thumbnail_url(); ?>');">
          <span class = "month"><?php echo get_the_date('M'); ?></span>
          <span class = "day"><?php echo get_the_date('j'); ?></span>
        </div><!-- .postDate -->
          <h5 class = "postTitle"><a class = "postLauncher" href = "#" data-toggle="modal" data-target="#postModal" data-count="<?php echo $postCount; ?>"><?php the_title(); ?></a></h5>
          <p><?php echo get_the_excerpt(); ?></p>
          <hr class = "postSep">
          <div class = "commentCountContainer">
              <?php comments_number( '0', '1', '%' ); ?><i class="fa fa-comment-o" aria-hidden="true"></i>
          </div>
        </div><!-- .postCard -->  
    </article><!-- #post-## -->

<?php
$postCount++; endwhile;
$archiveQuery->rewind_posts(); ?>

  </div><!-- #postContainer -->
<div id="postNavContainer">
   <?php understrap_pagination(); ?>
</div>

<?php
// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;
?>

<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
        <div id="postModalCarousel" class="carousel slide" data-interval="false">
  <div class="carousel-inner">


<?php

    $postCount = 0; //SETUP COUNT FOR STYLING ODD/EVEN POSTS>
    if ( $archiveQuery->have_posts() ) : while ( $archiveQuery->have_posts() ) : $archiveQuery->the_post(); ?>


    <div class="carousel-item">
      <div class="container-fluid modalHeaderContainer mb-3">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blog_header.png" alt="Blog Single Post Header"></img>
      </div><!-- .container-fluid -->

                  <div class="container modalContentContainer blogModalContentContainer">
                    <div class="row">
                      <div class="col-md-12">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                        <div class = "mb-5">
                          <div id="commentNumber">
                            <span>
                              <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
                            </span>
                          </div>
                          <?php comments_template(); ?>
                        </div>
                      </div><!-- .col-md-12 -->
                    </div><!--  .row -->
                    <div class = "postDate" style = "background: #9e7d0b url('<?php the_post_thumbnail_url(); ?>');">
                      <span class = "month"><?php echo get_the_date( 'M' ); ?></span>
                      <span class = "day"><?php echo get_the_date( 'j' ); ?></span>
                    </div><!-- .postDate -->
                  </div><!-- #modalPostBodyContainer -->

    </div><!-- .carousel-item -->

<?php
$postCount++; endwhile; endif;
?>
    
  </div><!-- .carousel-inner -->
  <a class="carousel-control-prev" href="#postModalCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#postModalCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
    </div>
  </div>
</div><!-- .modal -->

</main>



<div class="container blogSignup">
  <img src= "<?php echo get_stylesheet_directory_uri(); ?>/img/think_daily_logo.png" alt="Think Daily by Larry Janesky">
  <p>Join the over 20,000 people who receive Larry's Daily Inspiring Messages</p>
  <div>
    <!-- NEWSLETTER FORM  -->
    <form class="form-inline">
        
        <label class="sr-only" for="name">Name</label>
        <input type="text" class="form-control mr-sm-2" id="name" placeholder="Name">

        <label class="sr-only" for="email">Email</label>
      <input type="text" class="form-control mr-sm-2" id="email" placeholder="Email">

      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>
  <p class = "privacy">Larry values privacy and will never sell your information</p>
</div>

    </div><!-- #thinkDaily -->
  </div><!-- #content -->
</div><!-- #page-wrapper -->

<?php get_footer(); ?>