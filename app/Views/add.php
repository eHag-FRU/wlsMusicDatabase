<!-- Styles the add page with out the music note -->
<link rel="stylesheet" href="assets/CSS/add.css">
	<main class="Add">
		<h2>Add</h2>

		<form action="/Add/addPiece" method="POST">
				

				<label for="Title">Title:</label>
				<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train" required>

				<br>

				<label for="Type">Piece Type: </label>
				<select class="Type" name="form[type]" required>
					<option	value="Concert">Concert</option>

					<option value="Marching">Marching/Pep</option>
				</select>

				<br>

				<label for="Arranger">Arranger:</label>
				<input type="text" class='Arranger' name="form[Arranger]">

				<br>

				<label for="Composer">Composer:</label>
				<input type="text" class='Composer' name="form[composer]">
					
				<br>

				<label for="LibNumber">Music Library Number:</label>
				<input type="number" class='LibNumber' name="form[LibNumber]">
					
				<br>

				<label for="Last_Played">Last Year Played</label>
				<input type="number" minlength="4" maxlength="4" class='Last_Played' name="form[Last_Played]">

				<br>
				<br>

				<button type="submit">Submit</button>
		</form>
	</main>