
			<img src="assets/Images/treble.jpg" class="Image">



			<main class="Search">
				<h2 class="Search_Header">Search</h2>
				
				<form action="/Search" method="POST">

					<br>
						
					<lable for="Title">Title:</lable>
					<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train">

					<br>

					<lable for="Type">Piece Type: </lable>
					<select class="Type" name="form[type]" required>
						<option	value="Concert">Concert</option>

						<option value="Marching">Marching/Pep</option>
					</select>

					<br>

					<lable for="Arranger">Arranger</lable>
					<input type="text" class='Arranger' name="form[Arranger]">

				<form>

				<p><em>*A blank search will search for everything</em></p>

				<br><button type="submit">Submit</button>
			</main>


			