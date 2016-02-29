<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('full', 1270, '', true); // Full content width
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('spotlight', 300, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
 //    add_theme_support('custom-background', array(
	// 'default-color' => 'FFF',
	// 'default-image' => get_template_directory_uri() . '/img/bg.jpg'
 //    )); 

    // Add Support for Custom Header - Uncomment below if you're going to use
 //    add_theme_support('custom-header', array(
	// 'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	// 'header-text'			=> false,
	// 'default-text-color'		=> '000',
	// 'width'				=> 1000,
	// 'height'			=> 198,
	// 'random-default'		=> false,
	// 'wp-head-callback'		=> $wphead_cb,
	// 'admin-head-callback'		=> $adminhead_cb,
	// 'admin-preview-callback'	=> $adminpreview_cb
 //    ));

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Heartwood navigation
function header_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-navigation',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
function footer_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-navigation',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

// Load Heartwood scripts (header.php)
function heartwood_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!


    }
}

// Load Heartwood scripts (footer.php)
function heartwood_footer_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('bundle', get_template_directory_uri() . '/js/bundle.js', array(), '1.0.0');
        wp_enqueue_script('bundle'); 
        wp_register_script('gapiClient', get_template_directory_uri() . '/js/gapiClient.js', array(), '1'); // Conditionizr
        wp_enqueue_script('gapiClient'); // Enqueue it!
        wp_register_script('gapi', 'https://apis.google.com/js/client.js?onload=gapiOnLoadCallback', array(), '1');
        wp_enqueue_script('gapi'); 
        

    }
}

// Load Heartwood conditional scripts
function heartwood_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load Heartwood styles
function heartwood_styles()
{

    wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Merriweather:400,700', array(), '1.0', 'all' );
    wp_enqueue_style('fonts'); // Enqueue it!

    // wp_register_style('normalize', get_template_directory_uri() . '/styles/css/normalize.css', array(), '1.0', 'all');
    // wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('heartwood', get_template_directory_uri() . '/styles/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('heartwood'); // Enqueue it!
}

// Register Heartwood Navigation
function register_heartwood_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-navigation' => __('Header Navigation', 'heartwood'), // Main Navigation
        'footer-navigation' => __('Fat Footer Navigation', 'heartwood'), // Footer Navigation
        'sidebar-menu' => __('Sidebar Menu', 'heartwood'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'heartwood') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Page Sidebar Widgets', 'heartwood'),
        'description' => __('Content that appears along the right of Pages', 'heartwood'),
        'id' => 'page-sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

  
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function hw_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function hw_index($length) // Create 55 Word Callback for Index page Excerpts, call using hw_excerpt('hw_index');
{
    return 75;
}

// Create 40 Word Callback for Custom Post Excerpts, call using hw_excerpt('hw_custom_post');
function hw_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function hw_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}



// Custom View Article link to Post
function hw_blank_view_article($more)
{
    global $post;
    return '... <a class="read-more" href="' . get_permalink($post->ID) . '"><span class="icon"></span>' . __('Read More', 'heartwood') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function heartwoodgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function heartwoodcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

// function five_posts_on_homepage( $query ) {
//     if ( $query->is_home() && $query->is_main_query() ) {
//         $query->set( 'posts_per_page', 3 );
//     }
// }
// add_action( 'pre_get_posts', 'five_posts_on_homepage' );

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'heartwood_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_footer', 'heartwood_footer_scripts'); 
add_action('wp_print_scripts', 'heartwood_conditional_scripts'); // Add Conditio
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'heartwood_styles'); // Add Theme Stylesheet
add_action('init', 'register_heartwood_menu'); // Add Heartwood Menu
add_action('init', 'create_post_type_splash'); // Add our Heartwood Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'hw_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'heartwoodgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'hw_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_splash()
{
    $prefix = 'heartwood';
    register_taxonomy_for_object_type('category', $prefix); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', $prefix);
    register_post_type('splash_page', // Register Custom Post Type
        array(
        'description' => __('Testing description', $prefix),
        'labels' => array(
            'name' => __('Splash Pages', $prefix), // Rename these to suit
            'singular_name' => __('Splash Page', $prefix),
            'add_new' => __('Add New', $prefix),
            'add_new_item' => __('Add New Item', $prefix),
            'edit' => __('Edit', $prefix),
            'edit_item' => __('Edit Splash Page', $prefix),
            'new_item' => __('New Splash Page', $prefix),
            'view' => __('View Splash Page', $prefix),
            'view_item' => __('View Splash Page', $prefix),
            'search_items' => __('Search Splash Page', $prefix),
            'not_found' => __('No Heartwood Splash Pages found', $prefix),
            'not_found_in_trash' => __('No Heartwood Splash Pages found in Trash', $prefix)
        ),
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        // 'supports' => array(
        //     'title',
        //     'editor',
        //     'excerpt',
        //     'thumbnail'
        // ), // Go to Dashboard Custom Heartwood post for supports
        'can_export' => false, // Allows export in Tools > Export
        // 'taxonomies' => array(
        //     'post_tag',
        //     'category'
        // ) // Add Category and Post Tags support
    ));
}

function hw_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Test Meta Box', 'textdomain' ),
        'post_types' => 'splash_page',
        'fields'     => array(
            array(
                'id'   => 'name',
                'name' => __( 'Name', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'      => 'gender',
                'name'    => __( 'Gender', 'textdomain' ),
                'type'    => 'radio',
                'options' => array(
                    'm' => __( 'Male', 'textdomain' ),
                    'f' => __( 'Female', 'textdomain' ),
                ),
            ),
            array(
                'id'   => 'email',
                'name' => __( 'Email', 'textdomain' ),
                'type' => 'email',
            ),
            array(
                'id'   => 'bio',
                'name' => __( 'Biography', 'textdomain' ),
                'type' => 'textarea',
            ),
        ),
    );
    return $meta_boxes;
}
//

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function heartwood_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function heartwood_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

add_filter( 'rwmb_meta_boxes', 'hw_meta_boxes' ); 
?>
