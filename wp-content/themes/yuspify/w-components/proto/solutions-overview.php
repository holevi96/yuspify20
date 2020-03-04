<section id="solutions-overview" class="row">
    <div class="fluid-container">

        <div id="solutions-header" class="row">

        </div>

        <div id="solutions-wrapper" class="row">

            <div class="col-lg-3">
                <h3>modules</h3>
                <div class="modules">

                </div>
                
                <div class="filters">
                    
                </div>
            </div>

            <div class="features col-lg-6">
                <h3>Features</h3>

                <?php if ( have_rows('solutions_list') ): ?>

                <ul class="features-list">

                    <?php while ( have_rows('solutions_list') ): the_row();
                    // VARS
                    $solution_name = get_sub_field('solution_name');
                    ?>

                    <li class="feature-row row">
                        <?php echo $solution_name; ?>
                    </li>

                    <?php endwhile; ?>
                </ul>

                <?php endif; ?>

            </div>

            <div class="col-lg-3">
                <h3>Product lines</h3>
                    
            </div>
        </div>


    </div>

</section>