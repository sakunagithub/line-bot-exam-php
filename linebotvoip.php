<?php
    $accessToken = "NmtgPB4Rzu1vrDD87qlxNuLjdPa3caRuSe+g1hu+TMztKPSPD5F1md/dmPrsDeDLoOJoDw/dTWp5F5f5IkrRUIVZbgWrBlRoH6F1L1lYhmbrr/dCDlhb7Eog0UsIgLdr3/WvcTlhvgeONJDqQR3pHAdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    //Keyword
    if($message == "Keyword" || $message == "keyword" || $message == "Help" || $message == "help" || $message == "bot" || $message == "บอท"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "กรุณาเลือกข้อมูลที่ต้องการค้นหา โดยเลือกหัวข้อดังนี้ ::\nWeb, Call, ATA";
        replyMsg($arrayHeader,$arrayPostData);
    }

    #ลิงค์เว็บ
    else if($message == "เว็บ" || $message == "Web" || $message == "web"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สามารถดาวน์โหลดคู่มือการติดตั้งอุปกรณ์ได้ที่/b\n🌏 http://www.cat7045.com/";
        replyMsg($arrayHeader,$arrayPostData);
    }
    
    #เบอร์โทร
    else if($message == "เบอร์โทร" || $message == "โทร" || $message == "ติดต่อ" || $message == "Call" || $message == "call"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สอบถามข้อมูลเพิ่มเติม แจ้งปัญหาการใช้งาน\n☎ ติดต่อ :: 021047045 (ตลอด 24 ชม.)";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #รายชื่อ ATA
    else if($message == "ATA" || $message == "Ata" || $message == "ata"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "กรุณาเลือก ATA ที่ต้องการค้นหา ได้แก่\nพิมพ์ A1 :: Paradox\nพิมพ์ A2 :: Cisco SPA8000
        \nพิมพ์ A3 :: Cisco SPA112";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ATA Paradox
    else if($message == "A1"  || $message == "a1" || $message == "ATA Paradox" || $message == "Paradox" || $message == "paradox"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Paradox :: http://122.155.128.138/cat7045/manual/Paradox/Paradoxes%20SAG1000-8s.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ATA Cisco SPA8000
    else if($message == "A2" || $message == "a2" || $message == "ATA Cisco SPA8000" || $message == "Cisco SPA8000" || 
       $message == "CiscoSPA8000" || $message == "SPA8000" || $message == "CiscoSPA8000"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cisco SPA8000 :: http://122.155.128.138/cat7045/manual/Cisco%20SPA8000/spa8000.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ATA Cisco SPA112
    else if($message == "A3" || $message == "a3" || $message == "ATA Cisco SPA112" || $message == "Cisco SPA112" || 
       $message == "CiscoSPA112" || $message == "SPA112" || $message == "CiscoSPA112"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cisco SPA112 :: http://122.155.128.138/cat7045/manual/CiscoSPA112/CISCO%20SPA%20112.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 


    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>
