<?php

namespace App\Mail;

use App\Services\EmailTemplateService;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTemplate extends Mailable
{
    use SerializesModels;

    private $data, $slug, $footer, $header, $language;
    public $html_data, $custom_content;
    private $emailTemplateService;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data, $email_slug,$language=null, $footer_slug = '', $header_slug = '', $custom_content = null)
    {

        $this->data = $data;
        $this->slug = $email_slug;
        $this->language = $language;
        $this->footer = $footer_slug;
        $this->header = $header_slug;
        $this->custom_content = $custom_content;
        $this->emailTemplateService = new EmailTemplateService();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_data = $this->emailTemplateService->getBySlug($this->slug, $this->language);

        if ($mail_data == null)
            return false;

        if (!$this->custom_content) {
            $this->html_data = $mail_data->content;
            foreach ($this->data as $key => $value) {
                $this->html_data = str_replace('{{ ' . $key . ' }}', $value, $this->html_data);
            }
        } else {
            $this->html_data = $this->custom_content;
        }
        if (!empty($this->footer)) {
            $footer_html = $this->emailTemplateService->getBySlug($this->footer)->content;
            $this->html_data = $this->html_data . $footer_html;
        }

        if (!empty($this->header)) {
            $herder_html = $this->emailTemplateService->getBySlug($this->header)->content;
            $this->html_data = $herder_html . $this->html_data;
        }

        return $this->subject($mail_data->subject)
            ->from($mail_data->from_email, 'Staarae')
            ->view('admin.mail.template');
    }
}
