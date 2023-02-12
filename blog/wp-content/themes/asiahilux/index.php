<?php get_header() ?>
<style>
.pagination .page-numbers {
    background: #2e3192;
    margin: 0px 1px;
    padding: 5px 10px;
    color: #ffffff;
    text-transform: uppercase;
}
.pagination .page-numbers.current {
    background: #f7931e;
}
.pagination .page-numbers:hover {
    background: #f7931e;
    text-decoration: none;
}
</style>

<div class="col-md-12 col-sm-12" style="padding-top:140px; padding-bottom:50px">
	<div class="main-content">
	
	<div class="row">
	<div class="col-md-9 col-sm-9 w-80">
		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$data= new WP_Query(array(
		    'post_type'=>'post',
		    'posts_per_page' => 5,
		    'paged' => $paged,
		));

		if($data->have_posts()) :
    		while($data->have_posts())  : $data->the_post();
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
		
		<?php endwhile; ?>

		<div class="pagination">
		<?php 
	    $total_pages = $data->max_num_pages;

	    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
        	'post_type' => 'post',
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('prev'),
            'next_text'    => __('next'),
            'show_all' => 'true',
        ));
    } ?>
    </div>

	<?php else :?>
	<h3><?php _e('Post Not Found', ''); ?></h3>
	<?php endif; ?>
	<?php wp_reset_postdata();?>
	
	</div>
	<div class="col-md-3 col-sm-3 right-sidebar">
		<?php get_sidebar() ?>
	</div>
	</div>
	
	</div>
</div>

<?php get_footer() ?>