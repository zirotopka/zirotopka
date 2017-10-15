<?php

namespace App\Helpers;

class Curl
{

    protected static function _requestInit( $url )
    {
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_ENCODING, "utf-8" );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 120 );
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        return $ch;
    }

    protected static function _requestExec( $ch )
    {
        $result = curl_exec( $ch );
        curl_close( $ch );

        return $result;
    }

    public static function request( $url, $getParams=false, $postParams=false )
    {
        if( $getParams !== false && is_array($getParams) && count($getParams) )
            $getParamsStr = '?'.http_build_query( $getParams );
        else
            $getParamsStr = '';

        $ch = self::_requestInit( $url.$getParamsStr );

        if( $postParams !== false && is_array($postParams) && count($postParams) )
        {
            $postParamsStr = http_build_query( $postParams );
            curl_setopt( $ch, CURLOPT_POST, true);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $postParamsStr );
        }

        return self::_requestExec( $ch );
    }

    public static function requestGet( $url, $getParams = false )
    {
        return self::request($url, $getParams);
    }

    public static function requestPost( $url, $postParams )
    {
        return self::request($url, false, $postParams);
    }

}
