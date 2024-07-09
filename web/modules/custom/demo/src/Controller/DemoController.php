<?php
namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Demo routes.
 */
class DemoController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function content() {
    $i= 0;
    $j = 1;
    print $i. "<br>"; 
    print $j. "<br>";
    for ($k = 0; $k<=10; $k++) {
      $s = $i + $j;
      $i= $j;
      $j = $s;
      print $s."<br>"   ;
    }

    $arr = [1,2,3,2,4,5,3,6,5,6,5,6];
    $duplicateArr = [];
    print_r($arr)."<br>";
    for ($t = 0; $t < count($arr); $t++) {  
      //print "t  = ". $arr[$t]. "<br>";
      for ($l = $t + 1; $l < count($arr); $l++) {
        //print "l  = ". $arr[$l]. "<br>";
        if ($arr[$t] == $arr[$l]) {
          if (!in_array($arr[$t], $duplicateArr)) {
            $duplicateArr[] = $arr[$t];
          }
        }
      } 
    } 
    print "<br>duplicate = "; print_r($duplicateArr);
    
    print "============-=================<br>";

    $num = 123456789; $n = '';
    $temp = $num;
    for ($i = 0; $i < strlen($num); $i++) {
      $n .= $temp % 10;
      $temp = $temp/10;
      
    } 
     
$num = 123456;  
$revnum = 0;  
while ($num > 1)  
{  
$rem = $num % 10;  
$revnum = ($revnum * 10) + $rem;  
$num = ($num / 10);   
}  
echo "Reverse number of 23456 is: $revnum";  


    // $build['content'] = [
    //   '#type' => 'item',
    //   '#markup' => $this->t('It works!'),
    // ];
    // return $build;
    }
  
}
