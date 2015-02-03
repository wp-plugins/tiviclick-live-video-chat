<?php

/**
 * @package TiviClick Settings
 */


add_action('admin_menu','tiviclick_settings');


function tiviclick_settings(){
	add_menu_page(_('TiviClick Settings'),_('TiviClick Settings'),'administrator','tiviclick_settings','fn_tiviclick_settings');
}


function fn_tiviclick_settings() {
	
	$error = FALSE;
	$err_msg = '';
	$submit = FALSE;
	if(isset($_POST['actidsubmit'])) {
        $acct_id = intval($_POST['act_tiviclick']);
        delete_option('tiviclick_accountid');
        add_option('tiviclick_accountid',$acct_id);
        
		$use_lang = intval($_POST['lang_tiviclick']);
		delete_option('tiviclick_uselang');
		add_option('tiviclick_uselang',$use_lang);
		$submit = TRUE;		
	}
	
	?>
	
	<div class="wrap">
	  <div class="icon32" id="icon-options-general">
	  	<br>
	  </div>
      <h2>TiviClick Settings </h2>
	  <?php if($submit) { ?>
	  	<div class="updated settings-error" id="setting-error-settings_updated"> 
		<p><strong>Settings saved.</strong></p></div>
	  <?php } ?> 
	
      <div id="tiviclick_new_container">
        
        <div class="tiviclick_admin_new">
          <form method="post" action="">
			  <table class="form-table">
				<tbody>
                  <tr valign="top">
                    <th class="row">Account ID:</td>
                    <td>
                      <input type="text" value="<?php echo get_option('tiviclick_accountid',''); ?>" id="act_tiviclick" name="act_tiviclick">
                      <p class="description">Here enter your account ID which you get from the Tiviclick Site. If you don't have your account ID<br /> please register <a href="http://www.tiviclick.com" target="_blank">here</a> for a free account if you don't have one yet and get the ID.</p>
                    </td>
                  </tr>
				  <tr valign="top">
					<th class="row">Use site Language:</td>
					<td>
					  <p class="description">Tiviclick plugin will use the language selected in your Tiviclick account/configure.<br>
                        Please verify that the language you are using are supported by Tiviclick, If they are not, please contact Tiviclick <a href="mailto:support@tiviclick.com">support@tiviclick.com</a></p>
					</td>
				  </tr>
				  <tr>
					<td>
						<input type="submit" name="actidsubmit" value="Save" class="button button-primary" />
					</td>
				  </tr>
				  
				</tbody>
			  </table>
			</form>
        </div>
      </div>
    </div>
	
	<?php	
}

add_action('wp_footer', 'fn_tiviclick_script');

function fn_tiviclick_script() {
    $acc_id = intval(get_option('tiviclick_accountid'));
	$use_lang = intval(get_option('tiviclick_uselang'));
    $lang_str = "";
    if ($use_lang) {
        $locale = get_locale();
        list ($lang, $country) = explode("_", $locale);
        $lang_str = "&lang=".$lang;
    }
   	if($acc_id!='') {
		?>
			<div id="tiviclick_external" class="<?PHP echo get_locale(); ?>"></div>        
			<script type="text/javascript"  src="http://www.tiviclick.com/plugin/js/?account_id=<?php echo $acc_id.$lang_str; ?>" > </script>
		<?php
	}
}