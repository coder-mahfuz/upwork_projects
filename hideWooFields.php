<?php

// this whole code is making those woocommerce_checkout_fields optional and than unsettling those

add_filter( 'woocommerce_checkout_fields', 'conditionally_remove_checkout_fields', 25, 1 );
function conditionally_remove_checkout_fields( $fields ) {

    // HERE the defined product Categories
    $categoriesH = array("Family","Individual");

    $found = false;

    // CHECK CART ITEMS: search for items from our defined product category
    foreach ( WC()->cart->get_cart() as $cart_item ){
        if( has_term( $categoriesH, 'product_cat', $cart_item['product_id'] ) ) {
            $found = true;
            break;
        }
    }
	
	$categories = array("Children July & Aug","Children July", "Children Aug", "Adult July & Aug", "Adult July", "Adult Daily", "Adult Aug", "Uncategorized");
	
	 // CHECK CART ITEMS: search for items from our defined product category
    foreach ( WC()->cart->get_cart() as $cart_item ){
        if( has_term( $categories, 'product_cat', $cart_item['product_id'] ) ) {
            $found = false;
            break;
        }
    }

    // If a special category is in the cart, remove some shipping fields
    if ( $found ) {

        // make optional the billing fields
        $fields['billing']['billing_member2_name']['required'] = false;
		    $fields['billing']['billing_member3_name']['required'] = false;
		    $fields['billing']['billing_member4_name']['required'] = false;
		    $fields['billing']['billing_member5_name']['required'] = false;
		    $fields['billing']['billing_member6_name']['required'] = false;
		    $fields['billing']['billing_children_name']['required'] = false;
		    $fields['billing']['billing_children_age']['required'] = false;
		    $fields['billing']['billing_children_level']['required'] = false;
		    $fields['billing']['billing_member2_camp']['required'] = false;
		    $fields['billing']['billing_member2_month']['required'] = false;
		    $fields['billing']['billing_children_indicate']['required'] = false;
		    $fields['billing']['billing_children_size']['required'] = false;
		
		// hide the billing fields
        unset($fields['billing']['billing_member2_name']);
        unset($fields['billing']['billing_member3_name']);
        unset($fields['billing']['billing_member4_name']);
        unset($fields['billing']['billing_member5_name']);
        unset($fields['billing']['billing_member6_name']);
        unset($fields['billing']['billing_children_name']);
        unset($fields['billing']['billing_children_age']);
        unset($fields['billing']['billing_children_level']);
        unset($fields['billing']['billing_member2_camp']);
        unset($fields['billing']['billing_member2_month']);
        unset($fields['billing']['billing_children_indicate']);
        unset($fields['billing']['billing_children_size']);
		
    }
    return $fields;
}
