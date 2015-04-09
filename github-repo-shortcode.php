<?php
/*
 * Plugin Name: Github Repo Shortcode
 * Plugin URI: http://goldsounds.com/
 * Description: Embed a simple github widget for a repo
 * Author: Daniel Walmsley
 * Version: 0.1
 * Author URI:
 * Text Domain: github-repo-shortcode
 */

class GithubRepoShortcode	{

	function __construct(){
		add_action('init', array(&$this, 'init'));
	}

	function init() {
		global $current_user;
		wp_register_script('jquery.githubRepoWidget.js', plugins_url('js/jquery.githubRepoWidget.js', __FILE__));
		add_action( 'wp_enqueue_scripts', array(&$this, 'github_js') );
		add_shortcode( 'github', array($this, 'github_shortcode') );
	}
	
	function github_shortcode( $atts ) {
		$repo = $atts['repo'];
		return "<div class='github-widget' data-repo='{$repo}'></div>";
	}

	function github_js() {
		wp_enqueue_script('jquery.githubRepoWidget.js');
	}
}

new GithubRepoShortcode();