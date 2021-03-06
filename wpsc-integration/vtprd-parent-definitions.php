<?php
/*

*/


class VTPRD_Parent_Definitions {
	
	public function __construct(){
    
    define('VTPRD_PARENT_PLUGIN_NAME',                      'WP E-Commerce');
    define('VTPRD_PARENT_PLUGIN_TEXTNAME',                  'wp-e-commerce');
    define('VTPRD_PARENT_PLUGIN_ABBREV',                    'wpsc');
    define('VTPRD_EARLIEST_ALLOWED_PARENT_VERSION',         '3.8');
    define('VTPRD_TESTED_UP_TO_PARENT_VERSION',             '3.8.12.1');
    define('VTPRD_DOCUMENTATION_PATH_PRO_BY_PARENT',        'http://www.varktech.com/wp-e-commerce/pricing-deals-pro-for-wp-e-commerce/?active_tab=tutorial');                                                                                                     //***
    define('VTPRD_DOCUMENTATION_PATH_FREE_BY_PARENT',       'http://www.varktech.com/wp-e-commerce/pricing-deals-for-wp-e-commerce/?active_tab=tutorial');      
    define('VTPRD_INSTALLATION_INSTRUCTIONS_BY_PARENT',     'http://www.varktech.com/wp-e-commerce/pricing-deals-for-wp-e-commerce/?active_tab=instructions');
    define('VTPRD_PRO_INSTALLATION_INSTRUCTIONS_BY_PARENT', 'http://www.varktech.com/wp-e-commerce/pricing-deals-pro-for-wp-e-commerce/?active_tab=instructions');
    define('VTPRD_PURCHASE_PRO_VERSION_BY_PARENT',          'http://www.varktech.com/wp-e-commerce/pricing-deals-pro-for-wp-e-commerce/');
    define('VTPRD_DOWNLOAD_FREE_VERSION_BY_PARENT',         'http://wordpress.org/extend/plugins/pricing-deals-for-wp-e-commerce/');
    
    //html selector locations in checkout where error message will display before.
    define('VTPRD_CHECKOUT_PRODUCTS_SELECTOR_BY_PARENT',    '.checkout_cart');
    define('VTPRD_CHECKOUT_ADDRESS_SELECTOR_BY_PARENT',     '.wpsc_checkout_forms');
    define('VTPRD_CHECKOUT_BUTTON_ERROR_MSG_DEFAULT',        
         __('Your email, bill-to or ship-to address are attached to other discounted order(s). This has affected the current order Lifetime discount limit, and resulted in the total Discount being reduced. Please hit the "Purchase" button a second time to complete the transaction.', 'vtprd')
    );
    
    global $vtprd_info, $vtprd_rule_type_framework, $wpdb;      

  
    define('VTPRD_PURCHASE_LOG',                          $wpdb->prefix.'vtprd_purchase_log');      
    define('VTPRD_PURCHASE_LOG_PRODUCT',                  $wpdb->prefix.'vtprd_purchase_log_product');   
    define('VTPRD_PURCHASE_LOG_PRODUCT_RULE',             $wpdb->prefix.'vtprd_purchase_log_product_rule'); 
    

    //option set during update rule process
    if (get_option('vtprd_ruleset_has_a_display_rule') == true) {
      $ruleset_has_a_display_rule = get_option('vtprd_ruleset_has_a_display_rule');
    } else {
      $ruleset_has_a_display_rule = 'no';
    }
    
    $vtprd_info = array(                                                                    
      	'parent_plugin' => 'wpsc',
      	'parent_plugin_taxonomy' => 'wpsc_product_category',
        'parent_plugin_taxonomy_name' => 'Product Category',
        'parent_plugin_cpt' => 'wpsc-product',
        'applies_to_post_types' => 'wpsc-product', //rule cat only needs to be registered to product, not rule as well...
        'rulecat_taxonomy' => 'vtprd_rule_category',
        'rulecat_taxonomy_name' => 'Pricing Deals Rules',
        
        //element set at filter entry time, to differentiate cart processing from price request/template tag processing
        'current_processing_request' => 'cart',  //'cart'(def) / 'display'

        'product_session_info' => '',
        /*
          array (
            //******************
            //normal stuff
            //******************
            'product_list_price'           => $vtprd_cart->cart_items[0]->db_unit_price_list,
            'product_unit_price'           => $vtprd_cart->cart_items[0]->db_unit_price,
            'product_special_price'        => $vtprd_cart->cart_items[0]->db_unit_price_special,
            'product_discount_price'       => $vtprd_cart->cart_items[0]->discount_price,
            'product_is_on_special'        => $vtprd_cart->cart_items[0]->product_is_on_special,
            'product_yousave_total_amt'    => $vtprd_cart->cart_items[0]->yousave_total_amt,     
            'product_yousave_total_pct'    => $vtprd_cart->cart_items[0]->yousave_total_pct,     
            'product_rule_short_msg_array' => $short_msg_array,   //STILL RETURNS ALL MESSAGES, EVEN IF VARS   
            'product_rule_full_msg_array'  => $full_msg_array,    //STILL RETURNS ALL MESSAGES, EVEN IF VARS           
            'product_has_variations'       => $product_variations_sw,
            'session_timestamp_in_seconds' => time(),
            'product_in_rule_allowing_display'  => $vtprd_cart->cart_items[0]->product_in_rule_allowing_display, //if not= 'yes', only msgs are returned 
            'show_yousave_one_some_msg'    => $show_yousave_one_some_msg,  
            //******************
            //Display Rule variation stuff, at Display time, , used to compute AJAX price changes on variations
            //******************
            'this_is_a_parent_product_with_variations' => 'yes', //yes/no
            'pricing_by_rule_array'  =>  array (
              'pricing_rule_id' => '', 
              'pricing_rule_applies_to_variations_array' => '', //'all' or var list array
              'pricing_rule_percent_discount' => '',
              'pricing_rule_currency_discount' => ''
            )
             
          )
         */
         'ruleset_has_a_display_rule' => $ruleset_has_a_display_rule,
        
        //elements used in vtprd-apply-rules.php at the ruleset processing level
        //'at_least_one_rule_condition_satisfied' => 'no',
        'inPop_conditions_met' => 'no',
        'actionPop_conditions_met' => 'no',
        'maybe_auto_add_free_product_count' => 0,
        
        //computed discount total used in display
 //       'cart_discount_total'  => 0.00,
        'cart_rows_at_checkout_count' => 0,
        'after_checkout_cart_row_execution_count' => 0,
        'product_meta_key_includeOrExclude' => '_vtprd_includeOrExclude',
        /*
          array (
            'includeOrExclude_option'    => '',
            'includeOrExclude_checked_list'    => array( ) //this is the checked list...
          )
         */
		    'inpop_variation_checkbox_total' => 0,
        'on_checkout_page' => '', //are we on the checkout page?
        'coupon_num' => '',
        'checkout_validation_in_process' => 'no', //are we in checkout_form_validation?
        'ajax_test_value' => '', 
        
        //elements used at the ruleset/product level 
        'purch_hist_product_row_id'  => '',              
        'purch_hist_product_price_total'  => '',      
        'purch_hist_product_qty_total'  => '',          
        'get_purchaser_info' => '',          
        'purch_hist_done' => '', 
        'purchaser_ip_address' => $wpdb->escape($_SERVER['REMOTE_ADDR'])
      ); //end vtprd_info
      
    if ($vtprd_info['purchaser_ip_address'] <= ' ' ) {
      $vtprd_info['purchaser_ip_address'] = $this->vtprd_get_ip_address(); 
    }  
                                                                                            
	}

  //from http://stackoverflow.com/questions/15699101/get-client-ip-address-using-php
  public  function  vtprd_get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
  }
	 
} //end class
$vtprd_parent_definitions = new VTPRD_Parent_Definitions;