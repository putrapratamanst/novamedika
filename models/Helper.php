<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Helper extends Model
{
   public static function converDate($date)
   {
        date_default_timezone_set('Asia/Jakarta');

        $timestamp = strtotime($date); 
        $new_date = date('Y-m-d', $timestamp);

       return $new_date;
   }

  public  function dateFormat($date)
    {
        if($date!= '0000-00-00'){

            return date('d F Y',strtotime($date));
        }

        return '-';

    }

    public static function indoDateTimeFormat($date_time)
    {
        if ($date_time != '0000-00-00 00:00:00') {
            $hari = date('D', strtotime($date_time));
            $tgl = date('d', strtotime($date_time));
            $bulan = date('n', strtotime($date_time));
            $tahun = date('Y', strtotime($date_time));
            $transaction_time = date('H:i', strtotime($date_time));

            $listBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November',
                'Desember');
            $listHari = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu');


            $transaction_date = $listHari[$hari] . ', ' . $tgl . ' ' . $listBulan[$bulan] . ' ' . $tahun . ' ' . $transaction_time;

            return $transaction_date;
        }
        return '-';
    }
    public static function indoDateFormat($date_time, $dob = false)
    {
        if ($date_time != '0000-00-00') {
            $hari = date('D', strtotime($date_time));
            $tgl = date('d', strtotime($date_time));
            $bulan = date('n', strtotime($date_time));
            $tahun = date('Y', strtotime($date_time));

            $listBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November',
                'Desember');
            $listHari = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu');

            if (!$dob)
                $transaction_date = $listHari[$hari] . ', ' . $tgl . ' ' . $listBulan[$bulan] . ' ' . $tahun;
            else
                $transaction_date = $tgl . ' ' . $listBulan[$bulan] . ' ' . $tahun;


            return $transaction_date;
        }
        return '-';
    }
    public static function checkBox($data){

        if(empty($data)){
            return NULL;
        }
        return $data[0];  
  }
}
