<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NaverInfoController extends Controller
{
    public function send(Request $request)
    {
        $encText = urlencode("챗GPT"); // 검색어
        $url = "https://openapi.naver.com/v1/search/news.json?query=".$encText; // json 결과
        $is_post = false;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array();
        $headers[] = "X-Naver-Client-Id: "."jDBHq2CxbGRno8xZCiJu";
        $headers[] = "X-Naver-Client-Secret: "."PVEeQzouOp";

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch); //응답 값
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); //응답 코드

        curl_close ($ch);

        if($status_code == 200) {
          //응답 정상
          var_dump($response);
        } else {
          //응답이 실패
          echo "Error 내용:".$response;
        }
    }
}
