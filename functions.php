/**
* Sepet sayfasında minimum sipariş tutarı belirleme
*/
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );
 
function wc_minimum_order_amount() {
// Sepet sayfasında ve ödeme sayfasında en az ne kadar sipariş verilebilir fiyatını ayarlayın. "200" olan kısmı istediğiniz fiyat ile değiştirebilirsiniz.
$minimum = 200;
 
if ( WC()->cart->total < $minimum ) {
 
if( is_cart() ) {
 
wc_print_notice(
sprintf( 'Mevcut sipariş toplamınız %s — en az %s sipariş verebilirsiniz. ' ,
wc_price( WC()->cart->total ),
wc_price( $minimum )
), 'error'
);
 
} else {
 
wc_add_notice(
sprintf( 'Mevcut sipariş toplamınız %s — minimum sipariş tutarı %s ' ,
wc_price( WC()->cart->total ),
wc_price( $minimum )
), 'error'
);
 
}
}
}
