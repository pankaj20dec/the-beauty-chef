<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Option
Container::make('theme_options', 'Theme Options')
    ->add_fields(array(	
		Field::make('text', 'crb_google_map_api_key'),	
    ));
	
// Stockists Option
Container::make('post_meta', 'Additional Info')
    ->show_on_post_type('stockists')
    ->add_fields(array(
        Field::make('text', 'crb_company_name'),
        Field::make('textarea', 'crb_company_address'),
        Field::make('text', 'crb_company_city'),
        Field::make('text', 'crb_company_zipcode'),
        Field::make('text', 'crb_company_phone'),
        Field::make('text', 'crb_company_website'),
        Field::make("map", "crb_company_location", "Location")->help_text('drag and drop the pin on the map to select location')
    ));	