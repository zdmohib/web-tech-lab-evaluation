<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>LabTask-3</title>
</head>
<body>
	<?php
		$name=$email=$date=$exam=$gender=$bloodGroup="";
		$nameErr = $emailErr = $dateErr=$examErr= $genderErr=$bgErr= $monthErr = $yearErr = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])){
				$nameErr = "Please Enter Your Name";
			} 
			else {
				$name = $_POST["name"];
			}
			if (empty($_POST["email"])){
				$emailErr = "Invalid email format";
			} 
			else {
				$email = $_POST["email"];
			}
			
			if (empty($_POST["date"])){
				$dateErr = "Please Enter Your Birth Date";
			} 
			else {
				$date = $_POST["date"];
			}
			
			
			if (empty($_POST["gender"])){
				$genderErr = "Please Enter Your Gender";
			} 
			else {
				$gender = $_POST["gender"];
			}
			if (($_POST["bloodGroup"])=="none"){
				$bgErr = "BloodGroup is required";
			} 
			else {
				$bloodGroup = $_POST["bloodGroup"];
			}
			
			if (empty($_POST["ssc"]) || empty($_POST["hsc"])){
				$examErr = "Minimum Degree SSC and HSC ";
			} 
			else {
				
				$exam = $_POST["ssc"].",".$_POST["hsc"];
				
				if(!empty($_POST["bsc"]))
					$exam =$exam.", ".$_POST["bsc"];
				if(!empty($_POST["msc"]))
					$exam =$exam.", ".$_POST["msc"];
			}
			
			
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h1>Lab Task 3 </h1>
		
				Name :
				<input type="text" name="name"/>
				<span style="color:red;">* <?php echo $nameErr;?></span>
				<br><br>
			
			
				Email :
				<input type="email" name="email"/>
				<span style="color:red;">* <?php echo $emailErr;?></span>
                <br><br>			
			
				Date of Birth :
				<input type="Date" name="date"/>
				<span style="color:red;">* <?php echo $dateErr;?></span>
			    <br><br> 
			
				Gender :
					<input type="radio" value="Male" name="gender"/>Male
					<input type="radio" value="Female" name="gender"/>Female
					<input type="radio" value="Other" name="gender"/>Others
				<span style="color:red;">* <?php echo $genderErr;?></span>
			     <br><br>
		
				Degree :
					<input type="checkbox" name="ssc" value="SSC"/>SSC
					<input type="checkbox" name="hsc" value="HSC"/>HSC
					<input type="checkbox" name="bsc" value="BSC"/>BSC
					<input type="checkbox" name="msc" value="MSC"/>MSC				
				<span style="color:red;">* <?php echo $examErr;?></span>
			    <br><br>
			
				Blood Group :
					<select name="bloodGroup">
						<option value="none"></option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
				<span style="color:red;">* <?php echo $bgErr;?></span>			
				<br><br>						
	
			
		
		
		<input type="submit" name="submit" value="Submit">  
</form>
	<br><br>



	<?php
	if($name!="" && $email!="" && $date!="" && $exam!="" && $gender!="" && $bloodGroup!="")
		{
			echo "<h3>Name : $name</h3>";
			echo "<h3>Email : $email</h3>";
			echo "<h3>Date of Birth : $date</h3>";
			echo "<h3>Gender : $gender</h3>";
			echo "<h3>Degree : $exam</h3>";
			echo "<h3>Blood group : $bloodGroup</h3>";
		}
	?>




<?php
class User{
  public $name;
  public $email;
  public $gender;

  function __construct($name, $email , $gender) {
    $this->name = $name;
    $this->email = $email;
    $this->gender = $gender;
  }
  function get_name() {
    return $this->name;
  }
  function get_email() {
    return $this->email;
  }
  function get_gender() {
    return $this->gender;
  }

}

$apple = new User($name, $email , $gender);
echo $apple->get_name();
echo "<br>";
echo $apple->get_email();
echo "<br>";
echo $apple->get_gender();
echo "<br>";

?>












  <?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

$txt = "Name: ". $apple->get_name()."\n";
fwrite($myfile, $txt);


$txt = "Email: ". $apple->get_email()."\n";
fwrite($myfile, $txt);


$txt = "Gender: ". $apple->get_gender()."\n";
fwrite($myfile, $txt);


fclose($myfile);
?>



<?php

	$dom = new DOMDocument();

		$dom->encoding = 'utf-8';

		$dom->xmlVersion = '1.0';

		$dom->formatOutput = true;

	$xml_file_name = 'user_list.xml';

		$root = $dom->createElement('users');

		$movie_node = $dom->createElement('user');

		$attr_movie_id = new DOMAttr('user_id', '5467');

		$movie_node->setAttributeNode($attr_movie_id);

	$child_node_title = $dom->createElement('name', $apple->get_name());

		$movie_node->appendChild($child_node_title);

		$child_node_year = $dom->createElement('gmail', $apple->get_email());

		$movie_node->appendChild($child_node_year);

	$child_node_genre = $dom->createElement('gender', $apple->get_gender());

		$movie_node->appendChild($child_node_genre);

		
		$root->appendChild($movie_node);

		$dom->appendChild($root);

	$dom->save($xml_file_name);

	echo "$xml_file_name has been successfully created";
?>





	
</body>
</html>