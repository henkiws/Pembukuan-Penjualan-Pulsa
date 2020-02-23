<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('currency_format'))

{

    function rupiah($number)

    {

        return 'Rp '.number_format($number,0,',','.');

    }





}