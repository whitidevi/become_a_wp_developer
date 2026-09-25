<?php
get_header();
while(have_posts()) {
	the_post(); ?>

    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>Don't forget to replace me later.</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">
	<div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a> <span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>

      <div class="generic-content"><?php the_content(); ?></div>

	<?php
	  $relatedPrograms = get_field('related_programs'); // We will recieve an array of post objects. 
	  // Because when I was creating this custom field in ACF, I determined that the return format be 'object post'
	  // So when we have more than 1 post, we will recieve an array of object post. Because we are in php.
	  if ($relatedPrograms) {
       	    echo '<hr class="section-break">';
    	    echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
	    echo '<ul class="link-list min-list">';
	    foreach ($relatedPrograms as $program) { ?>
              <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
			  <!-- Also can use: echo $program->post_title;
			       Use 'print_r()' or 'var_dump()' to see what's within the post object. -->
	    <?php }
	    echo '</ul>';
	  }
	?>
    </div>
<?php
}
get_footer();
?>
