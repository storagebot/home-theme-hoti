<?php
/**
 * Define the Tabs appearing on the Theme Options page
 * Tabs contains sections
 * Options are assigned to both Tabs and Sections
 * See README.md for a full list of option types
 */

$general_settings_tab = array(
    "name" => "general_tab",
    "title" => __( "General", "gpp" ),
    "sections" => array(
        "general_section_1" => array(
            "name" => "general_section_1",
            "title" => __( "General", "gpp" ),
            "description" => __( "", "gpp" )
        )
    )
);

gpp_register_theme_option_tab( $general_settings_tab );

$colors_tab = array(
    "name" => "colors_tab",
    "title" => __( "Colors", "gpp" ),
    "sections" => array(
        "colors_section_1" => array(
            "name" => "colors_section_1",
            "title" => __( "Colors", "gpp" ),
            "description" => __( "", "gpp" )
        )
    )
);

gpp_register_theme_option_tab( $colors_tab );

$portfolio_tab = array(
    "name" => "portfolio_tab",
    "title" => __( "Portfolio", "gpp" ),
    "sections" => array(
        "portfolio_section_1" => array(
            "name" => "portfolio_section_1",
            "title" => __( "Portfolio", "gpp" ),
            "description" => __( "", "gpp" )
        )
    )
);

gpp_register_theme_option_tab( $portfolio_tab );

 /**
 * The following example shows you how to register theme options and assign them to tabs and sections:
*/
$options = array(
    'logo' => array(
        "tab" => "general_tab",
        "name" => "logo",
        "title" => __( "Logo", "gpp" ),
        "description" => __( "Use a transparent png or jpg image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),
    'favicon' => array(
        "tab" => "general_tab",
        "name" => "favicon",
        "title" => __( "Favicon", "gpp" ),
        "description" => __( "Use a transparent png or ico image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),
    'font' => array(
        "tab" => "general_tab",
        "name" => "font",
        "title" => __( "Headline Font", "gpp" ),
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=header&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Allan:400,700",
        "valid_options" => gpp_font_array()
    ),
    'font_alt' => array(
        "tab" => "general_tab",
        "name" => "font_alt",
        "title" => __( "Body Font", "gpp" ),
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=body&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Allan:400,700",
        "valid_options" => gpp_font_array()
    ),
    'message' => array(
        "tab" => "general_tab",
        "name" => "message",
        "title" => __( "Message", "gpp" ),
        "description" => __( "Add a welcome message below your site title.", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),
    'button_link' => array(
        "tab" => "general_tab",
        "name" => "button_link",
        "title" => __( "Button Link", "gpp" ),
        "description" => __( "The url where your button links to.", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "text",
        "sanitize" => "nohtml",
        "default" => site_url()
    ),
    'button_text' => array(
        "tab" => "general_tab",
        "name" => "button_text",
        "title" => __( "Button Text", "gpp" ),
        "description" => __( "The text appearing on your button.", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "text",
        "sanitize" => "nohtml",
        "default" => ""
    ),
    "about" => array(
        "tab" => "general_tab",
        "name" => "about",
        "title" => __( "filosofia", "gpp" ),
        "description" => __( "Add some information about yourself.", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),
    'contact' => array(
        "tab" => "general_tab",
        "name" => "contact",
        "title" => __( "Contact", "gpp" ),
        "description" => __( "Your contact information", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),
    'color' => array(
        "tab" => "colors_tab",
        "name" => "color",
        "title" => __( "Color", "gpp" ),
        "description" => __( "Select a color palette", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "select",
        "default" => "",
        "valid_options" => array(
            "light" => array(
                "name" => "light",
                "title" => __( "Light", "gpp" )
            ),
            "dark" => array(
                "name" => "dark",
                "title" => __( "Dark", "gpp" )
            )
        )
    ),
    "css" => array(
        "tab" => "colors_tab",
        "name" => "css",
        "title" => __( "Custom CSS", "gpp" ),
        "description" => __( "Add some custom CSS to your theme.", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),
    "portfolio" => array(
        "tab" => "portfolio_tab",
        "name" => "portfolio",
        "title" => __( "Portfolio Images", "gpp" ),
        "description" => __( "Select or create a gallery of images to use in the homepage portfolio.", "gpp" ),
        "section" => "portfolio_section_1",
        "since" => "1.0",
        "id" => "portfolio_section_1",
        "type" => "gallery",
        "default" => ""
    )
);

gpp_register_theme_options( $options );

?>