<div role="tabpanel" class="tab-pane active" id="main-user-info-tab-<?php echo $chat->id?>">

<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-pills" role="tablist">
	    <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/information_tab_user_info_tab.tpl.php'));?>
	    <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/operator_remarks_tab.tpl.php'));?>
	    <?php $fileData = (array)erLhcoreClassModelChatConfig::fetch('file_configuration')->data ?>
	    <?php if ( isset($fileData['active_admin_upload']) && $fileData['active_admin_upload'] == true && erLhcoreClassUser::instance()->hasAccessTo('lhfile','use_operator') ) : ?>
	    <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/information_tab_user_files_tab.tpl.php'));?>	
	    <?php endif; ?>
	    <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/operator_screenshot_tab.tpl.php'));?> 
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="main-user-info-tab-sub-<?php echo $chat->id?>">
	      <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/information_tab_user_info.tpl.php'));?>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="main-user-info-remarks-<?php echo $chat->id?>">
	       <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/operator_remarks.tpl.php'));?>
	    </div>
	    
	    <?php if ( isset($fileData['active_admin_upload']) && $fileData['active_admin_upload'] == true && erLhcoreClassUser::instance()->hasAccessTo('lhfile','use_operator') ) : ?>
		  <div role="tabpanel" class="tab-pane" id="main-user-info-files-<?php echo $chat->id?>">		   
		      <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/information_tab_user_files.tpl.php'));?>		    
		  </div>
	   <?php endif; ?>
	   	  
	   <div role="tabpanel" class="tab-pane" id="main-user-info-files-<?php echo $chat->id?>">		   
		      <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/information_tab_user_files.tpl.php'));?>		    
	   </div>
	   
	   <?php include(erLhcoreClassDesign::designtpl('lhchat/chat_tabs/operator_screenshot.tpl.php'));?>  
		   
	</div>
</div>
		
</div>