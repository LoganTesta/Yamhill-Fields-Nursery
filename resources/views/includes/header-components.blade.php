<div class="main-title-container">
    <div class="main-title-container__background"></div>
    <h1>
        <a class="main-title-container__title" href="/index">Yamhill Fields Nursery</a>
    </h1>
</div>
<div class="logo">
    <a class="logo__link" href="index.php">
        <img class="logo__image" src="/assets/images/logo.png" alt="Yamhill Fields Nursery Logo">
    </a>
</div>
<?php global $woocommerce; ?>
<a class="woocommerce-cart-total" href="<?php echo wc_get_cart_url(); ?>">Cart Total: <?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
