<?php
/**
 * Search results.
 */
get_header(); ?>

<section class="phero" style="padding:64px 0 48px">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow">Search</span>
    <h1>Results for &ldquo;<?php echo esc_html( get_search_query() ); ?>&rdquo;</h1>
  </div>
</section>

<section class="section"><div class="wrap">
  <?php if ( have_posts() ) : ?>
    <div class="res bloglist">
      <?php while ( have_posts() ) : the_post(); ?>
        <a class="card rv" href="<?php the_permalink(); ?>">
          <div class="thumb"><b><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></b></div>
          <div class="body"><h4><?php the_title(); ?></h4><p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p></div>
        </a>
      <?php endwhile; ?>
    </div>
    <div class="pagination"><?php echo paginate_links( array( 'mid_size' => 1 ) ); ?></div>
  <?php else : ?>
    <p style="text-align:center;color:var(--muted)">No results found.</p>
  <?php endif; ?>
</div></section>

<?php get_footer(); ?>
