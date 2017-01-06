<<<<<<< HEAD
( function($) {
	$.widget('wp.wpdialog', $.ui.dialog, {
		open: function() {
			// Add beforeOpen event.
			if ( this.isOpen() || false === this._trigger('beforeOpen') ) {
				return;
			}

			// Open the dialog.
			this._super();
			// WebKit leaves focus in the TinyMCE editor unless we shift focus.
			this.element.focus();
			this._trigger('refresh');
		}
	});

	$.wp.wpdialog.prototype.options.closeOnEscape = false;

})(jQuery);
=======
( function($) {
	$.widget('wp.wpdialog', $.ui.dialog, {
		open: function() {
			// Add beforeOpen event.
			if ( this.isOpen() || false === this._trigger('beforeOpen') ) {
				return;
			}

			// Open the dialog.
			this._super();
			// WebKit leaves focus in the TinyMCE editor unless we shift focus.
			this.element.focus();
			this._trigger('refresh');
		}
	});

	$.wp.wpdialog.prototype.options.closeOnEscape = false;

})(jQuery);
>>>>>>> 640e5167c7ef51cf7838bf786b7e85e2d2c82871
