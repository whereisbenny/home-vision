<?php

// get posted data into local variables
$EmailFrom = Trim(stripslashes($_POST['inputEmail'])); 
$EmailTo = "info@homeandvision.co.nz";
$Subject = "Home &amp; Vision Website Enquiry";
$Name = Trim(stripslashes($_POST['inputFName'])); 
$Number = Trim(stripslashes($_POST['inputPhone']));
$Enquiry = Trim(stripslashes($_POST['inputNotes']));

// validation
$validationOK=true;
if (Trim($EmailFrom)=="") $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.php\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Contact Number: ";
$Body .= $Number;
$Body .= "\n";
$Body .= "Enquiry: ";
$Body .= "\n";
$Body .= "\n";
$Body .= $Enquiry;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../success.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=../error.php\">";
}
?>
