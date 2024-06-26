<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Machine_configuration;
use App\Models\Product;
use App\Models\Planogram;

class get_product extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_product';

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
        $machine_id = env('MACHINE_ID');
        $user = env('MACHINE_USER');
        $pass =  env('MACHINE_PASS');
        #$item_id = 496;

        $planos = Planogram::all();

        foreach ($planos as $plano)
        {
            sleep(1);
            $item_id = $plano->item_id;

            $req = array(
                "request" => [
                    'uniqueRequestId' => $uniqueRequestId,
                    'authenticate' => [
                        "username" => $user,
                        "password" => $pass,
                    ],
                    'machine_id' => $machine_id,
                    'item_id' => $item_id,
                    
                ],
            );


            $response = Http::post('https://devapi.adminspend.com/api/v1/product', $req);
            #$response = Http::post('http://localhost:8000/api/v1/product', $req);
            $json = $response->json();

            $product = $json['response']['product'];
            //check exists - then update
            $exists = Product::where('item_id', $item_id)->first();
            if (isset($exists))
            {
                $exists->item_id = $product['id'];
                $exists->productCode = $product['item_code'];
                $exists->upc =  $product['upc'];
                $exists->name =  $product['item'];
                $exists->image1 =  $product['detail']['img1'] ?? '';
                $exists->image2 =  $product['detail']['img2'] ?? ''; 
                $exists->image3 =  $product['detail']['img3'] ?? '';
                $exists->image4 =  $product['detail']['img4'] ?? '';
                $exists->summary =  $product['detail']['detail'] ?? '';
                $exists->description =  $product['detail']['description'] ?? '';
                $exists->productPrice =  $plano['productPrice'] ?? 0;
                $exists->save();


            } else {

                $prod = new Product;
                $prod->item_id = $product['id'];
                $prod->productCode = $product['item_code'];
                $prod->upc =  $product['upc'];
                $prod->name =  $product['item'];
                $prod->image1 =  $product['detail']['img1'] ?? '';
                $prod->image2 =  $product['detail']['img2'] ?? ''; 
                $prod->image3 =  $product['detail']['img3'] ?? '';
                $prod->image4 =  $product['detail']['img4'] ?? '';
                $prod->summary =  $product['detail']['detail'] ?? '';
                $prod->description =  $product['detail']['description'] ?? '';
                $prod->productPrice =  $plano['productPrice'] ?? 0;
                $prod->save();
            }
        }
        $products = Product::all();
        foreach ($products as $product)
        {
            if (strlen($product->image1) > 0)
            {
                print "dl1:" . $product->image1 . "\n";
                $this->download($product->image1);
            }
            if (strlen($product->image2) > 0)
            {
                print "dl2:" .strlen($product->image2) . ":" . $product->image2 . "\n";
                $this->download($product->image2);
            }
            if (strlen($product->image3) > 0)
            {
                print "dl3:" . $product->image3 . "\n";
                $this->download($product->image3);
            }
            if (strlen($product->image4) > 0)
            {
                print "dl4:" . $product->image4 . "\n";
                $this->download($product->image4);
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
    public function download($url)
    {

        //already dl
        if (file_exists('./public/prod_images/'. basename($url)))
        {
            print "exists: " .basename($url). "\n";
            return 1;
        }
        

        $ch = curl_init($url);
        $dir = './public/prod_images/';
        $file_name = basename($url);
        $save_file_loc = $dir . $file_name;
    
        $fp = fopen($save_file_loc, 'wb');
        
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);

        curl_close($ch);

        fclose($fp);
    }
}
