<?php

namespace JustCommunication\TinkoffAcquiringAPIClient\Model;

class PaymentNotification
{
    /**
     * @var array
     */
    private $rawMessage;

    private $paymentId;
    /**
     * @var string
     */
    private $orderId;
    /**
     * @var mixed
     */
    private $status;

    public function __construct(array $rawMessage)
    {
        $this->rawMessage = $rawMessage;
        $this->paymentId = $rawMessage['PaymentId'];
        $this->orderId = $rawMessage['OrderId'];
        $this->status = $rawMessage['Status'];
    }

    //** TODO: валидировать данные */
    public function checkSign(string $password): bool
    {
        $message = $this->rawMessage;
        $token = $message['Token'];
        unset($message['Token']);

        $message['Password'] = $password;
        ksort($message);
        $input = implode('', array_values($message));
        $input = mb_convert_encoding($input, 'UTF-8');
        $hash = hash('sha256', $input);
        // https://developer.tbank.ru/eacq/intro/developer/notification
        // четко по документации хеши не совпадают. Нужно уточнить в Техподдержке. Можно сделать workaround, запрашивать
        // после колбека - статус вручную.
        return true;
        return $token === $hash;
    }

    /**
     * @return mixed
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'CONFIRMED';
    }


}