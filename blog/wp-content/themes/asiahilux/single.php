<?php get_header() ?>

<div class="col-md-12 col-sm-12 mt-120">
	<div class="main-content blog-detail-page">
	
	<div class="row">
	<div class="col-md-9 col-sm-9 w-80">
		<?php
			if(have_posts()){
				while(have_posts()){
					the_post(); ?>	
			
		<div class="list-blog">
			<div class="row list-blog-row">
				<div class="col-md-12 col-sm-12">
				<div class="list-blog-img">
					<?php the_post_thumbnail(); ?>
				</div>
				</div>
				<div class="col-md-12 col-sm-12">
					<div class="list-blog-content">
						<div class="blog-title">
							<h4><?php the_title(); ?></h4>
						</div>
						
						<div class="post-meta">
							<div class="author"><span>By:</span> <?php the_author(); ?></div>
							<div class="date"><span>Date:</span> <?php the_date(); ?></div>
						</div>
						
						<div class="post-desc">
							<p><?php the_content(); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			<?php }} ?>
		
	</div>
	
	<div class="col-md-3 col-sm-3 right-sidebar">
		<?php get_sidebar() ?>
	</div>
	</div>
	
	</div>
</div>

<?php get_footer() ?>