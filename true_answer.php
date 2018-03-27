

<?php
session_start();
$pol=mysqli_connect('127.0.0.1','kolex1234','M@rc!n@1!2','kolex1234');
if(isset($_POST['m1']))
{
	$answer=$_POST['m1'];
	if($answer=="A")
	{
		$pyt="SELECT * FROM zadania WHERE odp_PRA='$answer' AND Pyt='".$_SESSION['question']."'";
		$rez=mysqli_query($pol,$pyt);
		if(mysqli_num_rows($rez)>0)
		{
			while($row=mysqli_fetch_assoc($rez))
			{
				header('Location:index.php');
					 $_SESSION['good']="Dobrze";
					unset($_SESSION['question']);
				
			}
		}
		else
		{
			header('Location:index.php');
			$_SESSION['bad']="Źle";
		}
}
	else if($answer=="B")
	{
		$pyt="SELECT * FROM zadania WHERE odp_PRA='$answer' AND Pyt='".$_SESSION['question']."'";
		$rez=mysqli_query($pol,$pyt);
		if(mysqli_num_rows($rez)>0)
		{
			while($row=mysqli_fetch_assoc($rez))
			{
				     header('Location:index.php');
					 $_SESSION['good']="Dobrze";
					unset($_SESSION['question']);
				
			}
		}
		else
		{
			header('Location:index.php');
			$_SESSION['bad']="Źle";
		}
	}
	else if($answer=="C")
	{
		$pyt="SELECT * FROM zadania WHERE odp_PRA='$answer' AND Pyt='".$_SESSION['question']."'";
		$rez=mysqli_query($pol,$pyt);
		if(mysqli_num_rows($rez)>0)
		{
			while($row=mysqli_fetch_assoc($rez))
			{
				header('Location:index.php');
					 $_SESSION['good']="Dobrze";
					unset($_SESSION['question']);
				
			}
		}
		else
		{
			header('Location:index.php');
			$_SESSION['bad']="Źle";
		}
	}
	else
	{
		header('Location:index.php');
		$_SESSION['error']="Zaznacz odpowiedź";
	}
}
mysqli_close($pol);
?>