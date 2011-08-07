<?php

defined('SYSPATH') or die('No direct script access.');

return array(
    "password" => "admin",
    "author" => "burningface",
    "license" => "GPL",
    "copyright" => "(c) 2011 burningface",
    
    "error_class" => "form_error",
    "form_row_class" => "form_row",
    "row_class" => "row",
    "back_link_class" => "back_to_list",
    
    "date_format" => "Y-m-d",
    "csrf_token_name" => "csrf",
    
    "jquery_url" => "https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js",
    "jquery_name" => "jquery.min.js",
    
    
    "controllers" => array(
        "Controller",
        "Controller_Template",
        "Controller_Template_Twig",
    ),
    
    "disabled_tables" => array(
        "roles", "roles_users", "user_tokens"
    ),
    
    "item_not_found_exception" => array(
        "1" => "This record",
        "2" => "doesn't exists !",
    ),
    
    "multilang_support" => true,
    "table_names_plural" => true,
    "select_pre_option" => "-- select one --",
);
