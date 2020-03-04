<?php get_header();the_post()?>
<?php include('w-components/menu/sme-menu.php'); ?>
<?php include('w-components/menu/sticky-menu.php'); ?>

<section id="sme" class="body light row">

    <section id="yuspify-pricing" class="row">
        <div id="title-box">
            <h1>Pay as we help you grow</h1>
            <h2>Simple, personalized pricing based on the revenue generated through Yuspify.</h2>
        </div>
        
        <div id="pricing-box" class="fluid-container">

            <h2 id="the-price">
                $<span></span>
            </h2>
            <h3>Monthly fee</h3>

                <div id="pricing-slider" class="dragdealer">
                    <div class="grabber handle">
                </div>
                <div id="monthly-revenue">
                    <h2><span>$</span><span class="revenue">0</span></h2>
                    <h3>Your monthly revenue</h3>
                </div>
            </div>
            
            <div id="pricing-parameters">
                <div>
                    <h2>$<span class="yusp-generated-revenue"></span><br>
                        generated by yuspify
                    </h2>
                </div>
                <div>
                    <h2><span class="revenue-share">0</span>%<br>
                        revenue share by yuspify
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section id="features-grid">
        
    </section>
    
</section>

<?php include('w-components/footer/sme-footer.php'); ?>
<?php the_post()?>
<?php get_footer(); ?>

