<?php
include "CommonProtocolUtils.php";

/**
 * Пример клиента протокола
 * "Перевод средств на счета в системе «Яндекс.Деньги», HTTP-транспорт (HTTPGP-3.0)"
 * на PHP-5
 * Пример содержит процедуры создания и проверки сообщений протокола для сервера и клиента
 * Для запуска примера потребуется:
 * 1. PHP5
 * 2. OpenSSL 0.9.8+
 */
class HTTPGP3Example extends CommonProtocolUtils {

    /**
     * Параметры запроса
     */
// идентификатор агента
    private $agentId;
// идентификатор операции клиента
    private $clientOrderId;
// время формирования документа (запроса)
    private $requestDT;
// номер счета получателя
    private $dstAccount;
// сумма зачисления
// NOTE: сумма в PHP зранится в float формате,
// в этом формате нельзя совершать операции умножения и деления денежных сумм,
// так как возможна потеря значащих разрядов
    private $amount;
// код валюты зачисления
    private $currency;
// контракт зачисления
    private $contract;

    /**
     * Параметры ответов сервера
     */
// код состояния приказа
    private $status;
// код ошибки
    private $error;
// время обработки приказа на стороне сервера
    private $processedDT;
// остаток на счете агента
    private $balance;

    public function HTTPGP3Example() {
        /**
         * Инициализация параметров случайнвми значениями
         */
        
        // инициализация параметров отправляемого приказа
        $this->agentId = rand();
        $this->clientOrderId = time();
        $this->requestDT = time();
        $this->dstAccount = "41001101140";
        $this->amount = rand(0, 100000) / 100;
        $this->currency = 643;
        $this->contract = "Тестовый платеж, транзакция номер: " . $this->clientOrderId;

        // инициализация параметров ответа сервера
        $this->status = rand() >= 0.5 ? 0 : 3;
        $this->status == 0 ? 0 : rand(50);
        $this->processedDT = time();
        $this->balance = rand(0, 10000) / 100;
    }

    private function writeCommonRequestAttributes(DOMElement $root) {
        $root->setAttribute("agentId", $this->agentId);
        $root->setAttribute("clientOrderId", $this->clientOrderId);
        $root->setAttribute("requestDT", $this->formatDatetime($this->requestDT));
        $root->setAttribute("dstAccount", $this->dstAccount);
        $root->setAttribute("amount", $this->formatMoney($this->amount));
        $root->setAttribute("currency", $this->currency);
        $root->setAttribute("contract", $this->contract);
    }

    private function writeCommonResponseAttributes(DOMElement $root) {
        $root->setAttribute("clientOrderId", $this->clientOrderId);
        $root->setAttribute("status", number_format($this->status));
        $root->setAttribute("error", number_format($this->error));
        $root->setAttribute("processedDT", $this->formatDatetime($this->processedDT));
    }

    /**
     * Создание XML документа запроса "Проверка возможности зачисления"
     *
     * @return string XML документ в сериализованном виде
     */
    private function createTestDepositionRequestDocument() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("testDepositionRequest");
        $xml->appendChild($root);
        $this->writeCommonRequestAttributes($root);
        return $xml->saveXML();
    }

    /**
     * Создание XML документа ответа на запрос "Проверка возможности зачисления"
     *
     * @return string XML документ в сериализованном виде
     */
    private function createTestDepositionResponseDocument() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("testDepositionResponse");
        $xml->appendChild($root);
        $this->writeCommonResponseAttributes($root);
        return $xml->saveXML();
    }

    /**
     * Создание XML документа запроса "Зачисление на счет"
     *
     * @return string XML документ в сериализованном виде
     */
    private function createMakeDepositionRequestDocument() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("makeDepositionRequest");
        $xml->appendChild($root);
        $this->writeCommonRequestAttributes($root);
        return $xml->saveXML();
    }

    /**
     * Создание XML документа запроса "Зачисление на счет"
     *
     * @return string XML документ в сериализованном виде
     */
    private function createMakeDepositionResponseDocument() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("makeDepositionResponse");
        $xml->appendChild($root);
        $this->writeCommonResponseAttributes($root);
        if ($this->status == 0) {
            $root->setAttribute("balance", $this->formatMoney($this->balance));
        }
        return $xml->saveXML();
    }

    private function verifyCommonRequestAttributes(DOMElement $root) {
        $agentId = $root->getAttribute("agentId");
        if ($agentId == '') {
            throw new DOMException("agentId missing");
        }
        if ($agentId != $this->agentId) {
            throw new DOMException("agentId wrong");
        }

        $clientOrderId = $root->getAttribute("clientOrderId");
        if ($clientOrderId == '') {
            throw new DOMException("clientOrderId missing");
        }
        if ($clientOrderId != $this->clientOrderId) {
            throw new DOMException("clientOrderId wrong");
        }

        $requestDT = $root->getAttribute("requestDT");
        if ($requestDT == '') {
            throw new DOMException("DT missing");
        }
        if (strtotime($requestDT) != $this->requestDT) {
            throw new DOMException("requestDT wrong");
        }

        $dstAccount = $root->getAttribute("dstAccount");
        if ($dstAccount == '') {
            throw new DOMException("dstAccount missing");
        }
        if ($dstAccount !== $this->dstAccount) {
            throw new DOMException("dstAccount wrong");
        }

        $amount = $root->getAttribute("amount");
        if ($amount == '') {
            throw new DOMException("amount missing");
        }
        if ($amount != $this->amount) {
            throw new DOMException("amount wrong");
        }

        $currency = $root->getAttribute("currency");
        if ($currency == '') {
            throw new DOMException("currency missing");
        }
        if ($currency != $this->currency) {
            throw new DOMException("currency wrong");
        }

        $contract = $root->getAttribute("contract");
        if ($contract == '') {
            throw new DOMException("contract missing");
        }
        if ($contract !== $this->contract) {
            throw new DOMException("contract wrong");
        }
    }

    private function verifyCommonResponseAttributes(DOMElement $root) {
        $clientOrderId = $root->getAttribute("clientOrderId");
        if ($clientOrderId == '') {
            throw new DOMException("clientOrderId missing");
        }
        if ($clientOrderId != $this->clientOrderId) {
            throw new DOMException("clientOrderId wrong");
        }

        $status = $root->getAttribute("status");
        if ($status == '') {
            throw new DOMException("status missing");
        }
        if ((int) $status != $this->status) {
            throw new DOMException("status wrong");
        }

        $error = $root->getAttribute("error");
        if ($error == '') {
            throw new DOMException("error missing");
        }
        if ((int) $error != $this->error) {
            throw new DOMException("error wrong");
        }

        $processedDT = $root->getAttribute("processedDT");
        if ($processedDT == '') {
            throw new DOMException("processedDT missing");
        }
        if (strtotime($processedDT) != $this->processedDT) {
            throw new DOMException("processedDT wrong");
        }

        return (int) $status;
    }

    /**
     * Разбор XML документа запроса "Проверка возможности зачисления"
     *
     * @param request XML документ в сериализованном виде
     */
    private function verifyTestDepositionRequestDocument($request) {
        $root = $this->parseXML($request, "testDepositionRequest");
        $this->verifyCommonRequestAttributes($root);
    }

    /**
     * Разбор XML документа ответа на запрос "Проверка возможности зачисления"
     *
     * @param response XML документ в сериализованном виде
     */
    private function verifyTestDepositionResponseDocument($response) {
        $root = $this->parseXML($response, "testDepositionResponse");
        $this->verifyCommonResponseAttributes($root);
    }

    /**
     * Разбор XML документа запроса "Зачисление на счет"
     *
     * @param request XML документ в сериализованном виде
     */
    private function verifyMakeDepositionRequestDocument($request) {
        $root = $this->parseXML($request, "makeDepositionRequest");
        $this->verifyCommonRequestAttributes($root);
    }

    /**
     * Разбор XML документа ответа на запрос "Зачисление на счет"
     *
     * @param response XML документ в сериализованном виде
     */
    private function verifyMakeDepositionResponseDocument($response) {
        $root = $this->parseXML($response, "testDepositionResponse");
        $status = $this->verifyCommonResponseAttributes($root);
        if ((int) $status == 0) {
            $balance = $root->getAttribute("balance");
            if ($balance == '') {
                throw new DOMException("balance missing");
            }
            if ($balance != $this->balance) {
                throw new DOMException("balance wrong");
            }
        }
    }

    public function runExample() {
        /**
         * Операция "Проверка возможности зачисления"
         */

        // формирование тестового зачисления
        $req = $this->createTestDepositionRequestDocument();
        echo $req;
        $req = $this->sign($req, 'client.crt', 'client.key');
        echo $req;

        // проверка запроса сервером
        $req = $this->verify($req, 'client.crt');
        echo $req;
        $this->verifyTestDepositionRequestDocument($req);

        // формирование ответа клиенту
        $resp = $this->createTestDepositionResponseDocument();
        echo $resp;
        $resp = $this->sign($resp, 'server.crt', 'server.key');
        echo $resp;

        // проверка ответа клиентом
        $resp = $this->verify($resp, 'server.crt');
        echo $resp;
        $this->verifyTestDepositionResponseDocument($resp);

        /**
         * Операция "Зачисление на счет"
         */

        // формирование запроса
        $req = $this->createMakeDepositionRequestDocument();
        echo $req;
        $req = $this->sign($req, 'client.crt', 'client.key');
        echo $req;

        // проверка запроса сервером
        $req = $this->verify($req, 'client.crt');
        echo $req;
        $this->verifyMakeDepositionRequestDocument($req);

        // формирование ответа клиенту
        $resp = $this->createMakeDepositionResponseDocument();
        echo $resp;
        $resp = $this->sign($resp, 'server.crt', 'server.key');
        echo $resp;

        // проверка ответа клиентом
        $resp = $this->verify($resp, 'server.crt');
        echo $resp;
        $this->verifyMakeDepositionResponseDocument($resp);
    }

}

?>