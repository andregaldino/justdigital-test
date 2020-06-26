<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Prova;

class ExamTest extends TestCase
{

    public function testQuestaoUm()
    {
        $prova = new Prova();
        $this->assertEquals($prova->QuestaoUm(5, [3, 1, 2, 2, 4]),
            [1, 3, 4, 2, 2], 
            PHP_EOL."==========================================".PHP_EOL.
            "QUESTÃO 01 - CASO 01 - Foi encontrado um erro!");
        $this->assertEquals($prova->QuestaoUm(10, [8, 5, 5, 5, 5, 1, 1, 1, 4, 4]),
            [8, 4, 4, 1, 1, 1, 5, 5, 5, 5], 
            PHP_EOL."==========================================".PHP_EOL.
            "QUESTÃO 01 - CASO 02 - Foi encontrado um erro!");
        $this->assertEquals($prova->QuestaoUm(7, [1, 2, 3, 7, 1, 8, 2]),
            [3, 7, 8, 1, 1, 2, 2], 
            PHP_EOL."==========================================".PHP_EOL.
            "QUESTÃO 01 - CASO 03 - Foi encontrado um erro!");
    }

    public function testQuestaoDois()
    {
        $prova = new Prova();
        $this->assertEquals($prova->QuestaoDois(4), [0, 1, 1, 2],
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 02 - Caso 01 - ERRO');
        $this->assertEquals($prova->QuestaoDois(5), [0, 1, 1, 2, 3],
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 02 - Caso 02 - ERRO');
        $this->assertEquals($prova->QuestaoDois(8), [0, 1, 1, 2, 3, 5, 8, 13],
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 02 - Caso 03 - ERRO');
        $this->assertEquals($prova->QuestaoDois(1), [0], 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 02 - Caso 04 - ERRO');
        $this->assertEquals($prova->QuestaoDois(3), [0, 1, 1], 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 02 - Caso 05 - ERRO');
        $this->assertEquals($prova->QuestaoDois(10),
            [0, 1, 1, 2, 3, 5, 8, 13, 21, 34], 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 02 - Caso 06 - ERRO');
    }

    public function testQuestaoTres()
    {
        $prova = new Prova();
        $this->assertEquals($prova->QuestaoTres('aeiaaioooaauuaeiou'), 10,
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 03 - Caso 01 - ERRO');
        $this->assertEquals($prova->QuestaoTres('aeiaaioooaa'), 0,
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 03 - Caso 02 - ERRO');
        $this->assertEquals($prova->QuestaoTres('uioieeeaouiiuaeeuuiuuauuauaeaeuauaeaaiuoiouaeuiuuoooaeeaioeieoeooaeuooae'),
            13, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 03 - Caso 03 - ERRO'); //21
        $this->assertEquals($prova->QuestaoTres('iaaieeeoaueuaaaaieaooiiuiaueeoauiueuaeiaouiueoouaeeioeieoeeiiiouiaioiaeeaaaeaouiioiueuoieeoeoiuuuouiaoeaaeeeiueuiueiaieuoueoeooiuoooiooouuuoiuoeiuaouoeaaaiaeueaiaeouuaeioeoaeeuuaeouiauaiaoioueeiauuieouoeuoiiooauoeaoieuieiaooaaieuoauueoeueeauuaaueeeeeoooouueoiaauooioioaeiiuaiueeoaeiuiaouieiueuae'),
            67, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 03 - Caso 04 - ERRO'); //82
        $this->assertEquals($prova->QuestaoTres('ioeueooeuieoaioeoooiioieueoaiieaeaoeioiiaueueiououeiueeaaueeueaeoaaaouoeoieouaauooeuuoeauuaauaeoeeuiueeeuiieooeuaooeiaeueaaaaiooeaoiiiaaaooeiioaiiieieauaoeuiiueuioouuaoaioeiaiaaaaoeeaiuiaeoiiuauiiaeiuuaoaeaaaaeoeueieoaaaooueioaauieieouoeouieaueuuaiiueoouioueuaaauaoeueuoouieuuouuoueoaaeuuouueieuouiooaiuaoeuaeiaueuuieeiuaaeuiuuiuoiaiaeauuuaeeuuuuoieoieuaoiiuoeiaeaeeauoueaiuooiaoaiuoouoeeueeuaoeueiaiioiouueeaaoeoeauouuieeoaoioauieeeieeaaiuiaaeiaeueuouuaoaoiiaoeoaoeuieeouiiiiauauueaeouaeeeaoeaaaeouuueoeoiueeoeiouaoeaaeeoaeaiiuouoaaeiuaiaeueuauaoauueuoeueueauuuueeeeuaouaaueaiouoeuooeiouoiiiueauauaeuaauuoeuoaeeouoouoeeeoieoaouiaaioiuoeuaaouuiioieoiiaueueuieouaiioeuaeoeieaoeiuooueeoeuueueioaoaauoooiiueueooeuouauuaiuiaoieeeeoouoeiaaaeieiooeouioeuooeeiauouueiuieaeaieeooaoeiuu'),
            175, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 03 - Caso 05 - ERRO'); //197
    }

    public function testQuestaoQuatro()
    {
        $prova = new Prova();
        $this->assertEquals($prova->QuestaoQuatro(40, [1, 2, 3], [2, 5, 4],
                [100, 100, 100]), 200, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 04 - Caso 01 - ERRO');
        $this->assertEquals($prova->QuestaoQuatro(40, [2, 1, 4], [3, 1, 4],
                [603, 286, 882]), 882, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 04 - Caso 02 - ERRO');
        $this->assertEquals($prova->QuestaoQuatro(40,
                [29, 9, 21, 8, 15, 11, 14, 5, 11, 5, 16, 3, 15, 29, 9, 33, 30, 11,
                3, 29, 4, 1, 12, 25, 3, 12, 3, 8, 8, 12],
                [40, 26, 31, 22, 23, 24, 22, 22, 30, 25, 24, 10, 22, 35, 20, 34,
                38, 31, 32, 35, 24, 38, 18, 32, 39, 37, 26, 39, 11, 37],
                [787, 219, 214, 719, 102, 83, 321, 300, 832, 29, 577, 905, 335,
                254, 20, 351, 564, 969, 11, 267, 531, 892, 825, 99, 107, 131, 640,
                483, 194, 502]), 8628, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 04 - Caso 03 - ERRO');
        $this->assertEquals($prova->QuestaoQuatro(40,
                [19, 4, 5, 19, 5, 10, 21, 13, 12, 15, 8, 21, 20, 13, 13, 15, 14,
                20, 10, 16, 25, 5, 17, 8, 22, 19, 2, 21, 23, 2],
                [28, 23, 6, 33, 9, 13, 39, 18, 26, 30, 9, 23, 21, 40, 23, 15, 35,
                39, 18, 27, 40, 9, 20, 20, 37, 37, 5, 29, 30, 8],
                [419, 680, 907, 582, 880, 438, 294, 678, 528, 261, 48, 131, 7, 65,
                901, 914, 704, 522, 379, 8, 536, 190, 809, 453, 298, 112, 186, 184,
                625, 960]), 6314, 
            PHP_EOL."==========================================".PHP_EOL.
            'QUESTÃO 04 - Caso 04 - ERRO');
    }
}
