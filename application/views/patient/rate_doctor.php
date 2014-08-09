<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('doctor_list');?>
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
                    		<th><div><?php echo get_phrase('doctor_name');?></div></th>
                    		<th><div><?php echo get_phrase('message');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($doctors as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><a href="index.php?patient/rate_doctor2/<?php echo $row['doctor_id'];?>" class="contact_docpat" >Rate</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
		</div>
	</div>
</div>