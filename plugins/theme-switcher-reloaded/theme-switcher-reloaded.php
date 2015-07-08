<?php
/* Plugin Name: Theme Switcher Reloaded
* Plugin URI: http://themebot.com
* Description: Efficient, feature-rich theme switcher plugin with widget. Sponsored by Themebot for use in the <a href="http://themebot.com/wordpress-themes">WordPress Themes</a> section.
* Version: 1.1
* Author: Themebot
* Author URI: http://themebot.com
* Adapted from Ryan Boren's theme switcher and Jared Bangs Theme Switcher Widget.
* http://wordpress.org/extend/plugins/theme-switcher/#post-536
* http://freepressblog.org/wordpress-plugins-2/wordpress-theme-switcher-widget/
* ... which was adapted from Alex King's style switcher.
* http://www.alexking.org/software/wordpress/
* modified by kingler from 72pines http://code.72pines.org on Feb 13, 2008
* updated by Themebot for Wordpress 3 and 4 on Oct 20, 2014
*/
function widget_themeswitcher_init() {
	// Check for the required plugin functions. This will prevent fatal errors occurring when you deactivate the dynamic sidebar plugin.
	if (!function_exists('wp_register_sidebar_widget')) {
		return;
	}
	load_plugin_textdomain('ts_theme_switcher', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	function ts_set_theme_cookie() {
		$expire = time() + 3600*1000; // cookie set to expire in 1 hour
		if (!empty($_GET["wptheme"])) {
			setcookie("wptheme" . COOKIEHASH,stripslashes($_GET["wptheme"]),$expire,COOKIEPATH);
			$redirect = get_settings('home').'/';
		}
	}
	function ts_get_theme() {
		if (!empty($_GET["wptheme"]))
		return 	$_GET["wptheme"];
		elseif (!empty($_COOKIE["wptheme" . COOKIEHASH])) {
			return $_COOKIE["wptheme" . COOKIEHASH];
		}
		else {
			return '';
		}
	}
	function ts_get_template($template) {
		$theme = ts_get_theme();
		if (empty($theme)) {
			return $template;
		}
		$theme = ts_get_one_theme($theme);
		if (empty($theme)) {
			return $template;
		}
		// Don't let people peek at unpublished themes.
		if (isset($theme['Status']) && $theme['Status'] != 'publish')
		return $template;
		return $theme['Template'];
	}
	function ts_get_stylesheet($stylesheet) {
		$theme = ts_get_theme();
		if (empty($theme)) {
			return $stylesheet;
		}
		$theme = ts_get_one_theme($theme);
		// Don't let people peek at unpublished themes.
		if (isset($theme['Status']) && $theme['Status'] != 'publish')
		return $stylesheet;
		if (empty($theme)) {
			return $stylesheet;
		}
		return $theme['Stylesheet'];
	}
	function wp_theme_switcher($style = "dropdown") {
		$themes = ts_get_all_themes();
		$selected_theme = ts_get_theme();
		$default_theme = ts_get_current_theme();
		if (count($themes) > 1) {
			$theme_names = array_keys($themes);natcasesort($theme_names);
			$ts = '<ul id="themeswitcher">'."\n";
			if ($style == 'dropdown') {
				$ts .= '<li>'."\n".'       <select style="width:140px" name="themeswitcher" onchange="location.href=\''.get_settings('home').'/index.php?wptheme=\' + this.options[this.selectedIndex].value;">'."\n"        ;
				foreach ($theme_names as $theme_name) {
					// Skip unpublished themes.
					if (isset($themes[$theme_name]['Status']) && $themes[$theme_name]['Status'] != 'publish')
					continue;
					if ((!empty($selected_theme) && $selected_theme == $theme_name) || (empty($selected_theme) && ($theme_name == $default_theme))) {
						$ts .= '<option value="'.$theme_name.'" selected="selected">'. htmlspecialchars($theme_name).'</option>'."\n";
					}
					else {
						$ts .= '<option value="'.$theme_name.'">'.htmlspecialchars($theme_name).'</option>'."\n";
					}
				}
				$ts .= '</select>'."\n". '</li>'."\n";
			}
			else {
				foreach ($theme_names as $theme_name) {
					// Skip unpublished themes.
					if (isset($themes[$theme_name]['Status']) && $themes[$theme_name]['Status'] != 'publish')
					continue;
					$display = htmlspecialchars($theme_name);
					if ((!empty($selected_theme) && $selected_theme == $theme_name) || (empty($selected_theme) && ($theme_name == $default_theme))) {
						$ts .= '<li>'.$display.'</li>'."\n";
					}
					else {
						$ts .= '       <li><a href="'.get_settings('home').'/'. 'index.php'.'?wptheme='.urlencode($theme_name).'">'.$display.'</a></li>'."\n";
					}
				}
			}
			$ts .= '</ul>';
		}
		echo $ts;
	}
	ts_set_theme_cookie();
	add_filter('template', 'ts_get_template');
	add_filter('stylesheet', 'ts_get_stylesheet');
	// This is the function that outputs our little Google search form.
	function widget_themeswitcher($args) {
		// $args is an array of strings that help widgets to conform to the active theme: before_widget, before_title, after_widget, and after_title are the array keys. Default tags: li and h2.
		extract($args);
		// Each widget can store its own options. We keep strings here.
		$options = get_option('widget_themeswitcher');
		$displayStyle = $options['displayStyle'];
		$title = $options['Title'];
		// These lines generate our output. Widgets can be very complex but as you can see here, they can also be very, very simple.
		echo $before_widget . $before_title . $title . $after_title;
		if($displayStyle=='dropdown') {
			wp_theme_switcher('dropdown');
		}
		else {
			wp_theme_switcher('list');
		}
		echo $after_widget;
	}
	function widget_themeswitcher_control() {
		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_themeswitcher');
		if (!is_array($options)) {
			$options = array('Title'=>__('Theme Switcher', 'ts_theme_switcher'), 'displayStyle'=>'dropdown', 'displayName'=>'full');
			update_option('widget_themeswitcher', $options);
		}
		if ($_POST['themeswitcher-submit']) {
			// Remember to sanitize and format use input appropriately.
			$options['displayStyle'] = strip_tags(stripslashes($_POST['themeswitcher-display']));
			$options['displayName'] = strip_tags(stripslashes($_POST['themeswitcher-name']));
			$options['Title'] = $_POST['themeswitcher-title'];
			update_option('widget_themeswitcher', $options);
		}
		// Be sure you format your options to be valid HTML attributes.
		$displayStyle = htmlspecialchars($options['displayStyle'], ENT_QUOTES);
		$displayName = htmlspecialchars($options['displayName'], ENT_QUOTES);
		// Here is our little form segment. Notice that we don't need a complete form. This will be embedded into the existing form.
		echo '<h4>'.__('Display style:', 'ts_theme_switcher').'</h4>';
		echo '<p><label for="themeswitcher-title">'.__('Title', 'ts_theme_switcher').': </label>';
		echo '<input id="themeswitcher-title" name="themeswitcher-title" type="text" value="'.$options['Title'].'" /></p>';
		echo '<p><input id="themeswitcher-display0" name="themeswitcher-display" type="radio" value="list"';
		if($displayStyle=='list') {
			echo ' checked="checked"';
		}
		echo ' /><label for="themeswitcher-display0">'.__('List', 'ts_theme_switcher').'</label></p>';
		echo '<p><input id="themeswitcher-display1" name="themeswitcher-display" type="radio" value="dropdown"';
		if($displayStyle=='dropdown') {
			echo ' checked="checked"';
		}
		echo ' /><label for="themeswitcher-display1">'.__('Drop-Down', 'ts_theme_switcher').'</label></p>';
		echo '<p><label for="themeswitcher-name0">'.__('Display theme names in ', 'ts_theme_switcher').': </label>';
		echo '<p><input id="themeswitcher-name0" name="themeswitcher-name" type="radio" value="full"';
		if($displayName=='full') {
			echo ' checked="checked"';
		}
		echo ' /><label for="themeswitcher-name1">'.__('full name (default option)', 'ts_theme_switcher').'</label></p>';
		echo '<p><input id="themeswitcher-name1" name="themeswitcher-name" type="radio" value="short"';
		if($displayName=='short') {
			echo ' checked="checked"';
		}
		echo ' /><label for="themeswitcher-display1">'.__('short name (faster loading)', 'ts_theme_switcher').'</label></p>';
		echo '<input type="hidden" id="themeswitcher-submit" name="themeswitcher-submit" value="1" />';
	}
	// This registers our widget so it appears with the other available widgets and can be dragged and dropped into any active sidebars.
	wp_register_sidebar_widget('ts_theme_switcher', 'Theme Switcher', 'widget_themeswitcher',array('description' => 'Theme Switcher Widget'));
	// This registers our optional widget control form. Because of this our widget will have a button that reveals a 300x150 pixel form.
	wp_register_widget_control('ts_theme_switcher','Theme Switcher', 'widget_themeswitcher_control',array('options' => 'widget_themeswitcher_control', 300, 250));
}
// Run our code later in case this loads prior to any required plugins.
add_action('plugins_loaded', 'widget_themeswitcher_init');
// helper function to look only at folder names, not loading the style.css files for performance.
function ts_get_all_themes() {
	global $ts_themes, $ts_broken_themes;
	if (isset($ts_themes))
	return $ts_themes;
	// check the option for displaying full names or short names
	$options = get_option('widget_themeswitcher');
	$displayName = htmlspecialchars($options['displayName'], ENT_QUOTES);
	if($displayName=='full')
	return get_themes();
	$themes = array();
	$ts_broken_themes = array();
	$theme_loc = $theme_root = get_theme_root();
	if ('/' != ABSPATH) // don't want to replace all forward slashes, see Trac #4541
	$theme_loc = str_replace(ABSPATH, '', $theme_root);
	// Files in wp-content/themes directory and one subdir down
	$themes_dir = @ opendir($theme_root);
	if (!$themes_dir)
	return false;
	while (($theme_dir = readdir($themes_dir)) !== false) {
		if (is_dir($theme_root . '/' . $theme_dir) && is_readable($theme_root . '/' . $theme_dir)) {
			if ($theme_dir{0} == '.' || $theme_dir == '..' || $theme_dir == 'CVS')
			continue;
			$stylish_dir = @ opendir($theme_root . '/' . $theme_dir);
			$found_stylesheet = false;
			while (($theme_file = readdir($stylish_dir)) !== false) {
				if ($theme_file == 'style.css') {
					$theme_files[] = $theme_dir . '/' . $theme_file;
					$found_stylesheet = true;
					break;
				}
			}
			@closedir($stylish_dir);
			if (!$found_stylesheet) { // look for themes in that dir
				$subdir = "$theme_root/$theme_dir";
				$subdir_name = $theme_dir;
				$theme_subdir = @ opendir($subdir);
				while (($theme_dir = readdir($theme_subdir)) !== false) {
					if (is_dir($subdir . '/' . $theme_dir) && is_readable($subdir . '/' . $theme_dir)) {
						if ($theme_dir{0} == '.' || $theme_dir == '..' || $theme_dir == 'CVS')
						continue;
						$stylish_dir = @ opendir($subdir . '/' . $theme_dir);
						$found_stylesheet = false;
						while (($theme_file = readdir($stylish_dir)) !== false) {
							if ($theme_file == 'style.css') {
								$theme_files[] = $subdir_name . '/' . $theme_dir . '/' . $theme_file;
								$found_stylesheet = true;
								break;
							}
						}
						@closedir($stylish_dir);
					}
				}
				@closedir($theme_subdir);
				$ts_broken_themes[$theme_dir] = array('Name' => $theme_dir, 'Title' => $theme_dir, 'Description' => __('Stylesheet is missing.'));
			}
		}
	}
	@closedir($theme_dir);
	if (!$themes_dir || !$theme_files)
	return $themes;
	sort($theme_files);
	foreach ((array) $theme_files as $theme_file) {
		if (!is_readable("$theme_root/$theme_file")) {
			$ts_broken_themes[$theme_file] = array('Name' => $theme_file, 'Title' => $theme_file, 'Description' => __('File not readable.'));
			continue;
		}
		$name        = dirname($theme_file);
		$title       = dirname($theme_file);
		$template    = trim(dirname($theme_file));
		$stylesheet  = dirname($theme_file);
		if (!file_exists("$theme_root/$template/index.php")) {
			$parent_dir = dirname(dirname($theme_file));
			if (file_exists("$theme_root/$parent_dir/$template/index.php")) {
				$template = "$parent_dir/$template";
			} else {
				$ts_broken_themes[$name] = array('Name' => $name, 'Title' => $title, 'Description' => __('Template is missing.'));
				continue;
			}
		}
		// Check for theme name collision.  This occurs if a theme is copied to a new theme directory and the theme header is not updated.  Whichever theme is first keeps the name.  Subsequent themes get a suffix applied. The Default and Classic themes always trump their pretenders.
		if (isset($themes[$name])) {
			if (('default' == $name || 'classic' == $name) &&
			('default' == $stylesheet || 'classic' == $stylesheet)) {
				// If another theme has claimed to be one of our default themes, move them aside.
				$suffix = $themes[$name]['Stylesheet'];
				$new_name = "$name/$suffix";
				$themes[$new_name] = $themes[$name];
				$themes[$new_name]['Name'] = $new_name;
			} else {
				$name = "$name/$stylesheet";
			}
		}
		$themes[$name] = array('Name' => $name, 'Title' => $title, 'Template' => $template, 'Stylesheet' => $stylesheet, 'Status' => 'publish');
	}
	// Resolve theme dependencies.
	$theme_names = array_keys($themes);
	foreach ((array) $theme_names as $theme_name) {
		$themes[$theme_name]['Parent Theme'] = '';
		if ($themes[$theme_name]['Stylesheet'] != $themes[$theme_name]['Template']) {
			foreach ((array) $theme_names as $parent_theme_name) {
				if (($themes[$parent_theme_name]['Stylesheet'] == $themes[$parent_theme_name]['Template']) && ($themes[$parent_theme_name]['Template'] == $themes[$theme_name]['Template'])) {
					$themes[$theme_name]['Parent Theme'] = $themes[$parent_theme_name]['Name'];
					break;
				}
			}
		}
	}
	$ts_themes = $themes;
	return $themes;
}
// helper function to get the current theme/template from the database
function ts_get_current_theme() {
	$themes = ts_get_all_themes();
	$theme_names = array_keys($themes);
	$current_template = get_option('template');
	$current_stylesheet = get_option('stylesheet');
	// check the option for displaying full names or short names
	$options = get_option('widget_themeswitcher');
	$displayName = htmlspecialchars($options['displayName'], ENT_QUOTES);
	if($displayName=='full')
	$current_theme = 'WordPress Default';
	else
	$current_theme = 'default';
	if ($themes) {
		foreach ((array) $theme_names as $theme_name) {
			if ($themes[$theme_name]['Stylesheet'] == $current_stylesheet &&
			$themes[$theme_name]['Template'] == $current_template) {
				$current_theme = $themes[$theme_name]['Name'];
				break;
			}
		}
	}
	return $current_theme;
}
// helper function to replace get_theme()
function ts_get_one_theme($theme) {
	$themes = ts_get_all_themes();
	if (array_key_exists($theme, $themes))
	return $themes[$theme];
	return NULL;
}
?>
