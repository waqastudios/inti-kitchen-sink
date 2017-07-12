<?php
	if (!$optin_id) $optin_id = '-1';

	//fetch the opt in
	$optin_object = get_post($optin_id);

	if($optin_object && $optin_object->post_type == "inti-opt-in" && $optin_object->post_status == "publish") :

		// get its meta
		$action = get_post_meta( $optin_id, '_inti_opt_in_url', true);
		$target = get_post_meta( $optin_id, '_inti_opt_in_target', true);
		$hidden = get_post_meta( $optin_id, '_inti_opt_in_hidden', true);
		$button_text = get_post_meta( $optin_id, '_inti_opt_in_button_text', true);
		$button_name = get_post_meta( $optin_id, '_inti_opt_in_button_name', true);
		$form_name = get_post_meta( $optin_id, '_inti_opt_in_form_name', true);

		$first_name_name = get_post_meta( $optin_id, '_inti_opt_in_first_name_name', true);
		$first_name_placeholder = get_post_meta( $optin_id, '_inti_opt_in_first_name_placeholder', true);
		$first_name_required = get_post_meta( $optin_id, '_inti_opt_in_first_name_required', true);

		$email_name = get_post_meta( $optin_id, '_inti_opt_in_email_name', true);
		$email_placeholder = get_post_meta( $optin_id, '_inti_opt_in_email_placeholder', true);
		$email_required = get_post_meta( $optin_id, '_inti_opt_in_email_required', true);

?>
		<section class="opt-in widget">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<div class="opt-in-lead-in">
							<?php echo wpautop(do_shortcode($optin_object->post_content)); ?>
						</div>
					</div>
				</div>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">

						<form action="<?php echo $action; ?>" method="post" id="widget-opt-in-<?php echo rand(0,999); ?>" name="<?php if ($form_name) : echo $form_name; else : echo "form-" . $optin_object->ID; endif; ?>" <?php if ($target) echo 'target="_blank"'; ?>>
							<div class="hide">
								<?php echo stripslashes($hidden); ?>
							</div>

							<fieldset>
								<div class="grid-x grid-padding-x">
									<div class="medium-6 cell">
										<input type="text" name="<?php echo $first_name_name; ?>" id="widget-opt-in-<?php echo $first_name_name; ?>" placeholder="<?php echo $first_name_placeholder; ?>" class=""<?php if ($first_name_required) echo ' required'; ?>>
									</div>
									<div class="medium-6 cell">
										<input type="email" name="<?php echo $email_name; ?>" id="widget-opt-in-<?php echo $email_name; ?>" placeholder="<?php echo $email_placeholder; ?>" class=""<?php if ($email_required) echo ' required'; ?>>
									</div>
									<div class="medium-12 cell">
										<input type="submit" value="<?php echo $button_text ?>" name="submit" id="submit" class="button expanded">
									</div>
								</div>
							</fieldset>
				
						</form>
						
					</div>
				</div>
			</div>
		</section>

	<?php 
		else:
	?>
		<section class="widget">
			<div class="callout alert" data-closable>
				<p><?php _e('No ID specified or no longer exists', 'inti-child'); ?></p>       
				<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</section>
<?php
	endif; ?>