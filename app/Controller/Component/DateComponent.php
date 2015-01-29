<?php
App::uses('Component', 'Controller');

class DateComponent extends Component
{
    /**
     *
     * input at the YYYY-mm-dd format
     * output as 1 Januari 2015
     * @return string
     * @param $original
     *
     */
    public function convertToIndonesian($original)
    {
        $monthName = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );
        $dateArr = explode('-', $original);
        $day = intval($dateArr[2]);
        $month = $monthName[$dateArr[1]];
        $year = $dateArr[0];
        $ret = $day . ' ' . $month . ' ' . $year;

        return $ret;
    }
}