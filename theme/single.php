<?php
/**
 * Single blog post.
 */
get_header();
while ( have_posts() ) : the_post(); ?>

<article>
  <section class="phero" style="padding:60px 0 44px">
    <div class="dots"></div><div class="orb"></div>
    <div class="wrap in">
      <div class="post-meta"><?php echo esc_html( get_the_date() ); ?> · Tabscanner</div>
      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <section class="article"><div class="wrap">
    <?php if ( has_post_thumbnail() ) : ?>
      <div style="max-width:760px;margin:0 auto 34px;aspect-ratio:16/9;border-radius:16px;overflow:hidden"><?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:100%;object-fit:cover;display:block' ) ); ?></div>
    <?php endif; ?>
    <div class="prose"><?php the_content(); ?></div>
    <div style="text-align:center;margin-top:46px"><a class="btn btn-ghost" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">← All articles</a></div>
  </div></section>
</article>

<?php endwhile; get_footer(); ?>
