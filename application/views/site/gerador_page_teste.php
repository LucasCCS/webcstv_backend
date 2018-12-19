<?php
    // 
    function shortUrl($longUrl) {
        $login = 'o_40rj8o9v6t';
        $key = 'R_e80eab162e674431a450579f9fbb0f4b';
        $ch = curl_init("http://api.bitly.com/v3/shorten?login=".$login."&apiKey=".$key."&longUrl=".$longUrl."");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($ch);
        $res = json_decode($result,true);
        return $res['data']['url'];
    }
    
    echo '<iframe scrolling="no" align="center" style="display: block;
    background: #000;
    border: none; 
    height: 120vh; 
    width: 100%;
    overflow:hidden;" src="'.shortUrl(base64_decode($this->uri->segment(3))).'"></iframe>
    ';