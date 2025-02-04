<?php
// handle dynamic Page Banner....  the_field('page_banner_subtitle')
function page_banner($args = NULL){
	if (!$args['title']){
		$args['title'] = get_the_title();
	}
	if (!$args['subtitle']){
		$args['subtitle'] = get_field('page_banner_subtitle');
	}
	if (!$args['photo']) {
		if (get_field('page_banner_background_image')) {
			$args['photo'] = get_field('page_banner_background_image')['sizes'] ['pageBanner'];
		}else{
			$args['photo'] = get_theme_file_uri('/images/ocean.jpg');
		}
	}

	?>
	<div class="page-banner">
		<div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
			<div class="page-banner__intro">
				<p><?php echo $args['subtitle'] ?></p>
			</div>
		</div>  
	</div>
<?php }
// The end....
function university_files() {
	wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyCczfPrVqyYOMYLWg9seB9KRWMKC9nRAd0', NULL, '1.0', true);
  wp_register_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), array('jquery'), '1.0', true);
  wp_enqueue_script( 'main-university-js' );
	wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('university_main_styles', get_stylesheet_uri(), NULL, microtime());
}

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_action('wp_enqueue_scripts', 'university_files');
function university_features() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('landscapeImage', 400, 260, true);
	add_image_size('portraitImage', 480, 650, true);
	add_image_size('pageBanner', 1500, 350, true);

	//....dynamic menu..
	// register_nav_menu('headerMenuLocation', 'Header Menu Location');
	// register_nav_menu('footerLocationOne', 'Footer Location One');
	// register_nav_menu('footerLocationTwo', 'Footer Location Two');
	// ...end......
}
add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query) {
// Campus Cutom Query to display 10 more campus on Map.
if(!is_admin() AND is_post_type_archive('campus') AND $query->is_main_query()){;
		$query->set('posts_per_page', -1);
	}

		// Program Custom Query..
	if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
		$query->set('posts_per_page', -1);
	}
		//Event Custom Query..
	if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
		$today =date('Ymd');
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
			array(
				'key' =>'event_date',
				'compare' => '>=',
				'value' => $today,
				'type' => 'numeric'
			)
		));
	}
}
add_action('pre_get_posts', 'university_adjust_queries');

function universityMapKey($api) {
  $api['key'] = 'AIzaSyCczfPrVqyYOMYLWg9seB9KRWMKC9nRAd0';
  return $api;
}
add_filter('acf/fields/google_map/api', 'universityMapKey');