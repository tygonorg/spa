<?php
    function validateDate($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    function convertdate($date)
    {
        $format = 'Y-m-d';
        $d = DateTime::createFromFormat('d/m/Y', $date);
        $newformat = $d->format('Y-m-d');
        return $newformat;
    }

?>