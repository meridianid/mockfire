<?php

function getRupiah($value) {
        $format = "Rp. " . number_format($value,0,',','.');
        return $format;
}