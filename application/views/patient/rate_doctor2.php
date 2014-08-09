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
				
                <div style="padding: 20px; margin: 20px;" >
					<form action="" method="post" >
						<input type="radio" name="rating" CHECKED value="1" /> 1<br />
						<input type="radio" name="rating" value="2" /> 2<br />
						<input type="radio" name="rating" value="3" /> 3<br />
						<input type="radio" name="rating" value="4" /> 4<br />
						<input type="radio" name="rating" value="5" /> 5<br /><br />
						<button>Rate</button>
					</form>
				</div>
			</div>
            <!----TABLE LISTING ENDS--->
		</div>
	</div>
</div>