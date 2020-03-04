<section id="flexible-logos" class="row">
    <div class="fluid-container">

        <h2>Key Klients</h2>

        <?php

        // check if the flexible content field has rows of data
        if( have_rows('flexible_logos') ):

            // loop through the rows of data
            while ( have_rows('flexible_logos') ) : the_row();

                // check current row layout
                if( get_row_layout() == 'logos' ):

                    // check if the nested repeater field has rows of data
                    if( have_rows('logo') ):

                        echo '<ul class="row">';

                        // loop through the rows of data
                        while ( have_rows('logo') ) : the_row();

                            $image = get_sub_field('image');
                            $link = get_sub_field('link');
                            $p = get_sub_field('param');

                            echo '<li><a href="' . $image['url'] . '"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '" /><p>"'. $p .'"</p></a></li>';

                        endwhile;

                        echo '</ul>';

                    endif;

                endif;

            endwhile;

        else :

            // no layouts found

        endif;

        ?>

    </div>
</section>