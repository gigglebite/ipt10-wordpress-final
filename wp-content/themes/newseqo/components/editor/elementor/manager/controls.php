<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor controls manager.
 *
 * Elementor controls manager handler class is responsible for registering and
 * initializing all the supported controls, both regular controls and the group
 * controls.
 *
 * @since 1.0.0
 */
abstract class Custom_Controls_Manager extends Controls_Manager {
    const IMAGECHOOSE = 'imagechooses';
    const AJAXSELECT2 = 'ajaxselect2';
} 