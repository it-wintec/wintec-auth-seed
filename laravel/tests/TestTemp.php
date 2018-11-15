<?php
/**
 * Created by PhpStorm.
 * User: Jaguar
 * Date: 12/09/18
 * Time: 12:19 AM
 */

namespace Tests;


class TestTemp
{

  function genData()
  {
    $list1 = [
      'Outdoors' => ['Footwear', 'Camping', 'Lights',],
      'Clothing' => ['Sleepwear', 'Pants', 'Tees', 'Sweaters', 'Hoodies', 'Outerwear',],
      'Bags' => ['Backpacks', 'Handbags',],
      'Shoes' => ['Flats', 'Boots', 'Sneakers', 'Sandals', 'Pumps',],
      'Toys' => ['Babywear', 'Electric Toys', 'Educational Toys', 'Arts & Crafts', 'RC Cars',],
//      'Electronics' => ['Speakers', 'MP4', 'Radios', 'Video', 'Headphones', 'Vitual Reality', 'Projectors',],
//      'Beauty' => ['Cleansing', 'Lip Care', 'Eye Shadows', 'Hair Styling', 'Blushers', 'Masks',],
//      'Jewelry' => ['Key Chains', 'Jewelry Sets', 'Gift Boxes', 'Bridal Jewelry Sets', 'Brooches', 'Anklets', 'Charms', 'Beads',]
    ];

    $list2 = [];

    foreach ($list1 as $key => $value) {
      foreach ($value as $v) {
        $number = mt_rand(1, 10);
        for ($i = 0; $i <= $number; $i++) {
          $amount = mt_rand(1, 10000);
          $item = [$key, $v, $amount, $this->genTime()];
          $list2[] = $item;
        }
      }
    }

    usort($list2, array($this, "cmp"));

    $list3 = [];
    $count = count($list2);

    for ($i = 0; $i < $count; $i++) {
      $line = ($i + 1) . "," . implode(',', $list2[$i]) . "\n";
      $list3[] = $line;
    }

    print_r($list3);

    $dataFile = fopen("data.csv", "w");
    fwrite($dataFile, implode("", $list3));
    fclose($dataFile);

  }

  function genTime()
  {
    $begin = strtotime("1 October 2017");
    $end = strtotime("30 October 2017");
    $timeStamp = rand($begin, $end);
    return date("Y-m-d H:i:s", $timeStamp);
  }


  function cmp($a, $b)
  {
    if ($a[3] == $b[3]) {
      return 0;
    }
    return ($a[3] < $b[3]) ? -1 : 1;
  }

}

$test = new TestTemp();
$test->genData();


