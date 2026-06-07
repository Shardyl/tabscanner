<?php
/**
 * Template: News / blog index  (/news/)
 */
get_header();
$paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$q = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 12, 'paged' => $paged ) );
?>

<section class="phero" style="padding:66px 0 50px">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow">Advanced AI OCR</span>
    <h1>Receipt Scanner API <span class="g">Insights</span></h1>
    <p class="lead">Resources for the Tabscanner API. Delve deeper into our AI OCR development, the layout-aware pipeline, and tutorials for different code languages.</p>
  </div>
</section>

<section class="section"><div class="wrap">
  <?php if ( $q->have_posts() ) : ?>
    <div class="res bloglist">
      <?php while ( $q->have_posts() ) : $q->the_post(); ?>
        <a class="card rv" href="<?php the_permalink(); ?>">
          <div class="thumb"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:100%;object-fit:cover' ) ); ?><b><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></b></div>
          <div class="body"><h4><?php the_title(); ?></h4><p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p></div>
        </a>
      <?php endwhile; ?>
    </div>
    <div class="pagination"><?php echo paginate_links( array( 'total' => $q->max_num_pages, 'current' => $paged, 'mid_size' => 1 ) ); ?></div>
  <?php else : ?>
    <p style="text-align:center;color:var(--muted)">Articles coming soon.</p>
  <?php endif; wp_reset_postdata(); ?>
</div></section>

<?php get_footer(); ?>
