<section id="simple-text" class="row"><a name="about"></a>
    <ul class="row">
        <?php while( have_rows('simple-text') ): the_row();

            // vars
            $h2= get_sub_field('simple-text-title');
            $p = get_sub_field('simple-text-paragraph');
            ?>

            <li class="row">
                <div class="fluid-container">
                    <h2 class="mgT24 mgB24">
                        <?php echo $h2 ?>
                    </h2>
                    <p>
                        <?php echo $p ?>
                    </p
                </div>

            </li>

        <?php endwhile; ?>
    </ul>
</section>    
        
        
        
        
