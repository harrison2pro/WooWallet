function money_to_wallet(){
    
    //get user_id for Charge in WooWallet
    $user = $order->user_id;
    
    //get Coupon that use in Order to compair with our target coupon
    $coupon = $order->get_used_coupons();
    
    //get status for be sure that customer pay order
    $order_data = $order->get_data();
    $order_status = $order_data['status'];
    $cheack_status = "processing";
    
    // charge amount
    $af_dis = 129999;
    
    // charge Description
    $des_dis = "charge for u";

    if($coupon == "mycoupon")
    {
        if($order_status == $cheack_status)
        {
        
            //woowallet Current function for charge
            woo_wallet()->wallet->credit( $user, $af_dis,$des_dis);
        }
    }
     


}

//add this code to thank you page by add_adction function
add_action('woocommerce_thankyou', 'money_to_wallet');
