<title>Joiner</title>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 tal" style="margin-bottom:60px;">
		<h2>Joiner's</h2>
			<?php
			//echo base_url();
			
			$joiner = file_get_contents(base_url().'api/appiride/joiner/format/json');
			$manage = json_decode($joiner);
			foreach ($manage as $key){
			
				?>
				<div class="row tal joiner-view">
					<div class="panel panel-default">
					  <div class="panel-heading tac">
					  <h3 class="panel-title"><span class="ju-from fl"><i class="fa fa-map-marker"></i> _ <?php echo $key->from; ?></span>
					  <span class="ju-via  fr"><i class="fa fa-map-marker"></i> _ _ _ <?php echo $key->via; ?> _ _ _ <i class="fa fa-map-marker"></i></span>
					  <span class="ju-to"> <?php echo $key->to; ?>  _ <i class="fa fa-map-marker"></i></span></h3></div>
					  <div class="panel-body">
						<div class="col-md-3">
						<?php 
							$user = file_get_contents(base_url().'api/appiride/users/id/'.$key->user_id.'/format/json');
							$user = json_decode($user);
							foreach ($user as $ud){
								echo '<p><i class="fa fa-user"></i> : '.$ud->fname.'</p>';
							}
						?>
							<p><i class="fa fa-calendar"></i> : <?php echo $key->date; ?></p>
							<p><i class="fa fa-clock-o"></i> : <?php echo $key->stime; ?> - <i class="fa fa-adjust"></i> <?php echo $key->ampm; ?></p>
							<p><i class="fa fa-ban"></i> : <?php if($key->fixed == "YES"){echo "Fixed time";}else{echo "Flexible time";}  ?></p>
						</div>
						<div class="col-md-3">
							<p><i class="fa fa-group"></i> : <?php echo $key->seats; ?></p>
							<p><i class="fa fa-mobile"></i> : <?php echo $key->contact; ?></p>
						</div>
						<div class="col-md-6">
							<p><i class="fa fa-envelope"></i> : <?php echo $key->desc; ?></p>
						</div>
					  </div>
					  <div class="panel-footer">
							<?php
							$joicheck = file_get_contents(base_url().'api/appiride/req_joiner_check/joiid/'.$key->id.'/userid/'.$this->session->userdata('logged_in')['userid'].'/format/json');
							
							if($joicheck == 1){
								echo '<button type="button" data-id="" class="accept_sent"><i class=""></i>accept pending</button>';
							}
							else if($this->session->userdata('logged_in')['userid'] == $key->user_id){
								echo '<button type="button" data-id="" class="delete_ride"><i class=""></i>Delete ride</button>';
							}
							else if($this->session->userdata('logged_in')){
								echo '<button type="button" data-id="'.$key->id.'" class="accept_ride"><i class=""></i>accept ride</button>';
							}
							else{
								echo '<button type="button" class="appi-login"><i class=""></i>accept ride</button>';
							}
							?>
							<!--<button type="button" data-id="<?php echo $key->id; ?>" class="accept_ride"><i class=""></i>accept ride</button>-->
					  </div>
					</div>

					<!--<div class="col-md-4">
						<p>From : <?php echo $key->from; ?></p>
						<p>To : <?php echo $key->to; ?></p>
						<p>Via : <?php echo $key->via; ?></p>
					</div>
					<div class="col-md-4">
						<p>Dtae : <?php echo $key->date; ?></p>
						<p>Statr time :<?php echo $key->stime; ?> <?php echo $key->ampm; ?></p>
						<p>Flexible : <?php echo $key->fixed; ?></p>
					</div>
					<div class="col-md-4">
						<p>No. of seats available : <?php echo $key->seats; ?></p>
						<p>Explaination : <?php echo $key->desc; ?></p>
						<p>Contact : <?php echo $key->contact; ?></p>
					</div>-->
						
				</div>
				<?php
			}
			?>
		</div>
	</div>
	
</div>
