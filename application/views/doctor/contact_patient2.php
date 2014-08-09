
<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('message_list');?>
                    	</a></li>
			<li>
            	<a href="#list_messages" data-toggle="tab"><i class="icon-align-justify"></i>
					<?php echo get_phrase('new_message');?>
                    	</a></li>						
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('sender');?></div></th>
                    		<th><div><?php echo get_phrase('message');?></div></th>
							<th><div><?php echo get_phrase('time');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($messages as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['sender'];?></td>
							<td><?php echo $row['message'];?></td>
							<td><?php echo $row['timestamp'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>				
			</div>
			
            <!----TABLE LISTING ENDS--->
			
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="list_messages" >
                <div class="box-content">
			<form action="" method="post" >
				<textarea name="message" style="width: 80%; padding: 20px; margin: 20px;" ></textarea>				
				<br /><button style="margin-left: 20px;" >Send</button>
			</form>
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
			

		</div>
	</div>
</div>