
			<img src="assets/Images/treble.jpg" class="Image">



			<main class="Search">
				<form action="/Search" method="POST">
					<lable for="Title">Title:</lable>
					<input type="text" class="Title" id="Title" name="form[title]" placeholder="Crazy Train" required>

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

				<br><button type="submit">Submit</button>
			</main>


			