<style>

    /* ----------------------------------topbar_color---------------------------------- */
    .nav-top,
    .many-content .loading span:before{
        background: {{ theme_color('topbar_color')}} !important;
    }

    /* ----------------------------------primary_color---------------------------------- */
    .header .header__top,
    .many-content,
    .ps-panel--sidebar .ps-panel__header
    {
        background-color: {{ theme_color('primary_color') }} !important;
    }
    
    .ps-breadcrumb .breadcrumb a,
    .cart-items-footer h3 strong
    {
        color: {{ theme_color('primary_color')}} !important;
    }

    /* ----------------------------------footer_color ----------------------------------*/
    .ps-footer--3{
        background-color: {{ theme_color('footer_color')}} !important;
    }

    /* ----------------------------------topbar_text_color---------------------------------- */
    .navigation__extra>li a{
        color: {{ theme_color('topbar_text_color')}} !important;
    }

    /* ----------------------------------footer_text_color---------------------------------- */
    .s-footer,
    .footer-list,
    .info-list__item,
    .footer-text,
    .ps-footer__copyright p{
        color: {{ theme_color('footer_text_color')}} !important;
    }

    /* ----------------------------------secondary_color---------------------------------- */
    .ps-form--quick-search button,
    .header .header__extra span,
    .ps-btn, button.ps-btn,
    .menu--dropdown > li:hover,
    .menu--dropdown > li > a:hover,
    .ps-product .ps-product__badge,
    .many-content .loading span{
        background-color: {{ theme_color('secondary_color')}} !important;
    }

    .ps-product--detail .ps-product__variants .item.slick-current {
        border-color: {{ theme_color('secondary_color')}} !important;
    }
    
    .menu--product-categories .menu__toggle span,
    .ps-breadcrumb .breadcrumb a:hover,
    .ps-block--site-features .ps-block__left i,
    .mega-menu .mega-menu__list li a:hover,
    .product-card__discount-price,
    .p-30 a:hover,
    .product-card__title:hover,
    .ps-product .ps-product__title:hover,
    .menu--product-categories .menu__toggle i,
    .ps-block--categories-tabs .ps-tab-list a span{
        color: {{ theme_color('secondary_color')}} !important;
    }

</style>