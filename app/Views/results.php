		<!-- Adds the results style sheet to taylor the page layout for displaying search results -->
		<link rel="stylesheet" href="assets/CSS/results.css">


		<!--Lists attributes of each piece as list items and a header -->
		<ul class='Result'>

			<?php foreach($results as $piece):?>

				<ul class="item">
					<li><h2><a href='/View/view/<?= $piece['Piece_ID']?>'><?= $piece['Title'] ?></a></h2></li>

					<li><?= $piece['Arranger'] ?></li>

					<li><?= $piece['Piece_ID'] ?></li>

					<li><?= $piece['Last_Played'] ?></li>

					<li><?= $piece['Type'] ?></li>
				</ul>

				<!-- Adds a break between each piece -->
			<br>
			<?php endforeach ?>
		
		</ul>