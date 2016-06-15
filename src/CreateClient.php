<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CreateClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new Client ID and Client Secret';

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
      $this->info('Generating client...');

      $length = 40;
      $clientID = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
      $clientSecret = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);


      $this->info('Client ID: ' .$clientID );
      $this->info('Client Secret: ' .$clientSecret);

      DB::insert( 'insert into oauth_clients (id, secret) values (?, ?)', [ $clientID, $clientSecret ] );
    }
}
