<?php get_header() ?>

<div class="col-md-12 col-sm-12" style="padding-top:140px; padding-bottom:50px">
	<div class="main-content">
	
	<div class="row">
	<div class="col-md-9 col-sm-9 w-80">
		<?php 
			$arr=array('post_type'=>'post');
			$posts=get_posts($arr);
			foreach($posts as $post):setup_postdata($post);
		?>
		
		<div class="list-blog">
			<div class="row list-blog-row">
				<div class="col-md-4 col-sm-4">
				<div class="list-blog-img">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
					</a>
				</div>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="list-blog-content">
						<div class="blog-title">
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
						</div>
						
						<div class="post-meta">
							<div class="author"><span>By:</span> <?php the_author(); ?></div>
							<div class="date"><span>Date:</span> <?php echo get_the_date(); ?></div>
						</div>
						
						<div class="post-desc">
							<p><?php echo get_the_excerpt(); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php endforeach ?>
	</div>
	<div class="col-md-3 col-sm-3 right-sidebar">
		<?php get_sidebar() ?>
	</div>
	</div>
	
	</div>
</div>

<?php get_footer() ?>