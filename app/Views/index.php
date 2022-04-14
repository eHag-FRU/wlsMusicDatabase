
			<img src="treble.jpg" class="Image">



			<main class="Search">
				<h2 class="Search_Header">Search</h2>
				
				<form action="/Search" method="POST">

					
					<div class="w3-third">
						<label for="Title">Title:</label>
					<input type="text" class="Title w3-input" id="Title" name="form[title]" placeholder="Crazy Train" default='NULL'>

					<br>
					<br>

					<label for="Type">Piece Type: </label>
					<select class="Type w3-select" name="form[type]" required>
						<option	value="Concert">Concert</option>

						<option value="Marching">Marching/Pep</option>
					</select>

					<br>
					<br>

					<label for="Arranger">Arranger</label>
					<input type="text" class='Arranger w3-input' name="form[Arranger]" default='NULL'>

					<br>
					<br>
					</div>
					
					
					<div class="w3-third">
						<label for="Composer">Composer:</label>
					<input type="text" class="Composer w3-input" id="Composer" name="form[composer]" placeholder="Crazy Train" default='NULL'>

					<br>
					<br>
						
					<label for="LibNumber">Music Library Number:</label>
					<input type="number" class="LibNumber w3-input" id="LibNumber" name="form[LibNumber]" default='NULL'>

					<br>
					<br>
						
					<label for="YearLastPlayed">Year Last Played:</label>
					<input type="text" maxlength="4" minlength="4" class="YearLastPlayed w3-input" id="YearLastPlayed" name="form[YearLastPlayed]" default='NULL'>


					</div>
					
					
						
					
					<span>
						<p><em>*A blank search will search for everything</em></p>

						<br><button type="submit" class="w3-button w3-orange w3-margin" style="float: right; ">Submit</button><br>
					</span>

					
	
				</form>				
			</main>


			