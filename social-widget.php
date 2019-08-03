<?php
/*
Plugin Name: Social Widget
Plugin URI: https://webcrews.net/
Description: Its a simple widget plugins
Version: 0.1.0
Author: Sahadat Hossain
Author URI: https://webcrews.net/
Text Domain: social-widget
*/


/**
 * wc Social Follow Us Widget
 *
 */

class wc_follow_us extends WP_Widget{

   //1 inisializer
	public function __construct() {

		parent::__construct( 'wc_follow_us', __('wc Follow Us', 'wc-social-icon'), array( 'description' => __('Its a follow us widgets', 'wc-social-icon') ) );

	}
	//2 form for widget input
	public function form($instance){
		//widget title
		isset( $instance['title'] ) ? $title = $instance['title'] : null;
		empty( $instance['title'] ) ? $title = '' : null;

		//For facebook url
		isset( $instance['facebook'] ) ? $facebook = $instance['facebook'] : null;
		empty( $instance['facebook'] ) ? $facebook = '' : null;

		//For twitter url
		isset( $instance['twitter'] ) ? $twitter = $instance['twitter'] : null;
		empty( $instance['twitter'] ) ? $twitter = '' : null;

		//For behance url
		isset( $instance['behance'] ) ? $behance = $instance['behance'] : null;
		empty( $instance['behance'] ) ? $behance = '' : null;

		//For instagram url
		isset( $instance['instagram'] ) ? $instagram = $instance['instagram'] : null;
		empty( $instance['instagram'] ) ? $instagram = '' : null;

		//For google url
		isset( $instance['google'] ) ? $google = $instance['google'] : null;
		empty( $instance['google'] ) ? $google = '' : null;

		//For pinterest url
		isset( $instance['pinterest'] ) ? $pinterest = $instance['pinterest'] : null;
		empty( $instance['pinterest'] ) ? $pinterest = '' : null;

		?>
	<!-- Title field -->
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">

	</p>

	<!-- Facebook URL field -->
	<p>
		<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Facebook URL :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('facebook'); ?>" id="<?php echo $this->get_field_id('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">

	</p>

	<!-- Twitter URL field -->
	<p>
		<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php esc_html_e('Twitter URL :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('twitter'); ?>" id="<?php echo $this->get_field_id('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">

	</p>

	<!-- behance URL field -->
	<p>
		<label for="<?php echo $this->get_field_id('behance'); ?>"><?php esc_html_e('behance URL :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('behance'); ?>" id="<?php echo $this->get_field_id('behance'); ?>" type="text" value="<?php echo esc_attr($behance); ?>">

	</p>


	<!-- instagram URL field -->
	<p>
		<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php esc_html_e('Instagram URL :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('instagram'); ?>" id="<?php echo $this->get_field_id('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">

	</p>

	<!-- google URL field -->
	<p>
		<label for="<?php echo $this->get_field_id('google'); ?>"><?php esc_html_e('google URL :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('google'); ?>" id="<?php echo $this->get_field_id('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">

	</p>

	<!-- pinterest URL field -->
	<p>
		<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php esc_html_e('pinterest URL :'); ?></label>

		<input class="widefat" name="<?php echo $this->get_field_name('pinterest'); ?>" id="<?php echo $this->get_field_id('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">

	</p>


	<?php 
	}
	//3 widget for showing in theme
	public function widget($args, $instance){
		//$title = $instance['title'];
		$title = apply_filters( 'widget-title', $instance['title'] );

		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$behance = $instance['behance'];
		$instagram = $instance['instagram'];
		$google = $instance['google'];
		$pinterest = $instance['pinterest'];

		//social links profile
		$facebook_profile = '<li><a href="'. $facebook .'"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
		$twitter_profile = '<li><a href="'. $twitter .'"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
		$behance_profile = '<li><a href="'. $behance .'"><i class="fa fa-behance" aria-hidden="true"></i></a></li>';
		$instagram_profile = '<li><a href="'. $instagram .'"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
		$google_profile = '<li><a href="'. $google .'"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
		$pinterest_profile = '<li><a href="'. $pinterest .'"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>';


		echo $args['before_widget']; //add before tag
		echo '<div class="follow-us">';
		
			if(!empty($title)){
				echo $args['before_title'] . $title . $args['after_title']; //for show title
			}

			echo '<div class="custom-line">';
			 	echo '<ul class="list-inline">';
			 		echo (!empty($facebook)) ? $facebook_profile : null;
			 		echo (!empty($twitter)) ? $twitter_profile : null;
			 		echo (!empty($behance)) ? $behance_profile : null;
			 		echo (!empty($instagram)) ? $instagram_profile : null;
			 		echo (!empty($google)) ? $google_profile : null;
			 		echo (!empty($pinterest)) ? $pinterest_profile : null;
			 	echo '</ul>';
			echo '</div>';
		echo '</div>';

		echo $args['after_widget']; //add after tag


	}

	//4 update if change previous value
	public function update($new_instance , $old_instance){

		$instance = array();

		$instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
		$instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
		$instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
		$instance['behance'] = (!empty($new_instance['behance']) ) ? strip_tags($new_instance['behance']) : '';
		$instance['instagram'] = (!empty($new_instance['instagram']) ) ? strip_tags($new_instance['instagram']) : '';
		$instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
		$instance['pinterest'] = (!empty($new_instance['pinterest']) ) ? strip_tags($new_instance['pinterest']) : '';

		return $instance;

	}


}
//register widget
add_action('widgets_init', function(){
	register_widget( 'wc_follow_us' );
});