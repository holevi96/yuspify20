<div class="testimonial-wrapper row">
    <?php if( have_rows('testimonial_slide') ): ?>

        <ul class="testimonial-carousel fluid-container" data-flickity='{ "wrapAround": true, "imagesLoaded": true }'>

            <?php while( have_rows('testimonial_slide') ): the_row();


                // vars
                $h3 = get_sub_field('h3');
                $h4 = get_sub_field('h4');
                $p = get_sub_field('p');
                $avatar_url = get_sub_field('avatar');

                ?>

                <li class="carousel-cell">
                    <div class="author">
                        <img class="col-md-4 col-lg-4" src="<?php echo $avatar_url; ?>" alt=""/>
                        <div class="col-md-8 col-lg-8 text-wrapper">
                            <h3 class="authorName"><?php echo $h3; ?></h3>
                            <h4 class="authorPosition"><?php echo $h4; ?></h4>
                            <p><?php echo $p; ?></p>
                        </div>
                    </div>
                </li>

            <?php endwhile; ?>

        </ul>

    <?php endif; ?>

    <div class="row">
        <div class=""><a class="free-trial-button ent-green middle" href="/references">check out our projects</a></div>
    </div>

</div>
