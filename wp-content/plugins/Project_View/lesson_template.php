<?php
 /*Template Name: Project Page Template
 */
 
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    <?php  global $full_mb;
      		 $techniquemeta = $full_mb->the_meta(); 
			 
	$terms = get_the_terms( $post->ID, 'lessons' );

		$varlesson = array();
	foreach ( $terms as $term ) {
		$varlesson[] = $term->name;
	};
				
		$current_terms = join( ", ", $varlesson );
	
        $parentpost = array(
 		   		'post_type' => 'project_views',
 				'lessons' => $current_terms,
 				'posts_per_page' => 1,			
 					);
		
					?>
 <style type="text/css">
 .lessontop {
	 <?php $backgroundimage = $techniquemeta['backgroundimage']; 
	if ( NULL == $backgroundimage){ ?>
		background-image: url('<?php echo plugins_url() ?>/Project_View/projectdefaultbg.png');
		<?php } else {?> 
		background-image: url('<?php echo $backgroundimage ?>');	
			<?php }; ?>
	
	 background-color:<?php echo $techniquemeta['color']?> !important;
	 background-repeat:no-repeat;
	 background-position:right -75px;
	 <?php echo $techniquemeta['bgadjustments']?>
 }
 </style>
	<div class="lessontop">

		    
			   
				   
				   <?php if('Anyone' == $techniquemeta['access']) { ?>
					   <div class="content lessonview clearfix row-fluid">
						   <?php $forwardimg = plugins_url().'/Project_View/forwardarrow.png';
						   		$backimg = plugins_url().'/Project_View/backarrow.png' ?>
	
					   	<div class="clearfix homepage rawr main" role="main">
   				  		 <div class="backarrow"><?php be_previous_post_link('%link', '<img src="'.$backimg.'" alt="Previous" />', true, '', 'lessons') ?></div>
				 		 <div class="forwardarrow"><?php be_next_post_link('%link', '<img src="'.$forwardimg.'" alt="Next" />', true, '', 'lessons') ?></div>
							
					   	   <div style="display:block">
					     		 <div style="display:block;overflow:hidden;max-width:800px;margin:auto;">
					   <div class="js-video [vimeo, widescreen]">
						   <div class="newbutton2">
							   <p><b>Way to go! </b>That was the last lesson in this section.</p>
							  <a class="btn btn-large btn-custom" href="<?php bloginfo('url'); ?>/training"> Find more lessons!</a>
						  </div>
						   <div class="newbutton">
							   <p><b>Looking good!</b> The Next Lesson is...</p>
							  <div class="nolink btn btn-large btn-custom"><?php be_next_post_link('%link', '%title &raquo;', true, '', 'lessons') ?></div>
						   </div>
					   <iframe id="main_video" src="http://player.vimeo.com/video/<?php echo $techniquemeta['vidembed']?>?api=1&amp;player_id=main_video" width="700" height="438" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  
		   		</div>
			</div>
		</div>
		
	</div>
	
</div>
</div>
<div class="content lessonview clearfix row-fluid">
	
	<div class="clearfix homepage rawr" role="main">
	   <div style="display:block">
  		 <div style="text-align:right;display:block;overflow:hidden;max-width:800px;margin:auto;margin-bottom: 56px;border-bottom: 1px solid #ddd;padding-bottom: 15px;">
			 <div class="titlewrap">
		   		<div class="lessontitle"><?php echo the_title()?></div>
  		       <?php $loop = new WP_Query( $parentpost );
  				 while ( $loop->have_posts() ) : $loop->the_post();
		
  				?>
	   
  			<a class="nounderline" href="<?php echo get_permalink() ?>"><p class="returnproject">Back to the Course: <?php the_title()?></p></a>
	 
         <?php endwhile;   wp_reset_query();?>
	 </div>
		   		 <div class="downloadfileset"><a style="font-weight:bold" class="nounderline" href="<?php echo $techniquemeta['filesets']?>"> Download the Exercise Fileset</a> </div>

		   	 </div>
		 
		   	 <script>
		   	 jQuery(document).ready( function(){
		   		 jQuery('.leftalert:empty, .rightalert:empty').hide();
		 
		   	 });
		   	 </script>
		 
		 
		
		   			 </div>
					   <?php } elseif('Free' == $techniquemeta['access']) {?> 
					   
					   <?php
					   		if(pmpro_hasMembershipLevel(array(1,2,3,4,5,6,7)))
					   	{
					   	?>
						<!-- Free and Has Free Membership -->
 					   <div class="content lessonview clearfix row-fluid">
 						   <?php $forwardimg = plugins_url().'/Project_View/forwardarrow.png';
 						   		$backimg = plugins_url().'/Project_View/backarrow.png' ?>
	
 					   	<div class="clearfix homepage rawr main" role="main">
    				  		 <div class="backarrow"><?php be_previous_post_link('%link', '<img src="'.$backimg.'" alt="Previous" />', true, '', 'lessons') ?></div>
 				 		 <div class="forwardarrow"><?php be_next_post_link('%link', '<img src="'.$forwardimg.'" alt="Next" />', true, '', 'lessons') ?></div>
							
 					   	   <div style="display:block">
 					     		 <div style="display:block;overflow:hidden;max-width:800px;margin:auto;">
 					   <div class="js-video [vimeo, widescreen]">
 						   <div class="newbutton2">
 							   <p><b>Way to go! </b>That was the last lesson in this section.</p>
 							  <a class="btn btn-large btn-custom" href="<?php bloginfo('url'); ?>/training"> Find more lessons!</a>
 						  </div>
 						   <div class="newbutton">
 							   <p><b>Looking good!</b> The Next Lesson is...</p>
 							  <div class="nolink btn btn-large btn-custom"><?php be_next_post_link('%link', '%title &raquo;', true, '', 'lessons') ?></div>
 						   </div>
 					   <iframe id="main_video" src="http://player.vimeo.com/video/<?php echo $techniquemeta['vidembed']?>?api=1&amp;player_id=main_video" width="700" height="438" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  
 		   		</div>
 			</div>
 		</div>
		
 	</div>
	
 </div>
 </div>
 <div class="content lessonview clearfix row-fluid">
	
 	<div class="clearfix homepage rawr" role="main">
 	   <div style="display:block">
   		 <div style="text-align:right;display:block;overflow:hidden;max-width:800px;margin:auto;margin-bottom: 56px;border-bottom: 1px solid #ddd;padding-bottom: 15px;">
 			 <div class="titlewrap">
 		   		<div class="lessontitle"><?php echo the_title()?></div>
   		       <?php $loop = new WP_Query( $parentpost );
   				 while ( $loop->have_posts() ) : $loop->the_post();
		
   				?>
	   
   			<a class="nounderline" href="<?php echo get_permalink() ?>"><p class="returnproject">Back to the Course: <?php the_title()?></p></a>
	 
          <?php endwhile;   wp_reset_query();?>
 	 </div>
 		   		 <div class="downloadfileset"><a style="font-weight:bold" class="nounderline" href="<?php echo $techniquemeta['filesets']?>"> Download the Exercise Fileset</a> </div>

 		   	 </div>
		 
 		   	 <script>
 		   	 jQuery(document).ready( function(){
 		   		 jQuery('.leftalert:empty, .rightalert:empty').hide();
		 
 		   	 });
 		   	 </script>
		 
		 
		
 		   			 </div>
 	     		      
						
						
						<?php } else {?>
							<!-- Free but doesn't have any membership -->
							 <div class="content lessonview clearfix row-fluid">
							 	<div class="clearfix homepage rawr noaccesslesson main" role="main">
				 	   		       <?php $loop = new WP_Query( $parentpost );
				 	   				 while ( $loop->have_posts() ) : $loop->the_post();
		
				 	   				?>
	   
									<h3><?php the_title()?></h3>
							<?php endwhile;   wp_reset_query();?>
		 	   		   
							<h1><?php the_title()?></h1>
 		 	   		       <?php $loop = new WP_Query( $parentpost );
 		 	   				 while ( $loop->have_posts() ) : $loop->the_post();
 			         		 $projectmeta = $project_mb->the_meta();
 							 $demoid = $projectmeta['bestexample']
							 
 							 ?>
							<img width="150" height="150" src="<?php echo $projectmeta['projectimage'] ?>">
							<p>This lesson is totally free.<br> Simply sign up for a SolidWize Free Plan and enjoy!</p>
<a href="<?php bloginfo('url'); ?>/pricing" class="btn btn-large btn-success">Get Started for Free </a>
							
								</div>
							 </div>
							 
						 </div>
						 <div class="lessonbanner">
						 	<div class="clearfix homepage rawr main" role="main">
			 	   		       
			 	   			
	 				   			<p> Or <a class="nounderline" href="<?php echo get_permalink($demoid) ?>">watch a demo lesson</a> from this course</p>
								<?php endwhile;   wp_reset_query();?>
				   			
	 					   		
							 </div>
							 
							<?php } ?>
							
					   
					   <?php } elseif ('Paid' == $techniquemeta['access']) {?>  
					   
						   <?php
						   	if(pmpro_hasMembershipLevel(array(2,3,4,5,6,7)))
						   	{
						   	?>
							<!-- Paid and has paid membership -->
	 					   <div class="content lessonview clearfix row-fluid">
	 						   <?php $forwardimg = plugins_url().'/Project_View/forwardarrow.png';
	 						   		$backimg = plugins_url().'/Project_View/backarrow.png' ?>
	
	 					   	<div id="main" class="clearfix homepage rawr" role="main">
	    				  		 <div class="backarrow"><?php be_previous_post_link('%link', '<img src="'.$backimg.'" alt="Previous" />', true, '', 'lessons') ?></div>
	 				 		 <div class="forwardarrow"><?php be_next_post_link('%link', '<img src="'.$forwardimg.'" alt="Next" />', true, '', 'lessons') ?></div>
							
	 					   	   <div style="display:block">
	 					     		 <div style="display:block;overflow:hidden;max-width:800px;margin:auto;">
	 					   <div class="js-video [vimeo, widescreen]">
	 						   <div class="newbutton2">
	 							   <p><b>Way to go! </b>That was the last lesson in this section.</p>
	 							  <a class="btn btn-large btn-custom" href="<?php bloginfo('url'); ?>/training"> Find more lessons!</a>
	 						  </div>
	 						   <div class="newbutton">
	 							   <p><b>Looking good!</b> The Next Lesson is...</p>
	 							  <div class="nolink btn btn-large btn-custom"><?php be_next_post_link('%link', '%title &raquo;', true, '', 'lessons') ?></div>
	 						   </div>
	 					   <iframe id="main_video" src="http://player.vimeo.com/video/<?php echo $techniquemeta['vidembed']?>?api=1&amp;player_id=main_video" width="700" height="438" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>  
	 		   		</div>
	 			</div>
	 		</div>
		
	 	</div>
	
	 </div>
	 </div>
	 <div class="content lessonview clearfix row-fluid">
	
	 	<div class="clearfix homepage rawr" role="main">
	 	   <div style="display:block">
	   		 <div style="text-align:right;display:block;overflow:hidden;max-width:800px;margin:auto;margin-bottom: 56px;border-bottom: 1px solid #ddd;padding-bottom: 15px;">
	 			 <div class="titlewrap">
	 		   		<div class="lessontitle"><?php echo the_title()?></div>
	   		       <?php $loop = new WP_Query( $parentpost );
	   				 while ( $loop->have_posts() ) : $loop->the_post();
		
	   				?>
	   
	   			<a class="nounderline" href="<?php echo get_permalink() ?>"><p class="returnproject">Back to the Course: <?php the_title()?></p></a>
	 
	          <?php endwhile;   wp_reset_query();?>
	 	 </div>
	 		   		 <div class="downloadfileset"><a style="font-weight:bold" class="nounderline" href="<?php echo $techniquemeta['filesets']?>"> Download the Exercise Fileset</a> </div>

	 		   	 </div>
		 
	 		   	 <script>
	 		   	 jQuery(document).ready( function(){
	 		   		 jQuery('.leftalert:empty, .rightalert:empty').hide();
		 
	 		   	 });
	 		   	 </script>
		 
		 
		
	 		   			 </div>
	 	     		     
							<?php } elseif(pmpro_hasMembershipLevel('1')) {?>
								<!-- Paid but doesn't have paid membership -->
   							 <div class="content lessonview clearfix row-fluid">
   							 	<div class="clearfix homepage rawr noaccesslesson main" role="main">
   				 	   		       <?php $loop = new WP_Query( $parentpost );
   				 	   				 while ( $loop->have_posts() ) : $loop->the_post();
		
   				 	   				?>
	   
   									<h3><?php the_title()?></h3>
   							<?php endwhile;   wp_reset_query();?>
		 	   		   
   							<h1><?php the_title()?></h1>
    		 	   		       <?php $loop = new WP_Query( $parentpost );
    		 	   				 while ( $loop->have_posts() ) : $loop->the_post();
    			         		 $projectmeta = $project_mb->the_meta();
    							 $demoid = $projectmeta['bestexample']
							 
    							 ?>
   							<img width="150" height="150" src="<?php echo $projectmeta['projectimage'] ?>">
   							<p>This lesson requires a SolidWize Pro Membership. 
   Sign up today for instant access with a free 7-day trial.</p>
   <a href="<?php bloginfo('url'); ?>/pricing" class="btn btn-large btn-success">Upgrade Now to Get Started </a>
							
   								</div>
   							 </div>
							 
   						 </div>
   						 <div class="lessonbanner">
   						 	<div class="clearfix homepage rawr main" role="main">
			 	   		       
			 	   			
   	 				   			<p> Or <a class="nounderline" href="<?php echo get_permalink($demoid) ?>">watch a demo lesson</a> from this course</p>
   								<?php endwhile;   wp_reset_query();?>
				   			
	 					   		
   							 </div>
								<?php } else { ?>
	   							 <div class="content lessonview clearfix row-fluid">
	   							 	<div class="clearfix homepage rawr noaccesslesson main" role="main">
	   				 	   		       <?php $loop = new WP_Query( $parentpost );
	   				 	   				 while ( $loop->have_posts() ) : $loop->the_post();
		
	   				 	   				?>
	   
	   									<h3><?php the_title()?></h3>
	   							<?php endwhile;   wp_reset_query();?>
		 	   		   
	   							<h1><?php the_title()?></h1>
	    		 	   		       <?php $loop = new WP_Query( $parentpost );
	    		 	   				 while ( $loop->have_posts() ) : $loop->the_post();
	    			         		 $projectmeta = $project_mb->the_meta();
	    							 $demoid = $projectmeta['bestexample']
							 
	    							 ?>
	   							<img width="150" height="150" src="<?php echo $projectmeta['projectimage'] ?>">
	   							<p>This lesson requires a SolidWize Pro Membership. 
	   Sign up today for instant access with a free 7-day trial.</p>
	   <a href="<?php bloginfo('url'); ?>/pricing" class="btn btn-large btn-success">Enroll Now to Begin </a>
							
	   								</div>
	   							 </div>
							 
	   						 </div>
	   						 <div class="lessonbanner">
	   						 	<div class="clearfix homepage rawr main" role="main">
			 	   		       
			 	   			
	   	 				   			<p> Or <a class="nounderline" href="<?php echo get_permalink($demoid) ?>">watch a demo lesson</a> from this course</p>
	   								<?php endwhile;   wp_reset_query();?>
				   			
	 					   		
	   							 </div>
							<?php	}?>
					   <?php }; ?>
				   
	
			
		
<?php endwhile; ?>			

<?php else : ?>
<article id="post-not-found">
    <header>
    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
    </header>
    <section class="post_content">
    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
    </section>
    <footer>
    </footer>
</article>

<?php endif; ?>
<?php wp_reset_query(); ?>

</div></div>
<div class="content lessonview clearfix row-fluid">

	
 <div class="projectcomments">
	 
	<?php if($post->post_content!=="") : ?>
	 <ul class="nav nav-tabs" id="myTab">
	   <li class="active"><a href="#additional">Additional Information</a></li>
	   <li><a href="#discussion">Discussion</a></li>
	 </ul>

	 <div class="tab-content">
	   <div class="tab-pane active fade in" id="additional"><?php the_content(); ?></div>
	   <div class="tab-pane fade in" id="discussion"><?php comments_template('',true); ?></div>

	 </div>
	 <script>
	 jQuery('#myTab a').click(function (e) {
	   e.preventDefault();
	   jQuery(this).tab('show');
	 })
	 </script>
	
	<?php else : ?>
		<?php comments_template('',true); ?>
		<?php endif; ?>	
</div>


<div class="projecttechniques">
	<h3> Techniques and Toolsets Covered in this Lesson </h3>
	<p class="techniquesexplained"> Click a link below to skip directly there.  </p>
	<div class="innerprojecttechniques">
	
		 <?php 
		 if ($techniquemeta['techniques'] != '') {
		 
		 foreach ($techniquemeta['techniques'] as $techniqueindiv)
		 { 
			 $realmin = str_pad($techniqueindiv['Min'], 2, '0', STR_PAD_LEFT); 
			 $realsec = str_pad($techniqueindiv['Sec'], 2, '0', STR_PAD_LEFT); 
			 $theinteger = ($realmin*60)+$realsec;
			 ?>
			 <a seekTo="<?php echo $theinteger ?>" href="#">
				<span> <?php 
		     echo $realmin . ':' . $realsec  ; ?> </span> <?php
			 
		     echo $techniqueindiv['title'] . '<br>'; ?>
		 </a>
		 <?php
			 
		 }
	 }
		 ?>

 </div>
</div>
</div>
</div>

<script>
jQuery(document).ready( function(){
	function getQueryVariable(variable)
	{
	       var query = window.location.search.substring(1);
	       var vars = query.split("&");
	       for (var i=0;i<vars.length;i++) {
	               var pair = vars[i].split("=");
	               if(pair[0] == variable){return pair[1];}
	       }
	       return(false);
	};
				
jQuery('.btn-primary').addClass('btn-success');
jQuery('h3#comments').text('Discussion');	
jQuery('#comment-form-title').text('Questions?');
jQuery(".appendix ul.video-list li:nth-child(odd)").addClass("appendixleft");
jQuery(".appendix ul.video-list li:nth-child(even)").addClass("appendixright");		

if (window.addEventListener){
    window.addEventListener('message', handleMsg, false);
}
else {
    window.attachEvent('onmessage', handleMsg, false);
}

function handleMsg(event) {
    var data = JSON.parse(event.data);
    if(data.event) {
        console.log(event);
    }      
}

function postToiFrame(action, val) {
    var data = { method: action };
    data.value = val;
    console.log(data);
    $("#main_video")[0].contentWindow.postMessage(JSON.stringify(data), "http://player.vimeo.com/video/15069551");

}


jQuery(".innerprojecttechniques a").click(function() {
jQuery("html, body").animate({ scrollTop: 0 }, 600);
    postToiFrame("seekTo", $(this).attr('seekTo'));
		return false;
});

jQuery	('iframe').bind("load", function() {
	if(getQueryVariable("ST") !== false) {
    postToiFrame("seekTo", getQueryVariable("ST"));	
	
}

});
    

   
   
	

});

</script>
<script type="text/javascript">
  
        jQuery(document).ready(function() {
         	
         	// Enable the API on each Vimeo video
            jQuery('#main_video').each(function(){
                Froogaloop(this).addEvent('ready', ready);
            });
            
            function ready(playerID){
                // Add event listerns
                // http://vimeo.com/api/docs/player-js#events
                Froogaloop(playerID).addEvent('play', play(playerID));
                Froogaloop(playerID).addEvent('seek', seek);
                Froogaloop(playerID).addEvent('finish', finish);
				
                // Fire an API method
                // http://vimeo.com/api/docs/player-js#reference
            }
            function play(playerID){
            }
            function seek() {
            }
			
            function finish() {
				jQuery('.nolink:not(:empty)').parents('div').show();
				jQuery('.nolink:empty').parents().parents('div').children('.newbutton2').show();
				
            }
			
  
        });
        </script>

  
<?php get_footer(); ?>