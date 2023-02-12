
<div class="car-news">
	<div class="title">
		<h3>Asia Hilux Car News</h3>
	</div>
<div class="car-news-content">
<ul>
		<?php
		$BlogPost = new WP_Query('showposts=4');
		if($BlogPost->have_posts()) : 
		while ($BlogPost->have_posts()) : $BlogPost->the_post()?>
		<li>
			<div class="post-img">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>	
			</div>
			<div class="post-desc">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h6><?php the_title(); ?></h6></a>
				<span class="date"><?php echo get_the_date();?></span>
			</div>	
			<?php endwhile;
			endif; 
		?>
		</li>
	</ul>
</div>

</div>
	