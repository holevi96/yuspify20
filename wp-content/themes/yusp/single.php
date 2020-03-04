<?php get_header();?>
<?php include('w-components/menu/sme-menu.php'); ?>

<section id="blog-single" class="body row">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="blog-container">
			<div class="title-wrapper">

				<div class="date-and-author row">
					<div class="col avatar-wrapper">
						<?php echo get_avatar(get_the_author_meta('ID')); ?>
					</div>

					<div class="col date-wrapper">
						<p class="row">
							<?php echo '<span class="year">' . get_the_date( 'Y' ) . '</span>'; ?>
							<?php echo '<span class="dayAndMonth">' . get_the_date( 'd, m' ) . '</span>'; ?>
						</p>
						<p class="row author"><span>posted by</span>
							<?php the_author(); ?>
						</p>
					</div>
				</div>

				<h2 class="the-title row">
					<?php the_title(); ?>
				</h2>
			</div>

			<div class="post-thumbnail">
				<?php echo get_the_post_thumbnail ( $post_id, 'post-thumbnail', array( 'class' => 'featured-img full' ) ) ;?>
			</div>

			<div id="blog-content">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endwhile; ?>
</section>

<section id="call-to-action" class="sme-features row">
	<div class="fluid-container">

		<div class="wrapper">
			<h2 class="row mgB24">Sign up for email updates</h2>

			<div class="subtext row mgB24">
				Get regular tips and updates from the world of <br>
				eCommerce and big data.
			</div>

			<div class="mailchimp-optin">
				<!--                --><?php //echo do_shortcode('[mc4wp_form id="2650"]') ?>
				<?php echo do_shortcode('[mc4wp_form id="2763"]') ?>
			</div>
		</div>

	</div>
</section>

<!--
<section id="blog-call-to-action" class="row">
    <div class="center-container blog-container">

        <h3 class="col-md-12 col-lg-7">
            Get started, and increase your revenue now!
        </h3>

        <a class="col-md-12 col-lg-5" href="https://account.yusp.com/checkout/">start free frial now</a>

    </div>
</section>
-->

<section id="prev-next-posts" class="row">

	<div class="blog-container">
		<div class="col-lg-6 prev">
			<i class="material-icons col-lg-2">keyboard_arrow_left</i>
			<?php
			$prev_post = get_adjacent_post(false, '', true);
			if(!empty($prev_post)) {
				echo '<a class="col-lg-10" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a>'; }
			?>
		</div>
		<div class="col-lg-6 next">
			<?php
			$next_post = get_adjacent_post(false, '', false);
			if(!empty($next_post)) {
				echo '<a class="col-lg-10" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>'; }
			?>
			<i class="material-icons col-lg-2">keyboard_arrow_right</i>
		</div>
	</div>

</section>

<section id="recent-blogposts" class="row">
	<div class="fluid-container">

		<h2 class="title center t-22 gray normal mgB24">Recent Blogposts</h2>

		<?php
		$recent_blogs = get_posts(array(
			'post_type' => 'blog',
			'exclude' => get_the_ID(),
			'numberposts' => 4,
		));
		foreach ($recent_blogs as $blog) { ?>

			<ul id="recent-posts-links">

				<a class="col-xs-12 col-md-6 col-lg-4 recent-post-wrapper" href="<?php echo get_permalink($blog->ID) ?>">
					<li class="recent-post row">
						<div class="image-wrapper"><?php echo get_the_post_thumbnail($blog->ID, 'full'); ?></div>
						<h3 class="row"><?php echo $blog->post_title; ?></h3>
					</li>
				</a>

			</ul>

		<?php }
		?>

	</div>
</section>


<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer(); ?>


