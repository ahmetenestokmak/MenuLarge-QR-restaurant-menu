<?php
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
// Verilen değeri istenilen karaktere göre parçalar, diziye atar ve istenilen indisi return eder
function parcala($val, $val2, $i)
{
    $dizi = explode($val2, $val);
    return $dizi[$i];
}
// Verilen linkteki değeri istenilen karaktere göre parçalar, diziye atar ve istenilen indisi return eder
function parcalaLink($i)
{
    $dizi = explode("/", $_SERVER["REQUEST_URI"]);
    return $dizi[$i];
}

// Verilen değerdeki sql inception engeli
function sqlTemizle($val)
{
    $veri = array(" or ", " and ", "%20or%20", "%20and%20");
    $dizi = str_replace($veri, "", $val);
    return $dizi;
}

// tes satır sql veri alma
function sql_one($sql)
{
    global $conn;
    $s = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($s);
    if ($count > 0) $res = mysqli_fetch_array($s);
    else $res = null;
    return $res;
}

// sql veri alma
function sql($sql)
{
    global $db;
    $data = array();
    $query = $db->query($sql, PDO::FETCH_ASSOC);

    if ($query->rowCount()) {
        foreach ($query as $row) {
            array_push($data, $row);
        }
    }
    return $data;
}
// json post veri gönder al
function json_post_curl($url, $jsonData = array())
{
    $ch = curl_init($url);
    $jsonDataEncoded = json_encode($jsonData);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $res = json_decode(curl_exec($ch));
    curl_close($ch);
    return $res;
}
// Json get verilerini çekme
function json_get_curl($url)
{
    $json_file = file_get_contents($url, true);
    $data = json_decode($json_file);
    return $data;
}
// Mail gönderme fonksiyonu
function mailGonder($subject, $body, $email)
{
    require("config/send/class.phpmailer.php");
    require("template/inc/mailTemp.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
    $mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
    $mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
    $mail->Host = "bemolmedya.com"; // Mail sunucusunun adresi (IP de olabilir)
    $mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet  = "utf-8";
    $mail->Username = "info@bemolmedya.com"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
    $mail->Password = "aART_t4m3"; // Mail adresimizin sifresi
    $mail->SetFrom("info@bemolmedya.com", "biperhiz.com"); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
    $mail->AddAddress($email); // Mailin gönderileceği alıcı adres
    $mail->Subject = trTemizle($subject); // Email konu başlığı
    $mail->Body = $tempBody; // Mailin içeriği
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
function addImage($img, $location = "images/uploads/")
{
    // Dosya adını alalım
    $filename = date("YmdHis_") . $img['name'];

    // Gelen dosya bir görsel mi?
    $valid_ext = array('png', 'jpeg', 'jpg');

    // dosya uzantısı işlemleri
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // uzantı kontrolü
    if (in_array($file_extension, $valid_ext)) {
        $res = array(
            "Status" => 200
        );

        return $res;
    } else {
        $res = array(
            "Path" => $location . $filename,
            "MessageTitle" => "Başarısız",
            "MessageDescription" => "Resim ekleme işleminiz başarısız. Dosya formatınız <b>png, jpeg, jpg</b> türünde olmalıdır.",
            "Status" => 400
        );
        return $res;
        return 400;
    }
}

// Şifre Üret
function sifreUret()
{
    $karakterler = "1234567890abcdefghijKLMNOPQRSTuvwxyzABCDEFGHIJklmnopqrstUVWXYZ0987654321";
    $sifre = '';
    for ($i = 0; $i < 8; $i++) //Oluşturulacak şifrenin karakter sayısı 8'dir.
    {
        $sifre .= $karakterler{
            rand() % 72}; //$karakterler dizisinden ilk 72 karakter kullanılacak, yani hepsi.
    }
    return $sifre;                            //Oluşturulan şifre gönderiliyor.
}
// Türkçe karakter temizleme
function trTemizle($bul)
{
    $bulunacak = array('ç', 'Ç', 'ı', 'İ', 'ğ', 'Ğ', 'ü', 'ö', 'Ş', 'ş', 'Ö', 'Ü', ',', '(', ')', '[', ']');
    $degistir  = array('c', 'C', 'i', 'I', 'g', 'G', 'u', 'o', 'S', 's', 'O', 'U', '', '', '', '', '');
    $sonuc = str_replace($bulunacak, $degistir, $bul);
    return $sonuc;
}
// Türkçe karakter temizleme
function seoLink($link)
{
    $lnk=trTemizle($link);
    $sonuc = str_replace(" ", "-", $lnk);
    return strtolower($sonuc);
}
// Özel karakter temizleme
function temizle($bul)
{
    return str_replace(
        array(
            "'", '"'
        ),
        array(
            "\'", '\"'
        ),
        $bul
    );
}
// Türkçe tarih formatına çevirme
function turkcetarih_formati($format, $datetime = 'now')
{
    $z = date("$format", strtotime($datetime));
    $gun_dizi = array(
        'Monday'    => 'Pazartesi',
        'Tuesday'   => 'Salı',
        'Wednesday' => 'Çarşamba',
        'Thursday'  => 'Perşembe',
        'Friday'    => 'Cuma',
        'Saturday'  => 'Cumartesi',
        'Sunday'    => 'Pazar',
        'January'   => 'Ocak',
        'February'  => 'Şubat',
        'March'     => 'Mart',
        'April'     => 'Nisan',
        'May'       => 'Mayıs',
        'June'      => 'Haziran',
        'July'      => 'Temmuz',
        'August'    => 'Ağustos',
        'September' => 'Eylül',
        'October'   => 'Ekim',
        'November'  => 'Kasım',
        'December'  => 'Aralık',
        'Mon'       => 'Pts',
        'Tue'       => 'Sal',
        'Wed'       => 'Çar',
        'Thu'       => 'Per',
        'Fri'       => 'Cum',
        'Sat'       => 'Cts',
        'Sun'       => 'Paz',
        'Jan'       => 'Oca',
        'Feb'       => 'Şub',
        'Mar'       => 'Mar',
        'Apr'       => 'Nis',
        'Jun'       => 'Haz',
        'Jul'       => 'Tem',
        'Aug'       => 'Ağu',
        'Sep'       => 'Eyl',
        'Oct'       => 'Eki',
        'Nov'       => 'Kas',
        'Dec'       => 'Ara',
    );
    foreach ($gun_dizi as $en => $tr) {
        $z = str_replace($en, $tr, $z);
    }
    if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
    return $z;
}
function price($price){
    setlocale(LC_MONETARY, 'tr_TR');
    $price=str_replace(",00","",money_format('%i', $price));
 return str_replace("TRY","₺",$price);
}

###############################################################
##                                                           ##
##     Tema Fonksiyonları                                    ##
##                                                           ##
###############################################################

function t_alerts($type, $title, $desc)
{
    echo '
    <div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>' . $title . '</strong> ' . $desc . '
    </div>';
}
