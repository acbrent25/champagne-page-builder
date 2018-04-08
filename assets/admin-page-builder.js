/**
 * JS SCRIPT
**/
jQuery( document ).ready( function( $ ){

	/* Add Row */
	$( 'body' ).on( 'click', '.acpb-add-row', function(e){
		e.preventDefault();

		 /* Target the template. */
		var template = '.acpb-templates > .acpb-' + $( this ).attr( 'data-template' );

		/* Clone the template and add it. */
		$( template ).clone().appendTo( '.acpb-rows' );

		/* Hide Empty Row Message */
		$( '.acpb-rows-message' ).hide();
	});

	/* Hide/Show Empty Row Message */
	if( $( '.acpb-rows > .acpb-row' ).length ){
		$( '.acpb-rows-message' ).hide();
	}
	else{
		$( '.acpb-rows-message' ).show();
	}

	/* Delete Row */
	$( 'body' ).on( 'click', '.acpb-remove', function(e){
		e.preventDefault();

		/* Delete Row */
		$( this ).parents( '.acpb-row' ).remove();
		
		/* Show Empty Message When Applicable. */
		if( ! $( '.acpb-rows > .acpb-row' ).length ){
			$( '.acpb-rows-message' ).show();
		}
	});

	/* Make Row Sortable */
	$( '.acpb-rows' ).sortable({
		handle: '.acpb-handle',
		cursor: 'grabbing',
	});

});
