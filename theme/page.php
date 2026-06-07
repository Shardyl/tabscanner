<?php
/**
 * Generic page (legal pages, imported pages without a bespoke template).
 */
get_header();
while ( have_posts() ) : the_post(); ?>

<section class="phero" style="padding:64px 0 48px">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in"><h1><?php the_title(); ?></h1></div>
</section>

<section class="article"><div class="wrap">
  <div class="prose"><?php the_content(); ?></div>
</div></section>

<?php endwhile; get_footer(); ?>
