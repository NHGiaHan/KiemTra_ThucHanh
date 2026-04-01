<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TestSendEmail extends Notification
{
    use Queueable;
    private $data;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)->subject("Đặt hàng thành công");

        if ($this->data) {
            return $mail->view("email_template.don_hang_thanh_cong", ["data" => $this->data]);
        }

        return $mail->line('Email test từ hệ thống.');
    }

    
}