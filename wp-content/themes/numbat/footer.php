<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package numbat
 */
?>
<?php

global $numbat_redux;

?>


    <?php if (!numbat_plugin_active('redux-framework/redux-framework.php')){ ?>
        <!-- BACK TO TOP BUTTON -->
        <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="#0">
            <span></span>
        </a>
    <?php }else{ ?>
        <?php if (numbat_redux('mt_backtotop_status') == true) { ?>
            <!-- BACK TO TOP BUTTON -->
            <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="#0">
                <span></span>
            </a>
        <?php } ?>
    <?php } ?>


    <footer>
        <?php if ( $numbat_redux['numbat-enable-footer-widgets'] ) { ?>

        <div class="container footer-top">
            <div class="row <?php echo esc_attr($numbat_redux['numbat_number_of_footer_columns']); ?>">

                <?php
                $columns    = 12/intval($numbat_redux['numbat_number_of_footer_columns']);
                $nr         = array("1", "2", "3", "4", "6");

                if (in_array($numbat_redux['numbat_number_of_footer_columns'], $nr)) {
                    $class = 'col-md-'.esc_html($columns);
                    for ( $i=1; $i <= intval( $numbat_redux['numbat_number_of_footer_columns'] ) ; $i++ ) { 

                        echo '<div class="'.esc_html($class).' widget widget_text">';
                            dynamic_sidebar( 'footer_column_'.esc_html($i) );
                        echo '</div>';

                    }
                }elseif($numbat_redux['numbat_number_of_footer_columns'] == 5){
                    #First
                    if ( is_active_sidebar( 'footer_column_1' ) ) {
                        echo '<div class="col-md-3 widget widget_text">';
                            dynamic_sidebar( 'footer_column_1' );
                        echo '</div>';
                    }
                    #Second
                    if ( is_active_sidebar( 'footer_column_2' ) ) {
                        echo '<div class="col-md-2 widget widget_text">';
                            dynamic_sidebar( 'footer_column_2' );
                        echo '</div>';
                    }
                    #Third
                    if ( is_active_sidebar( 'footer_column_3' ) ) {
                        echo '<div class="col-md-2 widget widget_text">';
                            dynamic_sidebar( 'footer_column_3' );
                        echo '</div>';
                    }
                    #Fourth
                    if ( is_active_sidebar( 'footer_column_4' ) ) {
                        echo '<div class="col-md-2 widget widget_text">';
                            dynamic_sidebar( 'footer_column_4' );
                        echo '</div>';
                    }
                    #Fifth
                    if ( is_active_sidebar( 'footer_column_5' ) ) {
                        echo '<div class="col-md-3 widget widget_text">';
                            dynamic_sidebar( 'footer_column_5' );
                        echo '</div>';
                    }
                }
                ?>

            </div>
        </div>

        <?php } ?>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <?php if (numbat_plugin_active('redux-framework/redux-framework.php')){ ?>
                    <div class="col-md-6">
                        <p class="copyright"><?php echo esc_attr($numbat_redux['numbat_footer_text']); ?></p>
                    </div>
                        <div class="col-md-6 payment-methods">
                            <div class="card-icons1"></div>
                        </div>
                    <?php }else { ?>
                    <div class="col-md-12">
                        <p class="copyright"><?php esc_html_e( 'Copyright 2017 by ModelTheme. All Rights Reserved.', 'numbat' ); ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>
</div>


<?php wp_footer(); ?>
</body>
</html>
