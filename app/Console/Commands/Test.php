<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Yandex;
use GeoIP;

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

        //$cert = openssl smime -sign -signer вашклиентскийсерт.cer -inkey private.key -nochain -nocerts -outform PEM -nodetach -passin pass:password_for_private_key
        
        print(public_path().'/signed.txt');
        $cert = openssl_pkcs7_sign($answ['text'],
                                   public_path().'/signed.txt',
                                   'file://'.realpath('./SSL/certnew.cer'),
                                   ['file://'.realpath('./SSL/private.key'), 'Gorchel'],
                                   [], PKCS7_NOSIGS);
        dd($cert);
    }
}
