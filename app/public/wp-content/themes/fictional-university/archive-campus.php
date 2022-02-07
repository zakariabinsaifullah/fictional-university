<?php
get_header(); 
page_banner(array(
	'title' => 'All Campuses',
	'subtitle' => 'Our Campuses Is The Best Thing We Have.'
))
?>
<div class="container container--narrow page-section">
	<div class="acf-map">
		<?php
		while (have_posts()) {
			the_post();
			$mapLocation = get_field('map_location');
			 ?>
			<div class="marker" data-lat='<?php echo $mapLocation['lat'] ?>' data-lng='<?php echo $mapLocation['lng'] ?>'>
				 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				 <?php echo $mapLocation['address']; ?>
			</div>
		<?php } 
		?>
	</div>
	<hr class='section-break'/>
	<div>
		<?php get_footer();
	?>