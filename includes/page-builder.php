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
	<div id="ac-page-builder">
 
	<?php /* This is where we gonna add & manage rows */ ?>
	<div class="acpb-rows">
		<p class="acpb-rows-message">This is where we manage rows.</p>
	</div><!-- .acpb-rows -->

	<?php /* This is where our action buttons to add rows */ ?>
	<div class="acpb-actions">
		<a href="#" class="acpb-add-row button-primary button-large" data-template="col-1">Add 1 Column</a>
		<a href="#" class="acpb-add-row button-primary button-large" data-template="col-2">Add 2 Columns</a>
	</div><!-- .acpb-actions -->

	<?php /* Rows template (Going to be hidden) */ ?>
	<div class="acpb-templates">
	<?php /* == This is the 1 column row template == */ ?>
    	<div class="acpb-row acpb-col-1">
 
			<div class="acpb-row-title">
				<span class="acpb-handle dashicons dashicons-sort"></span>
				<span class="acpb-row-title-text">1 Column</span>
				<span class="acpb-remove dashicons dashicons-trash"></span>
			</div><!-- .acpb-row-title -->
	
			<div class="acpb-row-fields">
				<textarea class="acpb-row-input" name="" data-field="content" placeholder="Add HTML here..."></textarea>
				<input class="acpb-row-input" type="hidden" name="" data-field="type" value="col-1">
        
		</div><!-- .acpb-row-fields -->
 
    </div><!-- .acpb-row.acpb-col-1 -->

	<?php /* == This is the 2 columns row template == */ ?>
    <div class="acpb-row acpb-col-2">
 
        <div class="acpb-row-title">
            <span class="acpb-handle dashicons dashicons-sort"></span>
            <span class="acpb-row-title-text">2 Columns</span>
            <span class="acpb-remove dashicons dashicons-trash"></span>
        </div><!-- .acpb-row-title -->
 
        <div class="acpb-row-fields">
            <div class="acpb-col-2-left">
                <textarea class="acpb-row-input" name="" data-field="content-1" placeholder="1st column content here..."></textarea>
            </div><!-- .acpb-col-2-left -->
            <div class="acpb-col-2-right">
                <textarea class="acpb-row-input" name="" data-field="content-2" placeholder="2nd column content here..."></textarea>
            </div><!-- .acpb-col-2-right -->
            <input class="acpb-row-input" type="hidden" name="" data-field="type" value="col-2">
        </div><!-- .acpb-row-fields -->
 
    </div><!-- .acpb-row.acpb-col-2 -->

	</div><!-- .acpb-templates -->

	</div><!-- .ac-page-builder -->
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


