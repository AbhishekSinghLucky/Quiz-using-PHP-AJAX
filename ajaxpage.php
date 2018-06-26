<?php
include "connection.php";

$myArray=array();
$sql3="SELECT answer_id from answer";//taking answer_id from the table to match with the selected radio button
$result3= mysqli_query($conn,$sql3);
while($row = mysqli_fetch_array($result3))
        {
array_push($myArray,$row["answer_id"]); 
        }
 $rightAnswer=0;$wrongAnswer=0;$unattempt=0;       
$answer1 = isset($_POST['answer1']) ? $_POST['answer1'] : '';
       
//print_r($myArray[2]);die;
        
                    if($answer1==$myArray[0])
                      {
                      $rightAnswer++;
                      }
                      if($answer1!= $myArray[0] && $answer1!='')
                      {
                      $wrongAnswer++;
                      }
                      if($answer1=='')
                      {
                      $unattempt++;
                      }
$answer2 = isset($_POST['answer2']) ? $_POST['answer2'] : '';
//        $answer2= $_POST['answer2'];
//        print_r($answer2);die;
                   if($answer2==$myArray[1])
                      {
                      $rightAnswer++;
                      }
                      if($answer2!= $myArray[1] && $answer2!='')
                      {
                      $wrongAnswer++;
                      }
                      if($answer2== '')
                      {
                      $unattempt++;
                       }
$answer3= isset($_POST['answer3']) ? $_POST['answer3']: '';
        
        if($answer3==$myArray[2])
        {
            $rightAnswer++;
        }
        if($answer3!=$myArray[2] && $answer3!='')
        {
            $wrongAnswer++;
        }
        if($answer3==''){
            $unattempt++;
        }

        
$answer4= isset($_POST['answer4']) ? $_POST['answer4']: '';
        
        if($answer4==$myArray[3]){
            $rightAnswer++;
        }
        if($answer4!=$myArray[3] && $answer4!=''){
            $wrongAnswer++;
        }
        if($answer4==''){
            $unattempt++;
        }    

$data = [
    'rightAnswer'  =>  $rightAnswer,    
    'wrongAnswer'  =>  $wrongAnswer,
    'unattempt'  =>  $unattempt

];

header('Content-Type: application/json');
$value1 =json_encode($data);
echo $value1;





//        echo "Correct Answer is  = ".$rightAnswer." ";
//        echo "InCorrecr Answer is  = ".$wrongAnswer." ";
//        echo "UnAttempted Question is  = ".$unattempt." ";
        
//    $.post('quizajax.php',{'rightValues':$rightAnswer,'wrongValues':$wrongAnswer,'unattempValues':$unattempt},function(res){
//            console.log(res);
//        }); 


  ?>      


                   