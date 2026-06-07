<?php
/**
 * Archive (category / tag / date). Same card grid as the blog index.
 */
get_header(); ?>

<section class="phero" style="padding:64px 0 48px">
  <div class="dots"></div><div class="orb"></div>
  <div class="wrap in">
    <span class="eyebrow">Insights</span>
    <h1><?php echo esc_html( wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
    <div class="lead"><?php echo wp_kses_post( get_the_archive_description() ); ?></div>
  </div>
</section>

<section class="section"><div class="wrap">
  <?php if ( have_posts() ) : ?>
    <div class="res bloglist">
      <?php while ( have_posts() ) : the_post(); ?>
        <a class="card rv" href="<?php the_permalink(); ?>">
          <div class="thumb"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:100%;object-fit:cover' ) ); ?><b><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></b></div>
          <div class="body"><h4><?php the_title(); ?></h4><p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p></div>
        </a>
      <?php endwhile; ?>
    </div>
    <div class="pagination"><?php echo paginate_links( array( 'mid_size' => 1 ) ); ?></div>
  <?php else : ?>
    <p style="text-align:center;color:var(--muted)">No articles yet.</p>
  <?php endif; ?>
</div></section>

<?php get_footer(); ?>
