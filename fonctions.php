<?php
function debug($tableau)
{
    echo '<pre style="height:200px;overflow: scroll; font-size: .8em;padding: 10px;font-family: Consolas, Monospace; background-color: #000;color:#fff;">';
    print_r($tableau);
    echo '</pre>';
}

function ipConvert($ip)
{
    $resultbrut = '';
    for ($i = 0; $i <= 6; $i += 2) {

        $dizaine = substr($ip, $i, 1);
        $u = $i + 1;
        $unite = substr($ip, $u, 1);
        switch ($dizaine) {
            case '0':
                $dizaine = 0 * 16;
                break;
            case '1':
                $dizaine = 1 * 16;
                break;
            case '2':
                $dizaine = 2 * 16;
                break;
            case '3':
                $dizaine = 3 * 16;
                break;
            case '4':
                $dizaine = 4 * 16;
                break;
            case '5':
                $dizaine = 5 * 16;
                break;
            case '6':
                $dizaine = 6 * 16;
                break;
            case '7':
                $dizaine = 7 * 16;
                break;
            case '8':
                $dizaine = 8 * 16;
                break;
            case '9':
                $dizaine = 9 * 16;
                break;
            case 'a' || 'A':
                $dizaine = 10 * 16;
                break;
            case 'b' || 'B':
                $dizaine = 11 * 16;
                break;
            case 'c' || 'C':
                $dizaine = 12 * 16;
                break;
            case 'd' || 'D':
                $dizaine = 13 * 16;
                break;
            case 'e' || 'E':
                $dizaine = 14 * 16;
                break;
            case 'f' || 'F':
                $dizaine = 15 * 16;
                break;
        }
        switch ($unite) {
            case '0':
                $unite = 0;
                break;
            case '1':
                $unite = 1;
                break;
            case '2':
                $unite = 2;
                break;
            case '3':
                $unite = 3;
                break;
            case '4':
                $unite = 4;
                break;
            case '5':
                $unite = 5;
                break;
            case '6':
                $unite = 6;
                break;
            case '7':
                $unite = 7;
                break;
            case '8':
                $unite = 8;
                break;
            case '9':
                $unite = 9;
                break;
            case 'a' || 'A':
                $unite = 10;
                break;
            case 'b' || 'B':
                $unite = 11;
                break;
            case 'c' || 'C':
                $unite = 12;
                break;
            case 'd' || 'D':
                $unite = 13;
                break;
            case 'e' || 'E':
                $unite = 14;
                break;
            case 'f' || 'F':
                $unite = 15;
                break;
        }
        $res = $dizaine + $unite;
        if ($res < 10) {
            $res = '00' . $res;
        } elseif ($res < 100) {
            $res = '0' . $res;
        }
        $resultbrut = $resultbrut . $res;
    }
    $result = substr($resultbrut, 0, 3) . '.' . substr($resultbrut, 3, 3) . '.' . substr($resultbrut, 6, 3) . '.' . substr($resultbrut, 9, 3);
    return $result;
}
?>