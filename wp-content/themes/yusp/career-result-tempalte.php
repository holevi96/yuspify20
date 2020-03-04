<?php
/** Template Name: Career template*/
get_header();the_post()?>

<?php include('w-components/menu/menu-general.php'); ?>

<div id="career-result" class="row">

    <div class="fluid-container">

        
        <div class="col-lg-7 career-wrapper">
            <h1 class="row">
                <?php the_title(); ?>
            </h1>
            <?php the_content();?>
        </div>

        <div class="col-lg-5">
            <div class="benefits">
                <h2 class="text t-26 bold white">Benefits</h2>
                <ul class="benefits-list">
                    <li>Inspiring startup atmosphere</li>
                    <li>Participation in creating a unique state-of-the-art technology</li>
                    <li>Comfortable working conditions (no dress code, free snacks and beverages, foosball, table tennis etc.)</li>
                    <li>Flexible working hours</li>
                    <li>Experienced, creative colleagues</li>
                </ul>
                <iframe width="100%" height="auto" src="https://www.youtube.com/embed/lk7-qMpHCWE" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    
</div>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer();?>
