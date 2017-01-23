<?php
get_header(); ?>

<div class="container">
	<?php if(is_shop() || is_product_category()){
		?>
		<div class="row clearfix">
			<div class="col-md-3">
				<div class="left-sidebar">
					<h6>Categories:</h6>
						<ul class="alt-sub-heading shop-cat">
							<li class="active"><a href="<?php echo site_url();?>/shop">All</a></li>
							<?php 
							$terms = get_terms( array(
								'taxonomy' => 'product_cat',
								'hide_empty' => false,
							) ); 
							foreach($terms as $term){
								$term_get = get_term_link($term);
								echo '<li><a href="'.$term_get.'">'.$term->name.'</a></li>';
							}
							?>
						</ul>
				</div>
			</div>
			<div class="col-md-9">
				<?php woocommerce_content();?>
			</div>
		</div>
	<?php }else{
		woocommerce_content();
	}?>
	
</div>
<?php get_footer();?>
