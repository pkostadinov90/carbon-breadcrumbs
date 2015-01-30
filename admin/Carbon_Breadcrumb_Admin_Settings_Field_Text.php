<?php
/**
 * Manages and renders a text settings field.
 *
 * @uses Carbon_Breadcrumb_Admin_Settings_Field
 */
class Carbon_Breadcrumb_Admin_Settings_Field_Text extends Carbon_Breadcrumb_Admin_Settings_Field {

	/**
	 * Render this field.
	 *
	 * @access public
	 */
	public function render() {
		$value = get_option($this->get_id());
		?>
		<input name="<?php echo $this->get_id(); ?>" id="<?php echo $this->get_id(); ?>" type="text" value="<?php echo esc_attr($value); ?>" class="regular-text" />
		<?php
	}

}