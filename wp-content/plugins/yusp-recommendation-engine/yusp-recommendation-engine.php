<?php
/*Plugin Name: Yuspify Recommendation Engine
Plugin URI: https://wordpress.org/plugins/yusp-recommendation-engine
Description: This plugin connects your store to Yuspify Recommendation Engine.
Version: 1.3.13
Author: Gravity Inc
License: GPL
*/
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    include_once('GravityClient.php');

    if (!class_exists('YuspRecommendationEngine')) {
        /**
         * @property stdClass plugin
         */
        class YuspRecommendationEngine
        {
            public $shop_elements = 0;

            public static function yuspCreateGravityClient($customer_id, $password, $webshop_servlet_url)
            {
                $config = new GravityClientConfig();
                $config->remoteUrl = $webshop_servlet_url;
                $config->user = $customer_id;
                $config->password = $password;

                return new GravityClient($config);
            }

            public function __construct()
            {

                $this->plugin = new stdClass;
                $this->plugin->name = 'yusp-recommendation-engine';
                $this->plugin->displayName = 'Yuspify';

                add_action('admin_menu', array($this, 'yuspCreateMenu'));
                add_action('wp_head', array($this, 'yuspInsertTrackingCode'));
                add_action('woocommerce_after_shop_loop_item', array($this, 'yuspAddToCart'), 10);
                add_action('untrash_post', array($this, 'yuspRestoreProduct'));
                add_action('trashed_post', array($this, 'yuspDeleteProduct'));
                add_action('save_post', array($this, 'yuspAddProduct'));
                add_action('delete_user', array($this, 'yuspDeleteUser'));
                add_action('user_register', array($this, 'yuspAddUser'));
                add_action('profile_update', array($this, 'yuspAddUser'));
                add_action('wc_add_to_cart_message', array($this, 'yuspAddToCartProductPage'), 10, 2);
                add_action('woocommerce_thankyou', array($this, 'yuspWoocommerceThankYou'), 10, 1);
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    $GLOBALS['client'] = YuspRecommendationEngine::yuspCreateGravityClient(get_option('customerId'),
                        get_option('password'), get_option('webshopServletUrl'));
                }
            }

            public static function yuspCreateMenu()
            {
                add_menu_page('Yuspify', 'Yuspify', 'administrator', __FILE__,
                    'YuspRecommendationEngine::yuspSettingsPage',
                    plugins_url().'/yusp-recommendation-engine/img/yuspify-logo.svg');
                add_action('admin_init', 'YuspRecommendationEngine::registerYuspSettings');
            }

            public static function registerYuspSettings()
            {
                register_setting('yusp-settings-group', 'customerId');
                register_setting('yusp-settings-group', 'password');
                register_setting('yusp-settings-group', 'webshopServletUrl');
                register_setting('yusp-settings-group', 'autoProductImport');
                register_setting('yusp-settings-group', 'autoUserImport');
                register_setting('yusp-settings-group', 'yuspOrderId');
                register_setting('yusp-settings-group', 'YuspUsedProductId');
                if (get_option('yuspUsedProductId') === false) {
                    update_option('yuspUsedProductId', "itemId");
                }
            }

            public static function yuspSettingsPage()
            { ?>
                <style>
                    .main-logo img {
                        width: 20%;
                        margin: 15px 15px 15px 0;
                    }

                    input[type="text"], input[type="password"] {
                        width: 300px;
                    }

                    td {
                        width: auto;
                    }

                    .form-table {
                        width: 90%;
                    }

                    .form-table div {
                        font-size: 14px;
                    }

                    .form-table th, .form-table td {
                        padding: 10px 0 10px 10px;
                        vertical-align: middle;
                    }

                    #error {
                        font-size: 20px;
                        color: red;
                    }

                    .switch {
                        position: relative;
                        display: inline-block;
                        width: 50px;
                        height: 20px;
                    }

                    .switch input {
                        display: none;
                    }

                    .slider {
                        position: absolute;
                        cursor: pointer;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: #ccc;
                        -webkit-transition: .4s;
                        transition: .4s;
                    }

                    .slider:before {
                        position: absolute;
                        content: "";
                        height: 15px;
                        width: 15px;
                        left: 4px;
                        bottom: 3px;
                        background-color: white;
                        -webkit-transition: .4s;
                        transition: .4s;
                    }

                    input:checked + .slider {
                        background-color: #2196F3;
                    }

                    input:focus + .slider {
                        box-shadow: 0 0 1px #2196F3;
                    }

                    input:checked + .slider:before {
                        -webkit-transform: translateX(26px);
                        -ms-transform: translateX(26px);
                        transform: translateX(26px);
                    }

                    .slider.round {
                        border-radius: 34px;
                    }

                    .slider.round:before {
                        border-radius: 50%;
                    }
                </style>

                <div>
                    <div class="main-logo">
                        <img
                                src="<?php echo plugins_url().'/yusp-recommendation-engine/img/yuspify-logo-woocommerce.svg'; ?>"
                                alt="Yuspify recommendation engine dashboard">
                    </div>

                    <form method="post" action="options.php">
                        <?php settings_fields('yusp-settings-group'); ?>
                        <?php do_settings_sections('yusp-settings-group');
                        if ($_GET['settings-updated']) {
                            echo '<h1> Settings updated!</h1>';
                        } ?>
                        <table class="form-table">
                            <tr>
                                <td><h2><a href="https://account.yusp.com/" target="_blank">Register for <br>a Yuspify
                                            account</a></h2></td>
                                <td>
                                    <input type="submit" name="submit" id="submit" class="button button-primary"
                                           value="Save Changes"/>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="customerId">Customer id: </label></th>
                                <td><input type="text" name="customerId" id="customerId"
                                           value="<?php echo esc_attr(get_option('customerId')); ?>"/></td>
                                <td><?php
                                    if ($_GET['settings-updated'] && (get_option('customerId') == '')) {
                                        echo '<p id="error">Please fill out the Customer id field!</p><br>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <th><label for="password">Password: </label></th>
                                <td><input type="password" name="password" id="password"
                                           value="<?php echo esc_attr(get_option('password')); ?>"/></td>
                                <td><?php
                                    if ($_GET['settings-updated'] && (get_option('password') == '')) {
                                        echo '<p id="error">Please fill out the Password field!</p><br>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <th><label for="webshopServletUrl">Webshop Servlet URL: </label></th>
                                <td><input type="text" name="webshopServletUrl" id="webshopServletUrl"
                                           value="<?php echo esc_attr(get_option('webshopServletUrl')); ?>"/></td>
                                <td><?php
                                    if ($_GET['settings-updated'] && (get_option('webshopServletUrl') == '')) {
                                        echo '<p id="error">Please fill out the Webshop Servlet Url field!</p><br>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="autoProductImport">Enable auto product import</label>
                                </th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="autoProductImport" id="autoProductImport"
                                        <?php echo get_option('autoProductImport') ? "checked='checked'" : ""; ?>//>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="autoUserImport">Enable auto user import</label>
                                </th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="autoUserImport" id="autoUserImport"
                                            <?php echo get_option('autoUserImport') ? "checked='checked'" : ""; ?>/>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Choose product identification
                                </th>
                                <td>
                                    SKU <input type="radio" name="YuspUsedProductId" value="sku" <?php checked("sku",
                                        get_option('YuspUsedProductId'), true); ?>>
                                    Product ID <input type="radio" name="YuspUsedProductId"
                                                      value="itemId" <?php checked("itemId",
                                        get_option('YuspUsedProductId'), true); ?>>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if (isset($_POST['userSynchronization'])) {
                        if ((get_option('webshopServletUrl')) != '') {
                            YuspRecommendationEngine::yuspUserSynchronization();
                        }
                    }
                    if (isset($_POST['productSynchronization'])) {
                        if ((get_option('webshopServletUrl')) != '') {
                            YuspRecommendationEngine::yuspProductSynchronization();
                        }
                    }
                    if (isset($_POST['productSynchronizationFeed'])) {
                        YuspRecommendationEngine::yuspProductSynchronizationFeed();

                    }
                    ?>
                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th>
                                <form method="post" action="">
                                    <input type="submit" name="productSynchronization"
                                           value="Run Product Synchronization by Client"
                                           class="button button-primary">
                                </form>
                            </th>
                            <td>
                                <div>Synchronize your <strong>product</strong> catalogue with your Yuspify database.
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <form method="post" action="">
                                    <input type="submit" name="productSynchronizationFeed"
                                           value="Run Product Synchronization by XML"
                                           class="button button-primary">
                                </form>
                            </th>
                            <td>
                                <div>Generate an XML Feed to import your <strong>product</strong> catalogue.</div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <form method="post" action="">
                                    <input type="submit" name="userSynchronization"
                                           value="Run User Synchronization by Client"
                                           class="button button-primary">
                                </form>
                            </th>
                            <td>
                                <div>Synchronize your <strong>user</strong> catalogue with your Yuspify database.</div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <form method="post" action="">
                                    <input type="submit" value="Manage recommendations" name="manageRecommendation"
                                           class="button button-primary">
                                </form>
                            </th>
                            <td>
                                <div>This link takes you to your Yuspify Dashboard where you can set up recommender
                                    boxes.
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <form method="post" action="">
                                    <input type="submit" value="Get Server Side Acces" name="serverSideAcces"
                                           class="button button-primary">
                                </form>
                            </th>
                            <td>
                                <div>Setting up data transfer connectionship between your wordpress site and yuspify
                                    database.
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_POST['manageRecommendation'])) {
                        if ((get_option('customerId')) != '') {
                            ?>
                            <script>
                                window.open("https://<?php echo get_option('customerId');?>.yusp.com/", "_blank");
                            </script><?php
                        }
                    }
                    if (isset($_POST['serverSideAcces'])) {
                        if ((get_option('customerId')) != '') {
                            ?>
                            <script>
                                window.open("https://<?php echo get_option('customerId');?>.yusp.com//integration/web/general", "_blank");
                            </script><?php
                        }
                    }
                    ?>
                </div>
            <?php }

            public function yuspInsertTrackingCode()
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    $customer_id = get_option('customerId');

                    if (is_user_logged_in()) {
                        $userId = get_current_user_id(); ?>
                        <script>
                            var _gravity = _gravity || [];
                            _gravity.push({type: 'set', userId: '<?php echo $userId; ?>'});
                        </script> <?php
                    }

                    if (is_cart()) {
                        global $woocommerce;
                        $items = $woocommerce->cart->get_cart();
                        $cart_array = array();
                        foreach ($items as $item => $values) {
                            $itemId = get_option('YuspUsedProductId') == "sku" ? $values['data']->get_sku() : $values['data']->id;
                            array_push($cart_array, "'".$itemId."'"); ?>
                            <meta name="itemInCart" content="<?php echo $itemId ?>">
                            <?php
                        } ?>

                        <script>
                            var _gravity = _gravity || [];
                            _gravity.push({
                                type: 'set',
                                itemInCart: [<?php echo join(', ', array_values($cart_array)); ?>]
                            });
                        </script> <?php
                    }

                    if (is_product()) {
                        global $post;
                        $itemId = get_option('YuspUsedProductId') == "sku" ? get_post_meta($post->ID, '_sku',
                            true) : get_the_ID();
                        ?>
                        <meta name="itemId" content="<?php echo $itemId; ?>">
                        <script>
                            var _gravity = _gravity || [];
                            _gravity.push({type: 'set', itemId: '<?php echo $itemId; ?>'});
                            _gravity.push({type: 'event', eventType: 'VIEW'});
                        </script><?php
                    }

                    if (is_search()) {
                        $search_expression = get_search_query(); ?>
                        <meta name="searchExpression" content="<?php echo $search_expression; ?>">
                        <script>
                            var _gravity = _gravity || [];
                            _gravity.push({type: 'set', searchExpression: '<?php echo $search_expression; ?>'});
                            _gravity.push({
                                type: 'event',
                                eventType: 'SEARCH',
                                searchExpression: '<?php echo $search_expression; ?>'
                            });
                        </script> <?php
                    }

                    if (is_product_category()) {
                        global $wp_query;
                        /** @var string $categoryPath */
                        $categoryPath = $wp_query->query['product_cat'];
                        ?>
                        <meta name="categoryPath" content="<?php echo $categoryPath; ?>">
                        <script>
                            var _gravity = _gravity || [];
                            _gravity.push({type: 'set', categoryPath: '<?php echo $categoryPath; ?>'});
                        </script> <?php
                    }

                    if (!is_user_logged_in()) { ?>
                        <script>
                            var _gravity = _gravity || [];
                            window.onload = (function () {
                                var elem = document.getElementsByName("login");
                                if (elem.length !== 0) {
                                    elem[0].addEventListener("click", function () {
                                        _gravity.push({type: 'set', userId: '<?php echo get_current_user_id();?>'});
                                        _gravity.push({type: 'event', eventType: 'LOGIN'});
                                    });
                                }
                            });
                        </script>
                    <?php }
                    ?>
                    <script>
                        (function (g, r, a, v, i, t, y) {
                            g[a] = g[a] || [], y = r.createElement(v),
                                g = r.getElementsByTagName(v)[0];
                            y.async = 1;
                            y.src = '//' + i + '/js/' + t + '/gr_reco5.min.js';
                            g.parentNode.insertBefore(y, g);
                            y = r.createElement(v), y.async = 1;
                            y.src = '//' + i + '/grrec-' + t + '-war/JSServlet4?cc=1';
                            g.parentNode.insertBefore(y, g);
                        })(window, document, '_gravity', 'script', '<?php echo $customer_id;?>.yusp.com', '<?php echo $customer_id;?>');

                        function my_add_to_cart(element, id, price, quantity) {
                            element.addEventListener("click", function () {
                                _gravity.push({
                                    type: 'event',
                                    itemId: id.toString(),
                                    eventType: 'ADD_TO_CART',
                                    unitPrice: price,
                                    quantity: quantity
                                });
                            });
                        }
                    </script>
                    <?php
                }
            }

            public function yuspAddToCart()
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    global $shop_elements;
                    ?>
                    <script>
                        var _gravity = _gravity || [];
                        var els = document.querySelectorAll("a[href*='add-to-cart']");
                        var element = els[<?php echo $shop_elements == null ? 0 : $shop_elements;?>];
                        if (element) {
                            <?php
                            $itemId = get_the_ID();
                            $product = wc_get_product($itemId);
                            $sku = $product->get_sku();
                            $quantity = $_POST['quantity'] ? $_POST['quantity'] : '1';
                            if ($product->product_type == 'composite') {
                                $product = new WC_Product_Composite($itemId);
                                $price = $product->get_composite_price('min', true);
                            } else {
                                $price = $product->get_price();
                            }
                            ?>
                            my_add_to_cart(element, '<?php echo get_option('YuspUsedProductId') == "sku" ? $sku : $itemId;?>', <?php echo $price != null ? $price : 0; ?>, <?php echo $quantity; ?>);
                            <?php $shop_elements++;?>
                        }
                    </script><?php
                }
            }

            public function yuspWoocommerceThankYou($order_get_id)
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    if (get_option('yuspOrderId') < $order_get_id) {
                        update_option('yuspOrderId', $order_get_id);
                        ?>
                        <script>
                            var _gravity = _gravity || [];
                        </script><?php
                        $orderId = $order_get_id;
                        $order = new WC_Order($orderId);
                        $items = $order->get_items();
                        $order_id_array = array();

                        foreach ($items as $item) {
                            $price = $item['total'] + $item['total_tax'];
                            if ($price != 0) {
                                $itemId = $item['product_id'];
                                $_woo_product = wc_get_product($itemId);
                                $sku = $_woo_product->get_sku();
                                $itemId = get_option('YuspUsedProductId') == "sku" ? $sku : $itemId;
                                $quantity = $item['qty'];
                                $unitPrice = $price / $quantity;
                                array_push($order_id_array, "'".$itemId."'");
                                ?>
                                <script>
                                    _gravity.push({
                                        type: 'event',
                                        eventType: 'BUY',
                                        itemId: '<?php echo $itemId; ?>',
                                        unitPrice: '<?php echo $unitPrice; ?>',
                                        quantity: '<?php echo $quantity; ?>',
                                        orderId: '<?php echo $orderId; ?>'
                                    });
                                </script><?php
                            }
                        } ?>
                        <script>
                            var _gravity = _gravity || [];
                            _gravity.push({
                                type: 'set',
                                itemBought: [<?php echo join(', ', array_values($order_id_array)); ?>]
                            });
                        </script> <?php
                    }
                }
            }

            public function yuspAddToCartProductPage($message, $product_id)
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    $product = wc_get_product($product_id);

                    if ($product->product_type == 'composite') {
                        $product = new WC_Product_Composite($product_id);
                        $price = $product->get_composite_price('min', true);
                    } else {
                        $price = $product->get_price();
                    }
                    $quantity = $_POST['quantity']; ?>
                    <script>

                        var _gravity = _gravity || [];
                        _gravity.push({
                            type: 'event',
                            eventType: 'ADD_TO_CART',
                            unitPrice: '<?php echo $price; ?>',
                            quantity: '<?php echo $quantity; ?>'
                        });
                    </script><?php
                }

                return $message;
            }

            public static function yuspProductSynchronizationFeed()
            {
                $link = plugins_url().'/yusp-recommendation-engine/yusp_product_feed.xml';
                echo "<h1>Your product feed is generated! Find the <a href=".$link.">XML file here.</a></h1><br>";
                $file_path = "../wp-content/plugins/yusp-recommendation-engine/yusp_product_feed.xml";
                $file_contents = '<?xml version="1.0"?><rss version="2.0" xmlns:g="http://base.google.com/ns/1.0" xmlns:c="http://base.google.com/cns/1.0"><channel><title>Product catalogue</title>';
                $file_contents .= '<link>'.home_url().'/</link><description>List of items</description>';
                $my_file = fopen($file_path, "w");

                $send_items_count = 100;
                $iteration_count = 0;
                do {
                    $params = array(
                        'posts_per_page' => $send_items_count,
                        'post_type' => array('product', 'product_variation'),
                        'fields' => 'ids',
                        'offset' => 0 + $iteration_count,
                    );
                    $wc_query = new WP_Query($params);
                    $itemIds = $wc_query->get_posts();
                    YuspRecommendationEngine::yuspGenerateItemsToXML($itemIds, $file_contents);
                    wp_reset_postdata();
                    $counts = $wc_query->post_count;
                    unset($wc_query);
                    $iteration_count += $send_items_count;
                } while ($counts == $send_items_count);
                $file_contents .= '</channel></rss>';
                fwrite($my_file, $file_contents);
                fclose($my_file);
            }

            public static function yuspGenerateItemsToXML($itemIds, &$file_contents)
            {
                for ($i = 0; $i < count($itemIds); $i++) {
                    $post_type = get_post_type($itemIds[$i]);
                    if ($post_type == 'product' || $post_type == 'product_variation') {
                        $product = wc_get_product($itemIds[$i]);
                        $title = $product->get_title() ? $product->get_title() : ' ';
                        $description = $product->get_description() ? $product->get_description() : ' ';
                        $itemId = $itemIds[$i];
                        $sku = $product->get_sku();
                        $hidden = !$product->is_in_stock() ? 'true' : 'false';
                        $product_tags = get_the_terms($itemIds[$i], 'product_tag');
                        $categoryPath = '';
                        $order_by = array('orderby' => 'parent');
                        $all_cats = wp_get_object_terms($itemIds[$i], 'product_cat', $order_by);
                        $categoryId = $all_cats[0]->term_id;


                        foreach ($all_cats as $item) {
                            $categoryPath = $categoryPath.$item->slug.'/';
                        }

                        $price = $product->get_price();
                        $url = get_permalink($product->get_id());
                        $imageUrl = wp_get_attachment_url($product->get_image_id());
                        $description = preg_replace("/\s|&nbsp;/", ' ', $description);

                        $file_contents .= '<item>';
                        $file_contents .= '<g:id>'.$itemId.'</g:id>';
                        $file_contents .= '<sku>'.$sku.'</sku>';
                        $file_contents .= '<title>'.$title.'</title>';
                        $file_contents .= '<c:hidden>'.$hidden.'</c:hidden>';
                        $file_contents .= '<link>'.$url.'</link>';
                        $file_contents .= '<g:image_link>'.$imageUrl.'</g:image_link>';
                        $file_contents .= '<c:description>'.$description.'</c:description>';
                        $file_contents .= '<g:price>'.$price.'</g:price>';
                        $file_contents .= '<c:categoryPath>'.$categoryPath.'</c:categoryPath>';
                        $file_contents .= '<c:categoryId>'.$categoryId.'</c:categoryId>';
                        if ($product_tags) {
                            foreach ($product_tags as $product_tag) {
                                $file_contents .= '<productTag>'.$product_tag->name.'</productTag>';
                            }
                        }
                        $file_contents .= '</item>';
                        unset($product);
                    }
                }
            }

            public static function yuspProductSynchronization()
            {
                $send_items_count = 100;
                $iteration_count = 0;
                do {
                    $params = array(
                        'posts_per_page' => $send_items_count,
                        'post_type' => array('product', 'product_variation'),
                        'fields' => 'ids',
                        'offset' => 0 + $iteration_count,
                    );
                    $wc_query = new WP_Query($params);
                    $itemIds = $wc_query->get_posts();
                    YuspRecommendationEngine::yuspAddProducts($itemIds);
                    wp_reset_postdata();
                    $counts = $wc_query->post_count;
                    unset($wc_query);
                    $iteration_count += $send_items_count;
                } while ($counts == $send_items_count);
                echo "<h1>Product Synchronization successful!</h1>";
            }

            public static function yuspUserSynchronization()
            {
                $customers = get_users(array('fields' => array('id')));
                $userIds = array();
                foreach ($customers as $customer) {
                    array_push($userIds, $customer->id);
                }
                YuspRecommendationEngine::yuspAddUsers($userIds);
                echo "<h1>User Synchronization successful!</h1>";
            }

            public static function yuspDeleteProduct($post_id)
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    if (get_option('autoProductImport') != '') {
                        if (get_post_type($post_id) == 'product' || get_post_type($post_id) == 'product_variation') {
                            YuspRecommendationEngine::yuspUpdateProduct($post_id, true);
                        }
                    }
                }
            }

            public static function yuspRestoreProduct($post_id)
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    if (get_option('autoProductImport') != '') {
                        if (get_post_type($post_id) == 'product' || get_post_type($post_id) == 'product_variation') {
                            $product = wc_get_product($post_id);
                            YuspRecommendationEngine::yuspUpdateProduct($post_id, !$product->is_in_stock());
                        }
                    }
                }
            }

            public static function yuspUpdateProduct($post_id, $hidden)
            {
                $logger = wc_get_logger();
                $context = array('source' => 'yusp-recommendation-engine');
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    $product = wc_get_product($post_id);
                    $itemId = get_option('YuspUsedProductId') == "sku" ? $product->get_sku() : $post_id;
                    $item = new GravityItem();
                    $item->itemId = $itemId;
                    $item->hidden = $hidden;
                    try {
                        $GLOBALS['client']->updateItem($item, true);
                    } catch (GravityException $e) {
                        $logger->info($e->getMessage(), $context);
                        switch ($e->faultInfo->errorCode) {
                            case -6:
                                printf('<p id="error">Something went wrong. Please, check if you’ve entered your Customer ID and Password correctly.</p><br>');
                                break;
                            case -3:
                                printf('<p id="error">Something went wrong. Please, check if you’ve entered your Webshop Servlet URL correctly.</p><br>');
                                break;
                            default:
                        }
                    }
                }
            }

            public static function yuspAddProducts($post_id)
            {
                $logger = wc_get_logger();
                $context = array('source' => 'yusp-recommendation-engine');
                $items_count = count($post_id);
                $items = array();
                for ($j = 0; $j < $items_count; $j++) {
                    $post_type = get_post_type($post_id[$j]);
                    if ($post_type == 'product' || $post_type == 'product_variation') {
                        $product = wc_get_product($post_id[$j]);
                        if ($product != false &&
                            $product->get_title() != 'AUTO-DRAFT' &&
                            strpos($product->get_title(), 'Import placeholder for') === false
                        ) {
                            if ($product->product_type == 'composite') {
                                $product = new WC_Product_Composite($post_id[$j]);
                                $price = $product->get_composite_price();
                            } else {
                                $price = $product->get_price();
                            }

                            $available = $product->stock_status;

                            $title = $product->get_title();
                            $description = $product->get_description();
                            $sku = $product->get_sku();

                            $product_tags = get_the_terms($post_id[$j], 'product_tag');
                            $slugs = [];
                            $all_cats = wp_get_object_terms($post_id[$j], 'product_cat', array('orderby' => 'parent'));

                            foreach ($all_cats as $item) {
                                $slugs[] = $item->slug;
                            }

                            $categoryPath = implode('/', $slugs);

                            $url = get_permalink($product->get_id());
                            $imageUrl = wp_get_attachment_url($product->get_image_id());
                            $item = new GravityItem();
                            $item->itemId = $itemId = get_option('YuspUsedProductId') == "sku" ? $sku : $post_id[$j];
                            $item->title = $title;
                            $item->hidden = !$product->is_in_stock();
                            $item->nameValues = array(
                                new GravityNameValue('Description', $description),
                                new GravityNameValue('CategoryPath', $categoryPath),
                                new GravityNameValue('Price', $price),
                                new GravityNameValue('URL', $url),
                                new GravityNameValue('Image', $imageUrl),
                                new GravityNameValue('Available', $available),
                            );

                            if ($product_tags) {
                                foreach ($product_tags as $product_tag) {
                                    $item->nameValues[] = new GravityNameValue('ProductTag', $product_tag->name);
                                }
                            }

                            $items[] = $item;
                        }
                    }
                }
                $isAsync = true;
                try {
                    if (count($items) != 0) {
                        $GLOBALS['client']->addItems($items, $isAsync);
                    }
                } catch (GravityException $e) {
                    $logger->info($e->getMessage(), $context);
                    switch ($e->faultInfo->errorCode) {
                        case -6:
                            printf('<p id="error">Something went wrong. Please, check if you’ve entered your Customer ID and Password correctly.</p><br>');
                            break;
                        case -3:
                            printf('<p id="error">Something went wrong. Please, check if you’ve entered your Webshop Servlet URL correctly.</p><br>');
                            break;
                        default:
                    }
                }
                unset($items);
            }

            public function yuspAddProduct($post_id)
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    if (get_option('autoProductImport') != '') {
                        if (get_post_type($post_id) == 'product') {
                            YuspRecommendationEngine::yuspAddProducts(array($post_id));
                            $product = wc_get_product($post_id);
                            $variant = $product->get_children();
                            YuspRecommendationEngine::yuspAddProducts($variant);
                        }
                    }
                }
            }

            public function yuspAddUser($user_id)
            {
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    if (get_option('autoUserImport') != '') {
                        YuspRecommendationEngine::yuspAddUsers(array($user_id));
                    }
                }
            }

            public static function yuspAddUsers($user_id)
            {
                $logger = wc_get_logger();
                $context = array('source' => 'yusp-recommendation-engine');
                $users_count = count($user_id);
                $send_users_count = 100;
                for ($i = 0; $i < $users_count; $i += $send_users_count) {
                    $users = array();
                    for ($j = $i; $j < $i + $send_users_count; $j++) {
                        if (isset($user_id[$j])) {
                            $all_meta_for_user = get_user_meta($user_id[$j]);
                            $name = $all_meta_for_user['first_name'][0].' '.$all_meta_for_user['last_name'][0];
                            $email = $all_meta_for_user['billing_email'][0];
                            $country = $all_meta_for_user['shipping_country'][0];
                            $postcode = $all_meta_for_user['shipping_postcode'][0];
                            $city = $all_meta_for_user['shipping_city'][0];

                            $user = new GravityUser();
                            $user->userId = $user_id[$j];
                            $user->hidden = false;
                            $user->nameValues = array(
                                new GravityNameValue('Name', $name),
                                new GravityNameValue('E-mail', $email),
                                new GravityNameValue('Country', $country),
                                new GravityNameValue('Zip', $postcode),
                                new GravityNameValue('City', $city),
                            );
                            array_push($users, $user);
                        }
                    }
                    try {
                        $GLOBALS['client']->addUsers($users, true);
                    } catch (GravityException $e) {
                        $logger->info($e->getMessage(), $context);
                        switch ($e->faultInfo->errorCode) {
                            case -6:
                                printf('<p id="error">Something went wrong. Please, check if you’ve entered your Customer ID and Password correctly.</p><br>');
                                break;
                            case -3:
                                printf('<p id="error">Something went wrong. Please, check if you’ve entered your Webshop Servlet URL correctly.</p><br>');
                                break;
                            default:
                        }
                    }
                    unset($users);
                }
            }

            public function yuspDeleteUser($user_id)
            {
                $logger = wc_get_logger();
                $context = array('source' => 'yusp-recommendation-engine');
                if (get_option('webshopServletUrl') != '' && get_option('customerId') != '' && get_option('password') != '') {
                    if (get_option('autoUserImport') != '') {
                        $user = new GravityUser();
                        $user->userId = $user_id;
                        $user->hidden = true;

                        try {
                            $GLOBALS['client']->addUser($user, true);
                        } catch (GravityException $e) {
                            $logger->info($e->getMessage(), $context);
                            switch ($e->faultInfo->errorCode) {
                                case -6:
                                    printf('<p id="error">Something went wrong. Please, check if you’ve entered your Customer ID and Password correctly.</p><br>');
                                    break;
                                case -3:
                                    printf('<p id="error">Something went wrong. Please, check if you’ve entered your Webshop Servlet URL correctly.</p><br>');
                                    break;
                                default:
                            }
                        }
                    }
                }
            }
        }
    }
    if (class_exists('YuspRecommendationEngine')) {
        $yuspRecommendationEngine = new YuspRecommendationEngine();
    }
}
?>