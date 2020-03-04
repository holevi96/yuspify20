<?php 
$terms = get_the_terms(get_the_ID(),'blog_category');
?><div termName="all <?php if($terms != false){foreach($terms as $term){echo $term->slug." ";}} ?>" class="col-lg-4 blog-post infinite-post">
	<a class="row" href="<?php echo  get_permalink(get_the_ID()); ?>">

		<div class="date-and-author row">
			<div class="col avatar-wrapper">
				<?php echo get_avatar(get_the_author_meta('ID')); ?>
			</div>

			<div class="col date-wrapper">
				<p class="row">
					<?php echo '<span class="year">' . get_the_date( 'M' ) . '</span>'; ?>
					<?php echo '<span class="dayAndMonth">' . get_the_date( 'd, Y' ) . '</span>'; ?>
				</p>
				<p class="row author"><span>posted by</span>
					<?php the_author(); ?>
				</p>
			</div>
		</div>

		<div class="image-wrapper row">
			<?php the_post_thumbnail('full'); ?>
		</div>

		<div class="text-content row">
			<h2 class="blog-list-title"><?php the_title(); ?></h2>
			<div class="excrept">
				<?php the_excerpt(); ?>
			</div>
		</div>

		<?php if($cnt == 5){?>
		<div class="navigation-last-element"><?php echo ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?></div>
		<?php } ?>
	</a>
</div>
