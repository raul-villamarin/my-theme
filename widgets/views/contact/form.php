<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>">
				<?php echo esc_html__( 'Email:', 'my-theme' ); ?>
	</label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
</p>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>">
		<?php echo esc_html__( 'Phone:', 'my-theme' ); ?>
	</label>
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
</p>