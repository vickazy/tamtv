	<nav class="navbar navbar-default" id="sticky-navbar" style="background-color: white; margin-top: 0px;">
	  	<div class="container navbar-sticky">
	     	<div class="collapse navbar-collapse">
	    		<ul class="nav navbar-nav navbar-primary text-center">
	    			<li>
	    				<a href="" class="sticky-logo">
			      		<?php  
			    		/**
			    		 * Displayed small logo
			    		 * form table options 
			    		 *
			    		 * @param String (small_logo)
			    		 **/
			      		if( $this->options->get('small_logo', TRUE)->image )
			      			echo '<img src="'.$this->options->get('small_logo', TRUE)->image.'" alt="'.$this->options->get('small_logo', TRUE)->alt.'" class="main-logo">';
			      		?>
	    				</a>
	    			</li>
		    		<?php  
		    		/**
		    		 * Displayed Queries sticky_menu
		    		 *
		    		 * @param String (key)
		    		 * @param Integer (parent)
		    		 **/
		    		foreach( $this->menus->get('sticky_menu', NULL) as $row) 
		    		{
		    			if( $this->menus->get('sticky_menu', $row->ID) == FALSE)
		    			{
		    				echo '<li><a href="'.$row->url.'" target="'.$row->target.'">'.$row->label.'</a></li>';
		    			} else {
		    				echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$row->label.'
										<span class="caret"></span></a>';

							echo '<ul class="dropdown-menu">';

							foreach( $this->menus->get('sticky_menu', $row->ID) as $child)
							{
								echo '<li><a href="'.$child->url.'" target="'.$child->target.'">'.$child->label.'</a></li>';
							}

							echo '</ul></li>';
		    			}
		    		}
		    		?>
	    		</ul>
	     	</div>
	  	</div>
	</nav>
	
	<footer>
		<div class="container">	
			<div class="navigation-footer">	
				<ul class="navigation">
		    		<?php  
		    		/**
		    		 * Displayed Queries footer_menu
		    		 *
		    		 * @param String (key)
		    		 * @param Integer (parent)
		    		 **/
		    		foreach( $this->menus->get('footer_menu', NULL) as $row) 
		    		{
		    			echo '<li><a href="'.$row->url.'" target="'.$row->target.'">'.$row->label.'</a></li>';
		    		}
		    		?>
				</ul>
				<ul class="social-icon pull-right">
					<li><a href=""><img src="public/image/component/facebook.png" alt=""></a></li>
					<li><a href=""><img src="public/image/component/twitter.png" alt=""></a></li>
					<li><a href=""><img src="public/image/component/gplus.png" alt=""></a></li>
					<li><a href=""><img src="public/image/component/youtube.png" alt=""></a></li>
					<li><a href=""><img src="public/image/component/instagram.png" alt=""></a></li>
				</ul>
				<div class="col-xs-6">
					<p class="copyright"><small>Hak Cipta 2017 Tam TV Babel - Develop By <a href="">Teitra Mega</a></small></p>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?php echo base_url("public/theme/js/jquery-3.2.1.min.js"); ?>"></script>
	<script src="<?php echo base_url("public/bootstraps/js/bootstrap.min.js"); ?>"></script>
	<script src="<?php echo base_url("public/theme/js/less.min.js"); ?>"></script>
	<script src="<?php echo base_url("public/theme/js/main.js"); ?>"></script>
</body>
</html>