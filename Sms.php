<?php
require 'ebulksmsAPI.php';

class SMS
{
    /* EBULKSMS API DETAILS */
    private $json_url = "http://api.ebulksms.com:8080/sendsms.json";
    private $xml_url = "http://api.ebulksms.com:8080/sendsms.xml";
    private $http_get_url = "http://api.ebulksms.com:8080/sendsms";
    private $e_username = 'meetkellyonline@yahoo.com';
    private $apikey = 'b656d69a4cd5c560810b174e28ea9514b3e1f122';
    private $sender = 'CourierHub';

    private $response = array();

    //Send SMS
    public function sendSMS($recipient, $message)
    {
        $flash = 0;
        $message = substr($message, 0, 160); //Limit this message to one page.
        $Ebulksms = new Ebulksms();

        if ($recipient) {
            if ($Ebulksms->useJSON($this->json_url, $this->e_username, $this->apikey, $flash, $this->sender, $message, $recipient)) {
                return true;
            } else {
                return 'SMS Failed. Try again later.';
            }
        } else {
            return 'No phone number provided.';
        }
    }

    public function sendSMS2($recipient, $message, $relay)
    {

        $flash = 0;
        $message = substr($message, 0, 160); //Limit this message to one page.
        $Ebulksms = new Ebulksms();

        if (empty($message)) {
            $this->response = array('status' => 'error', 'message' => 'Please write a message.');
        } elseif ($recipient) {
            if ($Ebulksms->useJSON($this->json_url, $this->e_username, $this->apikey, $flash, $this->sender, $message, $recipient)) {
                $this->response = array('status' => 'success', 'message' => 'SMS Sent!');
            } else {
                $this->response = array('status' => 'error', 'message' => 'SMS Failed. Try again later.');
            }
        } else {
            $this->response = array('status' => 'error', 'message' => 'No phone number provided.');
        }

        if ($relay === 'return') {
            return json_encode($this->response);
        } else {
            echo json_encode($this->response);
        }
    }

    public function sendVCode($phone, $vcode)
    {
        $message = '<#> Your ' . $this->sender . ' verification code is: ' . $vcode;
        $this->sendSMS($phone, $message);
    }

}