<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lalapan = Category::create(['title'=>'Lalapan']);
        $lalapan->childs()->saveMany([
            new Category(['title'=>'Ayam']),
            new Category(['title'=>'Bebek']),
            new Category(['title'=>'Ikan']),
            new Category(['title'=>'Tempe/Tahu']),
        ]);

        //simple product
        $ayam = Category::where('title', 'Ayam')->first();
        $bebek = Category::where('title', 'Bebek')->first();
        $lalapan1 = Product::create([
            'name'=> 'Lalapan Ayam Bakar',
            'weight'=>rand(1,4) *100,
            'photo'=>'ayambakar.jpg',
            'price'=> 12000]);

        $lalapan2 = Product::create([
            'name'=> 'Lalapan Ayam Kremes',
            'weight'=>rand(1,4) *100,
            'photo'=>'ayamkremes.jpg',
            'price'=> 12000]);

        $lalapan3 = Product::create([
            'name'=> 'Lalapan Ayam Geprek',
            'weight'=>rand(1,4) *100,
            'photo'=>'ayamgeprek.jpg',
            'price'=> 10000]);
        
        $lalapan4 = Product::create([
            'name'=> 'Lalapan Bebek Goreng',
            'weight'=>rand(1,4) *100,
            'photo'=>'bebekgoreng.jpg',
            'price'=> 17000]);

        $ayam->products()->saveMany([$lalapan1, $lalapan2, $lalapan3]);
        $bebek->products()->saveMany([$lalapan4]);

        //copy image simple to public folder
        $from =  database_path(). DIRECTORY_SEPARATOR. 'seeds'. DIRECTORY_SEPARATOR. 'img' .DIRECTORY_SEPARATOR;
        $to = public_path() .DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR;
        File::copy($from. 'ayambakar.jpg', $to. 'ayambakar.jpg');
        File::copy($from. 'ayamkremes.jpg', $to. 'ayamkremes.jpg');
        File::copy($from. 'ayamgeprek.jpg', $to. 'ayamgeprek.jpg');
        File::copy($from. 'bebekgoreng.jpg', $to. 'bebekgoreng.jpg');
    }
}
