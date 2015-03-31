<?php namespace Affinity4API;

/**
* Shortcodes for The Boat Inn
*/
class Shortcode
{

	function __construct()
	{
		add_shortcode( 'dropcap', [$this, 'dropcap']);
	}

	public function dropcap($atts, $content = null) {
		return '<p class="bi_dropcap">' . do_shortcode($content) . '</p>';
	}
}

new Shortcode;
