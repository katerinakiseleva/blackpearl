<?php

function ek_add_submenu() {
		add_submenu_page( 'themes.php', 'My Super Awesome Options Page', 'Theme Options', 'manage_options', 'theme_options', 'my_theme_options_page');
	}
add_action( 'admin_menu', 'ek_add_submenu' );


function ek_settings_init() {
	register_setting( 'theme_options', 'ek_options_settings' );

	add_settings_section(
		'ek_options_page_section',
		'Your section description',
		'ek_options_page_section_callback',
		'theme_options'
	);

	function ek_options_page_section_callback() {
		echo 'A description and detail about the section.';
	}

	add_settings_field(
		'ek_text_field',
		'Site Announcements',
		'ek_text_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	add_settings_field(
		'ek_color_field',
		'Color selection for content',
		'ek_color_field_render',
		'theme_options',
		'ek_options_page_section'
	);

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
	First option: Background-color change: */
	function ek_color_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 1 ); ?> value="#F3E7E8" /> <label>Default Color</label><br />
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 2 ); ?> value="#BEBEC9" /> <label>Pinkish Grey</label><br />
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 3 ); ?> value="#CCF5F5" /> <label>Mint</label><br />
		<input type="radio" name="ek_options_settings[ek_color_field]" <?php if (isset($options['ek_color_field'])) checked( $options['ek_color_field'], 4 ); ?> value="#FFE7CB" /> <label>Warm Beige</label>
		<?php
	}

	function ek_font_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 1 ); ?> value="" /> <label>Default Font</label><br />
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 2 ); ?> value="'Cinzel Decorative', cursive;" /> <label>Cinzel</label><br />
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 3 ); ?> value="'Codystar', cursive;" /> <label>Codystar</label><br />
		<input type="radio" name="ek_options_settings[ek_font_field]" <?php if (isset($options['ek_font_field'])) checked( $options['ek_font_field'], 4 ); ?> value="'Petit Formal Script', cursive;" /> <label>Petit Formal</label>
		<?php
	}

	function my_theme_options_page(){
		?>
		<form action="options.php" method="post">
			<h2>Bespoke Options Page</h2>
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
