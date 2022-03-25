<?php
/**
 * @param int $n
 * @return array н простых чисел
 *
 */
function simpleNumbers(int $n)
{
    $simpleNumber = [];

    for ($k = 2; $k < $n * 4; $k++) {
        $j = 0;
        for ($i = 2; $i * $i <= $k && $j != 1; $i++) {
            if (($k % $i) === 0) {
                $j = 1;
            }
        }
        if ($j != 1) {
            $simpleNumber[] = $k;
        }
    }

    $easy = [];
    $p = 0;

    foreach ($simpleNumber as $number) {
        $p++;
        if ($p <= $n) {
            $easy[] = $number;
        }
    }

    return $simpleNumber;
}
echo '<pre>';
//var_dump(simpleNumbers(20));

function easy($n)
{
    $result = [];
    $count = 2;
    $isSimple = true;

    while(count($result) < $n) {
        for($i = 2; $i < $count; $i++) {
            if($count % $i === 0) {
                $isSimple = false;
                break;
            }
        }

        if($isSimple) {
            $result[] = $count;
        }

        $isSimple = true;
        ++$count;

    };

    return $result;
}
var_dump(easy(4));

    function simpleNumbersVTwo(int $n): array
    {
        $max = $n * $n;
        $primer = [2, 3, 5];

        for ($i = 7; $i < $max; $i++) {
            $sqrtI = sqrt($i);

            for ($j = 0; $primer[$j] <= $sqrtI; $j++) {
                if ($i % $primer[$j] === 0) {
                    continue;
                }
            }
            $primer[] = $i;
        }

        $easy = [];
        $p = 0;

        foreach ($primer as $number) {
            $p++;
            if ($p <= $n) {
                $easy[] = $number;
            }
        }

        return $easy;
    }

//var_dump(simpleNumbersVTwo(3));

    /**
     * @param int $n
     * @return int число вызовов + н
     */
    function getMagicNumber(int $n): int
    {
        static $count = 0;
//        $count = $count + 1 + $n;

        return $n + $count++;

    }
echo(getMagicNumber(1)) . '</br>';
echo(getMagicNumber(1)) . '</br>';
echo(getMagicNumber(1)) . '</br>';


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


    ?>