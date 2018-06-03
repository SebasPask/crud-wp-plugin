(function( $ ) {
	'use strict';
	/**
	 * Todo el código Javascript orientado a la administración
	 * debe estar escrito aquí
	 */
	 var $precargador = $('.precargador'),
	urledit = "?page=bc_data&action=edit&id=";

	$('.modal').modal();
	
    $('.add-bc-table ').on('click', function(e){
		e.preventDefault();
		$('#add_bc_table').modal('open');
	});

	$('#crear-tabla').on('click', function(e){
		e.preventDefault();
		var $nombre = $('#nombre-tabla'),
		 nv = $nombre.val();
		if( nv != ''){
			$precargador.css('display','flex');
			$.ajax({
				url:		bcdata.url,
				type:		'POST',
				dataType:	'json',
				data:{
					action: 'bc_crud_table',
					nonce: 	bcdata.seguridad,
					nombre:	nv,
					tipo:	'add'
				},success: function( data ){
						if(data.result){
							urledit += data.insert_id;
							setTimeout( function(){
								location.href = urledit;
							}, 1300 );
						} 
					}, error: function( d,x,v){
						console.log(d);
						console.log(x);
						console.log(v);								
					}
				});

		} else {
			$precargador.css('display','none');
			if (! $nombre.hasClass('invalid')){
				$nombre.addClass('invalid');
			}
		}
	});
})( jQuery );