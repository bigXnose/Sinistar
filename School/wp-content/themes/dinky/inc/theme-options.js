/**
 * Theme options script
 *
 * Package: Dinky
 * Since: Dinky 1.0
 * License: GNU General Public License v3 or later
 * Copyright (C) 2013  Misam Saki, misam.ir
 * Author: Misam Saki, http://misam.ir/
 * Theme URI: http://wordpress.org/themes/dinky/
 * Github: http://github.com/misamplus/dinky-theme/
*/

window.load = options_load();
function options_load() {
}
function sidebar_display_click() {
	fullmain_nosidebar_display();
}
function fullmain_nosidebar_display() {
	var checked_sidebar_display = document.getElementById("sidebar-display").checked;
	if (checked_sidebar_display) {
		document.getElementById("fullmain-nosidebar").style.display = "none";
		document.getElementById("fullmain-nosidebar-title").style.display = "none";
	} else {
		document.getElementById("fullmain-nosidebar").style.display = "block";
		document.getElementById("fullmain-nosidebar-title").style.display = "block";
	}
}