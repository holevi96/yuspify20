<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>
<section id="contact" class="body row cool">
    <h1 class="huge-display-title" >Contact</h1>

    <div class="fluid-container">

        <ul id="offices" class="offices-grid row">


            <?php $cnt=0; while( have_rows('offices') ): the_row();
            $h2 = get_sub_field('office_name');
            $location = get_sub_field('location');
            $contacts = get_sub_field('contacts');
            ?>

            <li class="office col-sm-12 col-md-3 col-lg-3">
			<?php if($cnt==0){?>
			    <i class="material-icons">domain</i>
				<h4 class="general-title">Office</h4>	
			<?php }?>
                <h2><?php echo $h2; ?></h2>
                <h3><?php echo $location; ?></h3>
                <p><?php echo $contacts; ?></p>
            </li>

            <?php $cnt++; endwhile; ?>

			<?php $cnt=0; while( have_rows('data_centers') ): the_row();
                $dcname = get_sub_field('datacenter_name');
                $hosted = get_sub_field('hosted_by');
                ?>

                <li class="office data-center col-sm-12 col-md-6 col-lg-3 <?php if($cnt==0){echo 'first-data-center'; }?>">
					<?php if($cnt==0){?>
						<i class="material-icons">domain</i>
						<h4 class="general-title">Data centers</h4>	
					<?php }?>
                    <h2><?php echo $dcname; ?></h2>
                    <h4>Hosted by</h4>
                    <p><?php echo $hosted; ?></p>
                </li>

            <?php $cnt++; endwhile; ?>
        </ul>
    </div>


    <section id="map" class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.4848892678265!2d19.03345861602713!3d47.4804665791765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc3029ba88f9%3A0x793311f8c2d3844e!2sGravity+R%26D!5e0!3m2!1sen!2shu!4v1497630810374" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>

            <div class="row">
                <div class="fluid-container">

                    <div class="contact-info col-offset-lg-8 col-lg-4">

                        <h2 class="">Drop us a line</h2>


                        <!--
                        <h2 class="">Drop us a line</h2>
                        <p class="row">
                            Székhely és postai cím:
                        </p>

                        <p class="row">
                            1113 Budapest <br>
                            Villányi út 40
                        </p>

                        <div class="row">
                            <p class="col-lg-6">
                                Phone
                            </p>
                            <p class="col-lg-6">
                                (+36) 70 457 72 23
                            </p>
                        </div>

                        <div class="row">
                            <p class="col-lg-6">
                                e-mail:
                            </p>
                            <p class="col-lg-6">
                                hello@yusp.com
                            </p>
                        </div>

                        -->
                        <?php echo do_shortcode('[contact-form-7 id="3374" title="Contact form"]') ?>
                    </div>
                </div>
            </div>

    </section>
<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer(); ?>
