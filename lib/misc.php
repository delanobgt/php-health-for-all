<?php

/**
 * Memotong kalimat berdasarkan jumlah karakter
 *
 * @param string text yang akan dipotong
 * @param integer jumlah karakter
 *
 * @return string
 */
function readMore($text, $num = 150) {
    $res = substr($text, 0, $num);
    if (strlen($res) >= $num && isset($text[$num])) { //panjang substring > num dan panjang text > num
        if ($text[$num] != ' ') {
            $pos = strpos($text, ' ', $num);
            //untuk kasus $num < strlen($text) && kata terakhir dari $res == kata terakhir dari $text
            if ($pos == 0) { 
                return $text;
            } else {
                $temp = substr($text, $num, $pos - $num);
                $res = $res.$temp.'...';
            }
        }
    }

    return $res;
}
