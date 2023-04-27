<?php
            $ActQueue = "SELECT Song.Name 'SongName', Song.SongLen, Song.CoverArt,
				Artist.Name 'ArtistName',
				Person.FirstName 'PersonFirstName', Person.LastName 'PersonLastName',
				AssociatedWith.KarFileID, Enqueues.QueueID 'QueueID', Queue.IsPaid,
				Queue.AmountPaid
				FROM Enqueues, Queue, Person, AssociatedWith, Artist, Song WHERE
				Enqueues.KarFileID = AssociatedWith.KarFileID
				AND Enqueues.PersonID = Person.ID
				AND Enqueues.QueueID = Queue.ID
				AND AssociatedWith.SongID = Song.ID
				AND AssociatedWith.ArtistID = Artist.ID
				AND Queue.Status = 1";

			$prp = $PDO->prepare($ActQueue);
			$prp->execute();
			$vals = $prp->fetchAll(PDO::FETCH_ASSOC);

			$artistVocalized = array();
			foreach($vals as $row)
			{
				array_push($artistVocalized, $row["ArtistName"]);
			}

			$activeTitle = $vals[0]["SongName"];
			$activeQueuePerson = $vals[0]["PersonFirstName"] . ' ' . $vals[0]["PersonLastName"];
			$activeKaraokeID = $vals[0]["KarFileID"];
			$activeQueueID = $vals[0]["QueueID"];
			$activeCovertArt = $vals[0]["CoverArt"];
			$activeLength = $vals[0]["SongLen"];
			
        ?>
        <div class="container p-4">
			<div class="row">
				<div class="col-sm-4">
					<div class="card">
						<img src="<?php echo $activeCovertArt; ?>" class="card-img-top" >
						<div class="card-body">
							<h5 class="card-title"><?php echo $activeTitle; ?></h5>
							<p class="card-text">Queued by: <?php echo $activeQueuePerson; ?></p>
							<p class="card-text">Karaoke ID: <?php echo $activeKaraokeID; ?></p>
							<p class="card-text">Queue ID: <?php echo $activeQueueID; ?></p>
							<p class="card-text">Queue Type: Free-Queue</p>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<script>
						var i = 0;
						var x = <?php echo $activeLength; ?>;

						var interval = setInterval( increment, 100);
						function increment(){
							document.getElementById("ActivePlayer").style.width = ((i/x) * 100) + "%";
							var dateA = new Date(0);
							var dateB = new Date(0);
							dateA.setSeconds(i); // specify value for SECONDS here
							dateB.setSeconds(x); // specify value for SECONDS here
							var timeStringA = dateA.toISOString().substring(14, 19);
							var timeStringB = dateB.toISOString().substring(14, 19);
							document.getElementById('ActiveTime').innerText = timeStringA + " / " + timeStringB;
							if (i >= x)
								clearInterval(interval);
							i += .1;
						}
					</script>
					<div>
					<h1><?php echo $activeTitle; ?></h1>
					<p class="h5">Time Remaining: <span id="ActiveTime"></span></p>
					<div class="progress" role="progressbar" style="width:100%">
						<div id="ActivePlayer" class="progress-bar" style="width: 0%"></div>
					</div><br/>
					<button type="button" class="btn btn-light"><i class="bi bi-rewind"></i></button>
					<button type="button" class="btn btn-light"><i class="bi bi-pause-btn"></i></button>
					<button type="button" class="btn btn-light"><i class="bi bi-fast-forward"></i></button>
					</div><br/>
					<?php
						foreach($artistVocalized as $ActiveArtist)
						{
							echo "<h4>Karaoke Tracks: " . $ActiveArtist . "</h4>";
						}
					?>
				</div>
			</div>
        </div>