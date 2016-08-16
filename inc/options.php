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
		'Enter your text',
		'ek_text_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	add_settings_field(
		'ek_checkbox_field',
		'Check your preference',
		'ek_checkbox_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	add_settings_field(
		'ek_radio_field',
		'Choose an option',
		'ek_radio_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	add_settings_field(
		'ek_textarea_field',
		'Enter content in the textarea',
		'ek_textarea_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	add_settings_field(
		'ek_select_field',
		'Choose from the dropdown',
		'ek_select_field_render',
		'theme_options',
		'ek_options_page_section'
	);

	function ek_text_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<input type="text" name="ek_options_settings[ek_text_field]" value="<?php if (isset($options['ek_text_field'])) echo $options['ek_text_field']; ?>" />
		<?php
	}

	function ek_checkbox_field_render() {
		$options = get_option( 'ek_options_settings' );
	?>
		<input type="checkbox" name="ek_options_settings[ek_checkbox_field]" <?php if (isset($options['ek_checkbox_field'])) checked( 'on', ($options['ek_checkbox_field']) ) ; ?> value="on" />
		<label>Turn it On</label>
		<?php
	}

	function ek_radio_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<input type="radio" name="ek_options_settings[ek_radio_field]" <?php if (isset($options['ek_radio_field'])) checked( $options['ek_radio_field'], 1 ); ?> value="1" /> <label>Option One</label><br />
		<input type="radio" name="ek_options_settings[ek_radio_field]" <?php if (isset($options['ek_radio_field'])) checked( $options['ek_radio_field'], 2 ); ?> value="2" /> <label>Option Two</label><br />
		<input type="radio" name="ek_options_settings[ek_radio_field]" <?php if (isset($options['ek_radio_field'])) checked( $options['ek_radio_field'], 3 ); ?> value="3" /> <label>Option Three</label>
		<?php
	}

	function ek_textarea_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<textarea cols="40" rows="5" name="ek_options_settings[ek_textarea_field]"><?php if (isset($options['ek_textarea_field'])) echo $options['ek_textarea_field']; ?></textarea>
		<?php
	}

	function ek_select_field_render() {
		$options = get_option( 'ek_options_settings' );
		?>
		<select name="ek_options_settings[ek_select_field]">
			<option value="1" <?php if (isset($options['ek_select_field'])) selected( $options['ek_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['ek_select_field'])) selected( $options['ek_select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}

	function my_theme_options_page(){
		?>
		<form action="options.php" method="post">
			<h2>My Awesome Options Page</h2>
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
