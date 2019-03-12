<?php
class Mail{
    private static $_instance = null;
    public $_pdo, $_to, $_header, $_message, $_headers;
    public function __construct(){
    }
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new Mail();
        }
        return self::$_instance;
    }
    public function send($to, $header, $msg, $from_who){
        /* SEND MAIL */
        //Headers need's to be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: '.$from_who.' <'.$from_who.'>'."\r\n".
            'Reply-To: <'.$from_who.'>'."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $message = '<html><body style="width:900px; position:absolute; left:calc(50% - 450px); border:1px solid rgba(0,0,0,0.1);">';

        /** headers div **/
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:60px; text-align:center;">';
        $message .= '<img src="http://www.dmd.ba/app/images/logo.png" style="position:absolute; left:20px; top:20px; height:40px;">';
        $message .= '<h4 style="color:#C52932;  font-size:30px;">';
        $message .= $header;
        $message .= '</h4>';
        $message .= '</div>';

        $message .= '<p style="font-size:18px; margin-left:20px;">'.$msg.'</p> <br><br>';

        $message .= '<div style="position:relative; left:20px; top:0px; width:calc(100% - 40px); height:40px; background:#C52932; margin-bottom:30px;">';
        $message .= '<a href="http://www.dmd.ba/app/" style="position:absolute; left:0px; top:10px; width:100%; text-align:center; font-size:18px; color:#fff; text-decoration:none;"> Prijavite se ovdje </a>';
        $message .= '</div>';
        $message .= '</body></html>';
        if(@mail($to, $header, $message,$headers)){
            echo "Mail Sent Successfully";
        }else{
            echo "Mail Not Sent";
        }
    }


    public function send_bill($user_details = null, $code = null, $articles = null){
        $to = 'aladin.k@dmdbest.com';

        /* SEND MAIL */
        //Headers need's to be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: noreply@dmdbest.com <noreply@dmdbest.com>'."\r\n".
            'Reply-To: <noreply@dmdbest.com>'."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $message = '<html><body style="width:900px; position:absolute; left:calc(50% - 450px); border:1px solid rgba(0,0,0,0.1);">';

        /******* top part ******/
        $message .= '<div style="position:relative; left:30px; top:30px; width:calc(100% - 60px); border-bottom:1px solid rgba(0,0,0,0.1); margin-bottom:50px;">';

        /** top logo and bill number */
        $message .= '<div style="position:absolute; left:0px; top:0px; width:50%; height:400px;">';
        $message .= '<img src="http://www.dmd.ba/app/images/logo.png" style="position:absolute; left:0px; top:0px; height:60px;">';
        $message .= '<p style="position:absolute; left:0px; top:80px; margin:0px; font-size:26px;"> Broj narudžbe #67688877878 </p>';
        $message .= '</div>';
        /** end of logo and bill number **/


        /** company details */
        $message .= '<div style="position:relative; left:50%; width:calc(50% - 20px); ">';

        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> Rok za plaćanje 21 dan </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> Žiro račun br : 5646546545645646 </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> Još neki dodatni detalji </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> Referentni broj : 67688877878 </p>';
        $message .= '</div>';

        $message .= '</div>';
        /** end of company details **/

        $message .= '</div>';
        /***** end of top part ******/




        /***** user details and bank account *******/
        $message .= '<div style="position:relative; left:30px; top:0px; width:calc(100% - 60px);  border-bottom:1px solid rgba(0,0,0,0.1); margin-bottom:50px;">';

        /** user details */
        $message .= '<div style="position:absolute; left:0px; top:0px; width:50%;">';

        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:0px; top:0px; margin:0px; font-size:16px;"> John Doe </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:0px; top:0px; margin:0px; font-size:16px;"> Johns adress, 71000 Sarajevo </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:0px; top:0px; margin:0px; font-size:16px;"> Bosna i Hercegovina </p>';
        $message .= '</div>';

        $message .= '</div>';
        /** end of user details **/

        $date_time = (int)date('d').'. '.date('m').' 20'.date('y').' - '.date('G').':'.date('i').'h';;

        /** Bank details */
        $message .= '<div style="position:relative; left:50%; width:calc(50% - 20px); ">';

        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> <b>Platiti za : </b> </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> BBI Bank, Trg Djece Sarajeva 1 </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> 710000 Sarajevo, BiH </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> Žiro račun br : 5665151684851651689565 </p>';
        $message .= '</div>';
        $message .= '<div style="position:relative; left:0px; top:0px; width:100%; height:35px;">';
        $message .= '<p style="position:absolute; left:20px; top:0px; margin:0px; font-size:16px;"> '.$date_time.' </p>';
        $message .= '</div>';

        $message .= '</div>';
        /** end of bank details **/

        $message .= '</div>';
        /***** end user details and bank account *******/





        $message .= '</body></html>';
        if(@mail($to, 'Izvještaj o narudžbi', $message,$headers)){
            echo "Mail Sent Successfully";
        }else{
            echo "Mail Not Sent";
        }
    }
}