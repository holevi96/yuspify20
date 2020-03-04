<section id="company-in-numbers-horizontal" class="row">
    <div class="yfy-container">
        <?php  while( have_rows('companies') ): the_row(); ?>
        <div>
            <h2><?php echo get_sub_field('title'); ?></h2>
            <p><?php echo get_sub_field('description'); ?></p>
        </div>
        <?php endwhile; ?>
    </div>

</section>