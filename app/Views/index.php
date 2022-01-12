
			<img src="assets/Images/treble.jpg" class="Image">



			<main class="Search">
				<h2 class="Search_Header">Search</h2>
				
				<form action="/Search" method="POST">

					
					
					
					<lable for="Title">Title:</lable>
					<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train" default='NULL'>

					<br>
					<br>

					<lable for="Type">Piece Type: </lable>
					<select class="Type" name="form[type]" required>
						<option	value="Concert">Concert</option>

						<option value="Marching">Marching/Pep</option>
					</select>

					<br>
					<br>

					<lable for="Arranger">Arranger</lable>
					<input type="text" class='Arranger' name="form[Arranger]" default='NULL'>

					<br>
					<br>
						
					<lable for="Composer">Composer:</lable>
					<input type="text" class="Composer" id="Composer" name="form[composer]" placeholder="Crazy Train" default='NULL'>

					<br>
					<br>
						
					<lable for="LibNumber">Music Library Number:</lable>
					<input type="number" class="LibNumber" id="LibNumber" name="form[LibNumber]" default='NULL'>

					<br>
					<br>
						
					<lable for="YearLastPlayed">Year Last Played:</lable>
					<input type="text" maxlength="4" minlength="4" class="YearLastPlayed" id="YearLastPlayed" name="form[YearLastPlayed]" default='NULL'>


					<p><em>*A blank search will search for everything</em></p>

					<br><button type="submit">Submit</button><br>
	
				</form>				
			</main>


			