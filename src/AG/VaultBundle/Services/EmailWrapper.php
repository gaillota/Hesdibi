<?php


namespace AG\VaultBundle\Services;

use Mailgun\Mailgun;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EmailWrapper
{
    /**
     * @var string
     *
     * Mailgun API Key
     */
    private $apiKey;

    /**
     * @var string
     *
     * Sender domain name
     */
    private $domainName = 'antoine-gaillot.com';


    public function __construct($mailgun_api_key, $domain_name)
    {
        $this->apiKey       = $mailgun_api_key;
        $this->domainName   = $domain_name;
    }

    /**
     * @param $recipient
     * @param $subject
     * @param $body
     * @param $sender
     * @return bool
     * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
     */
    public function send($recipient, $subject, $body, $sender = 'no-reply@antoine-gaillot.com')
    {
        $mailgun = new Mailgun($this->apiKey);

        $message = array(
            'from'      => $sender,
            'to'        => $recipient,
            'subject'   => $subject,
            'html'      => $body
        );

        $mailgun->sendMessage($this->domainName, $message);

        $result = $mailgun->get("$this->domainName/log", array(
                'limit' => 1,
                'skip'  => 0)
        );

        return $result->http_response_code == 200;
    }
}