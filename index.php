
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<title>Quiz</title>
	</head>
	<body>
		<header>
			<div class="header">
			<h1>Odpowiedz na pytanie</h1>
		</div>
		</header>
		<main>
			<article>
				<section>
					<div class="odp">
					<header>
					 <div class="question">
                       <?php
                       require_once "question.php";
                       $s1=new answer;
                       $s1->siema();
                       ?>
					 </div>
					</header>
				</div>
				</section>
			</article>
			<article>
				<section>
					<div class="pyt">
					<header>
						<h1>Zadaj własne pytanie?</h1>
					<form  method="POST" form="question.php">
						<input type="text" name="pyt" placeholder="Podaj swoje pytanie."/><br><br>
						<input type="text" name="odp1" placeholder="Podaj odpowiedź A."/><br><br>
						<input type="text" name="odp2" placeholder="Podaj odpowiedź B." /><br><br>
						<input type="text" name="odp3" placeholder="Podaj odpowiedź C." /><br><br>
						<select name="wybor">
							<option>Sport</option>
							<option>Nauka</option>
						</select><br><br>
						<input type="text" name="odp_pra" placeholder="Podaj prawidłową odpowiedź"/><br><br>
						<input type="submit" value="Zadaj pytanie"/>
					</form>	
					<?php
					if(isset($_SESSION['Komunikat']))
					{
						echo $_SESSION['Komunikat'];
						unset($_SESSION['Komunikat']);
					}
					?>
					</header>
				</div>
				</section>
			</article>
		</main>
	</body>
</html>