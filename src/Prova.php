<?php

namespace App;

class Prova
{

    public function QuestaoUm(int $n, array $arr)
    {
        asort($arr);
        $repeted = [];
        $result = [];
        foreach (array_count_values($arr) as $number => $count) {
            if ($count === 1) {
                $result[] = $number;
                continue;
            }

            $repeted[$number] = $count;
        }

        asort($repeted);

        foreach($repeted as $number => $count) {
            $numberArray = array_fill(0,$count, $number);
            foreach($numberArray as $value) {
                $result[] = $value;
            }
        }

        return $result;
    }

    public function QuestaoDois(int $n)
    {
        if ($n <= 1) {
            return [0];
        }

        $fibonacci = [];

        for($i = 0; $i < $n; $i++) {
            $size = count($fibonacci);

            if ($size === 0) {
                $fibonacci[] = 0;
                continue;
            }

            if($size === 1) {
                $fibonacci[] = 1;
                continue;
            }

            $last = $fibonacci[$size - 1];
            $nlast = $fibonacci[$size - 2];
            $fibonacci[] = $last + $nlast;
        }

        return $fibonacci;
    }

    public function QuestaoTres(string $s)
    {
        $magicCharacters = ['a', 'e', 'i', 'o', 'u'];
        $arr = str_split($s);
        $result = [];
        $index = 0;
        $char = 'a';
        $charKey = 0;
        $nextChar = 'e';

        while($index < count($arr)) {

            if ($char === $arr[$index]) {
                $result[$index] = $char;
                $nextChar = $magicCharacters[$charKey +1] ?? $char;
            }

            if(count($result) === 0) {
                $index++;
                continue;
            }

            if (!isset($arr[$index+1])) {
                $index++;
                continue;
            }

            if ($nextChar === $arr[$index+1]) {
                $char = $nextChar;
                $charKey++;
            }

            $index++;
        }

        if (end($result) === 'u') {
            return count($result);
        }

        return 0;
    }

    public function QuestaoQuatro(int $n, array $a, array $b, array $v)
    {
        $list = array_fill(1, $n, 0);

        for($i = 0; $i < count($a); $i++) {
            $start = $a[$i];
            $end = $b[$i];
            $value = $v[$i];

            for($start; $start <= $end; $start++) {
                $list[$start] += $value;
            }
        }

        return max($list);
    }
}
