<?php
/**
 * Adds SCM Subs widget.
 */
class SMT_Subs_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'smt_subs_widget', // Base ID
			esc_html__( 'SocialMediaTrackerYT Inscritos', 'smt_domain' ), // Name
			array( 'description' => esc_html__( 'Widget para divulgação de inscritos em seu canal no YT.', 'smt_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
    // echo esc_html__( 'Hello, World!', 'smt_domain' );
    echo '<div class="g-ytsubscribe" data-channel="'.$instance['canal'].'" data-layout="'.$instance['layout'].'" data-count="default"></div>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Social Media Tracker - YT', 'smt_domain' );
		$canal = ! empty( $instance['canal'] ) ? $instance['canal'] : esc_html__( 'pewdiepie', 'smt_domain' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'full', 'smt_domain' );
		?>
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'smt_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'canal' ) ); ?>"><?php esc_attr_e( 'Canal:', 'smt_domain' ); ?></label> 
		  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'canal' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'canal' ) ); ?>" type="text" value="<?php echo esc_attr( $canal ); ?>">
		</p>

		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_attr_e( 'layout:', 'smt_domain' ); ?></label> 
		  <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
          <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
            Full
          </option>
        </select>
      </p>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['canal'] = ( ! empty( $new_instance['canal'] ) ) ? sanitize_text_field( $new_instance['canal'] ) : '';
		
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';

		return $instance;
	}

} // class Foo_Widget