<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','New user');?></h1>

<?php if (isset($errors)) : ?>
		<?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
<?php endif; ?>

<form action="<?php echo erLhcoreClassDesign::baseurl('user/new')?>" method="post" autocomplete="off" enctype="multipart/form-data">

<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" <?php if ($tab == '') : ?> class="active" <?php endif;?>><a href="#account" aria-controls="account" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Account data');?></a></li>
	<li role="presentation" <?php if ($tab == 'tab_departments') : ?>class="active"<?php endif;?>><a href="#departments" aria-controls="departments" role="tab" data-toggle="tab" ><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Assigned departments');?></a></li>
	<li role="presentation" <?php if ($tab == 'tab_pending') : ?>class="active"<?php endif;?>><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Pending chats');?></a></li>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane <?php if ($tab == '') : ?>active<?php endif;?>" id="account">
	   <?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Username');?></label>
		  <input class="form-control" type="text" name="Username" value="<?php echo htmlspecialchars($user->username);?>" />
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','E-mail');?></label>
		  <input type="text" class="form-control" name="Email" value="<?php echo htmlspecialchars($user->email);?>"/>
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Password');?></label>
		  <input type="password" class="form-control" name="Password" value=""/>
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Repeat the new password');?></label>
		  <input type="password" class="form-control" name="Password1" value=""/>
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Name');?></label>
		  <input class="form-control" type="text" name="Name" value="<?php echo htmlspecialchars($user->name);?>" />
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Surname');?></label>
		  <input class="form-control" type="text" name="Surname" value="<?php echo htmlspecialchars($user->surname);?>" />
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Job title');?></label>
		  <input type="text" class="form-control" name="JobTitle" value="<?php echo htmlspecialchars($user->job_title);?>"/>
		</div>
		
		<?php include(erLhcoreClassDesign::designtpl('lhuser/parts/time_zone.tpl.php'));?>
		
		<label title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Chat status will not change upon pending chat opening');?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Invisible mode')?>&nbsp;<input type="checkbox" value="on" name="UserInvisible" <?php echo $user->invisible_mode == 1 ? 'checked="checked"' : '' ?> /></label>
		
		<div class="row form-group">
			<div class="col-md-6">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','Skype');?></label>
				<input type="text" name="Skype" value="<?php echo htmlspecialchars($user->skype);?>"/>
			</div>
			<div class="col-md-6">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','XMPP username');?></label>
				<input type="text" name="XMPPUsername" value="<?php echo htmlspecialchars($user->xmpp_username);?>"/>
			</div>
		</div>
		
		<div class="form-group">
		  <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Photo');?>, (jpg,png)</label>
		  <input type="file" name="UserPhoto" value="" />
		</div>
		
		<div class="form-group">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','User group')?></label>
		<?php echo erLhcoreClassRenderHelper::renderCombobox( array (
		                    'input_name'     => 'DefaultGroup[]',
		                    'selected_id'    => $user->user_groups_id,
							'multiple' 		 => true,
		                     'css_class'       => 'form-control',
		                    'list_function'  => 'erLhcoreClassModelGroup::getList'
		            )); ?>
		</div>
		
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Disabled')?>&nbsp;<input type="checkbox" value="on" name="UserDisabled" <?php echo $user->disabled == 1 ? 'checked="checked"' : '' ?> /></label><br>
		
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Do not show user status as online')?>&nbsp;<input type="checkbox" value="on" name="HideMyStatus" <?php echo $user->hide_online == 1 ? 'checked="checked"' : '' ?> /></label><br>
		
		<input type="submit" class="btn btn-default" name="Update_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Save');?>" />
	</div>
	
	<div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_departments') : ?>active<?php endif;?>" id="departments">
	    <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Departments')?></h5>
			
		<label><input type="checkbox" value="on" name="all_departments" <?php echo $user->all_departments == 1 ? 'checked="checked"' : '' ?> /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','All departments')?></label><br/>
		
		<?php foreach (erLhcoreClassDepartament::getDepartaments() as $departament) : ?>
		    <label><input type="checkbox" name="UserDepartament[]" value="<?php echo $departament['id']?>"<?php echo in_array($departament['id'],$userdepartaments) ? 'checked="checked"' : '';?>/><?php echo htmlspecialchars($departament['name'])?></label><br/>
		<?php endforeach; ?>
		
		<input type="submit" class="btn btn-default" name="Update_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Save');?>" />
	</div>
	
	<div role="tabpanel" class="tab-pane <?php if ($tab == 'tab_pending') : ?>active<?php endif;?>" id="pending">
	       <?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>

			<label><input type="checkbox" name="showAllPendingEnabled" value="1" <?php $show_all_pending == 1 ? print 'checked="checked"' : '' ?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/account','User can see all pending chats, not only assigned to him');?></label><br>
		
	 		<input type="submit" class="btn btn-default" name="Update_account" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('user/new','Save');?>" />
	</div>
	
</div>
</form>

