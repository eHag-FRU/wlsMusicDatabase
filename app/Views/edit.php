<!-- Styles the add page with out the music note -->
<link rel="stylesheet" href="<?= base_url('assets/CSS/add.css') ?>">
	
	<!-- Reused the Add CSS since they are the same layout and to save time -->
	<main class="Add">

		<h2>Update</h2>

		<form action="/Edit/updatePiece/<?= $form['Piece_ID'] ?>" method="POST">
				

				<label for="Title">Title:</label>
				<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train"  value="<?= $form['Title'] ?>" default=NULL required>

				<br>

				<label for="Type">Piece Type: </label>
				<select class="Type" name="form[Type]"required>

					<!-- Will be used to indicate no change in the piece type -->
					<option value=NULL>---- DO NOT CHANGE ----</option>
				
					<option	value="Concert">Concert</option>

					<option value="Marching">Marching/Pep</option>
				</select>

				<br>

				<label for="Arranger">Arranger:</label>
				<input type="text" class='Arranger' name="form[Arranger]" value="<?= $form['Arranger'] ?>" default=NULL>

				<br>

				<label for="Composer">Composer:</label>
				<input type="text" class='Composer' name="form[composer]" value="<?= $form['Composer'] ?>" default=NULL>
					
				<br>

				<label for="LibNumber">Music Library Number:</label>
				<input type="number" class='LibNumber' name="form[LibNumber]" value="<?= $form['LibNumber'] ?>">
					
				<br>

				<label for="Last_Played">Last Year Played</label>
				<input type="number" minlength="4" maxlength="4" class='Last_Played' name="form[Last_Played]" value="<?= $form['Last_Played'] ?>" >

				<input type="number" value="<?= $form['Piece_ID'] ?>" name="form[Piece_ID]" hidden readonly>

				<br>
				<br>

				<button type="submit">Submit</button>

				
		</form>
	</main>