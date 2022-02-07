<?php
get_header(); 
page_banner(array(
	'title' => 'All Events',
	'subtitle' => 'See What Is Going On In Our University.'
))
?>
<div class="container container--narrow page-section">
	<?php
	while (have_posts()) {
		the_post(); 
		get_template_part('template/content', get_post_type() );
	} 
	echo paginate_links();
	?>

	<hr class='section-break'/>

	<p>Want to know about Past Events? <a href="<?php echo site_url('/past-events') ?>">Check out Our Past events archive</a></p>
	<div>

		<?php get_footer();

	?>