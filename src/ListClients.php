<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ListClients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all of the clients currently in the database';

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
        $clients = DB::table('oauth_clients')->select('id as clientID', 'secret')->get();

        $this->info( "Listing Clients Below" ."\n" );

        for( $x = 0; $x < count( $clients ); $x++ ){
          $this->info("Client ID: " .$clients[$x]->clientID );
          $this->info("Client Secret: " .$clients[$x]->secret ."\n");
        }
    }
}
