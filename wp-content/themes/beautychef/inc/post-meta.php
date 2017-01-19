<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Option
Container::make('theme_options', 'Theme Options')
    ->add_fields(array(	
		Field::make('text', 'crb_google_map_api_key'),	
    ));
// Social Option
Container::make('theme_options', 'Social Links')
    ->add_fields(array(	
		Field::make('text', 'crb_facebook_link'),	
		Field::make('text', 'crb_instagram_link'),	
		Field::make('text', 'crb_pinterest_link'),	
		Field::make('text', 'crb_twitter_link'),	
    ));	
// Stockists Option
Container::make('post_meta', 'Additional Info')
    ->show_on_post_type('stockists')
    ->add_fields(array(
        Field::make('textarea', 'crb_company_address'),
        Field::make('text', 'crb_company_city'),
        Field::make("map", "crb_company_location", "Location")->help_text('drag and drop the pin on the map to select location')
    ));	