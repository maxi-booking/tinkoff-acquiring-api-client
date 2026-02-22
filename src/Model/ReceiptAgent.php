<?php

namespace JustCommunication\TinkoffAcquiringAPIClient\Model;

class ReceiptAgent implements \JsonSerializable
{
    const BANK_PAYING_AGENT = 'bank_paying_agent';
    const PAYING_AGENT = 'paying_agent';
    const BANK_PAYING_SUBAGENT = 'bank_paying_subagent';
    const PAYING_SUBAGENT = 'paying_subagent';
    const ATTORNEY = 'attorney';
    const COMMISSION_AGENT = 'commision_agent';
    const ANOTHER_AGENT = 'another';

    /**
     * @var string
     */
    private $agentSign;
    /**
     * @var string
     */
    private $operationName;
    /**
     * @var string
     */
    private $phones;
    /**
     * @var string
     */
    private $receiverPhones;
    /**
     * @var string
     */
    private $transferPhones;
    /**
     * @var string
     */
    private $operatorName;
    /**
     * @var string
     */
    private $operatorAddress;
    /**
     * @var string
     */
    private $operatorInn;

    public function __construct(
        string $agentSign = null,
        string $operationName = null,
        array $phones = null,
        array $receiverPhones = null,
        array $transferPhones = null,
        string $operatorName = null,
        string $operatorAddress = null,
        string $operatorInn = null
    )
    {
        $this->agentSign = $agentSign;
        $this->operationName = $operationName;
        $this->phones = $phones;
        $this->receiverPhones = $receiverPhones;
        $this->transferPhones = $transferPhones;
        $this->operatorName = $operatorName;
        $this->operatorAddress = $operatorAddress;
        $this->operatorInn = $operatorInn;
    }

    public function jsonSerialize()
    {
        $data = [
            'AgentSign' => $this->agentSign,
            'OperationName' => $this->operationName,
            'Phones' => $this->phones,
            'ReceiverPhones' => $this->receiverPhones,
            'TransferPhones' => $this->transferPhones,
            'OperatorName' => $this->operatorName,
            'OperatorAddress' => $this->operatorAddress,
            'OperatorInn' => $this->operatorInn
        ];

        return array_filter($data, function ($v) {
            return $v !== null;
        });
    }


}