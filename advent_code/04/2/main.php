<?php
require '../../../vendor/autoload.php';
/**********************************************************************/
/******************** REPRENDRE POUR CHAQUE EXERCICE ******************/

// Nom du fichier de test - Changer le nom pour changer le fichier testé
const INPUT_FILENAME = 'input2.txt';

// 1°) Lecture du fichier de d'entrée
$input = [];
$file = fopen(INPUT_FILENAME, 'r');
while ($line = fgetcsv($file)) {
    $input[] = $line[0];
}

/**********************************************************************/

$string1 = implode(" ", $input);

$arr2 = explode(" ", $string1);

$lastKey = count($arr2) - 1;

$arr3 = [];
$arr4 = [];

for ($i = 0; $i < count($arr2); $i++) {
    // echo $arr2[$i]."<br/>";
    array_push($arr3, $arr2[$i]);
    if ($arr2[$i] !== "" || $arr2[$i] !== " ") {
        // array_push($arr3, $arr2[$i]);
        // echo $arr2[$i]."<br/>";
    }
    if ($arr2[$i] === " " || $arr2[$i] === "" || $arr2[$i] == $arr2[$lastKey]) {
        array_push($arr4, $arr3);
        $arr3 = [];
    }
}

$arr7 = [];
$arr8 = [];

foreach ($arr4 as $row) {
    $string5 = implode(" ", $row);
    $arr6 = explode(" ", $string5);

    for ($i = 0; $i < count($arr6); $i++) {

        $key = substr($arr6[$i], 0, 3);
        $value = substr($arr6[$i], 4);
        //echo "  line ".$i."<br/>";
        $arr7[$key] = $value;
    }
    array_push($arr8, $arr7);
    $arr7 = [];
}

$count = 0;
foreach ($arr8 as $passport) {
    if (
        array_key_exists('byr', $passport)
        && array_key_exists('iyr', $passport)
        && array_key_exists('eyr', $passport)
        && array_key_exists('hgt', $passport)
        && array_key_exists('hcl', $passport)
        && array_key_exists('ecl', $passport)
        && array_key_exists('pid', $passport)
    ) {
        $count++;
    }
}
// echo ($count);
// dd($arr8);
// 203 is too low 
// 206 OK <-- avec 3 tables cassées

//================================================================================================================================//
$validity = [];
$validityTable = [];
foreach ($arr8 as $arr7a) {

    //==================================================== BYR =================================================================// 
    // byr (Birth Year) - four digits; at least 1920 and at most 2002.    
    if (isset($arr7a['byr']) && $arr7a['byr'] >= 1920 && $arr7a['byr'] <= 2002 && strlen($arr7a['byr']) == 4) {
        array_push($validity, 'O');
        //echo $entry . "<br/>"; 
    }
    if (!isset($arr7a['byr']) || $arr7a['byr'] < 1920 || $arr7a['byr'] > 2002 || strlen($arr7a['byr']) != 4) {
        array_push($validity, 'X');
    }
    //==================================================== IYR =================================================================//
    // iyr (Issue Year) - four digits; at least 2010 and at most 2020.
    if (isset($arr7a['iyr']) && $arr7a['iyr'] >= 2010 && $arr7a['iyr'] <= 2020 && strlen($arr7a['iyr']) == 4) {
        array_push($validity, 'O');
    }
    if (!isset($arr7a['iyr']) || $arr7a['iyr'] < 2010 || $arr7a['iyr'] > 2020 || strlen($arr7a['iyr']) != 4) {
        array_push($validity, 'X');
    }
    //==================================================== EYR =================================================================//        
    //eyr (Expiration Year) - four digits; at least 2020 and at most 2030.
    if (isset($arr7a['eyr']) && $arr7a['eyr'] >= 2020 && $arr7a['eyr'] <= 2030 && strlen($arr7a['eyr']) == 4) {
        array_push($validity, 'O');
    }
    if (!isset($arr7a['eyr']) || $arr7a['eyr'] < 2020 || $arr7a['eyr'] > 2030 || strlen($arr7a['eyr']) != 4) {
        array_push($validity, 'X');
    }
    //==================================================== HGT =================================================================//
    // hgt (Height) - a number followed by either cm or in:
    // If cm, the number must be at least 150 and at most 193.
    // If in, the number must be at least 59 and at most 76.

    if (isset($arr7a['hgt'])) {
        if (substr($arr7a['hgt'], -2) === 'cm' && substr($arr7a['hgt'], 0, -2) >= 150 && substr($arr7a['hgt'], 0, -2) <= 193) {
            array_push($validity, 'O');
        }
        if (substr($arr7a['hgt'], -2) === 'in' && substr($arr7a['hgt'], 0, -2) >= 55 && substr($arr7a['hgt'], 0, -2) <= 76) {
            array_push($validity, 'O');
        }
        if (substr($arr7a['hgt'], -2) === 'cm' && substr($arr7a['hgt'], 0, -2) < 150 && substr($arr7a['hgt'], 0, -2) > 193) {
            array_push($validity, 'X');
        }
        if (substr($arr7a['hgt'], -2) === 'in' && substr($arr7a['hgt'], 0, -2) < 55 && substr($arr7a['hgt'], 0, -2) > 76) {
            array_push($validity, 'X');
        }
    }
    if (!isset($arr7a['hgt'])) {
        array_push($validity, 'X');
    }
    //==================================================== HCL =================================================================//
    // hcl (Hair Color) - a # followed by exactly six characters 0-9 or a-f.
    $colorindex = substr($arr7a['hcl'], 1);

    if (isset($arr7a['hcl'])  && strlen($colorindex) == 6) {
     
      
           
            if(preg_match("@[0-9]@", $colorindex) == 0 || preg_match("@[a-f]@", $colorindex) == 0){
                array_push($validity, 'X');
                
 }array_push($validity, 'O');
                     
 
    }
    if (!isset($arr7a['hcl']) || strlen($colorindex)  != 6) {
        array_push($validity, 'X');
    }
    //==================================================== ECL =================================================================//
    //ecl (Eye Color) - exactly one of: amb blu brn gry grn hzl oth.
    if (isset($arr7a['ecl'])) {
        if ($arr7a['ecl'] == 'amb' || $arr7a['ecl'] == 'blu' || $arr7a['ecl'] == 'brn' || $arr7a['ecl'] == 'gry' || $arr7a['ecl'] == 'grn' || $arr7a['ecl'] == 'hzl' || $arr7a['ecl'] == 'oth')
            array_push($validity, 'O');
    } else {
        array_push($validity, 'X');
    }
    if (!isset($arr7a['ecl'])) {
        array_push($validity, 'X');
    }

    //==================================================== PID =================================================================//
    // pid (Passport ID) - a nine-digit number, including leading zeroes.

    if (isset($arr7a['pid']) && strlen($arr7a['pid']) == 9 && is_numeric($arr7a['pid']) === true) {
        array_push($validity, 'O');
    }
    if (!isset($arr7a['pid']) || strlen($arr7a['pid']) != 9 || is_numeric($arr7a['pid']) === false) {
        array_push($validity, 'X');
    }
    array_push($validityTable, $validity);
    $validity=[];
}
$count2=0;
foreach($validityTable as $passport){
    if (!in_array("X", $passport)) {
        echo "Got Irix";
        $count2++;
    }
}
echo($count2);
dd($validityTable);
