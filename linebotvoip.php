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
        $arrayPostData['messages'][0]['text'] = "เลือกข้อมูลที่ต้องการค้นหา\nโดยพิมพ์ตัวเลือกดังนี้...\n\nWeb :: เรียกดูข้อมูล Support อื่นๆ\nCall :: เรียกดูเบอร์ Support\nATA :: ดาวน์โหลดคู่มือการตั้งค่า ATA\nIP :: ดาวน์โหลดคู่มือการตั้งค่า IP Phone";
        replyMsg($arrayHeader,$arrayPostData);
    }

    #ลิงค์เว็บ
    else if($message == "เว็บ" || $message == "Web" || $message == "web"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สามารถดาวน์โหลดคู่มือการติดตั้งอุปกรณ์ได้ที่\n🌏 http://www.cat7045.com/";
        replyMsg($arrayHeader,$arrayPostData);
    }
    
    #เบอร์โทร
    else if($message == "เบอร์โทร" || $message == "โทร" || $message == "ติดต่อ" || $message == "Call" || $message == "call"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สอบถามข้อมูลเพิ่มเติม แจ้งปัญหาการใช้งาน\n☎ ติดต่อ :: 021047045 (ตลอด 24 ชม.)";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    
    #บริการ one-connect
    else if($message == "S1" || $message == "s1" || $message == "One" || $message == "one" || $message == "one-connect"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "บริการ one-connect...";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ลักษณะบริการ\nเป็นบริการโทรศัพท์พื้นฐานหรือโทรศัพท์ประจำที่ (Fixed Line) ที่เชื่อมต่อตรงจากชุมสายโทรศัพท์ของ CAT ถึงสถานที่ติดตั้งของผู้ใช้บริการ มีคุณภาพเสียงคมชัด สามารถโทรปลายทางในประเทศและต่างประเทศได้ในราคาประหยัด เหมาะสำหรับองค์กรทั้งขนาดเล็กและขนาดใหญ่ โดยมีรูปแบบวงจรเชื่อมต่อทั้งแบบ Analog Line, ISDN-BRI และ ISDN-PRI (E1) 30 ช่องสัญญาณ/วงจร";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "ค่าใช้บริการโทรปลายทางภายในประเทศ\n- เรียกติดต่อภายในโครงข่าย CAT 1 บาท/นาที\n- เรียกข้ามโครงข่ายไปยัง Fixed และ Mobile 2 บาท/นาที\n- เรียกภายในพื้นที่จังหวัดเดียวกัน (Local Call) 3 บาท/ครั้ง\n- ส่วนลดพิเศษจากยอดค่าใช้บริการเมื่อใช้ถึงเกณฑ์ที่กำหนด";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ATA
    else if($message == "ATA" || $message == "Ata" || $message == "ata"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เลือกคู่มือ ATA ที่ต้องการดาวน์โหลด\nโดยพิมพ์ตัวเลือกดังนี้...\n\nA1 :: Paradox\nA2 :: Cisco SPA8000\nA3 :: Cisco SPA112\nA4 :: Gran gxw400\nA5 :: Grandstream GXW-400x Series\nA6 :: HuaWei\nA7 :: Welltech ATA172\nA8 :: Audio Codes\nA9 :: Dinstar\nA10 :: LinksysPAP2\nA11 :: Fritzbox\nA12 :: Planet VIP-157S\nA13 :: Raisecom MSG1200-GEC\nA14 :: UCM6104\nA15 :: Grandstream HT 702";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A1-Paradox
    else if($message == "A1"  || $message == "a1" || $message == "ATA Paradox" || $message == "Paradox" || $message == "paradox"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Paradox\n🌏 http://122.155.128.138/cat7045/manual/Paradox/Paradoxes%20SAG1000-8s.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A2-Cisco SPA8000
    else if($message == "A2" || $message == "a2" || $message == "ATA Cisco SPA8000" || $message == "Cisco SPA8000" || 
       $message == "CiscoSPA8000" || $message == "SPA8000" || $message == "CiscoSPA8000"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cisco SPA8000\n🌏 http://122.155.128.138/cat7045/manual/Cisco%20SPA8000/spa8000.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A3-Cisco SPA112
    else if($message == "A3" || $message == "a3" || $message == "ATA Cisco SPA112" || $message == "Cisco SPA112" || $message == "CiscoSPA112" || $message == "SPA112" || $message == "CiscoSPA112"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cisco SPA112\n🌏 http://122.155.128.138/cat7045/manual/CiscoSPA112/CISCO%20SPA%20112.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A4-Gran gxw400
    else if($message == "A4" || $message == "a4" || $message == "Gran gxw400" || $message == "Grangxw400" || $message == "gxw400"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Gran gxw400\n🌏 http://122.155.128.138/cat7045/manual/CiscoSPA112/CISCO%20SPA%20112.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A5-Grandstream GXW-400x Series
    else if($message == "A5" || $message == "a5" || $message == "Grandstream" || $message == "GXW400x" || $message == "grandstream"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Grandstream GXW-400x Series\n🌏 http://122.155.128.138/cat7045/manual/Grandstream%20GXW-400x%20Series/Grandsteam%20HT502.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    }            
    #A6-HuaWei
    else if($message == "A6" || $message == "a6" || $message == "HuaWei" || $message == "huawei" || $message == "Huawei"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "HuaWei\n🌏 http://122.155.128.138/cat7045/manual/HuaWei/HuaWei.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A7-Welltech ATA172
    else if($message == "A7" || $message == "a7" || $message == "Welltech ATA172" || $message == "ATA172" || $message == "Welltech"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Welltech ATA172\n🌏 http://122.155.128.138/cat7045/manual/Welltech_ATA172/ATA172.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A8-Audio Codes
    else if($message == "A8" || $message == "a8" || $message == "Audio Codes" || $message == "audio codes" || $message == "Audiocodes"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Audio Codes\n🌏 http://122.155.128.138/cat7045/manual/AudioCode/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99%20AudioCodes%20MP-118_FXS%20v1.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A9-Dinstar
    else if($message == "A9" || $message == "a9" || $message == "Dinstar" || $message == "dinstar"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Dinstar\n🌏 http://122.155.128.138/cat7045/manual/Paradox/Paradoxes%20SAG1000-8s.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    }  
    #A10-LinksysPAP2
    else if($message == "A10" || $message == "a10" || $message == "LinksysPAP2" || $message == "linksys"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "LinksysPAP2\n🌏 http://122.155.128.138/cat7045/manual/LinksysPAP2/LinksysPAP2T.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    }  
    #A11-Fritzbox
    else if($message == "A11" || $message == "a11" || $message == "Fritzbox" || $message == "fritzbox"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Fritzbox\n🌏 http://122.155.128.138/cat7045/manual/Fritz%20Box/Fritz%20box%20config.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A12-Planet VIP-157S
    else if($message == "A12" || $message == "a12" || $message == "Planet" || $message == "planet"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Planet VIP-157S\n🌏 http://122.155.128.138/cat7045/manual/Planeft_245T/Planet_VIP-157S.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A13-Raisecom MSG1200-GEC
    else if($message == "A13" || $message == "a13" || $message == "Raisecom" || $message == "raisecom"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Raisecom MSG1200-GEC\n🌏 http://122.155.128.138/cat7045/manual/Raisecom%20MSG1200-GEC/Raisecom%20MSG1200-GEC_ver2.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A14-UCM6104
    else if($message == "A14" || $message == "a14" || $message == "UCM6104" || $message == "ucm6104"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "UCM6104\n🌏 http://122.155.128.138/cat7045/manual/UCM6104/ucm%201604to%20cat.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #A15-Grandstream HT 702
    else if($message == "A15"  || $message == "a15" || $message == "HT 702" || $message == "HT702" || $message == "ht702"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Grandstream HT 702\n🌏 http://122.155.128.138/cat7045/manual/ATA%20HT%20702/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%95%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%84%E0%B9%88%E0%B8%B2%20ATA%20HT%20702.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #IP Phone
    else if($message == "IP Phone" || $message == "IP" || $message == "ip" || $message == "phone" || $message == "Phone"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เลือกคู่มือ IP Phone ที่ต้องการดาวน์โหลด\nโดยพิมพ์ตัวเลือกดังนี้...\n\nP1 :: Planet ICF-1700\nP2 :: Planeft 245T\nP3 :: Yealink SIP T20";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #P1-Planet ICF-1700
    else if($message == "P1"  || $message == "p1" || $message == "Planet" || $message == "planet"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Planet ICF-1700\n🌏 http://122.155.128.138/cat7045/manual/Planet%20ICF-1700/IP%E2%80%93PHONE%20Planet%20ICF-1700.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #P2-Planeft 245T
    else if($message == "P2"  || $message == "p2" || $message == "Planeft" || $message == "planeft"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Planeft 245T\n🌏 http://122.155.128.138/cat7045/manual/Planeft_245T/Planet%20Phone%20VIP-254T.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #P3-Yealink SIP T20
    else if($message == "P3"  || $message == "p3" || $message == "Yealink" || $message == "yalink"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Yealink SIP T20\n🌏 http://122.155.128.138/cat7045/manual/Yealink_SIP_T20/SIP-T20.pdf";
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
