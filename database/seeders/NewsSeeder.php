<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')
            ->insert($this->generateData());
    }

    protected function generateData(): array
    {
        $data = [];
        $data[] = [
            'title' => 'Новость - ' . uniqid(),
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nisi repudiandae beatae ut nulla labore sed maiores, voluptates veniam eum aliquid? Reprehenderit adipisci sequi asperiores perspiciatis ratione eius vitae aliquam ipsam excepturi deserunt inventore nam exercitationem accusantium maiores aperiam vero consectetur totam libero, odit ducimus placeat sapiente possimus. Repudiandae, earum pariatur. Nesciunt voluptatibus ullam tempora. Nam earum tempore quis rem commodi!',
            'source_id' => '1',
            'publish_date' => date('Y-m-d'),
            'category_id' => '2',
            'img' => 'news.png'
        ];
        return $data;
    }
}
