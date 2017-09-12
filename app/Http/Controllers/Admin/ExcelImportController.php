<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Alexusmai\Ruslug\Slug;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ExcelImportController extends Controller
{
    public function index(){}

    public function import(){
        dd([]);

        $reader = Excel::selectSheetsByIndex(0)->load('robo_products.xlsx')->ignoreEmpty();

        foreach($reader->get() as $row){
            $inputs = [];
            $inputs['alias'] = null;
            $inputs['category_id'] = 1;
            $inputs['manufacturer_id'] =  (int)$row->manufacturer_id;
            $inputs['name'] = trim($row->name);
            $inputs['age'] = (int)$row->age;
            $inputs['country_id'] = (int)$row->country_id;
            $inputs['control'] = (int)$row->control;
            $inputs['material_id'] = (int)$row->material_id;
            $inputs['size'] = trim($row->size);
            $inputs['weight'] = (int)$row->weight;
            $inputs['price'] = (int)$row->price;
            $inputs['description'] = $row->description;


            $dir = $row->image;

            $attributes = [
                ['attribute_type_id' => 1, 'value' => (int)$row->kolichestvo_modeley],
                ['attribute_type_id' => 3, 'value' => (int)$row->kolichestvo_detaley]
            ];

            if(!$inputs['alias']){
                $inputs['alias'] = Slug::make($inputs['name']);
            }
            $product = new Product();
            $product->fill($inputs);
            if($product->save()){

                $images = [];
                $disk_product_images = Storage::disk('product_images');
                $files = $disk_product_images->files($dir);
                foreach($files as $file){
                    $images[]['src'] = '/upload/product_images/'.$file;
                }
                if(isset($images)) {
                    foreach ($images as $image) {
                        if (!empty($image['src'])) {
                            $img_extension = pathinfo($image['src'], PATHINFO_EXTENSION);
                            $img_name = str_random(30) . '.' . $img_extension;
                            $product->saveImages($image['src'], $img_name);// Сохранение картинок
                            $image['name'] = $img_name;
                            $product->images()->create($image);
                        }
                    }
                }


                if($attributes){
                    $product->attributes()->createMany($attributes);
                }
            }



//            dump($inputs);
//            dump($attributes);
//            dd($images);

        }



        dd([]);



        //dd($sheet);

//        Excel::load('robo_products.xlsx', function($reader) {
//            //$results = $reader->get();
//           dd($reader->get());
//        });







        $disk_product_images = Storage::disk('product_images');

        $files = $disk_product_images->files($dir);
        foreach($files as $file){

            dump('/upload/product_images/'.$file);

//                $file_new_name = File::dirname($file).'/'.Slug::make(File::name($file)).'.'.File::extension($file);
//
//                if(!$disk_product_images->exists($file_new_name)){
//                    $disk_product_images->rename($file,$file_new_name);
//                }

        }

        dd([]);
    }
}
//$dirs = $disk_product_images->directories();

// dump($disk_product_images->getType($file));
// dd($disk_product_images->name($file));
//dd($disk_product_images->getDriver()->name('22/2.jpg'));
//dd($disk_product_images->lastModified('22/2.jpg'));
// File::name($file)
//dump($disk_product_images->exists('22/2.jpg'));
//dd($disk->rename('/product_images/22/1.jpg','/product_images/22/2.jpg'));

//        $product_images = '/upload/product_images/';
//        $files = File::allFiles($product_images.'22/');
//
//        foreach($files as $file){
//           // dump(Slug::make($file->getClientOriginalName()));
//            //dump($file->getBasename());
//
//            //Slug::make($file->rename('sdfsdf ывавыа'));
//        }

//dd($disk_product_images->directories());
//dd($files);

//
//foreach($dirs as $dir){
//
//    $files = $disk_product_images->files($dir);
//    foreach($files as $file){
//
//        dump('/upload/product_images/'.$file);
//
////                $file_new_name = File::dirname($file).'/'.Slug::make(File::name($file)).'.'.File::extension($file);
////
////                if(!$disk_product_images->exists($file_new_name)){
////                    $disk_product_images->rename($file,$file_new_name);
////                }
//
//    }
//}



//$sheet = $excelSheetReader->getSheet();
//
//foreach($sheet->getRowIterator() as $row){
//    dump($row);
//}