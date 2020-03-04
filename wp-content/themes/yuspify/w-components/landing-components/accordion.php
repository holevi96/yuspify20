<section id="faq" class="row">

    <div class="yfy-container">
        <h2 class="section-title purple"><?php echo get_sub_field('title'); ?></h2>

        <ul class="yfy-accordion">

            <?php
            $cnt = 0;
            while( have_rows('tabs') ): the_row(); ?>
               <li class="<?php echo ($cnt==0)?'selected':''; ?>">
                    <h2>
                        <?php echo get_sub_field('title'); ?>
                    </h2>
                    <p>
                        <?php echo get_sub_field('description'); ?>
                    </p>
               </li>
            <?php $cnt++; endwhile; ?>
        </ul>

    </div>
</section>