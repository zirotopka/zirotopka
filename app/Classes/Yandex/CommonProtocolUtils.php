<?php

namespace App\Classes\Yandex;
/**
 * Общие утилитные методы
 */
class CommonProtocolUtils {

    /**
     * @param float $money сумма
     * @return string строка, отформатированная согласно стандарту XML
     */
    protected function formatMoney($money) {
        return number_format($money, 2, '.', '');
    }

    /**
     * @param int $utime unix time
     * @return string строка, офторматированная согласно стандарту XML
     */
    protected function formatDatetime($utime) {
        return date("c", $utime);
    }

    /** Разобрать XML и проверить наличие конревого элемента с заданным именем
     * @throws DOMException в случае синтаксической ошибки разбора
     * @param  $rawdata сырые данные в виде строки
     * @param  $rootElementName имя корневого элемента
     * @return root XML element
     */
    protected function parseXML($rawdata, $rootElementName) {
        $xml = new \DOMDocument();
        if ($xml->loadXML($rawdata) != true) {
            throw new DOMException("XML parse error");
        }
        $root = $xml->getElementsByTagName($rootElementName);
        if ($root == '') {
            throw new DOMException("Unknown root element");
        }
        return $root->item(0);
    }

    /**
     * Изготовление PKCS#7 пакета в PEM формате (OpenSSL), содержащего:
     * 1. пользовательские данные
     * 2. подпись, изготовленную ключевой парой пользователя
     *
     * @param source  пользовательские данные
     * @param $certificate путь к X509 сертификату отправителя
     * @param $privkey путь приватному ключу отправителя
     * @return PKCS#7 пакет в сериализованном виде
     */
    protected function sign($source, $certificate, $privkey) {
        $descriptorspec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("pipe", "w")); // stderr is a file to write to

        $process = proc_open(
            'openssl smime -sign -signer ' . $certificate .
                    ' -inkey ' . $privkey .
                    ' -passin pass:Gorchel -nochain -nocerts -outform PEM -nodetach',
            $descriptorspec, $pipes);

        if (is_resource($process)) {
            // $pipes now looks like this:
            // 0 => writeable handle connected to child stdin
            // 1 => readable handle connected to child stdout

            fwrite($pipes[0], $source);
            fclose($pipes[0]);

            $pkcs7 = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $resCode = proc_close($process);
            if ($resCode != 0) {
                throw new \Exception('OpenSSL call failed:' . $resCode . "\n" . $pkcs7);
            }
            return $pkcs7;
        }
    }

    /**
     * Распаковка PKCS#7 пакета в PEM формате (OpenSSL) и проверка подписи согласно требуемому сертификату
     *
     * @param data        PKCS#7 пакет в сериализованном виде
     * @return пользовательские данные, извлеченные из пакета
     */
    protected function verify($data, $certificate) {
        $descriptorspec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("pipe", "w")); // stderr is a file to write to

        $process = proc_open(
            'openssl smime -verify -inform PEM -nointern -certfile ' . $certificate . ' -CAfile ' . $certificate,
            $descriptorspec, $pipes);

        if (is_resource($process)) {
            // $pipes now looks like this:
            // 0 => writeable handle connected to child stdin
            // 1 => readable handle connected to child stdout

            fwrite($pipes[0], $data);
            fclose($pipes[0]);

            $content = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $resCode = proc_close($process);
            if ($resCode != 0) {
                if ($resCode == 2 || $resCode == 4) {
                    throw new \Exception('Signature verification failed');
                } else {
                    throw new \Exception('OpenSSL call failed:' . $resCode . '\n' . $content);
                }
            }
            return $content;
        }
    }
}

?>