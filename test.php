<?php

require __DIR__ . '/App/autoloader.php';
///**
// * @param int $n
// * @return array н простых чисел
// *
// */
//function simpleNumbers(int $n)
//{
//    $simpleNumber = [];
//
//    for ($k = 2; $k < $n * 4; $k++) {
//        $j = 0;
//        for ($i = 2; $i * $i <= $k && $j != 1; $i++) {
//            if (($k % $i) === 0) {
//                $j = 1;
//            }
//        }
//        if ($j != 1) {
//            $simpleNumber[] = $k;
//        }
//    }
//
//    $easy = [];
//    $p = 0;
//
//    foreach ($simpleNumber as $number) {
//        $p++;
//        if ($p <= $n) {
//            $easy[] = $number;
//        }
//    }
//
//    return $simpleNumber;
//}
//echo '<pre>';
////var_dump(simpleNumbers(20));
//
//function easy($n)
//{
//    $result = [];
//    $count = 2;
//    $isSimple = true;
//
//    while(count($result) < $n) {
//        for($i = 2; $i < $count; $i++) {
//            if($count % $i === 0) {
//                $isSimple = false;
//                break;
//            }
//        }
//
//        if($isSimple) {
//            $result[] = $count;
//        }
//
//        $isSimple = true;
//        ++$count;
//
//    };
//
//    return $result;
//}
//
//
//    function simpleNumbersVTwo(int $n): array
//    {
//        $max = $n * $n;
//        $primer = [2, 3, 5];
//
//        for ($i = 7; $i < $max; $i++) {
//            $sqrtI = sqrt($i);
//
//            for ($j = 0; $primer[$j] <= $sqrtI; $j++) {
//                if ($i % $primer[$j] === 0) {
//                    continue;
//                }
//            }
//            $primer[] = $i;
//        }
//
//        $easy = [];
//        $p = 0;
//
//        foreach ($primer as $number) {
//            $p++;
//            if ($p <= $n) {
//                $easy[] = $number;
//            }
//        }
//
//        return $easy;
//    }
//
////var_dump(simpleNumbersVTwo(3));
//
//    /**
//     * @param int $n
//     * @return int число вызовов + н
//     */
//    function getMagicNumber(int $n): int
//    {
//        static $count = 0;
////        $count = $count + 1 + $n;
//
//        return $n + $count++;
//
//    }
//


//function getMagicNumberRecurs(int $n, int $count = $m): int
//{
//    $connt = 0;
//
//    $connt = $connt + 1 + $n;
//
//    $summ = $count +$m;
//
//    return $connt;
//
//}
/**
 * 1)!A человека возраст < 48 зп = зп*0,5
 * 2)!A человека ЗП > 30000 меняем имя на пред чел если есть
 * 3)у всех кто старше 80 и зп <20000 удаляем имя и добавляем нового чела с таким же именем и возрастом = (0,2*возраст текушего) /ЗП
 */
$name = ['Petya', 'Vasya'];
$age = [28, 81, 16];
$cash = [16000, 19000, 42000, 8000];
//var_dump($name);
//var_dump($age);
//var_dump($cash);


//foreach ($name as $key => $men){
//        if ($age[$key] < 48){
//            $cash[$key] = $cash[$key] * 0.5;
//        }
//
//        if ($cash[$key] > 30000){
//            $name[$key] = $name[$key-1] ?? $men[$key];
//        }
//
//        if($age[$key] > 80 || $cash[$key] < 20000){
//            $name[] = $men;
//            $age[$key + 2] = ($age[$key] * 0.2) / $cash[$key];
//            unset($name[$key]);
//        }
//}

//$i = 0;
//$data = [];
//
//while (true) {
//    if ((!isset($name[$i])) && (!isset($age[$i])) && (!isset($cash[$i]))) {
//        break;
//    }
//    $name[$i] = $name[$i] ?? null;
//    $age[$i] = $age[$i] ?? null;
//    $cash[$i] = $cash[$i] ?? null;
//    $data[] = ['name' => $name[$i], 'age' => $age[$i], 'cash' => $cash[$i]];
//    $i++;
//}
//echo '<pre>';
//var_dump($data);
//
//foreach ($data as $key => $human) {
//
//    if ($human['age']< 48){
//        $data[$key]['cash'] = $human['cash'] * 0.5;
//    }
//
//    if ($human['cash'] > 30000){
//        $data[$key]['name'] = $data[$key-1]['name'] ?? $human['name'];
//
//    }
//
//    if ($human['age'] > 80 || $human['cash'] < 20000){
//        $human[$key+1]['name'] = $human['name'];
//        $human[$key+1]['age'] = ($human['age'] * 0.2) / $human['cash'];
//        unset($human['name']);
//    }
//}
//
//
//echo '<hr>';
//var_dump($data);

//function generate($x){
//    for($x;$x<10;$x++){
//        yield $x;
//    }
//}
//
//foreach (generate(5) as $item){
//    echo $item;
//}

$model=['Article', 'Author'];

$function = [

    'title' => function(\App\Models\Article $article) {

        return $article->title;

    },

    'trimmedText' => function(\App\Models\Article $article) {

        return mb_strimwidth($article->content, 0, 100);

    }

];
$admin = new \App\AdminDataTable($model, $function);
echo '<pre>';
var_dump($admin);
?>

