<?php
for ($j = 0, $t = 10; $j < $t; $j++) {
    // $c 要足够大才能表现准确概率
    // 至少要高出4、5个数量级
    $c = 1000000; $s = 0;
    for ($i = 0; $i < $c; $i++) {
        $n = rand(0,9);
        if (5 === $n) {
            $s++;
        }
    }

    echo "$j: ", round($s/$c*100), '%', PHP_EOL;
}

