<div class="hw-notification-admin-wrapper">
	<form action="options.php" method="post" class="hw-notification-form-wrapper">

		<div class="hw-notification-header">
			<div class="hw-notification-header-inside">
				<?php $plugin = hw_notification_plugin_data(); ?>
				<h2 style="display: inline"><?php printf( '%1$s %2$s', $plugin['Name'], __( 'Settings', 'hw-notification' ) ); ?></h2>
				<input type="submit" class="button button-primary right" value="<?php _e( 'Save Changes', 'hw-notification' ); ?>">
			</div>
		</div><!-- .hw-notification-header -->


		<?php settings_fields( 'hw_notification_options_group' ); ?>

		<div class="panel-container">
			<div id="section-config" class="panel">
				<?php do_settings_sections( 'hw_notification_section_config_page' ); ?>
			</div>
			<div id="section-content" class="panel">
				<?php do_settings_sections( 'hw_notification_section_content_page' ); ?>
			</div>
		</div>

		<div class="hw-notification-form-footer">
			<div class="hw-notification-form-footer-inside">
				<input type="submit" class="button button-primary" value="<?php _e( 'Save Changes', 'hw-notification' ); ?>">
			</div>
		</div><!-- .hw-notification-form-footer -->

	</form><!-- .hw-notification-form-wrapper -->

</div><!-- .hw-notification-admin-wrapper -->
