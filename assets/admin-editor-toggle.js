/**
 * Toggle Content Editor/Page Builder
 * @author Adam Champagne <adam@virtuentmedia.com>
 * @copyright Copyright (c) 2018, Virtuent Media
 */
jQuery( document ).ready( function($) {

	/* Editor Toggle Function */
	function acpb_Editor_Toggle(){
		if( 'templates/page-builder.php' == $( '#page_template' ).val() ){
			$( '#postdivrich' ).hide();
			$( '#ac-page-builder' ).show();
		}
		else{
			$( '#postdivrich' ).show();
			$( '#ac-page-builder' ).hide();
		}
	}

	/* Toggle On Page Load */
	acpb_Editor_Toggle();

	/* If user change page template drop down */
	$( "#page_template" ).change( function(e) {
		acpb_Editor_Toggle();
	});

});