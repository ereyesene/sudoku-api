<?php
namespace App\Library\Services;
// Use App\Sudoku;
  
class SudokuLib
{
  public function test()
  {
    return 'hola mundo';
  }

  public function generateSudoku(){
    $sudokuList = [
      "200007500065010004700050000000006903600000078074001000000400001437000095902538000",
      "000090501000000020830020000004016750300075018050000090410000902703000100020650004",
      "010000000687000010000097003000000000700000340040926000009605002002030000500019700",
      "600157000300204090010006040260010803500000924003900005130602000946831700700049010",
      "090083000000900007008000010200064000030000000000102070020000340050040020000006001",
      "308062015400000060060070008802400107000008300000053280000500670200000000010020540",
      "290005000500703409000908561000040610900800007003672080640050800820306045305200100",
      "470000608062000040000004201890506037006000805000001002900000580687000000050063000",
      "000400190030000860007083500000008600805100000020000350081040000000070000040250000",
      "085000009704580100000000038026810005800004720070000091000900000000070910190600050"
    ];

    $sudokuItem = $sudokuList[round(rand(0,9))];
    return $this->ceroToNull($sudokuItem);
  }


  public function generateSudokuFromJson($jsonObj){
    $out = new \Symfony\Component\Console\Output\ConsoleOutput();
    $puzzle = array();
    for ($i = 0; $i < 9; $i++) {
      for ($j = 0; $j < 9; $j++) {
        $puzzle[$i][$j] = 0;
      }
    }
    
    foreach($jsonObj->all() as $item){
      $puzzle[$item["y"]][$item["x"]] = $item["value"];
    }

    $str = "";

    for ($k = 0; $k < sizeof($puzzle); $k++) {
      for ($z = 0; $z < sizeof($puzzle[$k]); $z++) { 
        $str .= $puzzle[$k][$z];
      }
    }

    //$out->writeln(sizeof($puzzle));
    $out->writeln($str);
    return $this->ceroToNull($str);
  }




  function ceroToNull($items){
    $data = str_split($items);
    $tranformed = [];
    foreach ($data as $number) {
      if($number ==0){
        $tranformed[]= null;
      } else {
        $tranformed[]= $number;
      };
    }
    return $tranformed;
  }
}