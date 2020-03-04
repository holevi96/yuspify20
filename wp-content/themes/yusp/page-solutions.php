<?php get_header();the_post()?>
<?php include('w-components/menu/menu-general.php'); ?>

<div id="solutions-page" class="row">

        <div class="starter row">
            <div class="mask">
                <div class="wrapper">

                    <h1 class="the-headline">
                        Yusp offers personalization solutions to clients ranging from online SMEs,
                        through Enterprise websites, to traditional retailers.
                    </h1>

                    <div class="solutions-desktop">

                        <a href="/yusp-digital/">
                            <div class="col-md-12 col-lg-6 solutions digital">
                                <h2>Yusp Digital is a SaaS personalization solution aimed at online businesses.</h2>
                                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-digital.svg" alt="">
                                <h3>Digital is for traditionally online businesses</h3>
                                <a class="free-trial-button outlined-white" href="<?php echo get_home_url(); ?>/yusp-digital">learn more</a>
                            </div>
                        </a>

                        <a href="/yusp-digical/">
                            <div class="col-md-12 col-lg-6 solutions digical">
                                <h2>Yusp Digical is a platform through which we provide personalization solutions to traditional, offline retail businesses</h2>
                                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/yusp-digical.svg" alt="">
                                <h3>Digical is for businesses with phisical stores</h3>
                                <a class="free-trial-button outlined-darkgray" href="<?php echo get_home_url(); ?>/yusp-digical">learn more</a>
                            </div>
                        </a>
                    </div>

                    <div class="solutions-mobile">
                        <a href="#/yusp-digital/">
                            <div class="row solutions digital-mobile">
                                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-digital.svg" alt="">
                                <h2>Yusp Digical is a platform through which we provide personalization solutions to traditional, offline retail businesses</h2>
                            </div>

                        </a>

                        <a href="#/yusp-digical/">
                            <div class="row solutions digical-mobile">
                                <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/yusp-digical.svg" alt="">
                                <h2>Yusp Digical is a platform through which we provide personalization solutions to traditional, offline retail businesses</h2>
                            </div>
                        </a>

                    </div>


                </div>
            </div>
        </div>

        <div id="below-the-fold" class="row" >

            <!--
            <div class="technology">
                <div class="technology-row data">

                    <h1 class="text t-26 bold uppercase white center mgB40">About our technology</h1>

                    <h2>Data</h2>
                    <p>
                        The most important elements that recommendation engines use to generate recommendations are users, items, events and the detailed description or metadata. The types of collected data can be classified in the following categories:
                    <p>
                    <h3>
                        User Behavior
                    </h3>
                    <p>
                        User behavior can be analyzed by embedding tracking codes on a website. These can log on-site activity, such as clicks, searches, page and item views etc. There are also certain methods for tracking user behavior off-site, like tracing clicks in emails, in mobile applications and in their push notifications.
                        <br>
                        <br>
                        User behavior related data is typically processed with collaborative filtering methods. The main idea behind this concept is that users who liked similar items in the past will like similar items in the future. The similarity between user profiles is calculated based on the similarities of the users’ behavior.
                    </p>
                    <h3>
                        Item Details
                    </h3>
                    <p>
                        Item details can be any metadata that describes an item, such as title, category, price, description, etc. Such data is usually utilized by content-based filtering methods. These can be used to suggest items that are similar to the ones that a certain user liked or visited.
                    </p>
                    <h3>Contextual Information</h3>
                    <p>
                        Contextual information plays an important role in refining the main recommendation algorithms. Some patterns in a user’s behavior may differ periodically according to the time of the day, the weather or the general mood. However, the used device, the current location (and its change) and the referral URL – which indicates the source of the traffic and in some cases the original search query as well – play an even more substantial factor when studying user activities. A well-designed solution has to also take these influences into consideration and serve recommendations accordingly.
                    </p>
                    <img class="graphic" src="<?php echo get_stylesheet_directory_uri(); ?>/img/1-yusp-gravity-data.svg" alt="">
                </div>

                <div class="technology-row">

                    <h2>Collaborative Filtering</h2>
                    <p>
                        This approach predicts the relevance of items for users based on user history, such as items previously purchased, viewed or liked by the visitor. The system compares one user’s history to others’ user journeys and based on this data, it creates a list of recommended items for the user. The collaborative filtering method suffers from the cold start problem, meaning that it cannot recommend items without historical data. They can be further classified into model-based and memory-based algorithms.
                        <br>
                        <br>
                        Model-based algorithms build a model from users' past behavior, and then use that model to recommend items to any user. They have two main advantages over memory-based approaches: they can provide recommendations to new users and they can provide instant recommendations, since most of the computation is moved into the pre-processing phase of the model creation.
                        <br>
                        <br>
                        Memory-based algorithms merge model creation and instant recommendations into a single procedure. Due to this fact, their computation requirements may be inadequate for instant recommendations, and they also suffer from the new user problem.
                        <br>
                        <br>
                        Neighborhood algorithms base their prediction on the similarity between users and items. Algorithms based on the similarity between users predict a user’s preference on an item based on past behavior on this item from similar users. On the other hand, algorithms based on the similarity between items compute the user’s preference for an item based on past behavior on similar items. The latter is usually the preferred approach, as it usually performs better in terms of accuracy, and can be directly used for recommendations, while also being model-based.
                        <br>
                        <br>
                        Latent factor algorithms explain user preferences by characterizing products and users with factors that are automatically inferred from user feedback. Factors might measure obvious dimensions (such as product category), but typically are not directly interpretable.
                        <br>
                        <br>
                        Some of the most successful realizations of latent factor models are based on matrix factorization. In its basic form, matrix factorization characterizes items and users by vectors of factors inferred from item usage patterns. High correspondence between item and user factors leads to a recommendation. These methods have become popular since they combine predictive accuracy with good scalability.
                    </p>
                    <img class="graphic" src="<?php echo get_stylesheet_directory_uri(); ?>/img/2-yusp-gravity-filtering-collaborative.svg" alt="">
                </div>

                <div class="technology-row">
                    <h2>Content Based Filtering</h2>
                    <p>
                        Content-based filtering (CBF) algorithms recommend items whose metadata are similar to the metadata of items the user has interacted with in the past. For instance, in the case of product recommendations, the product description, category, price, physical parameters, etc. are content metadata. Unlike the collaborative filtering approach, CBF does not suffer from new-item and cold-start problems.
                        Collaborative and content-based methods can be combined to create hybrid recommender systems. Hybrid algorithms aim to utilize the advantages of both approaches by integrating the accuracy and scalability of collaborative models and the ability to handle new items from the content-based models.
                    </p>
                    <img class="graphic" src="<?php echo get_stylesheet_directory_uri(); ?>/img/3-yusp-gravity-content-based-filtering.svg" alt="">
                </div>

                <div class="technology-row">
                    <h2>Architecture</h2>
                    <img class="graphic" src="<?php echo get_stylesheet_directory_uri(); ?>/img/4-yusp-gravity-architecture.svg" alt="">
                </div>
            </div>
            -->
        </div>
    </div>

<?php include('w-components/footer/general-footer.php'); ?>
<?php get_footer();?>