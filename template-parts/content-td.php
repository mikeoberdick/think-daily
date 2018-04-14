<?php
/**
 * THINK DAILY BLOG TEMPLATE (HOMEPAGE)
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="index-wrapper">
  <div id="content" tabindex="-1">
    <div id = "thinkDaily">
      <div id = "thinkDailyBlogHeader" class="container-fluid" style = "background:url('<?php echo get_stylesheet_directory_uri(); ?>/img/think_daily_bg.jpg');">
        <div class = "container">
          <div class="row">
            <div id = "blogHeaderLeft" class="col-md-6">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/think_daily_logo.png" alt="Think Daily by Larry Janesky">
              <p>Think Daily, and Think Daily for Businesspeople are daily messages from Larry meant to motivate, educate, inspire, and question - but most of all, to invite you to THINK about the issues that are important to you each day.  Sign up today.</p>

              <p>Click <a href="/think-daily-for-businesspeople">here</a> to view Think Daily for Businesspeople.</p>
            </div><!-- .col.md-6 -->
            <div class="col-md-4 offset-md-1">
              <div id = "blogBlogSignup"">
              <p>Join the over 20,000 people who receive Larry's Daily Inspiring Messages!</p>
              <!-- NEWSLETTER FORM  -->
              <form class="form-inline">
                <label class="sr-only" for="name">Name</label>
                <input type="text" class="form-control mr-sm-2" id="name" placeholder="Name">

                <label class="sr-only" for="email">Email</label>
                <input type="text" class="form-control mr-sm-2" id="email" placeholder="Email">
                <p class = "privacy">Larry values privacy and will never sell your information</p>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </form>
              </div><!-- #blogBlogSignup -->
              </div><!-- .col-md-6 -->
          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- .container-fluid -->

<main id = "main" class = "site-main">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <h2 id = "blogPageTitle">Today's Think Daily Message</h2>
      <?php 
      $args = array(
        'category_not_in' => '2',
        'posts_per_page' => '1'
      );
      
      //Need to make sure comments are being pulled in for this query
      global $withcomments; $withcomments = true;

      $featuredPostQuery = new WP_Query($args);

      if (  $featuredPostQuery->have_posts() ) : while (  $featuredPostQuery->have_posts() ) :  $featuredPostQuery->the_post(); ?>

      <div id = "featuredPostContainer">
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <div id="featuredPostCard">
            <div class = "postDate" style = "background: #9e7d0b url('<?php the_post_thumbnail_url(); ?>');">
            <span class = "month"><?php echo get_the_date( 'M' ); ?></span>
            <span class = "day"><?php echo get_the_date( 'j' ); ?></span>
          </div><!-- .postDate -->
           <h5 class = "postTitle"><a class = "postLauncher" href = "#" data-toggle="modal" data-target="#postModal" data-count="0"><?php the_title(); ?></a></h5>
            <p><?php echo get_the_excerpt(); ?></p>
            <hr class = "postSep">
            <div class = "commentCountContainer">
              <?php comments_number( '0', '1', '%' ); ?><i class="fa fa-comment-o" aria-hidden="true"></i>
            </div>
          </div><!-- .postCard -->  
          </article><!-- #post-featured -->
    </div><!-- #postContainer -->

<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>
    </div><!-- .col-sm-12 -->
    </div><!-- .row -->
    
  </div><!-- .container -->

  <div id = "postContainer" class="container">

    <?php 
      $args = array(
        'category__not_in' => '2',
        'posts_per_page' => '4',
        'offset' => '1'
      );

    $remainingPostQuery = new WP_Query($args);

    $postCount = 1; //SETUP COUNT FOR STYLING ODD/EVEN POSTS>
    if ( $remainingPostQuery->have_posts() ) : while ( $remainingPostQuery->have_posts() ) : $remainingPostQuery->the_post(); ?>

  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if ( $postCount % 2 == 0 ): ?>
      <div class = "col-md-6 even">
    <?php else : ?>
      <div class = "col-md-6 offset-md-6 odd">
        <?php endif; ?>
        <div class="postCard">
          <div class = "postDate" style = "background: #9e7d0b url('<?php the_post_thumbnail_url(); ?>');">
          <span class = "month"><?php echo get_the_date( 'M' ); ?></span>
            <span class = "day"><?php echo get_the_date( 'j' ); ?></span>
        </div><!-- .postDate -->
          <h5 class = "postTitle"><a class = "postLauncher" href = "#" data-toggle="modal" data-target="#postModal" data-count="<?php echo $postCount; ?>"><?php the_title(); ?></a></h5>
          <p><?php the_excerpt(); ?></p>
          <hr class = "postSep">
          <div class = "commentCountContainer">
            <?php comments_number( '0', '1', '%' ); ?><i class="fa fa-comment-o" aria-hidden="true"></i>
          </div>
        </div><!-- .postCard -->  
    </article><!-- #post-## -->
  <?php
$postCount++; endwhile; endif;
?>

</div><!-- #postContainer -->

<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
        <div id="postModalCarousel" class="carousel slide" data-interval="false">
  <div class="carousel-inner">


<?php 
      $args = array(
        'category__not_in' => '2',
        'posts_per_page' => '5'
      );

    $postsForModal = new WP_Query($args);

    $postCount = 1; //SETUP COUNT FOR STYLING ODD/EVEN POSTS>
    if ( $postsForModal->have_posts() ) : while ( $postsForModal->have_posts() ) : $postsForModal->the_post(); ?>


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

  <div id="archiveLink"> 
       <a href = '<?php echo bloginfo('url'); ?>/think-daily-archive'>View Full Think Daily Archive</a>
  </div>
</main>


<div id = "blogBottomBanner" class="container-fluid">
  <div class="container">
    <div class = "row">
      <div class="col-md-5 offset-md-1">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/think_white.png" alt="Think Daily by Larry Janesky" title="Think Daily by Larry Janesky">
        <p>Think Daily App now available for Iphone and Android</p>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/app_store.png" alt="Get Think Daily on the App Store" title="Get Think Daily on the App Store" class = "mr-3">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/play_store.png" alt="Get Think Daily on the Google Play Store" title="Get Think Daily on the Google Play Store">
      </div><!-- .col-md-6 -->

      <div class="col-md-4">
        <img id = "mobileImage" src="<?php echo get_stylesheet_directory_uri(); ?>/img/mobile.png">
      </div><!-- .col-md-6 -->
    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- #blogBottomBanner -->

    </div><!-- #thinkDaily -->
  </div><!-- #content -->
</div><!-- #page-wrapper -->

<?php get_footer(); ?>