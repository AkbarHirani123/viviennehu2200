<<<<<<< HEAD
/**
 * plugin.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add('hr', function(editor) {
	editor.addCommand('InsertHorizontalRule', function() {
		editor.execCommand('mceInsertContent', false, '<hr />');
	});

	editor.addButton('hr', {
		icon: 'hr',
		tooltip: 'Horizontal line',
		cmd: 'InsertHorizontalRule'
	});

	editor.addMenuItem('hr', {
		icon: 'hr',
		text: 'Horizontal line',
		cmd: 'InsertHorizontalRule',
		context: 'insert'
	});
});
=======
/**
 * plugin.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add('hr', function(editor) {
	editor.addCommand('InsertHorizontalRule', function() {
		editor.execCommand('mceInsertContent', false, '<hr />');
	});

	editor.addButton('hr', {
		icon: 'hr',
		tooltip: 'Horizontal line',
		cmd: 'InsertHorizontalRule'
	});

	editor.addMenuItem('hr', {
		icon: 'hr',
		text: 'Horizontal line',
		cmd: 'InsertHorizontalRule',
		context: 'insert'
	});
});
>>>>>>> 640e5167c7ef51cf7838bf786b7e85e2d2c82871
