<?php
	// get the id of the opt in 
	$optin_id = get_inti_option('footer_opt_in', 'inti_customizer_options', '-1');

	//fetch the opt in
	$optin_object = get_post($optin_id);

	if($optin_object->post_type == "inti-opt-in" && $optin_object->post_status == "publish") :

		// get its meta
		$action = get_post_meta( $optin_id, '_inti_opt_in_url', true);
		$hidden = get_post_meta( $optin_id, '_inti_opt_in_hidden', true);
		$button_text = get_post_meta( $optin_id, '_inti_opt_in_button_text', true);

		$first_name_name = get_post_meta( $optin_id, '_inti_opt_in_first_name_name', true);
		$first_name_placeholder = get_post_meta( $optin_id, '_inti_opt_in_first_name_placeholder', true);
		$first_name_required = get_post_meta( $optin_id, '_inti_opt_in_first_name_required', true);

		$email_name = get_post_meta( $optin_id, '_inti_opt_in_email_name', true);
		$email_placeholder = get_post_meta( $optin_id, '_inti_opt_in_email_placeholder', true);
		$email_required = get_post_meta( $optin_id, '_inti_opt_in_email_required', true);

?>
		<section class="opt-in footer">
			<div class="row">
				<div class="small-12 medium-6 mlarge-5 columns">
					<div class="opt-in-lead-in">
						<?php echo wpautop($optin_object->post_content); ?>
					</div>
				</div>
				<div class="small-12 medium-6 mlarge-7 columns">

					<form action="<?php echo $action; ?>" method="post" id="header-opt-in" name="">
						<div class="hide">
							<?php echo $hidden; ?>
						</div>

						<fieldset>
							<div class="medium-6 mlarge-4 columns">
								<input type="text" name="<?php echo $first_name_name; ?>" id="footer-opt-in-<?php echo $first_name_name; ?>" placeholder="<?php echo $first_name_placeholder; ?>" class=""<?php if ($first_name_required) echo ' required'; ?>>
							</div>
							<div class="medium-6 mlarge-4 columns">
								<input type="email" name="<?php echo $email_name; ?>" id="footer-opt-in-<?php echo $email_name; ?>" placeholder="<?php echo $email_placeholder; ?>" class=""<?php if ($email_required) echo ' required'; ?>>
							</div>
							<div class="medium-12 mlarge-4 columns">
								<input type="submit" value="<?php echo $button_text ?>" name="submit" id="submit" class="button expanded">
							</div>
						</fieldset>
					</form>

				</div>
			</div>
		</section>

<?php endif; ?>