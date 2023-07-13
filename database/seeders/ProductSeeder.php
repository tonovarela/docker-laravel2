<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'productCode' => 'abc_123',
                'upc' => '036000291452',
                'name' => 'JBL TUNE FLEX NOISE CANCELLING EARBUDS',
                'image1' => 'images/abc_123_IMG_1.png',
                'image2' => 'images/abc_123_IMG_2.png',
                'image3' => 'images/abc_123_IMG_3.png',
                'image4' => 'images/abc_123_IMG_4.png',
                'summary' => 'True Wireless ANC earbuds',
                'productPrice' => 120.00,
                'description' => 'Tackle your day one song at a time with the JBL Tune Flex. True wireless earbuds give you 32 hours of exceptional JBL Pure Bass Sound, while the ergonomic and water-resistant design gives you all-day comfort in any weather. A simple touch allows you to manage and enjoy perfect calls anywhere, without ambient noises. And with Active Noise Cancelling and Smart Ambient technology, you choose whether you want to tune out the world or engage with your surroundings. The light stick open design ensures comfort all-day long and natural sound awareness. Best of all, the JBL Headphones App lets you personalize your entire listening experience. Stay connected to your world, your way.

                FEATURES:
                -JBL pure bass sound
                -Active Noise Cancelling
                -Smart Ambient technology
                -4 mics for perfect calls
                -Up to 32 hours of battery life
                -Water resistant & sweatproof
                -All-day fit & comfort
                -JBL Headphones App
                
                INCLUDED IN THE BOX:
                -Tune Flex Earbuds
                -Charging Case
                -USB Type-C Charging Cable
                -Open Eartip (1 Pair)
                -Sealing eartips (3 sizes)',
            ],
            [
                'productCode' => 'abc_122',
                'upc' => '036000291452',
                'name' => 'JBL LIVE 460 NC HEADPHONES',
                'image1' => 'images/abc_122_IMG_1.jpg',
                'image2' => 'images/abc_122_IMG_2.jpg',
                'image3' => 'images/abc_122_IMG_3.jpg',
                'image4' => 'images/abc_122_IMG_4.jpg',
                'summary' => 'True Wireless ANC earbuds',
                'productPrice' => 145.99,
                'description' => '',
            ],
            [                
                'productCode' => 'abc_199',
                'upc' => '036000291452',
                'name' => 'VENTEV WIRELESS MAGNETIC BATTERY',
                'image1' => 'images/abc_199_IMG_1.jpg',
                'image2' => 'images/abc_199_IMG_2.jpg',
                'image3' => NULL,
                'image4' => NULL,
                'summary' => 'Wireless Portable Battery with MagSafe',
                'productPrice' => 55.00,
                'description' => 'Extend your battery life in a snap with ventev\'s Wireless Portable Battery with MagSafe Compatibility. Charging on the go has never been easier. Just snap the battery to the back of your iPhone 12 or newer and extend the life of your battery by up to 1 full charge.

                Product Features:
                
                5,000 mAh portable battery
                18W USB-C PD port to charge additional device
                MagSafe Compatible
                Powerful magnet for a secure “snap”
                Chrome logo application
                3ft USB-C to USB-C Fast Charging cable included',
            ],

        ];
        Product::insert($products);
    }
}

