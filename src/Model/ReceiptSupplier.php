<?php

namespace JustCommunication\TinkoffAcquiringAPIClient\Model;

class ReceiptSupplier implements \JsonSerializable
{
    /**
     * @var string
     */
    private $phones;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $inn;

    public function __construct(
        array $phones = null,
        string $name = null,
        string $inn = null
    )
    {
        $this->phones = $phones;
        $this->name = $name;
        $this->inn = $inn;
    }

    public function jsonSerialize()
    {
        $data = [
            'Phones' => $this->phones,
            'Name' => $this->name,
            'Inn' => $this->inn,
        ];

        return array_filter($data, function ($v) {
            return $v !== null;
        });
    }


}