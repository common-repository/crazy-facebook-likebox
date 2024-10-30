<?php

/**
 * Created by PhpStorm.
 * User: sashisolutions
 * Date: 4/11/2017
 * Time: 10:50 AM
 */

// registering the widget

function register_crazy_fblikebox() {
	register_widget( 'ss_crazyfacebook_likebox' );
}

// constructing the widget
add_action( 'widgets_init', 'register_crazy_fblikebox' );

class ss_crazyfacebook_likebox extends WP_Widget {
	function __construct() {
		parent::__construct(
			'ss_crazyfacebook_likebox', // Base ID
			__( 'SS - Facebook Page Box ', 'ss_crazyfacebook_likebox' ), // Name
			array( 'description' => __( 'A Crazy Widget to Show your facebook Page !', 'text_domain' ), ) // Args
		);
	}
//This is what is rendered / published to the front end
	public function widget( $args, $instance )

	{

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			//echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		?>

		<div class="container">
            <div class="widget-background">
				<h3 align="center">
                    <span class="ss-widget-title-style1">
                        <?=$instance['title']?>
                    </span>
				</h3>
                <div class="fb-page" data-href="<?=$instance['fburl'] ?>" data-tabs="<?=$instance['fbshowtimeline']?>,<?=$instance['fbshowmessenger']?>,<?=$instance['fbshowevents']?>"
				     data-small-header="<?=$instance['fbsmallheader']?>" data-adapt-container-width="true" data-hide-cover="<?=$instance['fbhidecover']?>"
				     data-show-facepile="<?=$instance['fbshowfriends'] ?>">
					<blockquote cite="<?=$instance['fburl'] ?>/" class="fb-xfbml-parse-ignore">
						<a href="<?=$instance['fburl'] ?>/"> <?=$instance['fbpgname'] ?></a>
					</blockquote>
				</div>

			</div>
		</div>

		<?php

		echo $args['after_widget'];
	}

	// Preparing the Options Parameters
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Like Us on Facebook ! ', 'text_domain' );
		$fbpgname = ! empty( $instance['fbpgname'] ) ? $instance['fbpgname'] : __( 'Facebook Page Name', 'text_domain' );
		$fburl = ! empty( $instance['fburl'] ) ? $instance['fburl'] : __( 'Facebook URL', 'text_domain' );
		$fbsmallheader = ! empty( $instance['fbsmallheader'] ) ? $instance['fbsmallheader'] : __( 'Use Facebook Small Header', 'text_domain' );
        $titlebgclr = ! empty( $instance['titlebgclr'] ) ? $instance['titlebgclr'] : __( 'Title Background Colour', 'text_domain' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'titlebgclr' ); ?>"><?php _e( 'Title Background Colour :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'titlebgclr' ); ?>" name="<?php echo $this->get_field_name( 'titlebgclr' ); ?>" type="text" value="<?php echo esc_attr( $titlebgclr ); ?>">
        </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbpgname' ); ?>"><?php _e( 'Facebook Page Name:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'fbpgname' ); ?>" name="<?php echo $this->get_field_name( 'fbpgname' ); ?>" type="text" value="<?php echo esc_attr( $fbpgname ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fburl' ); ?>"><?php _e( 'Facebook URL :' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'fburl' ); ?>" name="<?php echo $this->get_field_name( 'fburl' ); ?>" type="text" value="<?php echo esc_attr( $fburl ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbsmallheader' ); ?>"><?php _e( 'Use Facebook Small Header ?' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'fbsmallheader' ); ?>" name="<?php echo $this->get_field_name('fbsmallheader'); ?>" class="widefat" style="width:100%;" >
				<option <?php selected( $instance['fbsmallheader'], 'true'); ?> value="true">Yes</option>
				<option <?php selected( $instance['fbsmallheader'], 'false'); ?> value="false">No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbhidecover' ); ?>"><?php _e( 'Hide Facebook Cover Page ?' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'fbhidecover' ); ?>" name="<?php echo $this->get_field_name('fbhidecover'); ?>" class="widefat" style="width:100%;" >
				<option <?php selected( $instance['fbhidecover'], 'true'); ?> value="true">Yes</option>
				<option <?php selected( $instance['fbhidecover'], 'false'); ?> value="false">No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbshowfriends' ); ?>"><?php _e( 'Show Friends Faces ?' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'fbshowfriends' ); ?>" name="<?php echo $this->get_field_name('fbshowfriends'); ?>" class="widefat" style="width:100%;" >
				<option <?php selected( $instance['fbshowfriends'], 'true'); ?> value="true">Yes</option>
				<option <?php selected( $instance['fbshowfriends'], 'false'); ?> value="false">No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbshowtimeline' ); ?>"><?php _e( 'Show Timeline  ?' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'fbshowtimeline' ); ?>" name="<?php echo $this->get_field_name('fbshowtimeline'); ?>" class="widefat" style="width:100%;" >
				<option <?php selected( $instance['fbshowtimeline'], 'timeline'); ?> value="timeline">Yes</option>
				<option <?php selected( $instance['fbshowtimeline'], ''); ?> value="">No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbshowmessenger' ); ?>"><?php _e( 'Show Messenger  ?' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'fbshowmessenger' ); ?>" name="<?php echo $this->get_field_name('fbshowmessenger'); ?>" class="widefat" style="width:100%;" >
				<option <?php selected( $instance['fbshowmessenger'], 'messages'); ?> value="messages">Yes</option>
				<option <?php selected( $instance['fbshowmessenger'], ''); ?> value="">No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fbshowevents' ); ?>"><?php _e( 'Show Events ?' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'fbshowevents' ); ?>" name="<?php echo $this->get_field_name('fbshowevents'); ?>" class="widefat" style="width:100%;" >
				<option <?php selected( $instance['fbshowevents'], 'events'); ?> value="events">Yes</option>
				<option <?php selected( $instance['fbshowevents'], ''); ?> value="">No</option>
			</select>
		</p>

		<?php
	}

// Update Widget Settings
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['titlebgclr'] = ( ! empty( $new_instance['titlebgclr'] ) ) ? strip_tags( $new_instance['titlebgclr'] ) : '';
		$instance['fbpgname'] = ( ! empty( $new_instance['fbpgname'] ) ) ? strip_tags( $new_instance['fbpgname'] ) : '';
		$instance['fburl'] = ( ! empty( $new_instance['fburl'] ) ) ? strip_tags( $new_instance['fburl'] ) : '';
		$instance['fbsmallheader'] = ( ! empty( $new_instance['fbsmallheader'] ) ) ? strip_tags( $new_instance['fbsmallheader'] ) : '';
		$instance['fbhidecover'] = ( ! empty( $new_instance['fbhidecover'] ) ) ? strip_tags( $new_instance['fbhidecover'] ) : '';
		$instance['fbshowfriends'] = ( ! empty( $new_instance['fbshowfriends'] ) ) ? strip_tags( $new_instance['fbshowfriends'] ) : '';
		$instance['fbshowtimeline'] = ( ! empty( $new_instance['fbshowtimeline'] ) ) ? strip_tags( $new_instance['fbshowtimeline'] ) : '';
		$instance['fbshowmessenger'] = ( ! empty( $new_instance['fbshowmessenger'] ) ) ? strip_tags( $new_instance['fbshowmessenger'] ) : '';
		$instance['fbshowevents'] = ( ! empty( $new_instance['fbshowevents'] ) ) ? strip_tags( $new_instance['fbshowevents'] ) : '';

		return $instance;

	}

}