<section id="publications" class="row">
    <div class="fluid-container">

        <h2 class="general-title">Publications</h2>

        <ul id="publications" class="unit-listing">

            <?php while( have_rows('publications-listing') ): the_row();
                // vars
                $free_text= get_sub_field('free-text');
                ?>

                <li class="publication-row unit-row">
                    <div class="free-text"><?php echo $free_text ?></div>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
</section>