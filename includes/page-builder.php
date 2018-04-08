<?php
/**
 * PAGE BUILDER
 * - Register Page Template
 * - Add Page Builder Control
 * - Admin Scripts
 * 
 * @since 1.0.0
 * @author Adam Champagne <adam@virtuentmedia.com>
 * @copyright Copyright (c) 2018 Adam Champagne
**/

/* === REGISTER PAGE TEMPLATE === */

/* Add page templates */
add_filter( 'theme_page_templates', 'acpb_register_page_template' );

/**
 * Register Page Template: Page Builder
 * @since 1.0.0
 */
function acpb_register_page_template( $templates ){
	$templates['templates/page-builder.php'] = 'Page Builder';
	return $templates;
}


/* === ADD PAGE BUILDER CONTROL === */

/* Add page builder form after editor */
add_action( 'edit_form_after_editor', 'acpb_editor_callback', 10, 2 );

/**
 * Page Builder Control
 * Added after Content Editor in Page Edit Screen.
 * @since 1.0.0
 */
function acpb_editor_callback( $post ){
	if( 'page' !== $post->post_type ){
		return;
	}
?>
	<div id="fx-page-builder">
		<h1>Page Builder Placeholder.</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a tortor quam. Vestibulum aliquet, diam eget dignissim vehicula, sapien sapien tempor velit, a ultrices tellus turpis nec nunc. Duis porta dapibus ligula vel semper.</p>
	</div><!-- #fx-page-builder -->
<?php
}


/* === ADMIN SCRIPTS === */

/* Admin Script */
add_action( 'admin_enqueue_scripts', 'acpb_admin_scripts' );

/**
 * Admin Scripts
 * @since 1.0.0
 */
function acpb_admin_scripts( $hook_suffix ){
	global $post_type;

	/* In Page Edit Screen */
	if( 'page' == $post_type && in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ){

		/* Load Editor/Page Builder Toggle Script */
		wp_enqueue_script( 'acpb-admin-editor-toggle', ACPB_URI . 'assets/admin-editor-toggle.js', array( 'jquery' ), ACPB_VERSION );
	}
}


