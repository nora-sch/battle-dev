 
$array = [];

foreach ($input as $entry) {
    $entry = (explode(" ", $entry));
    $numbers = explode("-", $entry[0]);
    $numberMin = $numbers[0];
    $numberMax = $numbers[1];
    $letter = str_replace(':', '', $entry[1]);;
    $password = $entry[2];
    $count = substr_count($password, $letter);
    $match = 0;
    if ($count >= $numberMin && $count <= $numberMax) {
        $match++;
        array_push($array, $match);
    }
}
$result=count($array);
    echo($result);