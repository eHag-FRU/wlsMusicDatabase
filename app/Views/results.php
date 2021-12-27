		<!--Lists attributes of each piece as list items and a header -->
		<ul>

			<?php foreach($results as $piece):?>
				<li><?= $piece['Title'] ?></li>

				<ul>
					<li><?= $piece['Arranger'] ?></li>

					<li><?= $piece['Piece_ID'] ?></li>

					<li><?= $piece['Last_Played'] ?></li>

					<li><?= $piece['Type'] ?></li>
				</ul>
			<?php endforeach ?>
		</ul>