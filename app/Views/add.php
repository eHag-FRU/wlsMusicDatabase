<!-- Styles the add page with out the music note -->
<link rel="stylesheet" href="assets/CSS/add.css">

<form action="/Add/addPiece" method="POST" class="Add">
					<label for="Title">Title:</label>
					<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train" required>

					<br>

					<label for="Type">Piece Type: </label>
					<select class="Type" name="form[type]" required>
						<option	value="Concert">Concert</option>

						<option value="Marching">Marching/Pep</option>
					</select>

					<br>

					<label for="Arranger">Arranger</label>
					<input type="text" class='Arranger' name="form[Arranger]">
					
					<br>

					<label for="Last_Played">Last Year Played</label>
					<input type="text" class='Last_Played' name="form[Last_Played]">
				<form>

				<br><button type="submit">Submit</button>