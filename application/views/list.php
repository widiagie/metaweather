				<div class="fullwidth-block">
					<div class="container"> 
						<div class="col-md-10 col-md-offset-1">
							<h2 class="section-title">Location List</h2>
							<p></p>   
							<?php foreach($result as $fields){ ?>
								<div class="col-md-3"><a href="<?php echo $base_url; ?>home/<?php echo $fields['woeid']; ?>" ><button class="list-city"><?php echo ucfirst($fields['title']); ?></button></a></div> 
							<?php } ?> 
						</div>
					</div>
				</div>