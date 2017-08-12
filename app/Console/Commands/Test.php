<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Yandex;
use GeoIP;

use App\Classes\Yandex\CommonHTTP3Example;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $answ = Yandex::send_payments(123, 1000, '', true);

        // $certificate = 'file://'.realpath('./SSL/test.cer');
        // $privkey = 'file://'.realpath('./SSL/test.key');

        // $pkcs7 = $this->sign($answ['text'],$certificate, $privkey);

        // dd($pkcs7);

        // $cert = openssl_pkcs7_sign($answ['text'],
        //                            public_path().'/signed.txt',
        //                            'file://'.realpath('./SSL/201639.cer'),
        //                            ['file://'.realpath('./SSL/private.key'), 'Gorchel'],
        //                            [], PKCS7_NOSIGS);

        try {
            $instance = new CommonHTTP3Example();
            $instance->runExample($answ['text']);
        } catch (Exception $e) {
            echo "Exception thrown: " . $e;
        }
        
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
                    ' -nochain -nocerts -outform PEM -nodetach',
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
}

 

        // $process = proc_open(
        //     'openssl smime -sign -signer ' . $certificate .
        //             ' -inkey ' . $privkey .
        //             ' -nochain -nocerts -outform PEM -nodetach',
        //     $descriptorspec, $pipes);

        // if (is_resource($process)) {
        //     // $pipes now looks like this:
        //     // 0 => writeable handle connected to child stdin
        //     // 1 => readable handle connected to child stdout

        //     fwrite($pipes[0], $source);
        //     fclose($pipes[0]);

        //     $pkcs7 = stream_get_contents($pipes[1]);
        //     fclose($pipes[1]);
        //     $resCode = proc_close($process);
        //     if ($resCode != 0) {
        //         throw new ErrorException('OpenSSL call failed:' . $resCode . '\n' . $pkcs7);
        //     }
        //     return $pkcs7;
        // }
//    }
