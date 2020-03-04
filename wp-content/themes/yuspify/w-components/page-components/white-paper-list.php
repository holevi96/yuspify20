<section id="white-paper-list" class="body row">
    <div class="fluid-container">

        <h2 class="the-title mgT24 mgB24">Case Studies</h2>

        <ul class="white-paper-listing row">
        <?php while( have_rows('white_paper_listing') ): the_row();

            // vars
            $a= get_sub_field('white_paper_link');
            $h2 = get_sub_field('white_paper_title');
            $p = get_sub_field('white_paper_description');
            $img = get_sub_field('whit_paper_cover');
            ?>

            <li class="white-paper-wrapper col-sm-12 col-lg-4">
                <a class="white-paper col" href="<?php echo $a; ?>">
                    <img src="<?php echo $img; ?>" alt="">
                    <div class="text-wrapper">
                        <h2 class="text t-18 gray mgT8"><?php echo $h2; ?></h2>
                        <p class="material-icons"><?php echo $p; ?></p>
                    </div>
                </a>
            </li>

        <?php endwhile; ?>
        </ul>

    </div>
</section>