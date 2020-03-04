                        <div class="steps">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                        </div>

                        <ul class="to-dos">
                            <li>
                                <p><?php echo get_sub_field('step1_text'); ?></p>
                                <?php if(get_sub_field('step1_cta_text')): ?><a class="yfy-button green medium" href="<?php echo get_sub_field('step1_cta_link'); ?>">
                                    <?php echo get_sub_field('step1_cta_text'); ?>
                                </a><?php endif; ?>
                            </li>
                            <li>
                                <p><?php echo get_sub_field('step2_text'); ?></p>
                                <a href="<?php echo get_sub_field('step2_cta_link'); ?>">
                                    <?php echo get_sub_field('step2_cta_text'); ?>
                                </a>
                            </li>
                            <li>
                                <p><?php echo get_sub_field('step3_text'); ?>
                                </p>
                            </li>
                        </ul>