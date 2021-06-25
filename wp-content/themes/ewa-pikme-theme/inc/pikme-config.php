<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    //----------------------------------------------------------------------
    // Remove Redux Framework NewsFlash
    //----------------------------------------------------------------------
    if (!class_exists('reduxNewsflash')):

        class reduxNewsflash {

            public function __construct($parent, $params) {
                
            }

        }

    endif;

    //----------------------------------------------------------------------
    // Remove Redux Framework Ads
    //----------------------------------------------------------------------
    add_filter('redux/pikmewp_options/aURL_filter', '__return_empty_string');

    // This is your option name where all the Redux data is stored.
    $opt_name = "pikmewp_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'PikMe Options', 'ewa-pikme-theme' ),
        'page_title'           => esc_html__( 'PikMe Options', 'ewa-pikme-theme' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // move the option page under appearance
        'page_type'            => 'submenu',
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url' => esc_url('https://www.facebook.com/essentialwebapp'),
        'title' => esc_html__('Like us on Facebook', 'ewa-pikme-theme'),
        'icon' => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url' => esc_url('https://www.youtube.com/channel/UCKWWrhq3GlJNK5Ehl1wkRIg'),
        'title' => esc_html__('Subscribe us on Youtube', 'ewa-pikme-theme'),
        'icon' => 'el el-youtube'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong>', 'ewa-pikme-theme' ), $v );
    } else {
        $args['intro_text'] = __( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'ewa-pikme-theme' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'ewa-pikme-theme' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'ewa-pikme-theme' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'ewa-pikme-theme' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'ewa-pikme-theme' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'ewa-pikme-theme' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */


    // My Code Start Here
    
    //Header Section
    Redux::setSection($opt_name, array(
        'icon' => 'el el-website',
        'title' => esc_html__('Header', 'ewa-pikme-theme'),
    ));

    //Header Logo
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header Logo', 'ewa-pikme-theme' ),
        'icon'   => 'el el-website',
        'subsection' => true,
        'fields' => array(
            // Header Logo
            array(
                'id'       => 'header-logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Header Logo', 'ewa-pikme-theme' )
            )
        )
    ));
    
    //Footer Section 
    Redux::setSection($opt_name, array(
        'icon' => 'el el-website',
        'title' => esc_html__('Footer', 'ewa-pikme-theme'),
    ));

    // Footer Copyright
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer Copyright', 'ewa-pikme-theme' ),
        'icon'   => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            // Footer Copyright
            array(
                'id'       => 'footer-copyright',
                'type'     => 'editor',
                'title'    => esc_html__( 'Footer Copyright', 'ewa-pikme-theme' )
            )
        )
    ));

    // Footer Social
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer Social', 'ewa-pikme-theme' ),
        'icon'   => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            // Footer Facebook
            array(
                'id'       => 'footer-facebook',
                'placeholder' => 'https://www.facebook.com',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook Link', 'ewa-pikme-theme' )
            ),
            // Footer Twitter
            array(
                'id'       => 'footer-twitter',
                'placeholder' => 'https://www.twitter.com',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter Link', 'ewa-pikme-theme' )
            ),
            // Footer Instagram
            array(
                'id'       => 'footer-instagram',
                'type'     => 'text',
                'placeholder' => 'https://www.instagram.com',
                'title'    => esc_html__( 'Instagram Link', 'ewa-pikme-theme' )
            ),
            // Footer Linkedin
            array(
                'id'       => 'footer-linkedin',
                'type'     => 'text',
                'placeholder' => 'https://www.linkedin.com',
                'title'    => esc_html__( 'Linkedin Link', 'ewa-pikme-theme' )
            )
        )
    ));


    //Styling Options 
    Redux::setSection($opt_name, array(
        'icon' => 'el el-website',
        'title' => esc_html__('Styling Options'), 'ewa-pikme-theme',
    )); 

    // Navbar Styling
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Navbar Styling', 'ewa-pikme-theme' ),
        'icon'   => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            // Navbar Color
            array(
                'id'       => 'navbar-color',
                'type'     => 'color',
                'output'   => array('.site-header__nav ul li a'),
                'default'  => '#333', 
                'title'    => esc_html__( 'Navbar Color', 'ewa-pikme-theme' )
            ),
             // Navbar Hover Color
             array(
                'id'       => 'navbar-hover-color',
                'type'     => 'color',
                'output'   => array('.site-header__nav ul li a:hover, .site-header__nav ul li.current a'),
                'default'  => '#f75958', 
                'title'    => esc_html__( 'Navbar Hover Color', 'ewa-pikme-theme' )
            ),
        )
    ));

     // Blog Styling
     Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog Styling', 'ewa-pikme-theme' ),
        'icon'   => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            // Blog Meta Color
            array(
                'id'       => 'blog-meta-color',
                'type'     => 'link_color',
                'output'   => array('.archive .entry-meta a, .blog .entry-meta a, .page-template-page-blog .entry-meta a, .single .entry-meta a'),
                'default'  => array(
                    'regular'  => '#6e7373', 
                    'hover'    => '#f75958'
                ),
                'title'    => esc_html__( 'Blog Meta Color', 'ewa-pikme-theme' )
            ),
            
            // Blog Separator Color
            array(
                'id'       => 'blog-author-color',
                'type'     => 'background',
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-image'      => false,
                'background-size'       => false,
                'output'   => array('.author:after, .cat-links:after'),
                'default'  => '#6e7373 !important',
                'title'    => esc_html__( 'Blog Separator Color', 'ewa-pikme-theme' )
            ),
            // Blog Title Color
            array(
                'id'       => 'blog-title-color',
                'type'     => 'link_color',
                'output'   => array('.archive .entry-title a, .blog .entry-title a, .page-template-page-blog .entry-title a, #secondary .widget ul li a'),
                'default'  => array(
                    'regular'  => '#333', 
                    'hover'    => '#f75958'
                ),
                'title'    => esc_html__( 'Blog Title Color', 'ewa-pikme-theme' )
            ),

            // Blog Title Border Color
            array(
                'id'       => 'blog-title-border-color',
                'type'     => 'border',
                'output'   => array('#secondary .widget-title'),
                'default'  => array(
                    'border-color'  => '#dfdfdf', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '3px', 
                    'border-left'   => '0'
                ),
                'title'    => esc_html__( 'Blog Title Border Color', 'ewa-pikme-theme' )
            ),

            // Blog Button Text Color
            array(
                'id'       => 'blog-button-text-color',
                'type'     => 'link_color',
                'output'   => array('.blog__link'),
                'default'  => array(
                    'regular'  => '#333', 
                    'hover'    => '#fff'
                ),
                'title'    => esc_html__( 'Blog Button Text Color', 'ewa-pikme-theme' )
            ),
            // Blog Button Hover Background Color
            array(
                'id'       => 'blog-button-hover',
                'type'     => 'background',
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-image'      => false,
                'background-size'       => false,
                'output'   => array('.blog__link:hover'),
                'default'  => '#f75958',
                'title'    => esc_html__( 'Blog Button Hover', 'ewa-pikme-theme' )
            ),
            // Blog Button Border Color
            array(
                'id'       => 'blog-button-border-color',
                'type'     => 'border',
                'output'   => array('.blog__link'),
                'default'  => array(
                    'border-color'  => '#f75958', 
                    'border-style'  => 'solid', 
                    'border-top'    => '1px', 
                    'border-right'  => '1px', 
                    'border-bottom' => '1px', 
                    'border-left'   => '1px'
                ),
                'title'    => esc_html__( 'Blog Button Border Color', 'ewa-pikme-theme' )
            ),
             // Blog Sidebar Title Color
             array(
                'id'       => 'blog-sidebar-title-color',
                'type'     => 'link_color',
                'output'   => array('#secondary .widget-title'),
                'default'  => array(
                    'regular'  => '#333', 
                    'hover'    => '#fff'
                ),
                'title'    => esc_html__( 'Blog Sidebar Title Color', 'ewa-pikme-theme' )
            ),
            // Blog Sidebar Background Color
            array(
                'id'       => 'blog-sidebar-background',
                'type'     => 'background',
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-image'      => false,
                'background-size'       => false,
                'output'   => array('#secondary .widget'),
                'default'  => '#f9fafb',
                'title'    => esc_html__( 'Blog Sidebar Background', 'ewa-pikme-theme' )
            ),
             // Blog Sidebar Button Color
             array(
                'id'       => 'blog-sidebar-button-color',
                'type'     => 'link_color',
                'output'   => array('#secondary .search-submit, .form-submit input'),
                'default'  => array(
                    'regular'  => '#fff', 
                    'hover'    => '#fff'
                ),
                'title'    => esc_html__( 'Blog Sidebar Button Color', 'ewa-pikme-theme' )
            ),
            // Blog Sidebar Button Background Color
            array(
                'id'       => 'blog-sidebar-button-background',
                'type'     => 'background',
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-image'      => false,
                'background-size'       => false,
                'output'   => array('#secondary .search-submit, .form-submit input'),
                'default'  => '#f75958',
                'title'    => esc_html__( 'Blog Sidebar Button Background', 'ewa-pikme-theme' )
            ),
        )
    ));

    // Breadcumb Styling
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcumb Styling', 'ewa-pikme-theme' ),
        'icon'   => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            // Breadcumb Background Color
            array(
                'id'       => 'breadcumb-background-color',
                'type'     => 'background',
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-image'      => false,
                'background-size'       => false,
                'output'   => array('.mend-breadcumbs'),
                'default'  => array('background-color'=>'#f75958'),
                'title'    => esc_html__( 'Breadcumb Background Color', 'ewa-pikme-theme' )
            ),
            // Breadcumb Title Color
            array(
                'id'       => 'breadcumb-title-color',
                'type'     => 'color',
                'output'   => array('.mend-breadcumbs .page-title'),
                'default'  => '#fff',
                'title'    => esc_html__( 'Breadcumb Title Color', 'ewa-pikme-theme' )
            )
        )
    ));

    // Footer Styling
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer Styling', 'ewa-pikme-theme' ),
        'icon'   => 'el el-photo',
        'subsection' => true,
        'fields' => array(
            // Footer Background
            array(
                'id'       => 'footer-background',
                'type'     => 'background',
                'output'   => array('#site-footer'),
                'default'  => array('background-color'=>'#333'),
                'title'    => esc_html__( 'Footer Background', 'ewa-pikme-theme' )
            ),      
            // Footer Social Link Color
            array(
                'id'       => 'social-link-color',
                'type'     => 'link_color',
                'output'   => array('.footer-icon a'),
                'default'  => array(
                    'regular'  => '#fff', 
                    'hover'    => '#f75958'
                ),
                'title'    => esc_html__( 'Social Link Color', 'ewa-pikme-theme' )
            ),
            // Footer Copyright Text Color
            array(
                'id'       => '.copyright',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Text Color', 'ewa-pikme-theme'),
                'output'   => array('.copyright'),
                'default'  => '#fff',
            ),
            // Footer Scroll to Top Color
            array(
                'id'       => 'footer-scroll-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Scroll to Top Color', 'ewa-pikme-theme'),
                'output'   => array('#return-to-top span'),
                'default'  => '#fff',
            ),
            // Footer Scroll to Top Background
            array(
                'id'       => 'footer-scroll-background',
                'type'     => 'background',
                'background-image'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-image'      => false,
                'background-size'       => false,
                'output'   => array('#return-to-top'),
                'default'  => array('background-color'=>'#f75958'),
                'title'    => esc_html__( 'Footer Scroll to Top Background', 'ewa-pikme-theme'),
            )
        )
    ));

   // My Code End Here

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => esc_html__( 'Documentation', 'ewa-pikme-theme' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'ewa-pikme-theme' ),
                'desc'   => esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'ewa-pikme-theme' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

