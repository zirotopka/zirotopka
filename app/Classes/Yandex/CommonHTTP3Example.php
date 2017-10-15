<?php

namespace App\Classes\Yandex;

use App\Classes\Yandex\CommonProtocolUtils;
/**
 * Пример клиента протокола
 * "Протокол взаимодействия платежной системы «Яндекс.Деньги» и магазина. Версия commonHTTP-3.0"
 * на PHP-5
 * Пример содержит процедуры создания и проверки сообщений протокола для сервера и клиента
 * Для запуска примера потребуется:
 * 1. PHP5
 * 2. OpenSSL 0.9.8+
 */
class CommonHTTP3Example extends CommonProtocolUtils {

    /**
     * Параметры запроса
     */

    // Момент времени формирования запроса в системе «Яндекс.Деньги».
    private $requestDatetime;
    // идентфикатор магазина
    private $shopId;
    // идентификатор товара
    private $shopArticleId;
    // уникальный номер транзакции в системе Яндекс.Деньги
    private $invoiceId;
    // момент времени регистрации заказа
    private $orderCreatedDatetime;
    // сумма заказа
// NOTE: сумма в PHP хранится в float формате,
// в этом формате нельзя совершать операции умножения и деления денежных сумм,
// так как возможна потеря значащих разрядов
    private $orderSumAmount;
    // код валюты для суммы заказа
    private $orderSumCurrencyPaycash = 643;
    // код процессингового центра
    private $orderSumBankPaycash = 1001;
    // сумма заказа, получаемая магазином
    private $shopSumAmount;
    // код валюты для суммы заказа
    private $shopSumCurrencyPaycash = 643;
    // код процессингового центра
    private $shopSumBankPaycash = 1001;
    // номер счета плательщика
    private $paymentPayerCode = "41001101140";
    // Идентфикатор покупателя в ИС магазина
    private $customerNumber;
    // время оплаты заказа
    private $paymentDateTime;
    // параметры платной ссылки, добавленные магазином
    private $customParamName; // имя
    private $customParamValue; // значение

    /**
     * Параметры ответа магазина
     */
    // время обработки запроса по часам магазина
    private $performedDatetime;
    // Код результата обработки
    private $code;
    // текст с причиной отказа принять платеж
    private $message;

    public function CommonHTTP3Example() {
        /**
         * Инициализация параметров случайнвми значениями
         */
        
        // инициализация параметров отправляемых запросов
        $this->requestDatetime = time();
        $this->shopId = $this->requestDatetime & 0xFFFF;
        $this->shopArticleId = $this->requestDatetime & 0xFFFF0000;
        $this->invoiceId = time();
        $this->orderCreatedDatetime = time() - rand(1);
        // случайная сумма до 1000р
        $this->orderSumAmount = rand(100000) / 100;
        // слчайная комиссия до 10%
        $this->shopSumAmount = $this->orderSumAmount - $this->orderSumAmount * rand(100) / 1000;
        $this->paymentDateTime = time() + rand(1);
        $this->customerNumber = $this->getRandomString(20);
        $this->customParamName = $this->getRandomString(8);
        $this->customParamValue = $this->getRandomString(16);

        // инициализация параметров ответа сервера
        $this->performedDatetime = time() + rand(2);
        $codes = array(0, 1, 100, 200, 1000);
        $this->code = $codes[rand(4)];
        if ($codes == 100) {
            // сообщение об отказе принять платеж
            $this->message = $this->getRandomString(64);
        }
    }


    private function getRandomString($length = 16) {
        $validCharacters = "0123456789abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ";
        $validCharNumber = strlen($validCharacters);
        $result = "";
        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
    }

    private function writeCommonRequestAttributes(\DOMElement $root, \DOMDocument $doc) {
        $root->setAttribute("requestDatetime", $this->formatDatetime($this->requestDatetime));
        $root->setAttribute("invoiceId", $this->invoiceId);
        $root->setAttribute("shopId", $this->shopId);
        $root->setAttribute("shopArticleId", $this->shopArticleId);
        $root->setAttribute("orderCreatedDatetime", $this->formatDatetime($this->orderCreatedDatetime));
        $root->setAttribute("paymentPayerCode", $this->paymentPayerCode);
        $root->setAttribute("orderSumAmount", $this->formatMoney($this->orderSumAmount));
        $root->setAttribute("orderSumCurrencyPaycash", $this->orderSumCurrencyPaycash);
        $root->setAttribute("orderSumBankPaycash", $this->orderSumBankPaycash);
        $root->setAttribute("shopSumAmount", $this->formatMoney($this->shopSumAmount));
        $root->setAttribute("shopSumCurrencyPaycash", $this->shopSumCurrencyPaycash);
        $root->setAttribute("shopSumBankPaycash", $this->shopSumBankPaycash);
        $root->setAttribute("customerNumber", $this->customerNumber);
        $customParam = $doc->createElement("param");
        //$customParam = new \DOMElement("param");
        $customParam->setAttribute("key", $this->customParamName);
        $customParam->setAttribute("val", $this->customParamValue);
        $root->appendChild($customParam);
    }

    private function writeCommonRequestAttributesNVP() {
        $nvp = array();
        $nvp["requestDatetime"] = $this->formatDatetime($this->requestDatetime);
        $nvp["invoiceId"] = $this->invoiceId;
        $nvp["shopId"] = $this->shopId;
        $nvp["shopArticleId"] = $this->shopArticleId;
        $nvp["orderCreatedDatetime"] = $this->formatDatetime($this->orderCreatedDatetime);
        $nvp["paymentPayerCode"] = $this->paymentPayerCode;
        $nvp["orderSumAmount"] = $this->formatMoney($this->orderSumAmount);
        $nvp["orderSumCurrencyPaycash"] = $this->orderSumCurrencyPaycash;
        $nvp["orderSumBankPaycash"] = $this->orderSumBankPaycash;
        $nvp["shopSumAmount"] = $this->formatMoney($this->shopSumAmount);
        $nvp["shopSumCurrencyPaycash"] = $this->shopSumCurrencyPaycash;
        $nvp["shopSumBankPaycash"] = $this->shopSumBankPaycash;
        $nvp["customerNumber"] = $this->customerNumber;
        $nvp[$this->customParamName] = $this->customParamValue;
        return $nvp;
    }

    /**
     * Рассчитать MD5 хэш согласно протоколу
     *
     * @param action параметр action
     * @return MD5 hash в HEX кодированном формате
     */
    private function calculateMD5Hash($action) {
        static $HASH_PARAMS_DELIMITER = ';';
        $source =
                $action . $HASH_PARAMS_DELIMITER .
                        $this->orderSumAmount . $HASH_PARAMS_DELIMITER .
                        $this->orderSumCurrencyPaycash . $HASH_PARAMS_DELIMITER .
                        $this->orderSumBankPaycash . $HASH_PARAMS_DELIMITER .
                        $this->shopId . $HASH_PARAMS_DELIMITER .
                        $this->invoiceId . $HASH_PARAMS_DELIMITER .
                        $this->customerNumber;
        return md5($source);
    }

    /**
     * Создание XML документа запроса "Проверка заказа"
     *
     * @return string XML документ в сериализованном виде
     */
    private function createCheckOrderRequestXMLDocument() {
        $xml = new \DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("checkOrderRequest");
        $xml->appendChild($root);
        
        $this->writeCommonRequestAttributes($root, $xml);
        return $xml->saveXML();
    }

    /**
     * Создание набора name-value pairs для отправки запроса "Проверка заказа" методом NVP/MD5
     *
     * @return набор значений для формирования HTTP запроса
     */
    private function createCheckOrderNVP() {
        $nvp = $this->writeCommonRequestAttributesNVP();
        $nvp["md5"] = $this->calculateMD5Hash('checkOrder');
        return $nvp;
    }

    /**
     * Создание XML документа запроса "Уведомление об оплате"
     * @return string XML документ в сериализованном виде
     */
    private function createPaymentAvisoRequestXMLDocument() {
        $xml = new \DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("paymentAvisoRequest");
        $xml->appendChild($root);
        $this->writeCommonRequestAttributes($root, $xml);
        $root->setAttribute("paymentDateTime", $this->formatDatetime($this->paymentDateTime));
        return $xml->saveXML();
    }

    /**
     * Создание набора name-value pairs для отправки запроса "Уведомление об оплате" методом NVP/MD5
     *
     * @return набор значений для формирования HTTP запроса
     */
    private function createPaymentAvisoNVP() {
        $nvp = $this->writeCommonRequestAttributesNVP();
        $nvp["paymentDateTime"] = $this->formatDatetime($this->paymentDatetime);
        $nvp["md5"] = $this->calculateMD5Hash('paymentAviso');
        return $nvp;
    }

    private function writeCommonResponseAttributes(\DOMElement $root) {
        $root->setAttribute("performedDatetime", $this->formatDatetime($this->performedDatetime));
        $root->setAttribute("code", number_format($this->code));
        $root->setAttribute("invoiceId", $this->invoiceId);
        $root->setAttribute("shopId", $this->shopId);
    }

    /**
     * Создание XML документа ответа на запрос "Проверка заказа"
     * @return string XML документ в сериализованном виде
     */
    private function createCheckOrderResponseXMLDocument() {
        $xml = new \DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("checkOrderResponse");
        $xml->appendChild($root);
        $this->writeCommonResponseAttributes($root);
        if (!empty($this->message)) {
            $root->setAttribute("message", $this->message);
        }
        return $xml->saveXML();
    }

    /**
     * Создание XML документа ответа на запрос "Уведомление об оплате"
     * @return string XML документ в сериализованном виде
     */
    private function createPaymentAvisoResponseXMLDocument() {
        $xml = new \DOMDocument("1.0", "UTF-8");
        $root = $xml->createElement("paymentAvisoResponse");
        $xml->appendChild($root);
        $this->writeCommonResponseAttributes($root);
        return $xml->saveXML();
    }

    private function verifyCommonRequestAttributes(\DOMElement $root) {
        $requestDatetime = $root->getAttribute("requestDatetime");
        if ($requestDatetime == '') {
            throw new \DOMException("requestDatetime missing");
        }
        if (strtotime($requestDatetime) != $this->requestDatetime) {
            throw new \DOMException("requestDatetime wrong");
        }

        $invoiceId = $root->getAttribute("invoiceId");
        if ($invoiceId == '') {
            throw new \DOMException("invoiceId missing");
        }
        if ($invoiceId != $this->invoiceId) {
            throw new \DOMException("invoiceId wrong");
        }

        $shopId = $root->getAttribute("shopId");
        if ($shopId == '') {
            throw new \DOMException("shopId missing");
        }
        if ($shopId != $this->shopId) {
            throw new \DOMException("shopId wrong");
        }

        $shopArticleId = $root->getAttribute("shopArticleId");
        if ($shopArticleId == '') {
            throw new \DOMException("shopArticleId missing");
        }
        if ($shopArticleId != $this->shopArticleId) {
            throw new \DOMException("shopArticleId wrong");
        }

        $orderCreatedDatetime = $root->getAttribute("orderCreatedDatetime");
        if ($orderCreatedDatetime == '') {
            throw new \DOMException("orderCreatedDatetime missing");
        }
        if (strtotime($orderCreatedDatetime) != $this->orderCreatedDatetime) {
            throw new \DOMException("orderCreatedDatetime wrong");
        }

        $paymentPayerCode = $root->getAttribute("paymentPayerCode");
        if ($paymentPayerCode == '') {
            throw new \DOMException("paymentPayerCode missing");
        }
        if ($paymentPayerCode != $this->paymentPayerCode) {
            throw new \DOMException("paymentPayerCode wrong");
        }

        $orderSumAmount = $root->getAttribute("orderSumAmount");
        if ($orderSumAmount == '') {
            throw new \DOMException("orderSumAmount missing");
        }
        if ($orderSumAmount != $this->orderSumAmount) {
            throw new \DOMException("orderSumAmount wrong");
        }

        $orderSumCurrencyPaycash = $root->getAttribute("orderSumCurrencyPaycash");
        if ($orderSumCurrencyPaycash == '') {
            throw new \DOMException("orderSumCurrencyPaycash missing");
        }
        if ($orderSumCurrencyPaycash != $this->orderSumCurrencyPaycash) {
            throw new \DOMException("orderSumCurrencyPaycash wrong");
        }

        $orderSumBankPaycash = $root->getAttribute("orderSumBankPaycash");
        if ($orderSumBankPaycash == '') {
            throw new \DOMException("orderSumBankPaycash missing");
        }
        if ($orderSumBankPaycash != $this->orderSumBankPaycash) {
            throw new \DOMException("orderSumBankPaycash wrong");
        }

        $shopSumAmount = $root->getAttribute("shopSumAmount");
        if ($shopSumAmount == '') {
            throw new \DOMException("shopSumAmount missing");
        }
        if ($shopSumAmount != $this->shopSumAmount) {
            throw new \DOMException("shopSumAmount wrong");
        }

        $shopSumCurrencyPaycash = $root->getAttribute("shopSumCurrencyPaycash");
        if ($shopSumCurrencyPaycash == '') {
            throw new \DOMException("shopSumCurrencyPaycash missing");
        }
        if ($shopSumCurrencyPaycash != $this->shopSumCurrencyPaycash) {
            throw new \DOMException("shopSumCurrencyPaycash wrong");
        }

        $shopSumBankPaycash = $root->getAttribute("shopSumBankPaycash");
        if ($shopSumBankPaycash == '') {
            throw new \DOMException("shopSumBankPaycash missing");
        }
        if ($shopSumBankPaycash != $this->shopSumBankPaycash) {
            throw new \DOMException("shopSumBankPaycash wrong");
        }

        $customerNumber = $root->getAttribute("customerNumber");
        if ($customerNumber == '') {
            throw new \DOMException("customerNumber missing");
        }
        if ($customerNumber != $this->customerNumber) {
            throw new \DOMException("customerNumber wrong");
        }

        foreach ($root->childNodes as $node) {
            if ($node->nodeName == 'param' && $node->nodeType == XML_ELEMENT_NODE) {
                $key = $node->getAttribute("key");
                if ($key == '') {
                    throw new \DOMException("param.key missing");
                }
                $value = $node->getAttribute("val");
                if ($value == '') {
                    throw new \DOMException("param.value missing");
                }

                if ($key != $this->customParamName) {
                    throw new \DOMException($this->customParamName . " wrong");
                }

                if ($value != $this->customParamValue) {
                    throw new \DOMException($this->customParamValue . " wrong");
                }

                return;
            }
        }
        throw new \DOMException(" element 'param' missing");
    }

    private function verifyCommonRequestNVP(array $nvp) {
        $requestDatetime = $nvp["requestDatetime"];
        if ($requestDatetime == '') {
            throw new ErrorException("requestDatetime missing");
        }
        if (strtotime($requestDatetime) != $this->requestDatetime) {
            throw new ErrorException("requestDatetime wrong");
        }

        $invoiceId = $nvp["invoiceId"];
        if ($invoiceId == '') {
            throw new ErrorException("invoiceId missing");
        }
        if ($invoiceId != $this->invoiceId) {
            throw new ErrorException("invoiceId wrong");
        }

        $shopId = $nvp["shopId"];
        if ($shopId == '') {
            throw new ErrorException("shopId missing");
        }
        if ($shopId != $this->shopId) {
            throw new ErrorException("shopId wrong");
        }

        $shopArticleId = $nvp["shopArticleId"];
        if ($shopArticleId == '') {
            throw new ErrorException("shopArticleId missing");
        }
        if ($shopArticleId != $this->shopArticleId) {
            throw new ErrorException("shopArticleId wrong");
        }

        $orderCreatedDatetime = $nvp["orderCreatedDatetime"];
        if ($orderCreatedDatetime == '') {
            throw new ErrorException("orderCreatedDatetime missing");
        }
        if (strtotime($orderCreatedDatetime) != $this->orderCreatedDatetime) {
            throw new ErrorException("orderCreatedDatetime wrong");
        }

        $paymentPayerCode = $nvp["paymentPayerCode"];
        if ($paymentPayerCode == '') {
            throw new ErrorException("paymentPayerCode missing");
        }
        if ($paymentPayerCode != $this->paymentPayerCode) {
            throw new ErrorException("paymentPayerCode wrong");
        }

        $orderSumAmount = $nvp["orderSumAmount"];
        if ($orderSumAmount == '') {
            throw new ErrorException("orderSumAmount missing");
        }
        if ($orderSumAmount != $this->orderSumAmount) {
            throw new ErrorException("orderSumAmount wrong");
        }

        $orderSumCurrencyPaycash = $nvp["orderSumCurrencyPaycash"];
        if ($orderSumCurrencyPaycash == '') {
            throw new ErrorException("orderSumCurrencyPaycash missing");
        }
        if ($orderSumCurrencyPaycash != $this->orderSumCurrencyPaycash) {
            throw new ErrorException("orderSumCurrencyPaycash wrong");
        }

        $orderSumBankPaycash = $nvp["orderSumBankPaycash"];
        if ($orderSumBankPaycash == '') {
            throw new ErrorException("orderSumBankPaycash missing");
        }
        if ($orderSumBankPaycash != $this->orderSumBankPaycash) {
            throw new ErrorException("orderSumBankPaycash wrong");
        }

        $shopSumAmount = $nvp["shopSumAmount"];
        if ($shopSumAmount == '') {
            throw new ErrorException("shopSumAmount missing");
        }
        if ($shopSumAmount != $this->shopSumAmount) {
            throw new ErrorException("shopSumAmount wrong");
        }

        $shopSumCurrencyPaycash = $nvp["shopSumCurrencyPaycash"];
        if ($shopSumCurrencyPaycash == '') {
            throw new ErrorException("shopSumCurrencyPaycash missing");
        }
        if ($shopSumCurrencyPaycash != $this->shopSumCurrencyPaycash) {
            throw new ErrorException("shopSumCurrencyPaycash wrong");
        }

        $shopSumBankPaycash = $nvp["shopSumBankPaycash"];
        if ($shopSumBankPaycash == '') {
            throw new ErrorException("shopSumBankPaycash missing");
        }
        if ($shopSumBankPaycash != $this->shopSumBankPaycash) {
            throw new ErrorException("shopSumBankPaycash wrong");
        }

        $customerNumber = $nvp["customerNumber"];
        if ($customerNumber == '') {
            throw new ErrorException("customerNumber missing");
        }
        if ($customerNumber != $this->customerNumber) {
            throw new ErrorException("customerNumber wrong");
        }

        $customParam = $nvp[$this->customParamName];
        if ($customParam == '') {
            throw new ErrorException($this->customParamName . " missing");
        }
        if ($customParam != $this->customParamValue) {
            throw new ErrorException($this->customParamName . " wrong");
        }
    }

    private function verifyCommonResponseAttributes(\DOMElement $root) {
        $performedDatetime = $root->getAttribute("performedDatetime");
        if ($performedDatetime == '') {
            throw new \DOMException("performedDatetime missing");
        }
        if (strtotime($performedDatetime) != $this->performedDatetime) {
            throw new \DOMException("performedDatetime wrong");
        }

        $code = $root->getAttribute("code");
        if ($code == '') {
            throw new \DOMException("code missing");
        }
        if ((int) $code != $this->code) {
            throw new \DOMException("code wrong");
        }

        $invoiceId = $root->getAttribute("invoiceId");
        if ($invoiceId == '') {
            throw new \DOMException("invoiceId missing");
        }
        if ($invoiceId != $this->invoiceId) {
            throw new \DOMException("invoiceId wrong");
        }

        $shopId = $root->getAttribute("shopId");
        if ($shopId == '') {
            throw new \DOMException("shopId missing");
        }
        if ($shopId != $this->shopId) {
            throw new \DOMException("shopId wrong");
        }
    }

    /**
     * Разбор XML документа запроса "Проверка заказа"
     * @param request XML документ в сериализованном виде
     */
    private function verifyCheckOrderRequestXMLDocument($request) {
        $root = $this->parseXML($request, "checkOrderRequest");
        $this->verifyCommonRequestAttributes($root);
    }

    /**
     * Разбор NVP документа запроса "Проверка заказа"
     * @param request name-value pairs
     */
    private function verifyCheckOrderNVP(array $nvp) {
        $this->verifyCommonRequestNVP($nvp);
        $md5 = $nvp["md5"];
        if ($md5 == '') {
            throw new ErrorException("md5 missing");
        }
        if ($this->calculateMD5Hash("checkOrder") != $md5) {
            throw new ErrorException("md5 wrong");
        }
    }

    /**
     * Разбор XML документа запроса "Уведомление об оплате"
     * @param request XML документ в сериализованном виде
     */
    private function verifyPaymentAvisoRequestXMLDocument($request) {
        $root = $this->parseXML($request, "paymentAvisoRequest");
        $this->verifyCommonRequestAttributes($root);
        $paymentDateTime = $root->getAttribute("paymentDateTime");
        if ($paymentDateTime == '') {
            throw new \DOMException("paymentDateTime missing");
        }
        if (strtotime($paymentDateTime) != $this->paymentDateTime) {
            throw new \DOMException("paymentDateTime wrong");
        }
    }

    /**
     * Разбор NVP документа запроса "Уведомление об оплате"
     * @param request name-value pairs
     */
    private function verifyPaymentAvisoNVP($nvp) {
        $this->verifyCommonRequestNVP($nvp);
        $paymentDateTime = $nvp["paymentDateTime"];
        if ($paymentDateTime == '') {
            throw new \DOMException("paymentDateTime missing");
        }
        if (strtotime($paymentDateTime) != $this->paymentDateTime) {
            throw new \DOMException("paymentDateTime wrong");
        }

        $md5 = $nvp["md5"];
        if ($md5 == '') {
            throw new ErrorException("md5 missing");
        }
        if ($this->calculateMD5Hash("paymentAviso") != $md5) {
            throw new ErrorException("md5 wrong");
        }
    }

    /**
     * Разбор XML документа ответа на запрос "Проверка заказа"
     * @param response XML документ в сериализованном виде
     */
    private function verifyCheckOrderResponseXMLDocument($response) {
        $root = $this->parseXML($response, "checkOrderResponse");
        $this->verifyCommonResponseAttributes($root);
        if (!empty($this->message)) {
            $message = $root->getAttribute("message");
            if ($message == '') {
                throw new \DOMException("message missing");
            }
            if ($message != $this->message) {
                throw new \DOMException("message wrong");
            }
        }
    }

    /**
     * Разбор XML документа ответа на запрос "Уведомление об оплате"
     * @param response XML документ в сериализованном виде
     */
    private function verifyPaymentAvisoResponseXMLDocument($response) {
        $root = $this->parseXML($response, "paymentAvisoResponse");
        $this->verifyCommonResponseAttributes($root);
    }

    public function runExample($request, $certificate, $privkey) {
        /**
         * Операция "Проверка заказа"
         */

        // формирование XML запроса
        $req = $this->createCheckOrderRequestXMLDocument();

        // $req = $this->sign($req, $certificate, $privkey);
        // // // проверка XML запроса сервером
        // $req = $this->verify($req, $certificate);
        
        // $this->verifyCheckOrderRequestXMLDocument($req);
        //         dd($req);
        // // // формирование NVP запроса
        // $nvp = $this->createCheckOrderNVP();
        // foreach ($nvp as $key => $value) {
        //     echo $key . '=' . $value . "\n";
        // }
        // // проверка NVP запроса
        // $this->verifyCheckOrderNVP($nvp);

        // // формирование ответа клиенту
        // $resp = $this->createCheckOrderResponseXMLDocument();
        // echo $resp;

        // // проверка ответа клиентом
        // $this->verifyCheckOrderResponseXMLDocument($resp);

        /**
         * Операция "Уведомление об оплате"
         */

        // формирование XML запроса
        $req = $this->createPaymentAvisoRequestXMLDocument();

        $req = $this->sign($req, $certificate, $privkey);

        $ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, "https://bo-demo02.yamoney.ru:9094/webservice/deposition/api/testDeposition");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/pkcs7-mime'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLCERT, $certificate);
        curl_setopt($ch, CURLOPT_SSLKEY, $privkey);
        curl_setopt($ch, CURLOPT_SSLKEYPASSWD,'Gorchel');

        $result = curl_exec( $ch );
        curl_close( $ch );

        dd($result);

        // $req = $this->verify($req, $certificate);
        // dd($req);
        // $this->verifyPaymentAvisoRequestXMLDocument($req);

        // // формирование NVP запроса
        // $nvp = $this->createPaymentAvisoNVP();
        // echo $nvp;
        // // проверка NVP запроса
        // $this->createPaymentAvisoNVP($nvp);

        // // формирование ответа клиенту
        // $resp = $this->createPaymentAvisoResponseXMLDocument();
        // echo $resp;

        // // проверка ответа клиентом
        // $this->verifyPaymentAvisoResponseXMLDocument($resp);
    }

}

?>