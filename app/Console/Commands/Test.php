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
        //   

        $certificate = public_path().'/yandexSslTest/client.crt';
        $privkey = public_path().'/yandexSslTest/client.key';                     

        try {
            $instance = new CommonHTTP3Example();
            $instance->runExample($answ['text'], $certificate, $privkey);
        } catch (Exception $e) {
            echo "Exception thrown: " . $e;
        }
        
    }
}
