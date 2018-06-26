<?php
include "connection.php";
?>         
<html>
    <head><title>PHP MSQL JAVASCRIPT QUIZ</title></head>
    <body>
        <form action="ajaxpage.php">
        <?php
        for($i=1;$i<10;$i++){
        $sql="SELECT * from question where id ='$i'";
        $result= mysqli_query($conn,$sql);
       while($row = $result->fetch_assoc())
       {
           echo $row["id"];echo ". ";
            echo $row["qsn"];
       }
        $sql2="SELECT * from options where id = '$i'";
        $result2=mysqli_query($conn,$sql2);
        while($row2= mysqli_fetch_assoc($result2)){
           
            echo "<br><br>";?>
        <?php echo '<input type="radio" name="q'.$i.'" value="1"> '.$row2["option1"].'<br>'; ?>
        <?php echo '<input type="radio" name="q'.$i.'" value="2"> '.$row2["option2"].'<br>'; ?>
        <?php echo '<input type="radio" name="q'.$i.'" value="3"> '.$row2["option3"].'<br>'; ?>
        <?php echo '<input type="radio" name="q'.$i.'" value="4"> '.$row2["option4"].'<br><br>'; 
        }
        }
       ?>
        <button type="button" onclick="myfunction_submit()">Submit</button> <br><br>

        
                <div class="result"></div>

        </form>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
        var i,j,b,d,f,h,rightAnswer=0,wrongAnswer=0,unattempt=0;
      
         function myfunction_submit()
            {
                var a= document.getElementsByName("q1");
                for(j=0;j<a.length;j++){
                  if(a[j].checked){
                   b=a[j].value;
                    
            }
            }
                var c=document.getElementsByName("q2");
                for(i=0;i<c.length;i++){
                    if(c[i].checked){
                        d=c[i].value;
//                        console.log(d);
                    }
                }
                
                var e=document.getElementsByName("q3");
                for(i=0;i<e.length;i++){
                    if(e[i].checked){
                        f=e[i].value;
//                        console.log(f);
                    }
                }
                var g=document.getElementsByName("q4");
                for(i=0;i<g.length;i++){
                    if(g[i].checked){
                        h=g[i].value;
                    }
                }
                $.post('ajaxpage.php',{'answer1':b,'answer2':d,'answer3':f,'answer4':h},function(res){
                    console.log(res);
//                    if(res.length) {
                        var result = '';
//                    console.log(result);
                        result += 'Total Right Answers: ' + res.rightAnswer;
                        result += '<br>Total Wrong Answers: ' + res.wrongAnswer;
                     result += '<br>Total Unattempted Answers: ' + res.unattempt;
                        
                        $('.result').html(result);
                        
//                    }
                });
           
                
                
            }
//            <?php
//            $rightValues= isset($_POST['rightValues']) ? $_POST['rightValues']: '';
//            $wrongValues= isset($_POST['wrongValues']) ? $_POST['wrongValues']: '';
//            $unattempValues= isset($_POST['unattempValues']) ? $_POST['unattempValues']: '';
//            
//            print_r($rightValues);
//            print_r($wrongValues);
//            print_r($unattempValues);
//            
////            echo "Corret Answer = ".$rightValues."";
////            echo "InCorret Answer = ".$wrongValues."";
////            echo "UnAttempted Question is  = ".$unattempValues."";
//
//
//            ?>
//            {
//           var a= document.getElementsByName("q1"); 
//           for(j=0;j<a.length;j++){
//               if(a[j].checked){
//                b=a[j].value;
//                console.log(b);
//                   if(b==<?php //echo $myArray[0] ?>){
//                      rightAnswer++
//                      }
//                     if(b!=<?php //echo $myArray[0] ?> ){
//                       wrongAnswer++;
//                      }
//                    }
//                  }if(b== undefined){
//                        unattempt++;
//                    }
//                
//                var c=document.getElementsByName("q2");
//                for(i=0;i<c.length;i++){
//                    if(c[i].checked){
//                        d=c[i].value;
//                        console.log(d);
//                        if(d==<?php// echo $myArray[1] ?>){
//                           rightAnswer++;
//                           }
//                           if(d!= <?php// echo $myArray[1] ?>){
//                            wrongAnswer++;
//                        }
//                    }
//                }if(d== undefined){
//                    unattempt++;
//                }
//                
//                var e=document.getElementsByName("q3");
//                for(i=0;i<e.length;i++){
//                    if(e[i].checked){
//                        f=e[i].value;
//                        console.log(f);
//                        if(f==<?php // echo $myArray[2] ?>){
//                           rightAnswer++;
//                           }
//                           if(f!=<?php //echo $myArray[2] ?>){
//                            wrongAnswer++;
//                        }
//                    }
//                }if(f==undefined){
//                    unattempt++;
//                }
//                
//                 var g=document.getElementsByName("q4");
//                for(i=0;i<g.length;i++){
//                    if(g[i].checked){
//                        h=g[i].value;
//                        console.log(h);
//                        if(h==<?php// echo $myArray[3] ?>){
//                           rightAnswer++;
//                           }
//                           if(h!=<?php// echo $myArray[3] ?>){
//                            wrongAnswer++;
//                        }
//                    }
//                }if(h==undefined){
//                    unattempt++;
//                }
//                
//                var attempt=rightAnswer+wrongAnswer;
//        document.write("Correct Answer = "+rightAnswer+"<br>");
//        document.write("InCorrect Answer = "+wrongAnswer+"<br>");
//        document.write("Question Attempted = "+attempt+"<br>");
//        document.write("Question Unattempted = "+unattempt+"<br>");
//                }
  
    </script> </body>
</html>

