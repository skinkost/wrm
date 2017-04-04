<div class="column">
	<div class="ui container">
	<p>Feed</p> <!-- Test -->
		<div class="ui feed">
		
		<?php
			//$query = "select * from vfeed limit 0,10";
			
			$query = "select f.ID AS ID,f.user AS user,f.date AS date,f.title AS title,f.description AS description,u.name AS name,u.profileImage AS profileImage from (feed f left join users u on((u.ID = f.user))) order by f.date desc limit 0,10";
			
			$sql = $db->query($query);

			while ($row = $sql->fetch_assoc()) {
				?>
				<div class="event">
					<div class="label">
						<img src="<?php echo $login_image; ?>">
					</div>
					<div class="content">
						<div class="summary">
							<a class="user">
								<?php echo $row['name']; ?>
							</a> <?php echo $row['title']; ?>
							<div class="date">
								<?php echo $row['date']; ?>
							</div>
						</div>
						<div class="meta">
							<?php echo $row['description']; ?>
						</div>
					</div>
				</div>
				<?php } ?>
		</div>
	</div>
</div>

<script>
	$('div.date').each(function() {
		text = $.fullCalendar.moment($( this ).text());
		text.fromNow();
	});
	
	//$.fullCalendar.moment('<?php echo $row['date']; ?>').fromNow();

</script>