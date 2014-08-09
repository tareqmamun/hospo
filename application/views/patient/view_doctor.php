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
                    		<th><div><?php echo get_phrase('department');?></div></th>
							<th><div><?php echo get_phrase('rating');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($doctors as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>
							<td><?php
							$this->db->select_avg('rating');
							$query = $this->db->get_where('rating_patient', array(
								'doctor_id' => $row['doctor_id']
							))->result_array();
							echo round($query[0]['rating']);
							?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
		</div>
	</div>
</div>