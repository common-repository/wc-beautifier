<?php
namespace WCB_Beautifier;

$ca_form_array = WCB_BASE_DIR . '/frameworks/';

    require_once $ca_form_array . 'form_array.php';

\WCB_Beautifier\WCB_Form_Generator::setElements( $form_args );

/**
 * WooCommerce_Beautifier's main Object to make form. we will get data from customer by form and that form will generate this Object based on only an Array.
 * To this Class, we have used lot of property and method. all method and property is important. Most of the time, we set default value to properly. But in case, we able to change property value
 * 
 * @method setColorPickerClass WCB_Form_Generator::setColorPickerClass(String $class_name) To set individual class to any input, we can sue this method. Formerly we have used it to set color picker class. Although we set it property as default class .wcb_color_picker . If any case, we want to change, we able to change by this method. 
 * @method setElements WCB_Form_Generator::setElements( Array $form_args ) Very important method. By this method, Form will set properly based on individual id condition. For all type input/selector elements, we will make array, and thid method will set as element.
 * @method getElements WCB_Form_Generator::getElements() to get properly set element
 * @method getTabElements WCB_Form_Generator::getTabElements() to get Tabs Element Array for our Main form
 * @method addForm WCB_Form_Generator::addForm( Array $el_array ) To andd new one Element we have to use this method, normally we set element by full array by WCB_Form_Generator::setElements( Array $form_args ) . But this method will use only for add one element.
 * @method String WCB_Form_Generator::render() Whole rendered data will display and hypertext by this method
 * @method getRender WCB_Form_Generator::getRender() Based on set elements, this method will return full form with all input,title,tab tile element as well as submit,reset button.
 * @method submit WCB_Form_Generator::submit() Generated form will submit by this method even vased on $_POST condition. for success - return true, otherwise false.
 * @method updateOptions WCB_Form_Generator::updateOptions( Array $values ) To update options/values to WordPress wp_options table. Formerly Customer set all value will store to database by this method. Very powerful method is this.
 * @method getOptions WCB_Form_Generator::getOptions() All options to get from database, have to use this method
 * @method getOption WCB_Form_Generator::getOption( String $option_key ) To get specific value from options by id, we will use this method. Remember: its different from WCB_Form_Generator::getOptions()
 * @method renderSingle WCB_Form_Generator::renderSingle( Array $singleElement ) to render each element based on condition and type. can be: title,select,picker etc.
 * @method renderInput WCB_Form_Generator::renderInput( Array $singleElement, Int $id, String $label, String $class_name, String $placeholder ) render Input tag properly, It also can be color picker input
 * @method renderSelect WCB_Form_Generator::renderSelect( Array $singleElement, Int $id, String $label, String $class_name, String $placeholder ) render select->option tag properly, It also can be for font weight,size,
 * @method setMethod WCB_Form_Generator::setMethod( String $method ) To set <form> tag's method. Default value POST
 * @method setAction WCB_Form_Generator::setAction( String $action ) To set <form> tag's Action. Default value blank
 * @method setClass WCB_Form_Generator::setClass( String $class ) This method will change or set new class to our Form. I mean: replace class with default
 * @method addClass WCB_Form_Generator::addClass( String $class ) this will not replace, it will just add a new class with existing
 * @method setTabClass WCB_Form_Generator::setTabClass( String $tab_class ) Normally to set tab class to each element's wrapper
 * @method setPrefix WCB_Form_Generator::setPrefix( String $prefix ) Although to this plugin we set default prefix 'wcb' but by this method, we can set new prefix, if we want to use this Class to any other plugin.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Classes and Objects http://php.net/manual/en/language.oop5.php
 */

class WCB_Form_Generator{
    
    /**
     * Form's Action Attribute
     *
     * @var type String
     */
    public static $action = '';
    
    /**
     * Form's method attribute, Default we set POST
     *
     * @var type String
     */
    public static $method = 'POST';
    
    /**
     * Form's Default class
     *
     * @var type String
     */
    public static $class = 'form_generator';
    
    /**
     * Input's tag's class, if need color picker, we will use it.
     *
     * @var type String
     */
    private static $color_picker_class = 'wcb_color_picker';
    
    /**
     * If not found class, than set none_class. Normally every time, we will set class
     *
     * @var type String
     */
    private static $tab_class = 'none_class';
    
    /**
     * Our plugin's prefix
     *
     * @var type String
     */
    private static $prefix = 'wcb';
    
    /**
     * To verify Form Validation
     *
     * @var type String
     */
    public static $nonce_name = 'form_nonce';

    /**
     * This is Submit button's text. If need, we can change it to any text
     *
     * @var type String
     */
    public static $submit = 'Submit';
    
    /**
     * Form's tab reset button text. We can change if need
     *
     * @var type String
     */
    public static $reset = 'Reset this tab';
    
    /**
     * Form All tab reset button text, we can change it if need
     *
     * @var type String
     */
    public static $reset_all = 'Reset all tabs';
    //public static $save_template = 'Save as Template';
    
    /**
     * Form's submit button name attribute's name
     *
     * @var type String
     */
    public static $submit_name = 'wcb_submit';
    
    /**
     * Form's tab reset button's attribute's name
     *
     * @var type String
     */
    public static $reset_name = 'wcb_reset';
    
    /**
     * All tab reset button's name
     *
     * @var type String
     */
    public static $reset_all_name = 'wcb_reset_all';
    //public static $save_template_name = 'wcb_save_template';
    
    /**
     * Option name, which name we will use to save data in database of WordPress wp_options
     *
     * @var type String
     */
    public static $options_name = 'wcb_setting_value';

    /**
     * Including Supported Array
     *
     * @var type Array
     */
    public static $supported_type = array( 'input', 'title', 'select', 'tab', 'image' );

    /**
     * Forms $elements Array, Default false, but we will set by method
     *
     * @var type Array
     */
    public static $elements = false;//array();
    
    /**
     * Forms $tab_elements Array, Default false, but we will set by method
     *
     * @var type Array
     */
    public static $tab_elements = false;

    public static $no_image = WCB_BASE_URL . '/assets/images/no-image.jpg';

    /**
     * To set class to any element of input, basically for color picker input
     * 
     * @param String $class_name to set class to any element of input, basically for color picker input
     */
    public static function setColorPickerClass( $class_name = false ){
        if( $class_name && !empty( $class_name ) ){
            self::$color_picker_class = $class_name;
        }
    }

    /**
     * Very important method. By this method, Form will set properly based on individual id condition. For all type input/selector elements, we will make array, and thid method will set as element.
     * 
     * @param type $form_args All elements Array
     * @return boolean if found proper array, it will set Element and return will true, otherwise false.
     */
    public static function setElements( $form_args = false ){

        if( $form_args && is_array( $form_args ) && count( $form_args ) > 0 ){
            $form_args = wp_unslash( $form_args );
            $args = false;
            foreach( $form_args as $each_args ){
                if( isset( $each_args['id'] ) ){
                    $id = $each_args['id'];
                    $args[$id] = $each_args;
                }
            }
            self::$elements = $args;
            return true;
        }
    }
    
    /**
     * to get properly set element from wp_options database. Array will come from wp
     * 
     * @return type Array
     */
    public static function getElements(){
        return self::$elements;
    }
    
    /**
     * Getting tab elements array from all elements by conditions
     * 
     * @return Array Getting tab element's Array from full Elements
     */
    public static function getTabElements(){
        $elements = self::$elements;
        if( !$elements ){
            return;
        }
        foreach( $elements as $element ){
             if( isset( $element['type'] ) && $element['type'] == 'tab' ){
                 $id = $element['id'];
                 self::$tab_elements[$id] = $element['label'];
             }   
        }
        return self::$tab_elements;
    }

    /**
     * If need any new and another element, we can use this method of this class.
     * 
     * @param type $el_array
     * @return boolean
     */
    public static function addForm($el_array = false){
        if( $el_array && is_array( $el_array ) && isset( $el_array['id'] ) ){
            $el_array = wp_unslash( $el_array );
            $id = $el_array['id'];
            self::$elements[$id] = $el_array;
            return true;
        }
    }
    
    /**
     * Total form will generate as hypertext, I mean: as html form tag
     * 
     * return void
     */
    public static function render(){
        echo self::getRender();
    }
    
    /**
     * Total form will generate base on elements and return as variable.
     * 
     * @return string
     */
    public static function getRender(){
        $elements = self::$elements;$html = false;
        if( $elements && is_array( $elements ) && count( $elements ) > 0 ){
            //Submit if posted           
            $action = self::$action;
            $method = self::$method;
            $class = self::$class;
            $html .= "<form class='" . esc_attr( $class ) . "' action='" . esc_url( $action ) . "' method='" . esc_attr( $method ) . "'>";
            
            //Set Hidden Nonce for Security
            $nonce_name = self::$prefix . '_' . self::$nonce_name;
            $html .= '<input type="hidden" name="' . esc_attr( $nonce_name ) . '" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
            
            foreach( $elements as $element ){
                if( isset( $element['type'] ) && $element['type'] == 'tab' ){
                    self::setTabClass( $element['id'] );
                }
                $html .= self::renderSingle( $element );
            }
            $submit = self::$submit;
            $submit_name = self::$submit_name;
            
            $reset = self::$reset;
            $reset_name = self::$reset_name;
            
            $reset_all = self::$reset_all;
            $reset_all_name = self::$reset_all_name;
            
            
            $html .= "<div class='submit_wrapper'>";
            $html .= "<button name='" . esc_attr( $submit_name ) . "' class='button button-primary wcb_submit_button' type='submit'>" . esc_html__( $submit, 'wc_beautifier' ) . "</button>";
            $html .= "<button name='" . esc_attr( $reset_name ) . "' class='button button-warning " . esc_attr( $reset_name ) . "_button' data-target='" . esc_attr( $class ) . "'>" . esc_html__( $reset, 'wc_beautifier' ) . "</button>";
            $html .= "<button name='" . esc_attr( $reset_all_name ) . "' class='button button-warning " . esc_attr( $reset_all_name ) . "_button' data-target='" . esc_attr( $class ) . "'>" . esc_html__( $reset_all, 'wc_beautifier' ) . "</button>";
            $html .= "</div>";
            $html .= "<div class='wcb_form_message'></div>";
            $html .= '</form>';
        }else{
            $html .= esc_html__( 'No elements founded!', 'wc_beautifier' );
        }
        return $html;
    }
    
    /**
     * Form will submit, if click submit button and if get $_POST superGlobal Variable. otherwise, it will return false.
     * 
     * @return boolean for success - true, otherwise false.
     */
    public static function submit(){
        $submit_name  = self::$submit_name;
        $nonce_name = self::$prefix . '_' . self::$nonce_name;
        if( isset( $_POST['data'] ) && isset( $_POST[$submit_name] ) && isset( $_POST[$nonce_name] ) ){
            //User Edit Permission confirm
            if( !current_user_can('manage_options') ){
                return;
            }
            //Confirmation Nonce
            if( !wp_verify_nonce( $_POST[$nonce_name], plugin_basename(__FILE__) ) ) {
                return;
            }
            
            
            $values = ( is_array( $_POST['data'] ) ? $_POST['data'] : false );
            
            $final_values = false;
            foreach( $values as $key=>$value ){
                $sanitize_key = sanitize_text_field( $key );
                $sanitize_value = sanitize_text_field( $value );
                if( !empty( $sanitize_value ) ){
                    $final_values[$sanitize_key] = $sanitize_value;
                }
            }
            return self::updateOptions( $final_values );
        }
        return;
    }
    
    /**
     * Update options to wp_options table by this method. It's very powerful and important method.
     * 
     * @param type $values customer set value will store to databse of wp_options
     * @return booleanfor success - true, otherwise false.
     */
    public static function updateOptions( $values ){
        $options_name  = self::$options_name;
        update_option( sanitize_key( $options_name ), wp_unslash( $values ) ); 
        return true;
    }
    
    /**
     * Getting Array from wp_options. It normally will come, when we will submit form
     * 
     * @return array/String data getting from 
     */
    public static function getOptions(){
        return get_option( sanitize_key( self::$options_name ) );
    }
    
    /**
     * getting data from database based on keyword, mainly Id of array's
     * 
     * @param type $option_key getting data based on ID
     * @return type String will retrun Options Value based on ID. Only a specific value if found. Otherwise will return false.
     */
    public static function getOption( $option_key = false ){
        $option = get_option( sanitize_key( self::$options_name ) );
        return isset( $option_key ) && isset( $option[$option_key] ) ? $option[$option_key] : false;
    }
    
    /**
     * Generate each and every element as hypertext. it can be input, title, tab title, select and option tag etc
     * 
     * @param type $singleElement
     * @return string Total Singleelements hypertext will be return. No echo. it's as a value
     */
    public static function renderSingle( $singleElement = false ){
        $html = false;
        $tab_class = self::$tab_class;
        $prefix = self::$prefix;
        $id = isset( $singleElement['id'] ) ? $singleElement['id'] : false;
        $type = isset( $singleElement['type'] ) ? $singleElement['type'] : false;
        $description = isset( $singleElement['description'] ) ? $singleElement['description'] : false; //Added at 1.0.19
        $style = isset( $singleElement['style'] ) ? $singleElement['style'] : 'no_css_property'; //Added at 1.0.19
        
        $type_support = $type && in_array( $type, self::$supported_type ) ? true : false;
        if( $id && $type_support ){
            $html .= "<div class='" . esc_attr( $prefix ) . "_element_wrapper " . esc_attr( $prefix ) . "_tab_" . esc_attr( $tab_class ) . " " . esc_attr( $prefix ) . "_" . esc_attr( $type ) . "_wrapper " . esc_attr( $prefix ) . "_el_wrapper_" . esc_attr( $id ) . " tab-content' data-description='" . esc_attr( $description ) . "'>";
            $label = isset( $singleElement['label'] ) ? $singleElement['label'] : false;
            $class = isset( $singleElement['class'] ) ? $singleElement['class'] : false;
            $placeholder = isset( $singleElement['placeholder'] ) ? 'placeholder="' . esc_attr__( $singleElement['placeholder'], 'wc_beautifier' ) . '"' : 'placeholder="' . esc_attr__( $label, 'wc_beautifier' ) . '"';//Default placeholder come from Label
            $class_name = "{$prefix}_{$type} {$prefix}_{$style} {$prefix}_{$id} {$class}";
            
            if( 'tab' == $type ){
                $html .= "<h2 class='" . esc_attr( $prefix ) . "_tab tab_" . esc_attr( $class_name ) . "'> " . esc_html__( $label, 'wc_beautifier' ) . " </h2>";
            }elseif( 'title' == $type ){
                $html .= "<h2 class='" . esc_attr( $prefix ) . "_title title_" . esc_attr( $class_name ) . "'> " . esc_html__( $label, 'wc_beautifier' ) . " </h2>";
            }elseif(  'input' == $type){
                $html .= self::renderInput( $singleElement, $id, $label, $class_name, $placeholder );                
            }elseif( 'select' == $type ){
                $html .= self::renderSelect( $singleElement, $id, $label, $class_name, $placeholder );
            }elseif(  'image' == $type){
                $html .= self::renderImage( $singleElement, $id, $label, $class_name, $placeholder );                
            }
            
            
            $html .=  !empty( $description ) ? "<p class='wcb_form_description wcb_description_" . esc_attr( $tab_class ) . "'>" . esc_html__( $description, 'wc_beautifier' ) . "</p>" : false;
            $html .= "</div>"; //Closing Div
        }
        
        return $html;
    }
    
    /**
     * Generate input tag output. All parameter is required.
     * 
     * @param type $singleElement Single Element as Array
     * @param type $id Required and Int
     * @param type $label Required and String
     * @param type $class_name Required and String
     * @param type $placeholder Required and String
     * @return type String Total elements hypertext will be return. No echo. it's as a value
     */
    protected static function renderInput( $singleElement, $id, $label, $class_name, $placeholder ){
        $html = false;$prefix = self::$prefix;
        $default = isset($singleElement['default']) ? $singleElement['default'] : false;
        
        $value = null !== self::getOption($id) ? self::getOption($id) : $default; //Getting option from wp_options

        $input_type = isset( $singleElement['input_type'] ) && is_string( $singleElement['input_type'] ) ? $singleElement['input_type'] : 'text';
        $picker_class = isset( $singleElement['picker'] ) && !empty( $singleElement['picker'] ) ? self::$color_picker_class : false;
        $input_class =  $class_name . ' '. $picker_class;
        $html .= "<label for='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "'>" . esc_html__( $label, 'wc_beautifier' ) . "</label>";
        $html .= "<input name='data[" . esc_attr( $id ) . "]' type='" . esc_attr( $input_type ) . "' class='" . esc_attr( $input_class ) . "' value='" . esc_attr( $value ) . "'  id='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "' {$placeholder}/>";
        return $html;
    }
    /**
     * Generate input tag output. All parameter is required.
     * 
     * @param type $singleElement Single Element as Array
     * @param type $id Required and Int
     * @param type $label Required and String
     * @param type $class_name Required and String
     * @param type $placeholder Required and String
     * @return type String Total elements hypertext will be return. No echo. it's as a value
     */
    protected static function renderImage( $singleElement, $id, $label, $class_name, $placeholder ){
        $no_image_url = self::$no_image;
        $html = false;$prefix = self::$prefix;
        $default = isset($singleElement['default']) ? $singleElement['default'] : false;
        $value = null !== self::getOption( $id ) ? self::getOption( $id ) : $default; //Getting option from wp_options
        $html .= "<a data-no_image='" . esc_attr( $no_image_url ) . "' data-target_id='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "' class='wcb_image_remove'>x</a>";
        $html .= "<label for='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "'>" . esc_html__( $label, 'wc_beautifier' ) . "</label>";
        $img_src = $value && !empty( $value ) ? $value : $no_image_url;
        $html .= "<img id='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "_image' class='wcb_background_image' height='50px' width='auto' src='" . esc_url( $img_src ) . "'>";
        $html .= "<input name='data[" . esc_attr( $id ) . "]' type='hidden' class='wcb_hidden_input' value='" . esc_attr( $value ) . "'  id='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "_hidden'/>";
        $html .= "<input name='' type='button' class='button button-primary " . esc_attr( $class_name ) . "' value='Upload'  id='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "'/>";
        return $html;
    }
    
    
    /**
     * Generate Select tag output. All parameter is required.
     * 
     * @param type $singleElement Single Element as Array
     * @param type $id Required and Int
     * @param type $label Required and String
     * @param type $class_name Required and String
     * @param type $placeholder Required and String
     * @return type String Total elements hypertext will be return. No echo. it's as a value
     */
    protected static function renderSelect( $singleElement, $id, $label, $class_name, $placeholder ){
        $html = false;$prefix = self::$prefix;
        if( isset( $singleElement['options'] ) && is_array( $singleElement['options'] ) && count( $singleElement['options'] ) > 0 ){
            $default = isset($singleElement['default']) ? $singleElement['default'] : false;
            $value = null !== self::getOption( $id ) ? self::getOption( $id ) : $default; //Getting option from wp_options
            
            $html .= "<label for='" . esc_attr( $prefix ) . "_input_" . esc_attr( $id ) . "'>" . esc_html__( $label, 'wc_beautifier' ) . "</label>";
            $html .= "<select name='data[" . esc_attr( $id ) . "]' class='" . esc_attr( $class_name ) . "'  id='{$prefix}_select_" . esc_attr( $id ) . "' {$placeholder}>";
                $options = $singleElement['options'];
                foreach( $options as $option_key=>$option_value ){
                   $selected = $option_key == $value ? 'selected' : '';
                   $html .= "<option value='" . esc_attr( $option_key ) . "' " . esc_attr( $selected ) . ">" . esc_html__( $option_value, 'wc_beautifier' ) . "</option>"; 
                }
            $html .= "</select>";
            
        }else{
            $html .= sprintf( esc_html__( "Sorry, The %s 's has no options Array.", 'wc_beautifier' ), $id );
        }
        return $html;
    }
    
    /**
     * set Form's method attribute. Default is POST
     * 
     * @param String $method method attribute
     */
    public static function setMethod( $method ){
        self::$method = $method;
    }
    
    /**
     * set Form's action attribute. Default is blank
     * 
     * @param type $action action attribute
     */
    public static function setAction( $action ){
        self::$action = $action;
    }
    
    /**
     * to set form's class. Remember: it will replace with form class
     * 
     * @param String $class it will replace with form class
     */
    public static function setClass( $class ){
        self::$class = $class;
    }
    
    /**
     * Add new class to form tag with existing class
     * 
     * @param String $class Add new class to form tag with existing class
     */
    public static function addClass( $class ){
        self::$class = self::$class . ' ' . $class;
    }
    
    /**
     * For each element wrapper, to set parent tab class, we have used this method.
     * 
     * @param type $tab_class setting tab class. we have used it in renderSingle() method
     */
    public static function setTabClass( $tab_class ){
        self::$tab_class = $tab_class;
    }
    
    /**
     * to set plugin's prefix. To this plugin, we set a default prefix 'wcb', but to use any other plugin, we can easily use this method to change prefix.
     * Remember: this prefix has used to all class name of form's everywhere.
     * 
     * @param String $prefix plugin's prefix, used in lot of place. 
     */
    public static function setPrefix( $prefix ){
        self::$prefix = $prefix;
    }
    
}