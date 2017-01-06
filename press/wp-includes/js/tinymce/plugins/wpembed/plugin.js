<<<<<<< HEAD
(function ( tinymce ) {
	'use strict';

	tinymce.PluginManager.add( 'wpembed', function ( editor, url ) {
		editor.on( 'init', function () {
			var scriptId = editor.dom.uniqueId();

			var scriptElm = editor.dom.create( 'script', {
				id: scriptId,
				type: 'text/javascript',
				src: url + '/../../../wp-embed.js'
			} );

			editor.getDoc().getElementsByTagName( 'head' )[ 0 ].appendChild( scriptElm );
		} );
	} );
})( window.tinymce );
=======
(function ( tinymce ) {
	'use strict';

	tinymce.PluginManager.add( 'wpembed', function ( editor, url ) {
		editor.on( 'init', function () {
			var scriptId = editor.dom.uniqueId();

			var scriptElm = editor.dom.create( 'script', {
				id: scriptId,
				type: 'text/javascript',
				src: url + '/../../../wp-embed.js'
			} );

			editor.getDoc().getElementsByTagName( 'head' )[ 0 ].appendChild( scriptElm );
		} );
	} );
})( window.tinymce );
>>>>>>> 640e5167c7ef51cf7838bf786b7e85e2d2c82871
