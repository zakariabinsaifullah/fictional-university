<?php 
get_header();
while(have_posts()) {
	the_post();
	page_banner();
	?>
	<div class="container container--narrow page-section">

		<div class="metabox metabox--position-up metabox--with-home-link">
			<p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Capmuses</a> <span class="metabox__main"><?php the_title()?></span></p>
		</div>
		<div class="generic-content">
			<?php 
			the_content();
			?>
		</div>
		<div class="acf-map">
			<?php $mapLocation = get_field('map_location');?>
			<div class="marker" data-lat='<?php echo $mapLocation['lat'] ?>' data-lng='<?php echo $mapLocation['lng'] ?>'>
				<h3><?php the_title(); ?></h3>
				<?php echo $mapLocation['address']; ?>
			</div>
		</div>
		<?php
		wp_reset_postdata();
			// handle related programs
		$relaedPrograms = new WP_Query(array(
			print_r($relaedPrograms),
			'posts_per_page' => -1,
			'post_type' => 'program',
			'orderby' => 'title',
			'order' => 'ASC',
			'meta_query' => array(
				array(
					'key' =>'related_campus',
					'compare' => 'LIKE',
					'value' => '"' . get_the_ID() .'"'
				)
			)
		));
		if ($relaedPrograms->have_posts() ) {
			echo '<hr class="section-break"/>';
			echo '<p class="headline headline--medium">Program Availabe At This Campus<p>';
			echo '<ul class="min-list link-list">';
			while ($relaedPrograms->have_posts()) {
				$relaedPrograms->the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>">
						<?php the_title() ?>
					</a>
				</li>
			<?php }
			echo '</ul>';
		}
		wp_reset_postdata();
            // // handle related campus events
		$today =date('Ymd');
		$campusRelatedEvents = get_field('related_events');
		if ($campusRelatedEvents) {
			echo '<hr class="section-break"/>';
			echo '<p class="headline headline--medium">Upcoming ' . get_the_title() . ' Events<p>';
			echo '<ul class="min-list link-list">';
			foreach ($campusRelatedEvents as $campusEvent) {
			?> <li><a href="<?php echo get_the_permalink($campusEvent) ?>"><?php echo get_the_title($campusEvent) ?></a></li>
			<?php
			get_template_part('template/content', get_post_type() );
		}
		echo '</ul>';
	}
	?>
</div>
<?php }
get_footer();
?>