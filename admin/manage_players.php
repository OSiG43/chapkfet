<?php
	session_start();
	if(!isset($_SESSION['bucque'])){
		header("Location: ../login.php");
	}
	
	require("../utils/user_utils.php");
	if(!isAdmin($_SESSION['bucque'])){
		header("Location: ../index.php");
	}	
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chapk'fet administration</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">

	<style type="text/css">
		@media screen and (max-width: 800px) {
	    	table tbody tr td:nth-child(1):before {
	   		 content: "Id";
	  		}
	  		table tbody tr td:nth-child(2):before {
	   		 content: "Bucque";
	  		}
	  		table tbody tr td:nth-child(3):before {
	   		 content: "Fam's";
	  		}
	  		table tbody tr td:nth-child(4):before {
	  		  content: "Points";
	  		}
	  		table tbody tr td:nth-child(5):before {
	  		  content: "Indices";
	  		}
	  		table tbody tr td:nth-child(6):before {
	   		 content: "Niveaux";
	  		}
	  		table tbody tr td:nth-child(7):before {
	   		 content: "Administrateur ?";
	  		}
	  		table tbody tr td:nth-child(8):before {
	   		 content: "Edit";
	  		}
	  	}
    </style>

  </head>
  <body>
  		
  		<div class="container" style="width: 100%">
  			<h1>Administration des joueurs.</h1>
  			<div class="navContainer">
  				<a href="../index.php" class="button">Accueil</a>
  				<a href="home.php" class="button">Accueil Admin</a>
  				<a href="../logout.php" class="button" name="logout" style="text-align: right;">Déconnection</a>
  			</div>
  			<hr>
  			<div class="manageContainer">
  				<table>
						<thead>
							<tr class="table-head">
								<th class="column1">Id</th>
								<th class="column2">Bucque</th>
								<th class="column3">Fam's</th>
								<th class="column4">Points</th>
								<th class="column5">Indices</th>
								<th class="column6">Niveaux</th>
								<th class="column7">Administrateur ?</th>
								<th class="column8">Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach (getAllPlayerInfo() as $player) {
									echo("
										<tr>
											<td class='column1'>".$player['id']."</td>
											<td class='column2'>".$player['bucque']."</td>
											<td class='column3'>".$player['fams']."</td>
											<td class='column4'>".$player['points']."</td>
											<td class='column5'>".$player['hints']."</td>
											<td class='column6'>".$player['levels']."</td>
											<td class='column7'>".($player['admin']==1 ? "Oui" : "Non")."</td>
											<td class='column8'><a class='button' href=editPlayer.php?bucque='".$player['bucque']."'>Edition</a></td>
										</tr>
									");
								}
							?>
								
						</tbody>
					</table>
  			</div>
  			
  		</div>
  		
  </body>
</html>