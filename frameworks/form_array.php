<?php

/**
 * Total Form's Element Array data
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Form Elements Array http://php.net/manual/en/language.types.array.php
 */

    $wcb_font_weight_options =  array(
        ''          =>  esc_html__( 'None','wc_beautifier' ),
        'thin'      =>  esc_html__( 'Thin','wc_beautifier' ),
        'normal'    =>  esc_html__( 'Normal','wc_beautifier' ),
        'bold'      =>  esc_html__( 'Bold','wc_beautifier' ),
        'bolder'    =>  esc_html__( 'Bolder','wc_beautifier' ),
    );
    $wcb_font_style_options = array(
        ''          =>  esc_html__( 'None','wc_beautifier' ),
        'italic'    =>  esc_html__( 'Italic','wc_beautifier' ),
        'oblique'   =>  esc_html__( 'Oblique','wc_beautifier' ),
        'normal'    =>  esc_html__( 'Normal','wc_beautifier' ),
    );
    $background_repeat_value = array(
        ''              => esc_html__( 'None', 'wc_beautifier' ),
        'repeat'     =>  esc_html__( 'Repeat', 'wc_beautifier' ),
        'no-repeat'     =>  esc_html__( 'No Repeat', 'wc_beautifier' ),
        'repeat-x'      =>  esc_html__( 'Repeat Horizontally', 'wc_beautifier' ),
        'repeat-y'      =>  esc_html__( 'Repeat Vertically', 'wc_beautifier' ),
    );
    $background_attachment_value = array(
        ''   => esc_html__( 'None', 'wc_beautifier' ),
        'initial'   => esc_html__( 'Initial', 'wc_beautifier' ),
        'scroll'    =>  esc_html__( 'Scroll', 'wc_beautifier' ),
        'fixed'     =>  esc_html__( 'Fixed', 'wc_beautifier' ),
        'local'     =>  esc_html__( 'Local', 'wc_beautifier' ),
        'inherit'   =>  esc_html__( 'Inherit', 'wc_beautifier' ),
    );
    $background_size_value = array(
        ''   => esc_html__( 'None', 'wc_beautifier' ),
        'auto'   => esc_html__( 'Auto/Default', 'wc_beautifier' ),
        'initial'    =>  esc_html__( 'Initial', 'wc_beautifier' ),
        'cover'     =>  esc_html__( 'Cover', 'wc_beautifier' ),
        'contain'     =>  esc_html__( 'Contain', 'wc_beautifier' ),
        'inherit'   =>  esc_html__( 'Inherit', 'wc_beautifier' ),
    );
    $background_position_value = array(
        ''           => esc_html__( 'None', 'wc_beautifier' ),
        'initial'           => esc_html__( 'Initial', 'wc_beautifier' ),
        'left top'          => esc_html__( 'Left Top', 'wc_beautifier' ),
        'left center'       => esc_html__( 'Left Center', 'wc_beautifier' ),
        'left bottom'       => esc_html__( 'Left Bottom', 'wc_beautifier' ),
        'right top'         => esc_html__( 'Right Top', 'wc_beautifier' ),
        'right center'      => esc_html__( 'Right center', 'wc_beautifier' ),
        'right bottom'      => esc_html__( 'Right Bottom', 'wc_beautifier' ),
        'center top'        => esc_html__( 'Center Top', 'wc_beautifier' ),
        'center center'     => esc_html__( 'Center Center', 'wc_beautifier' ),
        'center bottom'     => esc_html__( 'Center Bottom', 'wc_beautifier' ),
    );
    $form_args = array(
    //Global Page Start - Saiful Islam
    array(
        'id'        => 'global',
        'type'      =>  'tab',
        'label'     =>  esc_html__( 'Global Setting','wc_beautifier' ),
        'description'   =>   esc_html__( "This tab setting value is global. That means this setting value will impact to whole WooCommerce elements - by default. But if you want to set any particular change for any specific page, you need to change in that particular tab. For Example: Mini cart, Shop page, Category Page, Tag Page tab.",'wc_beautifier' ),
    ),
    
    // Background Image 
    array(
        'id' => 'basic_back',
        'type' => 'title',
        'label' => esc_html__( 'Background Settings', 'wc_beautifier' ),
        'description' => esc_html__( 'Global\'s background will set to the all page, where found body class .woocommerce or .woocommerce-page .', 'wc_beautifier' ),
    ),
    array(
        'id'        =>  'basic_back_background_image',
        'label'     =>  esc_html__( 'Background Image','wc_beautifier' ),
        'type'      =>  'image',
        'selector'  =>  'body.woocommerce,body.woocommerce-page',
        'style'     =>  'background-image',
    ),
    array(
        'id'        =>  'basic_back_background_color',
        'label'     =>  esc_html__( 'Background Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.woocommerce,body.woocommerce-page',
        'picker'    =>  true,
        'style'     =>  'background-color',
    ),
    array(
        'id'        =>  'basic_back_background_repeat',
        'label'     =>  esc_html__( 'Background Repeat','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_repeat_value,
        'selector'  =>  'body.woocommerce,body.woocommerce-page',
        'style'     =>  'background-repeat',
    ),
    array(
        'id'        =>  'basic_back_background_position',
        'label'     =>  esc_html__( 'Background Position','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_position_value,
        'selector'  =>  'body.woocommerce,body.woocommerce-page',
        'style'     =>  'background-position',
    ),
    array(
        'id'        =>  'basic_back_background_attachment',
        'label'     =>  esc_html__( 'Background Attachment','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_attachment_value,
        'selector'  =>  'body.woocommerce,body.woocommerce-page',
        'style'     =>  'background-attachment',
    ),
    array(
        'id'        =>  'basic_back_background_size',
        'label'     =>  esc_html__( 'Background Size','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_size_value,
        'selector'  =>  'body.woocommerce,body.woocommerce-page',
        'style'     =>  'background-size',
    ),    
    // General 
    array(
        'id' => 'basic_general',
        'type' => 'title',
        'label' => esc_html__( 'General','wc_beautifier' ),
    ),
    array(
        'id'        =>  'basic_general_rating_color',
        'label'     =>  esc_html__( 'Rating color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.star-rating span::before,p.stars.selected a.active::before',
        'picker'    =>  true,
        'style'     =>  'color',
    ),
    array(
        'id'        =>  'basic_general_instock_color',
        'label'     =>  esc_html__( 'In Stock color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.stock.in-stock',
        'picker'    =>  true,
        'style'     =>  'color',
    ),
    array(
        'id'        =>  'basic_general_instock_fontweight',
        'label'     =>  esc_html__( 'In Stock Fontweight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.stock.in-stock',
        'options'    =>  $wcb_font_weight_options,
        'style'     =>  'font-weight',
    ),
    array(
        'id'        =>  'basic_general_instock_fontstyle',
        'label'     =>  esc_html__( 'In Stock FontStyle','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.stock.in-stock',
        'options'    =>  $wcb_font_style_options,
        'style'     =>  'font-style',
    ),
        
        
    array(
        'id'        =>  'basic_general_outstock_color',
        'label'     =>  esc_html__( 'Out of Stock color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.stock.out-of-stock',
        'picker'    =>  true,
        'style'     =>  'color',
    ),
    array(
        'id'        =>  'basic_general_outstock_fontweight',
        'label'     =>  esc_html__( 'Out of Stock Fontweight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.stock.out-of-stock',
        'options'    =>  $wcb_font_weight_options,
        'style'     =>  'font-weight',
    ),
    array(
        'id'        =>  'basic_general_outstock_fontstyle',
        'label'     =>  esc_html__( 'Out of Stock FontStyle','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.stock.out-of-stock',
        'options'    =>  $wcb_font_style_options,
        'style'     =>  'font-style',
    ),
    
    array(
        'id' => 'basic_onsale',
        'type' => 'title',
        'label' => esc_html__( 'Sale Badge','wc_beautifier' ),
    ),
    array(
        'id'        =>  'basic_sale_color',
        'label'     =>  esc_html__( 'Text color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.onsale',
        'picker'    =>  true,
        'style'     =>  'color',
    ),
    array(
        'id'        =>  'basic_sale_bgcolor',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.onsale',
        'picker'    =>  true,
        'style'     =>  'background-color',
    ),
    array(
        'id'        =>  'basic_sale_bordercolor',
        'label'     =>  esc_html__( 'Border Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.onsale',
        'picker'    =>  true,
        'style'     =>  'border-color',
    ),
    array(
        'id'        =>  'basic_sale_borderradius',
        'label'     =>  esc_html__( 'Border Radius','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.onsale',
        'style'     =>  'border-radius',
        'placeholder'=> 'eg. 10px',
    ),
    array(
        'id'        =>  'basic_sale_fontweght',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.onsale',
        'options'   => $wcb_font_weight_options,
        'style'     =>  'font-weight',
    ),
    array(
        'id'        =>  'basic_sale_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.onsale',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style',
    ),
    array(
        'id'        =>  'basic_sale_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.onsale',
        'style'     =>  'font-size',
        'placeholder'=> 'eg. 18px',
    ),
    array(
        'id'        =>  'basic_sale_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.onsale',
        'style'     =>  'padding',
        'placeholder'=> 'eg. 10px 5px',
    ),
    
        
   
    //Price 
    array(
        'id' => 'basic_price',
        'type' => 'title',
        'label' => esc_html__( 'Price','wc_beautifier' ),
    ),
    array(
        'id'        =>  'basic_price_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-Price-amount.amount',//
        'picker'    =>  true,
        'style'     =>  'color',
    ),
    array(
        'id'        =>  'basic_price_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce-Price-amount.amount',
        'style'     =>  'font-weight', 
        'options'   =>  $wcb_font_weight_options,
    ),
    array(
        'id'        =>  'basic_price_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce-Price-amount.amount',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    
    
    //Add to cart Button
    array(
        'id'        => 'basic_add_to_cart',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Add to cart button','wc_beautifier' ),
        
    ),
     array(
        'id'        =>  'basic_add_to_cart_button_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button,.woocommerce .single_add_to_cart_button',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'basic_add_to_cart_button_bgcolor',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button,.woocommerce .single_add_to_cart_button',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce .add_to_cart_button,.woocommerce .single_add_to_cart_button',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight', //CSS Property Name
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce .add_to_cart_button,.woocommerce .single_add_to_cart_button',
        'options'   =>  $wcb_font_style_options,
        'style'       =>  'font-style', //CSS Property Name
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button,.woocommerce .single_add_to_cart_button',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button,.woocommerce .single_add_to_cart_button',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
    //Add to cart Button Hover
    array(
        'id'        => 'basic_add_to_cart_hover',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Add to cart button hover','wc_beautifier' ),
    ),
     array(
        'id'        =>  'basic_add_to_cart_button_color_hover',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button:hover,.woocommerce .single_add_to_cart_button:hover',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'basic_add_to_cart_button_bgcolor_hover',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button:hover,.woocommerce .single_add_to_cart_button:hover',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_fontweight_hover',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce .add_to_cart_button:hover,.woocommerce .single_add_to_cart_button:hover',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight',
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_fontstyle_hover',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce .add_to_cart_button:hover,.woocommerce .single_add_to_cart_button:hover',
        'options'   =>  $wcb_font_style_options,
        'style'       =>  'font-style', //CSS Property Name
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_fontsize_hover',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button:hover,.woocommerce .single_add_to_cart_button:hover',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'basic_add_to_cart_button_padding_hover',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce .add_to_cart_button:hover,.woocommerce .single_add_to_cart_button:hover',
        'style'     =>  'padding',
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
    //Message Box
    array(
        'id'        => 'basic_success_message',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Success Message Box','wc_beautifier' ),
    ),
    array(
        'id'        =>  'basic_success_msg_color',
        'label'     =>  esc_html__( 'text color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-message',
        'style'     =>  'color',
        'picker'    =>  true,
    ),
    
    array(
        'id'        =>  'basic_success_link_color',
        'label'     =>  esc_html__( 'Link color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-message .button',
        'style'     =>  'color',
        'picker'    =>  true,
    ),
    
    array(
        'id'        =>  'basic_success_msg_bgcolor',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-message',
        'style'     =>  'background-color',
        'picker'    =>  true,
    ),
    //Warning Message Box
    array(
        'id'        => 'basic_warning_message',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Warning Message Box','wc_beautifier' ),
    ),
    array(
        'id'        =>  'basic_warning_msg_color',
        'label'     =>  esc_html__( 'Text color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-error',
        'style'     =>  'color',
        'picker'    =>  true,
    ),
    
    array(
        'id'        =>  'basic_warning_link_color',
        'label'     =>  esc_html__( 'Link color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-error .button',
        'style'     =>  'color',
        'picker'    =>  true,
    ),
    
    array(
        'id'        =>  'basic_warning_msg_bgcolor',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-error',
        'style'     =>  'background-color',
        'picker'    =>  true,
    ),
    
    
    
    //checkout page style here -
    array(
        'id'        => 'checkout_tab',
        'type'      =>  'tab',
        'label'     =>  esc_html__( 'Checkout Page','wc_beautifier' ),
        'description' => esc_html__( "Firstly, the design/style will come from the 'Global Setting' tab. But when you set new setting to this tab, these settings (design/style) will override the 'Global Setting' to Check Out Page's elements. Such as product name, price, add to cart button, checkout button, placeorder button, rating color etc.",'wc_beautifier' ),
    ),
    array(
        'id' => 'checkout_back',
        'type' => 'title',
        'label' => esc_html__( 'Background Settings', 'wc_beautifier' ),
    ),
    array(
        'id'        =>  'checkout_back_background_image',
        'label'     =>  esc_html__( 'Background Image','wc_beautifier' ),
        'type'      =>  'image',
        'selector'  =>  'body.woocommerce.woocommerce-checkout',
        'style'     =>  'background-image',
    ),
    array(
        'id'        =>  'checkout_back_background_color',
        'label'     =>  esc_html__( 'Background Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.woocommerce.woocommerce-checkout',
        'picker'    =>  true,
        'style'     =>  'background-color',
    ),
    array(
        'id'        =>  'checkout_back_background_repeat',
        'label'     =>  esc_html__( 'Background Repeat','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_repeat_value,
        'selector'  =>  'body.woocommerce.woocommerce-checkout',
        'style'     =>  'background-repeat',
    ),
    array(
        'id'        =>  'checkout_back_background_position',
        'label'     =>  esc_html__( 'Background Position','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_position_value,
        'selector'  =>  'body.woocommerce.woocommerce-checkout',
        'style'     =>  'background-position',
    ),
    array(
        'id'        =>  'checkout_back_background_attachment',
        'label'     =>  esc_html__( 'Background Attachment','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_attachment_value,
        'selector'  =>  'body.woocommerce.woocommerce-checkout',
        'style'     =>  'background-attachment',
    ),
    array(
        'id'        =>  'checkout_back_background_size',
        'label'     =>  esc_html__( 'Background Size','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_size_value,
        'selector'  =>  'body.woocommerce.woocommerce-checkout',
        'style'     =>  'background-size',
    ),    
    //Page Title
    array(
        'id'        => 'checkout_page_title',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Page Title','wc_beautifier' ),
    ),
    array(
        'id'        =>  'checkout_title_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-checkout .entry-title',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    array(
        'id'        =>  'checkout_title_bg_color',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-checkout .entry-title',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'checkout_title_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce-checkout .entry-title',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight', //CSS Property Name
    ),
    array(
        'id'        =>  'checkout_title_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.woocommerce-checkout .entry-title',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'checkout_title_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-checkout .entry-title',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    
    array(
        'id'        =>  'checkout_title_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-checkout .entry-title',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    //Coupon Box
     array(
        'id'        => 'coupon_section',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Coupon Section','wc_beautifier' ),
    ),
    array(
        'id'        =>  'checkout_coupon_bgcolor',
        'label'     =>  esc_html__( 'Coupon box BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-form-coupon-toggle .woocommerce-info',
        'style'     =>  'background-color',
        'picker'    =>  true,
    ),
    array(
        'id'        =>  'checkout_coupon_padding',
        'label'     =>  esc_html__( 'Coupon box Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.woocommerce-form-coupon-toggle .woocommerce-info',
        'style'     =>  'padding',
        'placeholder'=>  'Eg. 10px',
    ),
    array(
        'id'        =>  'checkout_apply_coupon_color',
        'label'     =>  esc_html__( 'Apply button Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.checkout_coupon.woocommerce-form-coupon .button',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'checkout_apply_coupon_bgcolor',
        'label'     =>  esc_html__( 'Apply button BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.checkout_coupon.woocommerce-form-coupon .button',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    array(
        'id'        =>  'checkout_apply_coupon_fontweight',
        'label'     =>  esc_html__( 'Apply button Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.checkout_coupon.woocommerce-form-coupon .button',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight', //CSS Property Name
    ),   
    array(
        'id'        =>  'checkout_apply_coupon_fontstyle',
        'label'     =>  esc_html__( 'Apply button Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.checkout_coupon.woocommerce-form-coupon .button',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'checkout_apply_coupon_fontsize',
        'label'     =>  esc_html__( 'Apply button Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.checkout_coupon.woocommerce-form-coupon .button',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'checkout_apply_coupon_padding',
        'label'     =>  esc_html__( 'Apply button Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.checkout_coupon.woocommerce-form-coupon .button',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
    
    
    //Payment Method
     array(
        'id'        => 'payment_method_section',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Payment Method Section','wc_beautifier' ),
    ),
    
    array(
        'id'        =>  'checkout_payment_method_selected_color',
        'label'     =>  esc_html__( 'Selected icon color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '#payment .payment_methods li input[type=radio]:first-child:checked+label:before',
        'style'     =>  'color',
        'picker'    =>  true,
    ),
    array(
        'id'        =>  'checkout_payment_method_bgcolor',
        'label'     =>  esc_html__( 'BG Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '#payment .payment_methods > li:not(.woocommerce-notice)',
        'style'     =>  'background',
        'picker'    =>  true,
    ),
    array(
        'id'        =>  'checkout_payment_method_label_color',
        'label'     =>  esc_html__( 'Label Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.wc_payment_method label',
        'style'     =>  'color',
        'picker'    =>  true,
    ),
    
    //Place Order Button
    array(
        'id'        => 'place_order_section',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Place Order Button','wc_beautifier' ),
    ),
    array(
        'id' => 'checkout_placeorder_color',
        'label' => esc_html__( 'Text Color','wc_beautifier' ),
        'type' => 'input',
        'selector' => '.place-order button#place_order',
        'picker' => true,
        'style' => 'color',
    ),
    array(
        'id'        =>  'checkout_place_order_bgcolor',
        'label'     =>  esc_html__( 'Button BG','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.place-order button#place_order',
        'style'     =>  'background',
        'picker'    =>  true,
    ),
    
    array(
        'id' => 'checkout_placeorder_fontweight',
        'label' => esc_html__( 'Font Weight','wc_beautifier' ),
        'type' => 'select',
        'selector' => '.place-order button#place_order',
        'options' => $wcb_font_weight_options,
        'style' => 'font-weight',
    ),
           
    array(
        'id'        =>  'checkout_placeorder_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.place-order button#place_order',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'checkout_placeorder_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.place-order button#place_order',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id' => 'checkout_placeorder_hover_padding',
        'label' => esc_html__( 'Padding','wc_beautifier' ),
        'type' => 'input',
        'selector' => '.place-order button#place_order',
        'style' => 'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
        ),
    
    //Place Order Button Hover
    array(
        'id' => 'checkout_button_hover',
        'type' => 'title',
        'label' => esc_html__( 'Place Order Button Hover','wc_beautifier' ),
    ),
    array(
        'id' => 'checkout_placeholder_hover_color',
        'label' => esc_html__( 'Color','wc_beautifier' ),
        'type' => 'input',
        'selector' => '.place-order button#place_order:hover',
        'picker' => true,
        'style' => 'color', //CSS Property Name
    ),
    array(
        'id' => 'checkout_placeholder_hover_bgcolor',
        'label' => esc_html__( 'BG color','wc_beautifier' ),
        'type' => 'input',
        'selector' => '.place-order button#place_order:hover',
        'picker' => true,
        'style' => 'background-color', //CSS Property Name
    ),
    array(
        'id'        => 'checkout_placeorder_hover_fontweight',
        'label'     => esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      => 'select',
        'selector'  => '.place-order button#place_order:hover',
        'options'   => $wcb_font_weight_options,
        'style'     => 'font-weight', //CSS Property Name
    ),       
    array(
        'id'        =>  'checkout_placeorder_fontstyle_hover',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  '.place-order button#place_order:hover',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'checkout_placeorder_fontsize_hover',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  '.place-order button#place_order:hover',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        => 'cehckout_placeholder_hover_padding',
        'label'     => esc_html__( 'Padding','wc_beautifier' ),
        'type'      => 'input',
        'selector'  => '.place-order button#place_order:hover',
        'style'     => 'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
     //checkout page style here -  
    
    //Shop Page
    array(
        'id'        => 'shop_page_tab',
        'type'      =>  'tab',
        'label'     =>  esc_html__( 'Shop Page','wc_beautifier' ),
        'description' => esc_html__( "Firstly, the design/style will come from the 'Global Setting' tab. But when you set new setting to this tab, these settings (design/style) will override the 'Global Setting' to Main Shop Page elements. Such as page title, product name, price, add to cart button, checkout button, rating color etc.",'wc_beautifier' ),
    ),
    array(
        'id' => 'shop_back',
        'type' => 'title',
        'label' => esc_html__( 'Background Settings', 'wc_beautifier' ),
    ),
    array(
        'id'        =>  'shop_back_background_image',
        'label'     =>  esc_html__( 'Background Image','wc_beautifier' ),
        'type'      =>  'image',
        'selector'  =>  'body.woocommerce.post-type-archive-product',
        'style'     =>  'background-image',
    ),
    array(
        'id'        =>  'shop_back_background_color',
        'label'     =>  esc_html__( 'Background Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.woocommerce.post-type-archive-product',
        'picker'    =>  true,
        'style'     =>  'background-color',
    ),
    array(
        'id'        =>  'shop_back_background_repeat',
        'label'     =>  esc_html__( 'Background Repeat','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_repeat_value,
        'selector'  =>  'body.woocommerce.post-type-archive-product',
        'style'     =>  'background-repeat',
    ),
    array(
        'id'        =>  'shop_back_background_position',
        'label'     =>  esc_html__( 'Background Position','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_position_value,
        'selector'  =>  'body.woocommerce.post-type-archive-product',
        'style'     =>  'background-position',
    ),
    array(
        'id'        =>  'shop_back_background_attachment',
        'label'     =>  esc_html__( 'Background Attachment','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_attachment_value,
        'selector'  =>  'body.woocommerce.post-type-archive-product',
        'style'     =>  'background-attachment',
    ),
    array(
        'id'        =>  'shop_back_background_size',
        'label'     =>  esc_html__( 'Background Size','wc_beautifier' ),
        'type'      =>  'select',
        'options'   => $background_size_value,
        'selector'  =>  'body.woocommerce.post-type-archive-product',
        'style'     =>  'background-size',
    ),    
    //Page Title
    array(
        'id'        => 'shop_page_title',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Page Title','wc_beautifier' ),
    ),
    array(
        'id'        =>  'shop_title_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .woocommerce-products-header__title.page-title',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    array(
        'id'        =>  'shop_title_bg_color',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .woocommerce-products-header__title.page-title',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'shop_title_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .woocommerce-products-header__title.page-title',
        'options'   =>  $wcb_font_weight_options,
        'style'     =>  'font-weight', //CSS Property Name
    ),
    array(
        'id'        =>  'shop_title__fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .woocommerce-products-header__title.page-title',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'shop_title_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .woocommerce-products-header__title.page-title',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'shop_title_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .woocommerce-products-header__title.page-title',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    //Product Name
    array(
        'id'        => 'shop_product_name_title',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Product name','wc_beautifier' ),
    ),
    array(
        'id'        =>  'shop_product_name_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .product .woocommerce-loop-product__title',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    array(
        'id'        =>  'shop_product_name_color_hover',
        'label'     =>  esc_html__( 'Hover color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .product .woocommerce-loop-product__title:hover',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'shop_product_name_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .product .woocommerce-loop-product__title',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight', //CSS Property Name
    ),
    
    array(
        'id'        =>  'shop_product_name_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .product .woocommerce-loop-product__title',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'shop_product_name_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .product .woocommerce-loop-product__title',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'shop_product_name_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .product .woocommerce-loop-product__title',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
    // Price 
    array(
        'id' => 'shop_price',
        'type' => 'title',
        'label' => esc_html__( 'Price','wc_beautifier' ),
    ),
    array(
        'id'        =>  'shop_price_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive .woocommerce-Price-amount.amount',
        'picker'    =>  true,
        'style'     =>  'color',
    ),
    array(
        'id'        =>  'shop_price_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive .woocommerce-Price-amount.amount',
        'style'     =>  'font-weight', 
        'options'   =>  $wcb_font_weight_options,
    ),
    array(
        'id'        =>  'shop_price_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive .woocommerce-Price-amount.amount', 
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'shop_price_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive .product .price .woocommerce-Price-amount.amount',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'shop_price_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive .woocommerce-Price-amount.amount',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
    
    //Add to cart Button
    array(
        'id'        => 'shop_add_to_cart',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Add to cart button','wc_beautifier' ),
    ),
     array(
        'id'        =>  'shop_add_to_cart_button_color',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button,body.archive.woocommerce .product_type_external,body.archive.woocommerce .product_type_grouped',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'shop_add_to_cart_button_bgcolor',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button,body.archive.woocommerce .product_type_external,body.archive.woocommerce .product_type_grouped',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_fontweight',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button,body.archive.woocommerce .product_type_external,body.archive.woocommerce .product_type_grouped',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight', //CSS Property Name
    ),       
    array(
        'id'        =>  'shop_add_to_cart_button_fontstyle',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button,body.archive.woocommerce .product_type_external,body.archive.woocommerce .product_type_grouped',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_fontsize',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button,body.archive.woocommerce .product_type_external,body.archive.woocommerce .product_type_grouped',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_padding',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button,body.archive.woocommerce .product_type_external,body.archive.woocommerce .product_type_grouped',
        'style'     =>  'padding', //CSS Property Name
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
    //Add to cart Button Hover
    array(
        'id'        => 'shop_add_to_cart_hover',
        'type'      =>  'title',
        'label'     =>  esc_html__( 'Add to cart button hover','wc_beautifier' ),
    ),
     array(
        'id'        =>  'shop_add_to_cart_button_color_hover',
        'label'     =>  esc_html__( 'Color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button:hover,body.archive.woocommerce .product_type_external:hover,body.archive.woocommerce .product_type_grouped:hover',
        'picker'    =>  true,
        'style'       =>  'color', //CSS Property Name
    ),
    
    array(
        'id'        =>  'shop_add_to_cart_button_bgcolor_hover',
        'label'     =>  esc_html__( 'BG color','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button:hover,body.archive.woocommerce .product_type_external:hover,body.archive.woocommerce .product_type_grouped:hover',
        'picker'    =>  true,
        'style'       =>  'background-color', //CSS Property Name
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_fontweight_hover',
        'label'     =>  esc_html__( 'Font Weight','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button:hover,body.archive.woocommerce .product_type_external:hover,body.archive.woocommerce .product_type_grouped:hover',
        'options'   =>  $wcb_font_weight_options,
        'style'       =>  'font-weight',
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_fontstyle_hover',
        'label'     =>  esc_html__( 'Font Style','wc_beautifier' ),
        'type'      =>  'select',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button:hover,body.archive.woocommerce .product_type_external:hover,body.archive.woocommerce .product_type_grouped:hover',
        'options'   => $wcb_font_style_options,
        'style'     =>  'font-style', 
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_fontsize_hover',
        'label'     =>  esc_html__( 'Font Size','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button:hover,body.archive.woocommerce .product_type_external:hover,body.archive.woocommerce .product_type_grouped:hover',
        'style'     =>  'font-size',
        'placeholder'=> 'eg: 15px',
    ),
    array(
        'id'        =>  'shop_add_to_cart_button_padding_hover',
        'label'     =>  esc_html__( 'Padding','wc_beautifier' ),
        'type'      =>  'input',
        'selector'  =>  'body.archive.woocommerce .add_to_cart_button:hover,body.archive.woocommerce .product_type_external:hover,body.archive.woocommerce .product_type_grouped:hover',
        'style'     =>  'padding',
        'placeholder'=> 'eg: 10px 5px'
    ),
    
    
);
