<?php

/*	Widget Name: Feed Subscribe Widget */


// Initialize the feed widget.
add_action( 'widgets_init', 'themonic_feed_subscribe' );


// Register widget.
function themonic_feed_subscribe() {
	register_widget( 'themonic_subscribe_widget' );
}

// Widget class.
class themonic_subscribe_widget extends WP_Widget {

/*	Widget Setup */
	function __construct() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'themonic_subscribe_widget', 'description' => __('Feedburner Subscription Widget.', 'themonic') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'themonic_subscribe_widget' );

		/* Create the widget. */
		parent::__construct( 'themonic_subscribe_widget', __('Iconic One Pro Email Subscription', 'themonic'), $widget_ops, $control_ops );
	}

/*	Display Widget*/
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$desc = isset( $instance['desc'] ) ? esc_attr( $instance['desc'] ) : '';


		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
        	
			<div class="themonic-subscribe">
                
                <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>

                <form style="" action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $desc; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" _lpchecked="1">
				<input type="text" value="Your email Address..." onblur="if (this.value == '') {this.value = 'Your email Address...';}" onfocus="if (this.value == 'Your email Address...') {this.value = '';}"  name="email">
				<input type="hidden" value="<?php echo $desc; ?>" name="uri"><input type="hidden" name="loc" value="en_US"><input id="emailsubmit" type="submit" value="Subscribe">
				</form>
                
            </div><!--subscribe_widget-->
		
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}


/*Update Widget*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		/* Stripslashes for html inputs */
		$instance['desc'] = stripslashes( $new_instance['desc']);

		/* No need to strip tags for.. */

		return $instance;
	}

/*	Widget Settings*/
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'desc' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themonic') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Feedburner id (https://feeds.feedburner.com/<b>themonic</b>):', 'themonic') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
		</p>
		
	<?php
	}
}
/*-----------------------------------------------------
Email Subscription Box
-----------------------------------------------------*/
class emails_widget extends WP_Widget {
function __construct() {
parent::__construct(
'emails_widget', 
__('Email Newsletter', 'themonic'), 
array( 'description' => __( 'Email Subscription Box', 'themonic' ), ) 
);
}
public function widget( $args, $instance ) {
$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
$whichboxtoshow = isset( $instance['nopts'] ) ? esc_attr( $instance['nopts'] ) : '';
if($whichboxtoshow == 'feedburner'){
?>
<!-- Begin Feedburner Signup Form -->
<div class="iop-email-subs-box">
<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $instance['feedbid'];?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
    <p class="iop-form-title"><?php if($instance['title']){echo $instance['title'];}else{echo"Subscribe To Our Newsletter";}  ?></p>
    <p class="iop-form-desc"><?php if($instance['text']){echo $instance['text'];}else{echo"Subscribe to our mailing list and receive latest news and updates from our team.";}  ?></p>
    <div class="real-content-form">
    <div class="email-container-iop">
    <input placeholder="Enter your email here" type="text" name="email"/>
    </div>
    <input type="hidden" value="<?php echo $instance['feedbid'];?>" name="uri"/>
    <input type="hidden" name="loc" value="en_US"/>
    <input class="e-subscribe-button" type="submit" value="Sign Me Up!" />
    </div>
</form>
</div>
<?php }
elseif($whichboxtoshow == 'mailchimp'){
  ?>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup" class="themonic-subscribe">
<form action="<?php echo $instance['mcbc'];?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
 <p class="iop-form-title"><?php if($instance['title']){echo $instance['title'];}else{echo"Subscribe To Our Newsletter";}  ?></p>
    <p class="iop-form-desc"><?php if($instance['text']){echo $instance['text'];}else{echo"Subscribe to our mailing list and receive latest news and updates from our team.";}  ?></p>

        <div class="real-content-form">
<div class="mc-field-group email-container-iop">
  <input type="email" value="" name="EMAIL" class="iopform-email" id="mce-EMAIL" placeholder="Enter your email here">
</div>
    
  <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_ab7c9ca049fdda7c69d9d9ca8_29753914b3" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Sign Me Up!" name="subscribe" id="emailsubmit" class="button e-subscribe-button"></div>
        </div></div>
</form>
</div>
<?php } elseif($whichboxtoshow == 'aweber'){?>
<div class="themonic-subscribe">
   <p class="iop-form-title"><?php if($instance['title']){echo $instance['title'];}else{echo"Subscribe To Our Newsletter";}  ?></p>
    <p class="iop-form-desc"><?php if($instance['text']){echo $instance['text'];}else{echo"Subscribe to our mailing list and receive latest news and updates from our team.";}  ?></p>

<form method="post" action="https://www.aweber.com/scripts/addlead.pl" >
<input type="hidden" name="meta_web_form_id" value="910039589" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="listname" value="<?php echo $instance['abbc']; ?>" />
<input type="hidden" name="redirect" value="https://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_bbed426798c8f9985057d0ba6b0a16a9" target="blank" />
<input type="hidden" name="meta_adtracking" value="Home_Sidebar" />
<input type="hidden" name="meta_message" value="1" />
<input type="hidden" name="meta_required" value="name,email" />
<input type="hidden" name="meta_tooltip" value="" />
<div class="real-content-form">
<div class="email-container-iop">
<input type="text" name="name" class="iopform-name" value="" tabindex="500" placeholder="Enter your name here"/>
</div>
<div class="email-container-iop">
<input type="text" name="email" class="iopform-email" value="" tabindex="501" placeholder="Enter your email here" />
</div>
<input name="submit" tabindex="502" id="emailsubmit" class="button e-subscribe-button" type="submit" value="Sign Me Up!"/></div>
</form>
  </div><?php } ?>
<!--End mc_embed_signup-->  
<?php 
echo $args['after_widget'];
}
public function form( $instance ) {
  if(isset($instance[ 'title' ])){
$title = $instance[ 'title' ];
}
else{
  $title = '';
}
  if(isset($instance[ 'text' ])){
$text = $instance[ 'text' ];
}
else{
  $text = '';
}
  if(isset($instance[ 'nopts' ])){
$nopts =$instance['nopts'];
 }
 else{
  $nopts = '';
}
  if(isset($instance[ 'mcbc' ])){
$mcbc = $instance['mcbc'];
  }
  else{
  $mcbc = '';
}
  if(isset($instance[ 'abbc' ])){
$abbc = $instance['abbc'];
  }
  else{
  $abbc = '';
}
  if(isset($instance[ 'feedbid' ])){
$feedbid = $instance['feedbid'];
}
else{
  $feedbid = '';
}
?>
<p>

<script>
jQuery(document).ready(function(){ 
  var emailserval = "<?php echo isset($nopts) ?>";
  if(emailserval == 'mailchimp'){
  jQuery('.mailchimphldr').show();
   jQuery('.feedburnerhldr').hide();
   jQuery('.aweberhldr').hide();
  }
  else if(emailserval == 'aweber'){
   jQuery('.mailchimphldr').hide();
   jQuery('.feedburnerhldr').hide();
   jQuery('.aweberhldr').show();
}
else{
   jQuery('.mailchimphldr').show();
   jQuery('.feedburnerhldr').hide();
   jQuery('.aweberhldr').show();
}
jQuery('.emailserchose').change(function(){
  if(jQuery(this).val() == 'mailchimp'){
  jQuery('.mailchimphldr').show();
   jQuery('.feedburnerhldr').hide();
   jQuery('.aweberhldr').hide();
  }
  else if(jQuery(this).val() == 'aweber'){
   jQuery('.aweberhldr').show();
   jQuery('.feedburnerhldr').hide();
   jQuery('.mailchimphldr').hide();
   }
  else{
   jQuery('.mailchimphldr').hide();
   jQuery('.feedburnerhldr').hide();
   jQuery('.aweberhldr').hide();
  }
  });

  });
</script>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'themonic'); ?></label> 
<input placeholder="Subscribe To Our Newsletter" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<br/>
<br/>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:', 'themonic'); ?></label> 
<input placeholder="Subscribe to our newsletter and receive updates directly to your inbox." class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
<br/>
<br/>
<select name="<?php echo $this->get_field_name('nopts'); ?>" id="<?php echo $this->get_field_id('nopts'); ?>" class="emailserchose" type="text">
<option value="aweber" <?php echo "aweber" == $nopts ? "selected" : ""; ?>>Aweber</option>
<option value="mailchimp" <?php echo "mailchimp" == $nopts ? "selected" : ""; ?> >MailChimp</option>

</select>
<div class="mailchimphldr">
<label for="<?php echo $this->get_field_id( 'mcbc' ); ?>"><?php _e( 'MailChimp form action URL:', 'themonic'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'mcbc' ); ?>" name="<?php echo $this->get_field_name( 'mcbc' ); ?>" type="text" value="<?php echo esc_attr( $mcbc ); ?>" />
<label><a href="https://kb.mailchimp.com/lists/signup-forms/host-your-own-signup-forms" target="blank">Find Form URL</a></label>
</div>
<div class="feedburnerhldr">
<label for="<?php echo $this->get_field_id( 'feedbid' ); ?>"><?php _e( 'Feedburner ID:', 'themonic'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'feedbid' ); ?>" name="<?php echo $this->get_field_name( 'feedbid' ); ?>" type="text" value="<?php echo esc_attr( $feedbid); ?>" />
</div>
<div class="aweberhldr">
<label for="<?php echo $this->get_field_id( 'abbc' ); ?>"><?php _e( 'Aweber List ID:', 'themonic'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'abbc' ); ?>" name="<?php echo $this->get_field_name( 'abbc' ); ?>" type="text" value="<?php echo esc_attr( $abbc ); ?>" />
<label><a href="https://help.aweber.com/hc/en-us/articles/204028426-What-Is-The-Unique-List-ID-" target="blank">Find List ID</a></label>
</div>
</p>
<?php 
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = $new_instance['title'];
$instance['text'] = $new_instance['text'];
$instance['nopts'] = $new_instance['nopts'];
$instance['mcbc'] = $new_instance['mcbc'];
$instance['abbc'] = $new_instance['abbc'];
$instance['feedbid'] = $new_instance['feedbid'];
return $instance;
}
}
function emails_load_widget() {
  register_widget( 'emails_widget' );
}
add_action( 'widgets_init', 'emails_load_widget' );
?>