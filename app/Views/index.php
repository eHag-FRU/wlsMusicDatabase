			
			<img src="assets/Images/treble.jpg" class="Image">



			<main class="Search">
				<form action="/Search/Search" method="POST">
					<lable for="Title">Title:</lable>
					<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train" required>

					<br>

					<lable for="Type">Piece Type: </lable>
					<select class="Type" name="form[type]" required>
						<option	value="Concert">Concert</option>

						<option value="Marching">Marching/Pep</option>
					</select>

					<br>

					<lable for="Composer">Composer</lable>
					<input type="text" class='Composer' name="form[composer]">

				<form>

				<br><button type="submit">Submit</button>
			</main>


			