<?php
/** Template Name: Whitepaper single*/
get_header();the_post()?>

<?php include('w-components/menu/sme-menu.php'); ?>
<section id="third-party-modules" class="body row">

    <div class="fluid-container">

        <div class="intro">
            <?php the_content(); ?>
        </div>

        <ul id="modules-listing" class="row grid">

            <?php while ( have_rows('modules') ): the_row();
            $name = get_sub_field('module_name');
            $logo = get_sub_field('module_logo');
            $description = get_sub_field('module_description');
            $file = get_sub_field('attachment');
            $link = get_sub_field('link');
            ?>


            <li class="module case-study-wrapper col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="row wrapper">
                    <div class="image-wrapper">
                        <img class="row" src="<?php echo $logo ?>" alt="">
                    </div>
                    <h2 class="row"><?php echo $name ?></h2>

                    <div class="p-wrapper row">
                        <?php echo $description ?>
                    </div>

                    <?php if ('yes' == get_sub_field('link_or_file')): ?>

                        <div class="download row">
                            <a class="row" href="<?php echo $link ?>">
                                download
                                <i class="material-icons col">file_download</i>
                            </a>
                        </div>

                    <?php else: ?>

                        <div class="download row">
                            <a class="row" href="<?php echo $file['url']; ?>">
                                download
                                <i class="material-icons col">file_download</i>
                            </a>
                        </div>

                    <?php endif; ?>
                </div>
            </li>
                
            <?php endwhile; ?>
        </ul>
    </div>

</section>
<?php include('w-components/footer/sme-footer.php'); ?>

<?php get_footer();?>

