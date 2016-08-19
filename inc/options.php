<?php
/**
 * Source of this code is from Laurie's lecture slides
 */

function ek_add_submenu() {
		add_submenu_page( 'themes.php', 'Bespoke Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'ek_add_submenu' );


function ek_settings_init() {
	register_setting( 'theme_options', 'ek_options_settings' );

	add_settings_section( /* Adding description to the Options Page */
		'ek_options_page_section',
		'This is an Options Page where you can customize your website in one of the three ways:',
		'ek_options_page_section_callback',
		'theme_options'
	);

	function ek_options_page_section_callback() { /* Adding description to the Options Page */
		echo 'Click on the option you would like to change and then click save changes';
	}

/* Custom Options field to customize announcement field */
	add_settings_field(
		'ek_text_field',
		'Site Announcements',
		'ek_text_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	/* Custom Options field to choose the color for the site content and the footer */
	add_settings_field(
		'ek_color_field',
		'Color selection for content',
		'ek_color_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	/* Custom Options field to choose the font for the title */
	add_settings_field(
		'ek_font_field',
		'Font selection for Site Title',
		'ek_font_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	/* Options page customization
	First option: Announcement: */
  function ek_text_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<input type="text" name="ek_options_settings[ek_text_field]" value="<?php if (isset($options['ek_text_field'])) echo $options['ek_text_field']; ?>" />
	 <?php
 }

	/* Options page customization
	Second option: Background-color change: */
	function ek_color_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<!-- Assigning different colors to each color option, with the possibility to go back to the default color -->
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 1 ); ?> value="" /> <label>Default Color</label><br />
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 2 ); ?> value="#BEBEC9" /> <label>Pinkish Grey</label><br />
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 3 ); ?> value="#CCF5F5" /> <label>Mint</label><br />
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 4 ); ?> value="#FFE7CB" /> <label>Warm Beige</label>
		<?php
	}

	/* Options page customization
	Third option: Background-color change: */
	function ek_font_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<!-- Assigning different fonts to each font option, with the possibility to go back to the default font -->
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 1 ); ?> value="" /> <label>Default Font</label><br />
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 2 ); ?> value="'Cinzel Decorative', cursive;" /> <label>Cinzel</label><br />
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 3 ); ?> value="'Codystar', cursive;" /> <label>Codystar</label><br />
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 4 ); ?> value="'Petit Formal Script', cursive;" /> <label>Petit Formal</label>
		<?php
	}

	function my_theme_options_page(){
		?>
		<form action="options.php" method="post">
			<h2>Bespoke Options Page</h2> <!-- this is the options page name -->
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'ek_settings_init' );
