<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Barking_Dog
 */
?>

            </div><!-- #content -->
        </div><!-- .main-page -->
	</div><!-- .main-content-area -->

    <div class="footer-area full">
        <div class="main-page">
        	<footer id="colophon" class="site-footer inner" role="contentinfo">
        		<div class="contacts">
                    <a class="contacts-link contact-linkedin" href="<?php echo esc_url( __( 'https://www.linkedin.com/in/lisajwells', 'barking-dog' ) ); ?>"></a>
                    <a class="contacts-link contact-github" href="<?php echo esc_url( __( 'https://github.com/lisajwells', 'barking-dog' ) ); ?>"></a>
                    <a class="contacts-link contact-generalassembly" href="<?php echo esc_url( __( 'https://profiles.generalassemb.ly/profiles/lisajwells', 'barking-dog' ) ); ?>"></a>
        			<a class="contacts-link contact-mail" href="<?php echo esc_url( __( 'mailto:lisa@lisajaynewells.com', 'barking-dog' ) ); ?>"></a>
        		</div><!-- .site-info -->
        	</footer><!-- #colophon -->
        </div><!-- .main-page -->
    </div><!-- .footer-area -->


<?php wp_footer(); ?>

</body>
</html>
