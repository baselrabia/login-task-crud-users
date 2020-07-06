<?php


if (!function_exists('aurl')) {
	function aurl($url = null) {
		return url('clientdeal/'.$url);
	}
}

if (!function_exists('admin')) {
	function admin() {
		return auth();
	}
}

if (!function_exists('active_menu')) {
	function active_menu($link) {

		if (preg_match('/'.$link.'/i', Request::segment(1))) {
			return ['menu-open', 'display:block'];
		} else {
			return ['', ''];
		}
	}
}
