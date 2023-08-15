<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Machine_configuration;
use App\Models\Planogram;

class get_planogram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_planogram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $config = $this->get_config(); //Machine_configuration::all();
        $uniqueRequestId = strtoupper(base_convert(Str::uuid(), 36, 30));
        $machine_id = $config['machine_id'];
        $user = $config['user'];
        $pass = $config['pass'];

        $req = array(
            "request" => [
                'uniqueRequestId' => $uniqueRequestId,
                'authenticate' => [
                    "username" => $user,
                    "password" => $pass,
                ],
                'machine_id' => $machine_id,
                
            ],
        );


        //$response = Http::post('https://devapi.adminspend.com/api/v1/planogram', $req);
        $response = Http::post('http://localhost:8000/api/v1/planogram', $req);

    }


    public function get_config()
    {
        $config = array();
        foreach (Machine_configuration::all() as $cfg)
        {
            $config[$cfg->cfg_item] = $cfg->cfg_item_value;
        }
        return $config;
    }
}
