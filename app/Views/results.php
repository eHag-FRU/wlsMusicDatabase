		<!-- Adds the results style sheet to taylor the page layout for displaying search results -->
		<link type="text/css" rel="stylesheet" href="assets/CSS/results.css">


		<!--Lists attributes of each piece as list items and a header -->
		<table class="Result" class="w3-table">

			<tr class="TableHeader">
				<th>Title</th>
				<th>Arranger</th>
				<th>Composer</th>
				<th>Music Library Number</th>
				<th>Type</th>
				<th>Year Last Played</th>
				<th>Actions</th>
			</tr>

			<?php foreach($results as $piece):?>

				<tr class="TableRows">
					<td><a href='/Edit/edit/<?= $piece['Piece_ID']?>' style="a:visited a:link {color: black}"><?= $piece['Title'] ?></a></td>

					<td><?= $piece['Arranger'] ?></td>

					<td><?= $piece['Composer'] ?></td>

					<td><?= $piece['LibNumber'] ?></td>

					<td><?= $piece['Type'] ?></td>

					<td><?= $piece['Last_Played'] ?></td>

					<td>
						<ul class="ListActions">
							<li><a href="/Edit/lastPlayedUpdate/<?= $piece['Piece_ID'] ?>">Played</a></li>
							<li><a href="/Edit/deletePiece/<?= $piece['Piece_ID'] ?>">Delete</a></li>
						</ul>
					</td>

				</tr>

			<?php endforeach ?>
		
		</table>