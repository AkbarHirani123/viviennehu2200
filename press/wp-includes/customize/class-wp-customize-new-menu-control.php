<<<<<<< HEAD
<?php
/**
 * Customize API: WP_Customize_New_Menu_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize control class for new menus.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_New_Menu_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @since 4.3.0
	 * @access public
	 * @var string
	 */
	public $type = 'new_menu';

	/**
	 * Render the control's content.
	 *
	 * @since 4.3.0
	 * @access public
	 */
	public function render_content() {
		?>
		<button type="button" class="button button-primary" id="create-new-menu-submit"><?php _e( 'Create Menu' ); ?></button>
		<span class="spinner"></span>
		<?php
	}
}
=======
<?php
/**
 * Customize API: WP_Customize_New_Menu_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customize control class for new menus.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Control
 */
class WP_Customize_New_Menu_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @since 4.3.0
	 * @access public
	 * @var string
	 */
	public $type = 'new_menu';

	/**
	 * Render the control's content.
	 *
	 * @since 4.3.0
	 * @access public
	 */
	public function render_content() {
		?>
		<button type="button" class="button button-primary" id="create-new-menu-submit"><?php _e( 'Create Menu' ); ?></button>
		<span class="spinner"></span>
		<?php
	}
}
>>>>>>> 640e5167c7ef51cf7838bf786b7e85e2d2c82871
