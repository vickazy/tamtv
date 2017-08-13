<div class="container content-wrapper">
	<div class="col-xs-12 single-content">
		<h4>Hasil pencarian "<strong><?php echo $this->query; ?></strong>"</h4>
		<form action="<?php echo current_url(); ?>" method="get">
		<?php echo form_hidden('q', $this->query); ?>
		<div class="box-searching">
			<select name="order" class="input-sm col-md-2 form">
			   	<option value="latest">Terbaru</option>
			   	<option value="relevance">Relevansi</option>
			   	<option value="popular">Terpopuler</option>
			</select>
			<select name="category" class="input-sm col-md-3 form">
			   	<option value="">Semua Kategori</option>
				<?php 
				/**
				 * et All Category 
				 *
				 **/
				foreach($this->category->getall() as $row) 
				{
					$selected = ($this->input->get('category')==$row->category_id) ? 'selected' : NULL;
					echo '<option value="'.$row->category_id.'" '.$selected.'>'.$row->name.'</option>';
				}
				?>
			</select>
			<input type="text" class="col-md-2 input-sm form" name="from_date" placeholder="2000-03-23">
			<input type="text" class="col-md-2 input-sm form" name="to_date" placeholder="2000-03-23">
			<div class="col-md-2">
				<button class="btn btn-primary btn-sm">Cari Berita</button>
			</div>
		</div>
		</form>
	</div>
	<div class="col-xs-8 single-content">
		<div class="box-big-loop" itemscope itemtype="http://schema.org/Article">
			<?php  
			/**
			 * Get Latest Post
			 *
			 * @param String (post_type)
			 * @param Integer (limit)
			 * @param Integer (offset)
			 **/
			foreach($contents as $post) :
			?>
			<div class="big-loop-item">
				<a href="<?php echo $this->posts->permalink($post->ID) ?>" title="<?php echo $post->post_title; ?>">
					<img src="<?php echo $this->posts->get_thumbnail($post->image, 'small'); ?>" alt="<?php echo $post->post_title; ?>" class="img-responsive">
				</a>
				<div class="item-content">
				<?php  
				/**
				 * Get Post Categories
				 *
				 * @param String (category_id)
				 **/
				$category = $this->posts->get_post_category($post->ID);

				if( $category ) 
					echo anchor(
							base_url("kategori/{$category->slug}"), 
							'<span class="category-title">'.$category->name.'</span>', 
							array('titel' => $category->name)
						);
				?>
					<time class="timeago" datetime="<?php echo $post->post_date; ?>"></time>
					<h4 class="item-heading">
						<a href="<?php echo $this->posts->permalink($post->ID) ?>" title="<?php echo $post->post_title; ?>">
							<?php echo $post->post_title; ?>
						</a>
					</h4>
					<p><?php echo strip_tags(word_limiter($post->post_content, 10)) ?></p>
				</div>
			</div>
			<?php endforeach; ?>
			<div class="text-center">
				<?php if($contents) echo $this->pagination->create_links(); ?>
			</div>
		</div>
		<?php if(!$contents ) : ?>
		<p><i class="fa fa-warning"></i> Maaf, kami tidak menemukan pencarian <strong><mark>dg</mark></strong> yang Anda lakukan</p>
		<p>Coba ulangi dengan cara :</p>
		<ul>
			<li>Memeriksa kesalahan penulisan</li>
			<li>Menggunakan kata yang lebih umum</li>
			<li>Mengurangi jumlah kata kunci</li>
			<li>Mengganti kata kunci.</li>
		</ul>
		<?php endif; ?>
	</div>


		
<?php
/* End of file search.php */
/* Location: ./application/views/pages/search.php */