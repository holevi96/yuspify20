<section id="single-case-studies" class="body row">

    <div id="case-studies-header" class="row">
        <div class="fluid-container">

            <?php get_the_content(); ?>

            <h1 class="content-title">
                <?php the_title(); ?>
            </h1>

            <div id="description" class="col-sm-12 col-md-4 col-lg-4">
                <?php echo get_field('description'); ?>
            </div>

            <div id="kpi">
                <?php if (have_rows('kpi_block')):; ?>

                    <ul class="kpi-block">
                        <?php while (have_rows('kpi_block')) :the_row(); ?>
                            <li class="kpi-row col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <h2><?php the_sub_field('kpi_number'); ?></h2>
                                <h3><?php the_sub_field('kpi_text'); ?></h3>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!--
    <div id="case-studies-details" class="row">
        <div class="fluid-container">
            <div class="project-summary col-xs-12 col-md-12 col-lg-6">
                <h2>Project Summary</h2>
                <p><?php echo get_field('project_summary'); ?></p>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-6 illustration-wrapper">
                <img class="col" src="--><?php //the_post_thumbnail_url(); ?><!--" alt=""/>
                <img src="<?php echo get_field('illustration'); ?>" alt="">
            </div>
        </div>
    </div>
    -->

    <div id="challenge-solution-result" class="row">
        <div class="fluid-container">
            <div class="text-wrapper col-xs-12 col-md-12 col-lg-4">
                <h2>Challenge</h2>
                <p>
                    <?php echo get_field('challenge'); ?>
                </p>
            </div>
            <div class="text-wrapper col-xs-12 col-md-12 col-lg-4">
                <h2>Solution</h2>
                <p>
                    <?php echo get_field('solution'); ?>
                </p>
            </div>
            <div class="text-wrapper col-xs-12 col-md-12 col-lg-4">
                <h2>Result</h2>
                <p>
                    <?php echo get_field('result'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!--
<section id="cat-row" class="row green">
    <div class="fluid-container">
        <h2>Do you want to know more?</h2>
        <button>Say Hello!</button>
    </div>
</section>
-->