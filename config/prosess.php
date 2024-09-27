<?php
session_start();
// env prosess
$envfile = file("../.env");
foreach ($envfile as $line) {
  if (strpos($line, '=') !== false) {
    list($key, $value) = explode('=', $line);
    putenv("$key=$value");
  }
}

// prosess email dan mailer
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $user = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  include "db.php";

  $code = md5($username . date('y-m-d h:i:s'));
  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->Username = getenv('SMTP');
    $mail->Password = getenv('PASSWORD');
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    // Atur pengirim email
    $mail->setFrom('himatif@unira.org', 'Himatif');
    // Atur penerima email
    $mail->addAddress($email, 'Penerima email');

    // Isi email
    $mail->isHTML(true);
    // Atur subjek
    $mail->Subject = 'Email verifikasi';
    // Atur body
    $messageHtml = '
        <!DOCTYPE html>
<html
  lang="en"
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="x-apple-disable-message-reformatting" />
    <title></title>
    <style>
      table,
      td,
      div,
      h1,
      p {
        font-family: Arial, sans-serif;
      }
    </style>
  </head>
  <body style="margin: 0; padding: 0">
    <table
      role="presentation"
      style="
        width: 100%;
        border-collapse: collapse;
        border: 0;
        border-spacing: 0;
        background: #ffffff;
      "
    >
      <tr>
        <td align="center" style="padding: 0">
          <table
            role="presentation"
            style="
              width: 602px;
              border-collapse: collapse;
              border: 1px solid #cccccc;
              border-spacing: 0;
              text-align: left;
            "
          >
            <tr>
              <td
                align="center"
                style="padding: 40px 0 30px 0; background: #ffffff"
              >
                <img
                  src="https://raw.githubusercontent.com/Demtimcod/icons-impunan/refs/heads/main/WhatsApp%20Image%202024-09-25%20at%2014.39.07.jpeg"
                  alt=""alt="Logo Himpunan Mahasiswa Informatika"
                  width="300"
                  style="height: auto; display: block"
                />
              </td>
            </tr>
            <tr>
              <td style="padding: 36px 30px 42px 30px">
                <table
                  role="presentation"
                  style="
                    width: 100%;
                    border-collapse: collapse;
                    border: 0;
                    border-spacing: 0;
                  "
                >
                  <tr>
                    <td style="padding: 0 0 36px 0; color: #153643">
                      <h1
                        style="
                          font-size: 24px;
                          margin: 0 0 20px 0;
                          font-family: Arial, sans-serif;
                        "
                      >
                        Hay Dear 🖐 ' . $user . '
                      </h1>
                      <p
                        style="
                          margin: 0 0 12px 0;
                          font-size: 16px;
                          line-height: 24px;
                          font-family: Arial, sans-serif;
                        "
                      >
                        terima kasih telah mendaftar di website himpunan
                        mahasiswa informatika universitas madura tekan tombol di
                        bawah ini untuk memverifikasi akun anda. jika ada
                        masalah di tombol bisa pakek <a href="http://himatif.test/verification/code=' . $code . '">disini</a>
                      </p>
                        <a
                          href="http://himatif.test/verification/code=' . $code . '"
                          style="
                            color: #fff;
                            text-decoration: none;
                            background-color: deepskyblue;
                            padding: 11px;
                            border-radius: 7px;
                          "
                          >verifikasi</a
                        >
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="padding: 30px; background: #ee4c50">
                <table
                  role="presentation"
                  style="
                    width: 100%;
                    border-collapse: collapse;
                    border: 0;
                    border-spacing: 0;
                    font-size: 9px;
                    font-family: Arial, sans-serif;
                  "
                >
                  <tr>
                    <td style="padding: 0; width: 50%" align="left">
                      <p
                        style="
                          margin: 0;
                          font-size: 14px;
                          line-height: 16px;
                          font-family: Arial, sans-serif;
                          color: #ffffff;
                        "
                      >
                        demtimcod & himatif unira <br /><a
                          href="http://github.com/demtimcod"
                          style="color: #ffffff; text-decoration: underline"
                          >demtimcod</a
                        >
                      </p>
                    </td>
                    <td style="padding: 0; width: 50%" align="right">
                      <table
                        role="presentation"
                        style="
                          border-collapse: collapse;
                          border: 0;
                          border-spacing: 0;
                        "
                      >
                        <tr>
                          <td style="padding: 0 0 0 10px; width: 38px">
                            <a
                              href="http://www.twitter.com/"
                              style="color: #ffffff"
                              ><img
                                src="https://assets.codepen.io/210284/tw_1.png"
                                alt="Twitter"
                                width="38"
                                style="height: auto; display: block; border: 0"
                            /></a>
                          </td>
                          <td style="padding: 0 0 0 10px; width: 38px">
                            <a
                              href="http://www.facebook.com/"
                              style="color: #ffffff"
                              ><img
                                src="https://assets.codepen.io/210284/fb_1.png"
                                alt="Facebook"
                                width="38"
                                style="height: auto; display: block; border: 0"
                            /></a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>    
        ';








    // "terima kasih $user telah mendaftar, link verifikasi kamu ini <a href='http://localhost:80/pages/verification/verif.php?code=$code'>verification now</a>"



    $mail->Body = $messageHtml;

    if ($mail->send()) {
      $query = mysqli_query($connect, "INSERT INTO user (username,email,password,create_at,verification_code,is_verifica) VALUES('$user','$email','$password',CURRENT_TIMESTAMP(),'$code',0)");
      $_SESSION['status'] = 'success';
      echo "succes";
      header("Location: /register");
      exit();
    }
  } catch (Exception $e) {
    echo "PHPMailer Error: {$mail->ErrorInfo}";
  }
}
