<?php
/**
 * Single blog post.
 */
get_header();
while ( have_posts() ) : the_post();
	$au       = get_the_author_meta( 'ID' );
	$bio      = get_the_author_meta( 'description', $au );
	$role     = get_the_author_meta( 'role', $au );
	$linkedin = get_the_author_meta( 'linkedin', $au );
	$github   = get_the_author_meta( 'github', $au );
	$headshot = get_the_author_meta( 'headshot', $au );
	$name     = get_the_author_meta( 'display_name', $au );
	$cats     = get_the_category();
	$kicker   = ! empty( $cats ) ? $cats[0]->name : 'Article';
	?>

<article>
  <section class="phero" style="padding:58px 0 40px">
    <div class="dots"></div><div class="orb"></div>
    <div class="in wrap">
      <div class="post-kicker"><?php echo esc_html( $kicker ); ?></div>
      <h1><?php the_title(); ?></h1>
      <?php if ( has_excerpt() ) : ?><p class="dek"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
      <div class="byline">
        <?php if ( $headshot ) : ?><img class="byline-av" src="<?php echo esc_url( $headshot ); ?>" alt="<?php echo esc_attr( $name ); ?>"><?php endif; ?>
        <span><strong><?php echo esc_html( $name ); ?></strong><?php echo $role ? ', ' . esc_html( $role ) : ''; ?> &middot; <?php echo esc_html( get_the_date() ); ?></span>
      </div>
    </div>
  </section>

  <section class="article"><div class="wrap">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="post-hero"><?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;height:100%;object-fit:cover;display:block' ) ); ?></div>
    <?php endif; ?>

    <div class="prose"><?php the_content(); ?></div>

    <?php if ( $bio ) : ?>
    <div class="authorbio">
      <?php if ( $headshot ) : ?><img src="<?php echo esc_url( $headshot ); ?>" alt="<?php echo esc_attr( $name ); ?>"><?php endif; ?>
      <div class="authorbio-body">
        <div class="authorbio-name"><?php echo esc_html( $name ); ?><?php echo $role ? ' <span>' . esc_html( $role ) . '</span>' : ''; ?></div>
        <p><?php echo esc_html( $bio ); ?></p>
        <div class="authorbio-links">
          <?php if ( $linkedin ) : ?><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener nofollow">LinkedIn</a><?php endif; ?>
          <?php if ( $github ) : ?><a href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener nofollow">GitHub</a><?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <div class="postcta">
      <h2>Get in touch to see how we can boost your accuracy</h2>
      <p>Tell us what you are building and we will show you how Tabscanner's receipt OCR handles your receipts and your accuracy targets.</p>
      <a class="btn btn-lg js-contact-open" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Get in touch <span class="arr">&rarr;</span></a>
    </div>

    <div style="text-align:center;margin-top:34px"><a class="btn btn-ghost" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">&larr; All articles</a></div>
  </div></section>
</article>

<?php endwhile; get_footer(); ?>
