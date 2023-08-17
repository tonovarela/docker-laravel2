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


        $response = Http::post('https://devapi.adminspend.com/api/v1/planogram', $req);
        //$response = Http::post('http://localhost:8000/api/v1/planogram', $req);
        $json = $response->json();

        foreach ($json['response']['planogram']  as $det)
        {
            
            if (isset($det['coil']))
            {

                $stock = substr($det['coil'], 0,1);
                $shelf = substr($det['coil'], 1,1);
                $lane = substr($det['coil'], 2,1);
                $plano  = new Planogram;
                $plano->item_id = $det['product']['id'];
                $plano->productCode = $det['product']['item_code'];
                $plano->motor = $det['coil'];
                $plano->stock = $stock;
                $plano->row = $shelf;
                $plano->lane = $lane;
                $plano->motorType = 1;
                $plano->productPrice = $det['price'];
                $plano->stepNum = 1;
                $plano->maxStock = $det['capacity'];
                $plano->save();
            }

        }
 
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
