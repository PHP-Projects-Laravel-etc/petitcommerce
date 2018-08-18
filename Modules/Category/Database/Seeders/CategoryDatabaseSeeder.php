<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class CategoryDatabaseSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Category::create([
      'id' => '1',
      'name' => 'Giyim',
      'slug' => 'giyim',
      'number_low' => "10",
      'number_high' => "11",
    ]);

    Category::create([
      'id' => '2',
      'name' => 'Erkek Giyim',
      'slug' => 'erkek-giyim',
      'head_category_id' => '1',
      'number_low' => "11",
      'number_high' => "12",
    ]);

    Category::create([
      'id' => '3',
      'name' => 'Kadın Giyim',
      'slug' => 'kadın-giyim',
      'head_category_id' => '1',
      'number_low' => "12",
      'number_high' => "13",
    ]);

    Category::create([
      'id' => '4',
      'name' => 'Unisex Giyim',
      'slug' => 'unisex-giyim',
      'head_category_id' => '1',
      'number_low' => "13",
      'number_high' => "14",
      ]);

      Category::create([
      'id' => '5',
      'name' => 'Çanta',
      'slug' => 'canta',
      'number_low' => "14",
      'number_high' => "15",
      ]);

      Category::create([
      'id' => '6',
      'name' => 'Aksesuar',
      'slug' => 'aksesuar',
      'number_low' => "15",
      'number_high' => "16",
      ]);


      Category::create([
      'id' => '7',
      'name' => 'Kolye',
      'slug' => 'kolye',
      'head_category_id' => '6',
      'number_low' => "16",
      'number_high' => "17",
      ]);

      Category::create([
      'id' => '23',
      'name' => 'Yüzük',
      'slug' => 'yuzuk',
      'head_category_id' => '6',
      'number_low' => "20",
      'number_high' => "21",
      ]);


      Category::create([
      'id' => '8',
      'name' => 'Erkek Pantolon',
      'slug' => 'erkek-Pantolon',
      'head_category_id' => '2',
      'number_low' => "100000",
      'number_high'=> "109999",
      ]);


      Category::create([
      'id' => '9',
      'name' => 'Erkek T-shirt',
      'slug' => 'erkek-t-shirt',
      'head_category_id' => '2',
      'number_low' => "110000",
      'number_high' => "119999",
      ]);

      Category::create([
      'id' => '10',
      'name' => 'Erkek Gömlek',
      'slug' => 'erkek-gömlek',
      'head_category_id' => '2',
      'number_low' => "120000",
      'number_high' => "129999",
      ]);

      //
      Category::create([
      'id' => '11',
      'name' => 'Kadın Pantolon',
      'slug' => 'kadın-pantolon',
      'head_category_id' => '3',
      'number_low' => "130000",
      'number_high' => "139999",
      ]);

      Category::create([
      'id' => '12',
      'name' => 'Kadın T-shirt',
      'slug' => 'kadın-t-shirt',
      'head_category_id' => '3',
      'number_low' => "140000",
      'number_high' => "149999",
      ]);

      Category::create([
      'id' => '13',
      'name' => 'Kadın Gömlek',
      'slug' => 'kadin-gomlek',
      'head_category_id' => '3',
      'number_low' => "150000",
      'number_high' => "159999",
      ]);
      Category::create([
      'id' => '14',
      'name' => 'Etek',
      'slug' => 'etek',
      'head_category_id' => '3',
      'number_low' => "160000",
      'number_high' => "169999",
      ]);
      Category::create([
      'id' => '15',
      'name' => 'Elbise',
      'slug' => 'elbise',
      'head_category_id' => '3',
      'number_low' => "170000",
      'number_high' => "179999",
      ]);

      Category::create([
      'id' => '16',
      'name' => 'Bluz',
      'slug' => 'bluz',
      'head_category_id' => '3',
      'number_low' => "180000",
      'number_high' => "189999",
      ]);

      Category::create([
      'id' => '17',
      'name' => 'Büstiyer',
      'slug' => 'Bustiyer',
      'head_category_id' => '3',
      'number_low' => "190000",
      'number_high' => "199999",
      ]);
      Category::create([
      'id' => '18',
      'name' => 'Unisex T-shirtt',
      'slug' => 'unisex-t-shirt',
      'head_category_id' => '4',
      'number_low' => "200000",
      'number_high' => "209999",
      ]);
      Category::create([
      'id' => '19',
      'name' => 'Unisex Sweat-shirt',
      'slug' => 'unisex-sweat-shirt',
      'head_category_id' => '4',
      'number_low' => "210000",
      'number_high' => "219999",
      ]);

      Category::create([
      'id' => '20',
      'name' => 'Sırt Çantası',
      'slug' => 'sırt-cantası',
      'head_category_id' => '5',
      'number_low' => "220000",
      'number_high' => "229999",
      ]);

      Category::create([
      'id' => '21',
      'name' => 'Yandan Asmalı Çanta',
      'slug' => 'yandan-asmalı-çanta',
      'head_category_id' => '5',
      'number_low' => "230000",
      'number_high' => "239999",
      ]);

      Category::create([
      'id' => '22',
      'name' => 'Gümüş Kolye',
      'slug' => 'gumus-kolye',
      'head_category_id' => '6',
      'number_low' => "240000",
      'number_high' => "249999",
    ]);


      Category::create([
      'id' => '24',
      'name' => 'Gümüş Yüzük',
      'slug' => 'gumus-yuzuk',
      'head_category_id' => '23',
      'number_low' => "250000",
      'number_high' => "259999",
      ]);
    }
  }
