<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<?php include 'includes.php';?>
        <title><?php echo get_phrase('login');?> | <?php echo $system_title;?></title>
    </head>
	<body>
		<?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			$(document).ready(function() {
				Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:" "})
			});
		</script>
        <?php endif;?>
        <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="<?php echo base_url();?>"><?php echo $system_name;?></a>
                    
                    <ul class="nav pull-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Language <b class="caret"></b></a>
                        <!-- Language Selector -->
                            <ul class="dropdown-menu">
                                <?php
                                $fields = $this->db->list_fields('language');
                                foreach ($fields as $field)
                                {
                                    if($field == 'phrase_id' || $field == 'phrase')continue;
                                    ?>
                                        <li>
                                            <a href="<?php echo base_url();?>index.php?multilanguage/select_language/<?php echo $field;?>">
                                                <?php echo $field;?>
                                                <?php //selecting current language
                                                    if($this->session->userdata('current_language') == $field):?>
                                                        <i class="icon-ok"></i>
                                                <?php endif;?>
                                            </a>
                                        </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        <!-- Language Selector -->
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="span4 offset4">
                <div class="padded">
                    <center>
                        <img src="<?php echo base_url();?>uploads/logo.png" style="height:200px;" />
                    </center>
                    <div class="login box" style="margin-top: 10px;">
                        <div class="box-header">
                            <span class="title"><?php echo get_phrase('login');?></span>
                        </div>
                        <div class="box-content padded">
                        <i class="m-icon-swapright m-icon-white"></i>
                        	<?php echo form_open('login' , array('class' => 'separate-sections'));?>
                                <div class="">
                                    
                                    <select class="validate[required]" name="login_type" style="width:100%;">
                                        <option value=""><?php echo get_phrase('account_type');?></option>
                                        <option value="admin"><?php echo get_phrase('admin');?></option>
                                        <option value="doctor"><?php echo get_phrase('doctor');?></option>
                                        <option value="patient"><?php echo get_phrase('patient');?></option>
                                        <option value="nurse"><?php echo get_phrase('nurse');?></option>
                                        <option value="pharmacist"><?php echo get_phrase('pharmacist');?></option>
                                        <option value="laboratorist"><?php echo get_phrase('laboratorist');?></option>
                                        <option value="accountant"><?php echo get_phrase('accountant');?></option>
                                    </select>
    
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-envelope"></i>
                                    </span>
                                    <input name="email" type="text" placeholder="<?php echo get_phrase('email');?>">
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="password" type="password" placeholder="<?php echo get_phrase('password');?>">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-blue btn-block" >
                                        <?php echo get_phrase('login');?>
                                    </button>
                                </div>
                            <?php echo form_close();?>
                            <div>
                                <a  data-toggle="modal" href="#modal-simple">
                                    <?php echo get_phrase('forgot_password?');?>
                                </a>
                            </div>

                            <div>
                                <a  data-toggle="modal" href="#modal-reg">
                                    Register yourself
                                </a>
                            </div>

                        </div>
                    </div>
                    <?php include 'application/views/footer.php';?>
                </div>
            </div>
        </div>
        
        
        <!-----------password reset form ------>
        <div id="modal-simple" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel"><?php echo get_phrase('reset_password');?></h6>
          </div>
          <div class="modal-body">
            <?php echo form_open('login/reset_password');?>
            	<select class="validate[required]" name="account_type"  style="margin-bottom: 0px !important;">
                    <option value=""><?php echo get_phrase('account_type');?></option>
                    <option value="admin"><?php echo get_phrase('admin');?></option>
                    <option value="doctor"><?php echo get_phrase('doctor');?></option>
                    <option value="patient"><?php echo get_phrase('patient');?></option>
                    <option value="nurse"><?php echo get_phrase('nurse');?></option>
                    <option value="pharmacist"><?php echo get_phrase('pharmacist');?></option>
                    <option value="laboratorist"><?php echo get_phrase('laboratorist');?></option>
                    <option value="accountant"><?php echo get_phrase('accountant');?></option>
                </select>
                <input type="email" name="email"  placeholder="<?php echo get_phrase('email');?>"  style="margin-bottom: 0px !important;"/>
                <input type="submit" value="<?php echo get_phrase('reset');?>"  class="btn btn-blue btn-medium"/>
            <?php echo form_close();?>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-----------password reset form ------>



        /***Manage patients**/
	function manage_patient($param1 = '', $param2 = '', $param3 = '')
	{
			
		if ($param1 == 'create') {
			$data['name']                      = $this->input->post('name');
			$data['email']                     = $this->input->post('email');
			$data['password']                  = $this->input->post('password');
			$data['address']                   = $this->input->post('address');
			$data['phone']                     = $this->input->post('phone');
			$data['sex']                       = $this->input->post('sex');
			$data['birth_date']                = $this->input->post('birth_date');
			$data['age']                       = $this->input->post('age');
			$data['blood_group']               = $this->input->post('blood_group');
			$data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$this->db->insert('patient', $data);
			$this->email_model->account_opening_email('patient', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			
			redirect(base_url() . 'index.php?login', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['name']        = $this->input->post('name');
			$data['email']       = $this->input->post('email');
			$data['password']    = $this->input->post('password');
			$data['address']     = $this->input->post('address');
			$data['phone']       = $this->input->post('phone');
			$data['sex']         = $this->input->post('sex');
			$data['birth_date']  = $this->input->post('birth_date');
			$data['age']         = $this->input->post('age');
			$data['blood_group'] = $this->input->post('blood_group');
			
			$this->db->where('patient_id', $param3);
			$this->db->update('patient', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			
			redirect(base_url() . 'index.php?admin/manage_patient', 'refresh');
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('patient', array(
				'patient_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('patient_id', $param2);
			$this->db->delete('patient');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			
			redirect(base_url() . 'index.php?admin/manage_patient', 'refresh');
		}
		$page_data['page_name']  = 'manage_patient';
		$page_data['page_title'] = get_phrase('manage_patient');
		$page_data['patients']   = $this->db->get('patient')->result_array();
		$this->load->view('index', $page_data);
	}
	
<!-----------Register form ------>
        <div id="modal-reg" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel">Register</h6>
          </div>
          <div class="modal-body">
           <!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/manage_patient/create/' , array('class' => 'form-horizontal validatable'));?>
                    <form method="post" action="<?php echo base_url();?>index.php?" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('password');?></label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male"><?php echo get_phrase('male');?></option>
                                    	<option value="female"><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birth_date');?></label>
                                <div class="controls">
                                    <input type="text"  class="datepicker fill-up"  name="birth_date"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('age');?></label>
                                <div class="controls">
                                    <input type="number" class="" name="age"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('blood_group');?></label>
                                <div class="controls">
                                    <select name="blood_group" class="uniform" style="width:100%;">
                                    	<option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('add_patient');?></button>
                        </div>
                    <?php echo form_close();?>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-----------Register form ------>
        
        
	</body>
</html>