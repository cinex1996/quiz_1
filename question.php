<?php
session_start();
$pol=mysqli_connect('localhost','root','','quiz');
class question
{

	 function value($pyt,$odp1,$odp2,$odp3,$wybor,$odp_pra)
	{
		$pyt=htmlentities($pyt,ENT_QUOTES,"UTF-8");
		$odp1=htmlentities($odp1,ENT_QUOTES,"UTF-8");
		$odp2=htmlentities($odp2,ENT_QUOTES,"UTF-8");
        $odp3=htmlentities($odp3,ENT_QUOTES,"UTF-8");
        $wybor=htmlentities($wybor,ENT_QUOTES,"UTF-8");
        $odp_pra=htmlentities($odp_pra,ENT_QUOTES,"UTF-8");
        
	}
	
	function question()
	{
		
		global $pol;
		$pyt=$_POST['pyt'];
		$odp1=$_POST['odp1'];
		$odp2=$_POST['odp2'];
		$odp3=$_POST['odp3'];
		$choice=$_POST['wybor'];
		$odp_pra=$_POST['odp_pra'];
		if(($odp_pra!="A")&&($odp_pra!="B")&&($odp_pra!="C"))
		{
			$_SESSION['Komunikat']="Nie podałeś A,B lub C";
		}
		else
		{
      $pyt="INSERT INTO zadania (Pyt,odp_A,odp_B,odp_C,wybor,odp_PRA) VALUES ('$pyt','$odp1','$odp2','$odp3','$choice','$odp_pra')";
      $rez=mysqli_query($pol,$pyt) or die (mysqli_error($pol));
      mysqli_close($pol);
      }
}

}

class answer 
{
	function siema()
{
echo<<<END
<style>
input
{
	margin-top:20px;
	width:30px;
	height:30px;
}
</style> 
END;
 $pol=mysqli_connect('localhost','root','','quiz');  
   $pyt="SELECT * FROM zadania ORDER BY RAND() limit 1";
   $rez=mysqli_query($pol,$pyt);
   if(mysqli_num_rows($rez)>0)
   {
   	while($row=mysqli_fetch_assoc($rez))
   	{
   		echo "<h1>".$row['Pyt']."</h1>";
           $_SESSION['question']=$row['Pyt'];
   		
         echo "<form method='POST' action='true_answer.php'>";
   		echo "A.<input type='radio' name='m1' value='A'>".$row['odp_A']."</input><br><br>";
   		$_SESSION['a']=$row['odp_A'];
   		echo "B.<input type='radio' name='m1' value='B'>".$row['odp_B']."</input><br><br>";
   		echo "C.<input type='radio' name='m1' value='C'>".$row['odp_C']."</input><br><br>";
   		$_SESSION['C']=$row['odp_C'];
   		echo "<input type='submit' value='Sprawdź'/>";   
            echo "</form>";
            if(isset($_SESSION['good']))
            {
            	echo $_SESSION['good'];
            	unset($_SESSION['good']);
            }
            else if(isset($_SESSION['bad']))
            {
                echo $_SESSION['bad'];
                unset($_SESSION['bad']);
            }
           else if(isset($_SESSION['error']))
            {
            	echo $_SESSION['error'];
            	unset($_SESSION['error']);
            }
   }
   mysqli_close($pol);
       }
}

}
if((isset($_POST['pyt']))&&(isset($_POST['odp1']))&&(isset($_POST['odp2']))&&(isset($_POST['odp3']))&&(isset($_POST['wybor']))&&(isset($_POST['odp_pra'])))
{
$user=new question($_POST['pyt'],$_POST['odp1'],$_POST['odp2'],$_POST['odp3'],$_POST['wybor'],$_POST['odp_pra']);
}

?>
