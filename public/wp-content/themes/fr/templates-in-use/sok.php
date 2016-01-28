<?php /* Template name: Søk */ get_header(); ?>
	<main role="main" class="contentfield">
		<div class="parent">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<div class="topheader">
					<h1><?php the_title(); ?></h1>
					<h3><?php the_excerpt(); ?></h3>
					<hr class="short-hr"/>
				</div>
				<?php
					the_post();
					$thispage=$post->ID;
				}
			} ?>
			
		</div>
		<!-- <div class="parent-content">
			<?php if ( have_posts() ) {  /* Query and display the parent. */
				while ( have_posts() ) { ?>
				<?php
					the_post();
					the_content();
					$thispage=$post->ID;
				}
			}
			?>
		</div> -->
		<!-- section -->
		<section class="sok">
			<div id="page">
		    	    
		    	    <form id="searchForm" method="post">
		    			<fieldset id="sok">
		    	        
		    	           	<input id="s" type="text" />
		    	            
		    	            <input type="submit" value="Submit" id="submitButton" />
		    	            
		    	            <div id="searchInContainer">
		    	                <input type="radio" name="check" value="site" id="searchSite" checked />
		    	                <label for="searchSite" id="siteNameLabel">Søk</label>
		    	                
		    	                <input type="radio" name="check" value="web" id="searchWeb" />
		    	                <label for="searchWeb">Søk på Internett</label>
		    				</div>
		    	                        
		    	            <ul class="icons">
		    	                <li class="web" title="Web Search" data-searchType="web">Internett</li>
		    	                <li class="images" title="Image Search" data-searchType="images">Bilder</li>
		    	                <li class="news" title="News Search" data-searchType="news">Nyheter</li>
		    	                <li class="videos" title="Video Search" data-searchType="video">Videoer</li>
		    	            </ul>
		    	            
		    	        </fieldset>
		    	    </form>
		    
	    	    <div id="resultsDiv"></div>
		    	    
	    	</div>'
		</section>
		<div class="clear"></div>
		<!-- /section -->
		
	</main>
<?php get_footer(); ?>
