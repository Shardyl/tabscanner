<?php
/**
 * Fallback template (blog/archive). Proper single.php / archive.php land in the content-port phase.
 */
get_header(); ?>

<main class="section"><div class="wrap" style="max-width:880px">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="rv" style="border-bottom:1px solid var(--line);padding:28px 0">
				<h2 style="font-size:24px;margin-bottom:8px"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div style="color:var(--muted);font-size:15px"><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; ?>
		<div style="padding:32px 0"><?php the_posts_pagination(); ?></div>
	<?php else : ?>
		<h1>Nothing here yet</h1>
	<?php endif; ?>
</div></main>

<?php get_footer(); ?>
