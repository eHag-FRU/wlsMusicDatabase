
			<img src="treble.jpg" class="Image">



			<main class="Search">
				<h2 class="Search_Header">Search</h2>
				
				<form action="/Search" method="POST">

					
					
					
					<label for="Title">Title:</label>
					<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train" default='NULL'>

					<br>
					<br>

					<label  for="Type">Piece Type: </label >
					<select class="Type" name="form[type]" required>
						<option	value="Concert">Concert</option>

						<option value="Marching">Marching/Pep</option>
					</select>

					<br>
					<br>

					<label  for="Arranger">Arranger: </label >
					<input type="text" class='Arranger' id="Arranger" name="form[Arranger]" default='NULL'>

					<br>
					<br>
						
					<label  for="Composer">Composer:</label >
					<input type="text" class="Composer" id="Composer" name="form[composer]" placeholder="Crazy Train" default='NULL'>

					<br>
					<br>
						
					<label  for="LibNumber">Music Library Number:</label >
					<input type="number" class="LibNumber" id="LibNumber" name="form[LibNumber]" default='NULL'>

					<br>
					<br>
						
					<label  for="YearLastPlayed">Year Last Played:</label >
					<input type="text" maxlength="4" minlength="4" class="YearLastPlayed" id="YearLastPlayed" name="form[YearLastPlayed]" default='NULL'>


					<p><em>*A blank search will search for everything</em></p>

					<br><button type="submit">Submit</button><br>
	
				</form>				
			</main>


			