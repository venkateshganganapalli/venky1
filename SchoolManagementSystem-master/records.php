<?php 
session_start();
if(isset($_SESSION['pwd']))
header("Location:error.php");
?>

<?php 

if(!isset($_SESSION['aid']))
header("Location:adminlogin.php");
?>




<?php
	$msg="";
	
	if(isset($_REQUEST['update'])){
	$h=mysql_connect("localhost","root","");
	mysql_select_db("stp16"); 
	$qry="update marks set attn='$_REQUEST[attn]', marks='$_REQUEST[marks]' where roll='$_REQUEST[roll]'";
	mysql_query($qry);
	if(mysql_affected_rows()>0)
		$msg="<b><font color=green>Record Updated Successfully</font></b>";
	else
		$msg="<b><font color=red>Please fill all the fields to be updated along with the correct roll number and then submit</font></b>";}
		
		
	if(isset($_REQUEST['add'])){
	$h=mysql_connect("localhost","root","");
	mysql_select_db("stp16"); 
	$qry="insert into marks values('$_REQUEST[roll]','$_REQUEST[attn]','$_REQUEST[marks]')";
	mysql_query($qry);
	if(mysql_affected_rows()>0)
		$msg="<b><font color=green>Record Successfully Inserted</font></b>";
	else
		$msg="<b><font color=red>Error in Inserting Record</font></b>";}





?>


<script>
function Validate()
{
	
	
	flag=true;
	if(document.getElementById("rv").value=="")
	{document.getElementById("rv").style='border-color:red';
	flag=false;document.getElementById("msg").innerHTML='<font color=red><b>Error in Inserting Record</b></font>';

	}
	else
	document.getElementById("rv").style="";
	
		
	if(document.getElementById("mv").value=="")
	{document.getElementById("mv").style='border-color:red';
	flag=false;document.getElementById("msg").innerHTML='<font color=red><b>Error in Inserting Record</b></font>';

	}
	else
	document.getElementById("mv").style="";
	
		
	if(document.getElementById("av").value=="")
	{document.getElementById("av").style='border-color:red';
	flag=false;document.getElementById("msg").innerHTML='<font color=red><b>Error in Inserting Record</b></font>';

	}
	else
	document.getElementById("av").style="";
	
	
	
	return flag;
}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Records</title>



</head>

<body>

	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/custom-style.css">
 <link type="text/css" href="css/menu.css" rel="stylesheet" />


	<header class="wrapper">
    	<div class="pull-left">
       		<a href="index.php" class="bg-logo"><img src="images/logo.png"/></a>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="bg-nav">
        
        	<div id="menu">

             <ul class="menu">
                <li><a href="index.php"><span>HOME</span></a></li> 
                                               <li><?php
				if(isset($_SESSION['aid'])||isset($_SESSION['pwd'])) echo '<a href="logout.php"><span>LOGOUT</span></a>'; else echo'<a href="#"><span>LOGIN</span></a>
                <div><ul>
                        <li><a href="studentlogin.php"><span>Student Login</span></a></li>
                        <li><a href="adminlogin.php"><span>Admin Login</span></a></li>
                        </ul></div>';?></li>              
                <li><a href="#"><span>ABOUT US</span></a>
                	<div><ul>
                        <li><a href="history.php"><span>Our History</span></a></li>
                        <li><a href="mission.php"><span>Our Mission</span></a></li>
                        <li><a href="inspiration.php"><span>Our Inspiration</span></a></li>
                        <li><a href="prayer.php"><span>Our Prayer</span></a></li>
                        <li><a href="institution.php"><span>Our Institution</span></a></li>
                        <li><a href="aim.php"><span>Our Aim</span></a></li>
                        <li><a href="teacher.php"><span>Our Teachers</span></a></li>
                        </ul>
                     </div>
                </li>
                <li><a href="message.php"><span>Principal Message</span></a></li>
                <li><a href="#"><span>Our Schools</span></a>
                	<div><ul>
                    	<li><a href="admission.php"><span>Admission</span></a></li>       
                		<li><a href="E-Learning.php"><span>E-Learning</span></a></li>  
                        <li><a href="ten.php"><span>Commandments</span></a></li>
                        <li><a href="curriculum.php"><span>Curriculum</span></a></li>
                        <li><a href="regulation.php"><span>School Regulation</span></a></li>
                        <li><a href="uniform.php"><span>Hours and Uniform</span></a></li>
                        <li><a href="hindi-school.php"><span>Hindi School</span></a></li>
                        
                        </ul>
                     </div>
                </li>       
                <li><a href="#"><span>STUDENTS LIFE</span></a>
                	<div><ul>
                        <li><a href="extra.php"><span>Extra Curricular</span></a></li>
                        <li><a href="leadership.php"><span>Students Leadership</span></a></li>
						<li><a href="uploadoptions.php"><span>Upload Article</span></a></li>
                        <li><a href="articleoptions.php"><span>View Uploaded Articles</span></a></li></ul>
                     </div>
                </li> 
                  
                    <li><a href="gallery.php"><span>GALLERY</span></a></li>
                
                <li><a href="contactus.php"><span>CONTACT US</span></a></li>
             </ul>   
                
        </div>
         <div style="visibility:hidden">
            <a href="http://apycom.com/">Apycom jQuery Menus</a>
            </div>
    </header>
 <div class="wrapper">

 <article class="bg-static-content">

<div class="margin20">
<div class="clearfix">&nbsp;</div>
<form method="post" onSubmit="return Validate()">
<fieldset>
<legend>Enter Details</legend>
<center>
<table width=50%>
<tr><td align="center">Roll Number</td><td align="center"><input type="text" name="roll" value="" id="rv"/></td></tr>
<tr><td align="center">Attendence Percentage</td><td align="center"><input type="text" name="attn" value="" id="av"/></td></tr>
<tr><td align="center">Percentage Marks</td><td align="center"><input type="text" name="marks" value="" id="mv"/></td></tr>
</table>
</center>
</fieldset>
<center>
<input type="submit" name="add" value="SUBMIT RECORD" />
<input type="submit" name="update" value="UPDATE RECORDS" />
</center>
</form><a href="options.php">Back to Admin Options</a><br>
<center><div id="msg"><?php if(isset($_REQUEST['add'])||isset($_REQUEST['update'])){echo $msg;}?></div></center>
	
</div>
</article>

    </div>

    <footer>
    	<div class="wrapper">
        	 	        	<div class="one-fourth">
            	<h1>About Us</h1>
                	<ul>
                    	<li><a href="history.php" class="li-footer">Our History</a></li>                     	<li><a href="mission.php" class="li-footer">Our Mission</a></li>                     	<li><a href="inspiration.php" class="li-footer">Our Inspiration</a></li>                     	<li><a href="prayer.php" class="li-footer">Our Prayer</a></li>                     	
                  </ul>
            </div>
           <div class="one-fourth">
            <h1>Associate With School</h1>
            	<ul>
					   <li><a href="institution.php" class="li-footer">Our Institution</a></li>
                       <li><a href="gallery.php" class="li-footer">Photo Gallery</a></li>
                       <li><a href="teacher.php" class="li-footer">Our Teachers</a></li>
                       <li><a href="contactus.php" class="li-footer">Contact Us</a></li>
                 </ul>
            </div>
            <div class="one-fourth last">
            <h1>&nbsp;</h1>
            <p class="footer-para">
                Copyright<br/>
                St. Joseph Convent Hg. Sec. School<br/>
                All Rights Reserved<br/>
				Powered By
				<a href="http://schoolsindia.com/" target="_blank" class="li-footer" style="color:#FF0000">Schoolsindia</a>
            </p>
            </div>
            <div class="clearfix">&nbsp;</div>
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
	<!--[if lt IE 9]> <script src="js/selectivizr-and-extra-selectors.min.js"></script> <![endif]-->
	<script src="js/jquery.easing-1.3.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.smartStartSlider.min.js"></script>
	<script src="js/jquery.jcarousel.min.js"></script>
	<script src="js/jquery.cycle.all.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/audioplayerv1.min.js"></script>
	<script src="//maps.google.com/maps/api/js?sensor=false"></script>
	<script src="js/jquery.gmap.min.js"></script>
	<script src="js/custom.js"></script>
   <script type="text/javascript" src="js/menu.js"></script>
</body>

</html>

