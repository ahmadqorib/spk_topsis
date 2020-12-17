<?php

class Kriteria
{
    const PRICE = 1;
    const PROCESSOR = 2;
    const HARDISK = 3;
    const RAM = 4;
    const VGA = 5;
    const DISPLAY = 6;

    public static function labels()
    {
        return [
            'Harga' => self::PRICE,
            'Prosessor' => self::PROCESSOR,
            'Kapasitas Hardisk' => self::HARDISK,
            'Kapasitas RAM' => self::RAM,
            'VGA' => self::VGA,
            'Ukuran Layar' => self::DISPLAY,
        ];
    }

    public static function label($id = null)
    {   
        if($id != null)
            return array_search($id, self::labels());
        else
            return "-"; 
    }
}