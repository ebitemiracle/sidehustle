<?php

$voter_age = 18;
$voter_have_pvc = true;
$voter_ward = "020";
// Checkif user's age is number
if(!is_numeric($voter_age)){
    echo "Your age must be a number.";
    exit();
}

// Check if user is an adult
if($voter_age<18){
   echo "You must be above 18 to be eligible to vote." ;
   exit();
}

// Check if user has PVC
if(!$voter_have_pvc){
    echo "You must have a PVC to vote.";
    exit();
}

// Validate user's ward
if($voter_ward!=="020"){
    echo "Only those in ward ".$voter_ward." are allowed to vote";
    exit();
}
// Voter makes it here if they were validated successfully without any problems
echo "Hi buddy, you are eligible to vote. Your information are: Age: ".$voter_age.", PVC status: ".($voter_have_pvc==true?"Valid":"Invalid")." Ward: ".$voter_ward;
// End
?>
