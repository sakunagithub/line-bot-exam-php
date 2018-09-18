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
    if($message == "Keyword" || $message == "keyword" || $message == "Help" || $message == "help" || $message == "bot" || $message == "Bot" || $message == "บอท"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เลือกข้อมูลที่ต้องการค้นหา\nโดยพิมพ์ตัวเลขหรือหัวข้อดังนี้...\n\n1. Service :: บริการของ CAT\n2. Web :: เว็บดูข้อมูลต่างๆ\n3. Contact :: หมายเลขภายใน\n\nดาวน์โหลดคู่มือ\n4. ATA\n5. Application Phone\n6. IP Phone\n7. Voice Gateway\n8. ONU HUAWEI\n9. ONU ZyXEL\n10. สรุปค่า Config\n\n11. Access\n12. Add Access\n13. Error IMS\n14. เปิดโทรต่างประเทศ";        
        replyMsg($arrayHeader,$arrayPostData);    
    }

    #ลิงค์เว็บ
    else if($message == "2" || $message == "2." || $message == "เว็บ" || $message == "Web" || $message == "web"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สามารถดูข้อมูลเกี่ยวกับบริการต่างๆได้ที่\n🌏 http://www.cattelecom.com/cat/index.php?lang=th_TH";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "สามารถดาวน์โหลดคู่มือการติดตั้งอุปกรณ์ได้ที่\n🌏 http://www.cat7045.com/";
        replyMsg($arrayHeader,$arrayPostData);
    }
    
    #เบอร์โทร
    else if($message == "3" || $message == "3." || $message == "เบอร์โทร" || $message == "โทร" || $message == "ติดต่อ" || $message == "Call" || $message == "call" || $message == "Contact" || $message == "contact"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Tandem & VoIP\n\n- กฤษณะ 7070 0882950916\n- จักรพงษ์ 7048 0882950920\n- ดำรงกุล 7252 0818997326\n- บรรเจิด 7045 0882950929\n- บุญมี 7045 0882950918\n- ปฐมพงษ์ 7047 0816027468\n- พีระฉัตร 7045 0910680114\n- ไพศาล 7045 0841499129\n- ภูมิปัญญา 7045 088-8923487\n- วิชัย 7048 0882950928\n- ศุภวัฒน์ 7045 0887283738\n- สงกรานต์ 7045 0882953726\n- สำราญ 7350 0882950914\n- อนันต์ 7044 0882950915\n- อนุกูล 7314 0864455500\n- อารมณ์ 7045 0882950925";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ตลาด\n\n- ผส.ต้อม 3888\n- พี่ยุ้ย 3691\n- พี่โม 4988\n- พี่เอิร์ธ 3492\n- พี่ปอ 4517";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "แจ้งเปิดงาน one connect 2948";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #บริการ CAT Voice
    else if($message == "1" || $message == "1." || $message == "Voice" || $message == "voice" || $message == "Service" || $message == "service"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เลือกข้อมููลบริการที่ต้องการค้นหา\nโดยพิมพ์ตัวเลือกดังนี้...\n\nS1 :: CAT 001,009\nS2 :: One Connect\nS3 :: Hosted PBX\nS4 :: SIP Connect\nS5 :: Fax2Email\nS6 :: CAT2call plus (postpaid, prepaid)";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #001,009
    else if($message == "S1" || $message == "s1"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "CAT 001\n\nเป็นบริการโทรศัพท์ระหว่างประเทศระบบเรียกตรงอัตโนมัติ หรือ IDD (International Direct Dialing) ด้วยรหัส 001  โทรติดง่าย คุณภาพเสียงคมชัด ไม่มีเสียงรบกวน สัญญานเสียง ไม่ดีเลย์ แสดงเลขหมายต้นทาง (โชว์ CLI) และใช้ส่งแฟกซ์ได้อย่างมีประสิทธิภาพ สามารถเรียกใช้บริการได้จากโทรศัพท์พื้นฐานและโทรศัพท์มือถือทุกเครือข่าย บริการครอบคลุม 233 ปลายทางทั่วโลก";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "CAT 009\n\nเป็นบริการโทรศัพท์ระหว่างประเทศระบบเรียกตรงอัตโนมัติ หรือ IDD (International Direct Dialing)  ด้วยรหัส 009 ราคาประหยัด สามารถเรียกใช้บริการได้จากโทรศัพท์พื้นฐานและโทรศัพท์มือถือทุกเครือข่าย บริการครอบคลุม 233 ปลายทางทั่วโลก";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "วิธีการใช้บริการ\n\nกด 001 หรือ กด 009 > รหัสประเทศ >  รหัสเมือ / รหัสโทรศัพท์เคลื่อนที่ > หมายเลขปลายทาง\nเช่น โทรไปประเทศจีน เมืองปักกิ่งกด 009 > 86 > 10 > หมายเลขปลายทาง";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #บริการ One Connect
    else if($message == "S2" || $message == "s2" || $message == "One" || $message == "one" || $message == "one-connect"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "บริการ One Connect";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ลักษณะบริการ\n\nเป็นบริการโทรศัพท์พื้นฐานหรือโทรศัพท์ประจำที่ (Fixed Line) ที่เชื่อมต่อตรงจากชุมสายโทรศัพท์ของ CAT ถึงสถานที่ติดตั้งของผู้ใช้บริการ มีคุณภาพเสียงคมชัด สามารถโทรปลายทางในประเทศและต่างประเทศได้ในราคาประหยัด เหมาะสำหรับองค์กรทั้งขนาดเล็กและขนาดใหญ่ โดยมีรูปแบบวงจรเชื่อมต่อทั้งแบบ Analog Line, ISDN-BRI และ ISDN-PRI (E1) 30 ช่องสัญญาณ/วงจร";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "ค่าใช้บริการโทรปลายทางภายในประเทศ\n\n- เรียกติดต่อภายในโครงข่าย CAT 1 บาท/นาที\n- เรียกข้ามโครงข่ายไปยัง Fixed และ Mobile 2 บาท/นาที\n- เรียกภายในพื้นที่จังหวัดเดียวกัน (Local Call) 3 บาท/ครั้ง";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #บริการ Hosted PBX
    else if($message == "S3" || $message == "s3" || $message == "Cloud PBX" || $message == "Hosted" || $message == "hosted"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "บริการ Cloud PBX";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ลักษณะบริการ\n\nเป็นบริการให้เช่าระบบตู้สาขาโทรศัพท์ผ่านโครงข่ายอินเทอร์เน็ตที่ได้รับการออกแบบมาเพื่อใช้งานทดแทนตู้สาขา (PABX) โดยที่ผู้ใช้บริการไม่ต้องลงทุนติดตั้งตู้สาขา ทำให้สามารถลดค่าใช้จ่ายในการจัดซื้อและการบำรุงรักษา ซึ่งสามารถใช้งานได้เทียบเท่ากับตู้สาขา ไม่ว่าจะเป็นการติดต่อกัน โดยใช้หมายเลขภายใน (Extension Number) การโทรออกไปยังปลายทางอื่นๆ การโอนสาย การดึงสาย การพักสาย รวมไปถึงระบบเสียงตอบรับอัตโนมัติ IVR (Interactive Voice Response) หรือ Auto-Attendant ผู้ใช้บริการเพียงแค่มีอุปกรณ์สำหรับใช้งาน VoIP เช่น IP phone หรือ Internet phone adapter โดยทำการเชื่อมต่อกับระบบ CAT hosted PBX ผ่านวงจร IP Network หรือวงจรอินเทอร์เน็ตของผู้ให้บริการรายใดก็ได้";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "รูปแบบการใช้งาน\n\n- รูปแบบที่ 1 เรียกเข้าระบบด้วยเลขหมายแบบ DID\nผู้โทรสามารถโทรเข้าหาหมายเลขภายในได้โดยตรง โดยไม่ต้องผ่านพนักงาน หรือระบบเสียงตอบรับ เช่น กด 021044764\n\n- รูปแบบที่ 2 เรียกเข้าระบบผ่าน Auto Attendant หรือ IVR\nทุกสายที่เรียกเข้าจะติดระบบเสียงตอบรับอัตโนมัติก่อนจากนั้นจึงกดต่อหมายเลขภายในที่ต้องการ\n\n- รูปแบบที่ 3 เรียกเข้าระบบผ่านพนักงานสลับสาย (Operator)\nทุกสายที่เรียกเข้าจะติดที่ Operator ก่อน จากนั้น Operator จะเป็นผู้โอนสายไปยังหมายเลขภายในที่ต้องการติดต่ออีกครั้ง";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #บริการ SIP Connect
    else if($message == "S4" || $message == "s4" || $message == "SIP" || $message == "Sip" || $message == "sip connect"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "บริการ SIP Connect";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ลักษณะบริการ\n\nเป็นบริการโทรศัพท์ผ่านโครงข่ายอินเทอร์เน็ต Voice over Internet Protocol (VoIP) ในรูปแบบ SIP Trunk ที่เชื่อมต่อระหว่าง SIP Server, IP PBX หรือ อุปกรณ์ Voice Gateway ของผู้ใช้บริการกับ VoIP Server ของ CAT โดยสามารถใช้งานร่วมกับวงจร IP Network ต่างๆ หรือร่วมกับวงจรอินเทอร์เน็ตของผู้ให้บริการรายใดก็ได้ สามารถเลือกใช้เลขหมายเดี่ยว หรือเลขหมายแบบ DID ตามพื้นที่ที่ต้องการใช้งานเพื่อใช้ติดต่อเรียกเข้าออกทั้งภายในประเทศและระหว่างประเทศ";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #บริการ Fax2Email
    else if($message == "S5" || $message == "s5" || $message == "Fax2Email" || $message == "fax2email" || $message == "Fax2"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "บริการ Fax2Email";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "ลักษณะบริการ\n\nFax2email เป็นการติดต่อระหว่าง Fax กับ email โดยด้านหนึ่งใช้สายโทรศัพท์ต่อกับเครื่อง Fax กับอีกด้านหนึ่งใช้เลขหมายโทรศัพท์แบบไม่ต้องมีสายและรับด้วย email เมื่อมี Fax ส่งเข้ามา จะได้รับข้อมูลเป็นไฟล์แนบในรูปแบบ PDF ทาง email ในทางกลับกัน หากต้องการส่ง Fax ไปยังอีกด้านหนึ่งที่ใช้เครื่อง Fax ก็เพียงส่งจาก email โดยส่งไปที่ email address ที่กำหนดไว้เฉพาะสำหรับผู้ใช้บริการ Fax2email แต่ละราย";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "วิธีการใช้งาน\n\n- ใช้โปรแกรม email ส่งไปที่ email address ที่ CAT กำหนดไว้เฉพาะสำหรับผู้ใช้บริการ Fax2email แต่ละราย ซึ่งจะมีรูปแบบเป็น 0xxxxxxxx@fax2email.cattelecom.com  และให้ใส่ชื่อเรื่อง (Subject) เป็นเลขหมาย Fax ปลายทางที่ต้องการจะส่ง พร้อมทั้งแนบ PDF file ไป\n- กรณีต้องการส่งเอกสารไปยังปลายทางที่เป็นเครื่อง Fax ให้แปลงเอกสารเป็น PDF file (ขนาดไม่เกิน 5 MB) และตั้งชื่อไฟล์เป็นภาษาอังกฤษ";
        $arrayPostData['messages'][3]['type'] = "text";
        $arrayPostData['messages'][3]['text'] = "อัตราค่าใช้บริการ\n\n- เริ่มต้นขั้นต่ำที่ 2 ช่องสัญญาณ/เลขหมาย\n- ค่าเช่ารายเดือน 200 บาท/เดือน/2 ช่องสัญญาณ/เลขหมาย\n- เพิ่มช่องสัญญาณ คิดค่าใช้บริการเพิ่ม 100 บาท/เดือน/ช่องสัญญาณ/เลขหมาย\n- ไม่มีค่าใช้บริการในส่วนการรับ Fax เข้า\n- การส่ง Fax ออกจะคิดค่าใช้บริการ ดังนี้\n  หมายเลขภายในจังหวัดเดียวกัน 3 บาท/ครั้ง\n  หมายเลขต่างจังหวัด 1 บาท/นาที";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #บริการ CAT2call plus
    else if($message == "S6" || $message == "s6" ||$message == "เติมเงิน" || $message == "รายเดือน" || $message == "postpaid" || $message == "prepaid"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "CAT2call plus postpaid (แบบรายเดือน)\n\nสมัครใช้บริการได้ที่\n- สำนักงานบริการลูกค้า CAT ทั่วประเทศ";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "CAT2call plus prepaid (แบบเติมเงิน)\n\nสมัครใช้บริการได้ที่\n- ผ่านทางเว็ปไซต์ link.catnextgen.com (ชำระผ่านบัตรเครดิต)\n- ผ่านทางเว็ปไซต์ CAT shopping (ชำระผ่านบัตรเครดิต หรือบัญชีธนาคาร)\n- ผ่านทางแอปพลิเคชั่น Link\n- สำนักงานบริการลูกค้า CAT ทุกสาขา";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "อัตราการเติมเงินและจำนวนวันใช้งาน\n\n- เติมเงิน 100 บาท มีอายุการใช้งาน 60 วัน\n- เติมเงิน 200 บาท มีอายุการใช้งาน 180 วัน\n- เติมเงิน 300 บาท มีอายุการใช้งาน 365 วัน\nหมายเหตุ :  ผู้ใช้บริการสามารถสะสมวงเงิน และจำนวนวันได้ไม่จำกัด โดยต้องเติมเงินเพื่อใช้บริการภายใน 45 วัน นับตั้งแต่จำนวนวันหมด โดยหากไม่เติมภายในกำหนด 45 วัน ระบบจะยกเลิกเลขหมายโดยอัตโนมัติ ระบบจะเริ่มนับจำนวนวันคงเหลือตั้งแต่วันที่ได้มีการเติมเงินเข้าระบบ";
        $arrayPostData['messages'][3]['type'] = "text";
        $arrayPostData['messages'][3]['text'] = "ช่องทางการเติมเงิน\n\n- สำนักงานบริการลูกค้า กสท\n- Counter Service\n- ผ่านทางแอปพลิเคชั่น Link (สำหรับ Smartphone ระบบ Android)\n- ผ่านทางเว็ปไซต์ link.catnextgen.com (ชำระผ่านบัตรเครดิต)\n- ผ่านแอปพลิเคชั่น easyBills\n- ผ่านบัตรเครดิต\n- ผ่านบัญชีธนาคาร";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ATA
    else if($message == "4" || $message == "4." || $message == "ATA" || $message == "Ata" || $message == "ata"){
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

    #Application Phone
    else if($message == "5" || $message == "5." || $message == "Application Phone" || $message == "App" || $message == "app"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เลือกคู่มือ Application Phone ที่ต้องการดาวน์โหลด โดยพิมพ์ตัวเลือกดังนี้...\n\nApp1 :: TOLD SAPP\nApp2 :: ZOIPER\nApplication อื่น ๆ ไม่สามารถดาวน์โหลดได้เนื่องจากเป็นไฟล์ .rar ค่ะ";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #App1-TOLD SAPP
    else if($message == "App1"  || $message == "app1"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "TOLD SAPP\n🌏 http://122.155.128.138/cat7045/manual/App.%20Toldsaap/App.%20Toldsaap.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #App2-ZOIPER
    else if($message == "App2"  || $message == "app2"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ZOIPER for IOS\n🌏 http://122.155.128.138/cat7045/manual/zoiper/zoiper%20for%20i-Phone.pdf\nZOIPER for Android\n🌏 http://http://122.155.128.138/cat7045/manual/zoiper/Zoiper%20for%20android.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #IP Phone
    else if($message == "6" || $message == "6." || $message == "IP Phone" || $message == "IP" || $message == "ip" || $message == "phone" || $message == "Phone"){
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
    
    #Voice Gateway 
    else if($message == "7" || $message == "7." || $message == "IP Phone" || $message == "Voice Gateway " || $message == "voice" || $message == "Voice Gateway" || $message == "Gateway" || $message == "gateway"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "เลือกคู่มือ Voice Gateway ที่ต้องการดาวน์โหลด โดยพิมพ์ตัวเลือกดังนี้...\n\nV1 :: LINKSYS SPA8000\nV2 :: GRANDSTREAM GWX-400\nV3 :: PARADOXES SAG1000-8S";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #V1-LINKSYS SPA8000
    else if($message == "V1"  || $message == "v1" || $message == "SPA8000" || $message == "spa8000"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "LINKSYS SPA8000\n🌏 http://122.155.128.138/cat7045/manual/Cisco%20SPA8000/spa8000.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #V2-GRANDSTREAM GWX-400
    else if($message == "V2"  || $message == "v2"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "GRANDSTREAM GWX-400\n🌏 http://122.155.128.138/cat7045/manual/Gran%20gxw400/Grandsteam%20GWX.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    #V3-PARADOXES SAG1000-8S
    else if($message == "V3"  || $message == "v3"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "PARADOXES SAG1000-8S\n🌏 http://122.155.128.138/cat7045/manual/Paradox/Paradoxes%20SAG1000-8s.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ONU HUAWEI 
    else if($message == "8" || $message == "8." || $message == "ONU HUAWEI" || $message == "onu huawei" || $message == "Onu Huawei"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ONU HUAWEI\n🌏 http://122.155.128.138/cat7045/manual/HuaWei/HuaWei.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #ONU ZyXEL 
    else if($message == "9" || $message == "9." || $message == "ONU ZyXEL" || $message == "onu zyxel" || $message == "Onu Zyxel"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ONU ZyXEL P-2612HNU-F1F\n🌏 http://122.155.128.138/cat7045/manual/zyxel/Zyxel_P-2612HNU-F1F_1.pdf";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #สรุปค่า config
    else if($message == "10" || $message == "10." || $message == "config" || $message == "Config"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Displayed Name: ใส่ค่าอะไรก็ได้\nUsername: +66XXXXXXXX\nPassword: ใส่ pass ที่ได้ในระบบ\nAuthorization Name: 66XXXXXXXX@catnextgen.com\nDomain: catnextgen.com\nProxy Address: ใส่ IP Access:Port";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "Codec: G729,G711A";
        replyMsg($arrayHeader,$arrayPostData);
    } 
    
    #Access
    else if($message == "11" || $message == "11." || $message == "Access" || $message == "access"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "CAT2Call, one-connect, Link, Hosted PBX\naccess01\n202.129.61.102 : 5060, 80 (2 con)";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "CAT2Call, one-connect, Hosted PBX\naccess02_2\n202.129.61.118 : 5164 (2 con)";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "one-connect\naccess_onu\n172.27.99.99 : 5060  (2 con)";  
        $arrayPostData['messages'][3]['type'] = "text";
        $arrayPostData['messages'][3]['text'] = "sip-connect, Hosted PBX หรือ Cloud PBX\naccess02\n202.129.61.118 : 5060 (30 con)\n\nsip-connect\naccess02_5\n202.129.61.118 : 5165 (5 con)\n\naccess02_10\n202.129.61.118 : 5166 (10 con)\n\naccess02_30\n202.129.61.118 : 5167 (30 con)\n\naccess02_60\n202.129.61.118 : 5168 (60 con)\n\naccess04\n202.129.61.196 : 5060 (60 con)\n\naccess05\n202.129.61.197 : 5060 (120 con)";
        $arrayPostData['messages'][4]['type'] = "text";
        $arrayPostData['messages'][4]['text'] = "Hosted PBX หรือ Cloud PBX\naccess01p5063\n202.129.61.102 : 5063 (10 con)\n\naccess02p5160\n202.129.61.118 : 5160 (10 con)";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #Add Access
    else if($message == "12" || $message == "12." || $message == "add access"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Add Access\n> en\n> ใส่ password\n> configure terminal\n> session-router\n> local-policy\n> select\n> กด Enter\n> เลือกแถวว่างเช่น 180\n> พิมพ์ 180 กด Enter\n> show\n> from-address (+66xxxxxxxx +66...)\n> done\n> ex\n> ex\n> ex\n> verify-config\n> save-config\n> activate-config\n> ex";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #error ims
    else if($message == "13" || $message == "13." || $message == "IMS" || $message == "error ims" || $message == "ERROR IMS"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "403 Forbidden\n- Authentication Failed: Password ผิด\n- Authentication Reject: HSS บล็อก\n- User Unknown: ไม่มีเบอร์ใน HSS\n- Private and Public: ตรวจสอบค่า config ที่ Domain กับ authentication id catnextgen.com";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "482 Loop Deteced: ใส่ข้อมูลไม่ครบ หรือให้สังเกตที่ port catnextgen.com สถานะต้องเป็น Register Sip: catnextgen.com";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "500 Internal Server Error: ติดที่ฝั่งของลูกค้า ถ้าติด IVR หรือโทรติด ต้องขึ้นสถานะ 200 ok";
        replyMsg($arrayHeader,$arrayPostData);
    } 

    #เปิดโทรต่างประเทศ
    else if($message == "14" || $message == "14." || $message == "เปิดโทรต่างประเทศ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ลูกค้าต้องการเปิดโทรต่างประเทศ\n\nCAT2Call Plus prepaid (เติมเงิน)\nสามารถเปิดโทร ตปท. ได้เลย";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "CAT2Call Plus postpaid (รายเดือน), SIP\nส่งเมลมาที่ catvoip@cattelecom.com เอกสารแนบเพิ่มเติม\n- รายละเอียดลูกค้า เช่น จดทะเบียนในนาม ชื่อ บริษัท จะพิมพ์หรือส่งไฟล์มาก็ได้\n- บิลงวดสุดท้าย (ถ้ามี)";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "One Connect\nสค.หรือเซลที่ทำการขาย update มาใน CSS";
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
