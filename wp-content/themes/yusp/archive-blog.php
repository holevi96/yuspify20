<?php get_header();?>
<?php include('w-components/menu/sme-menu.php'); ?>

<section id="blog-archive-grid" class="body row">
    <?php if ( have_posts() ) : ?>
	<div class="fluid-container">
    	<div id="blog-posts" class="col-xs-12">

			<div class="blog-first-row row">
			<?php 
			
			$exclude_array = array();
			$row_type = get_field('first_row_choose',48);
			if($row_type == "one"){
				$p= get_field('one_column',48)[0];
				echo get_field('latest_blogs_or_manual_choose');
				if(get_field('latest_blogs_or_manual_choose',48) == 'latest'){
				
					$p = get_posts(array('post_type'=>'blog','numberposts'=>1))[0]->ID;
				}
				$exclude_array[] = $p;
				setup_postdata($p);
				?>

					<a href="<?php echo get_permalink($p); ?>">
						<div class="row">
							<div class="col-lg-8">
								<img class="firstrow-image" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($p), 'full' ); ?>">
							</div>
							<div class="text-container col-lg-4">
								<h2>
									<?php echo get_the_title($p); ?>
								</h2>
								<h3>
									<?php echo the_excerpt(); ?>
								</h3>
								<div class="blog-author-avatar" style="background:url(<?php echo get_avatar_url(get_the_author_meta('ID',$p->post_author)); ?>)"></div>
								<span><?php the_author();  ?></span>
								<i>
									<?php echo '<span class="year">' . get_the_date( 'M' ) . '</span>'; ?>
									<?php echo '<span class="dayAndMonth">' . get_the_date( 'd, Y' ) . '</span>'; ?>
								</i>
							</div>
						</div>
					</a>
				
			<?php wp_reset_postdata(); 
			
			}
			
			else{ ?>
				<div class="row">
					<div class="col-lg-6">
						<?php 
						$p = get_field('two_column',48)[0];
						if(get_field('latest_blogs_or_manual_choose',48) == 'latest'){
							$p = get_posts(array('post_type'=>'blog','numberposts'=>2))[0]->ID;
						}
						$exclude_array[] = $p;
						setup_postdata($p);
						?>
						<div class="row">
							<div class="col-lg-8">
								<img class="firstrow-image" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($p), 'full' ); ?>">
							</div>
							<div class="col-lg-4">
								<a href="<?php get_permalink($p); ?>"><h2><?php echo get_the_title($p); ?></h2></a>
								<?php echo the_excerpt($p); ?>
								<div class="blog-author-avatar" style="background:url(<?php echo get_avatar_url(get_the_author_meta('ID',$p->post_author)); ?>)"></div>
								<span><?php the_author();  ?></span>
								<i><?php the_date(); ?></i>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<?php 
						wp_reset_postdata();
						$p = get_field('two_column',48)[1];
						if(get_field('latest_blogs_or_manual_choose',48) == 'latest'){
							$p = get_posts(array('post_type'=>'blog','numberposts'=>2))[1]->ID;
						}
						$exclude_array[] = $p;
						setup_postdata($p);
						?>
						<div class="row">
							<div class="col-lg-8">
								<img class="firstrow-image" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($p), 'full' ); ?>">
							</div>
							<div class="col-lg-4">
								<a href="<?php get_permalink(); ?>"><h2><?php echo get_the_title($p); ?></h2></a>
								<?php echo the_excerpt(); ?>
								<div class="blog-author-avatar" style="background:url(<?php echo get_avatar_url(get_the_author_meta('ID',$p->post_author)); ?>)"></div>
								<span><?php the_author();  ?></span>
								<i><?php the_date(); ?></i>
							</div>
						</div>
					</div>
					
				</div>
			<?php wp_reset_postdata(); }?>
			
		</div>

		<div class="blog-filter">
			<?php $terms = get_terms_by_custom_post_type('blog','blog_category'); ?>
						<ul id="pentafilter-box" class="blog-filter-buttons">
						<li class="pentafilter" termName='all'>All</li>						
				<?php foreach($terms as $term){ ?>
						<li class="pentafilter" termName="<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
				<?php }
			?>
							
			</ul>
		</div>
			<div class='row infinite-container'>	
					<?php
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$the_query = new WP_Query( array(
						'post_type' => 'blog',
						'post__not_in' => $exclude_array,
						'paged' => $paged,
						'posts_per_page'=>6,
						'post_status' => 'publish'
					) );?>
					
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						
					<?php get_template_part( 'template_parts/blog', 'grid-element' ); ?>

					<?php  endwhile; ?>
					<div class="row">
					<button page="<?php echo ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>" class='more-blogs'>Load more...</button>
					</div>
				</div>
			<div class="paginator row mgB24">
                <?php //wp_pagenavi(); ?>
		</div>
	</div>
	</div>


    <?php // If no content, include the "No posts found" template.
    else :
        echo 'nocontent';

    endif;
    ?>
</section>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php get_footer(); ?>


