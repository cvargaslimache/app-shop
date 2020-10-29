<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use File;


class ImageController extends Controller

{
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
        //guardar img de nuestro proyecto
        $file = $request->file('photo'); # guarda la imagen en una variable
        $path = public_path() . '/images/products'; #ruta general public-image-product
        $fileName = uniqid() . $file->getClientOriginalName(); #definir un nomre del archivo / uniquid, id unico , hora del sistema
        $moved = $file->move($path, $fileName); #guarda el archivo se usa la variable $moved

        //crear 1 registro en la tabla product_imagen
        if ($moved) {
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            // $productImage ->featured= false ;
            $productImage->product_id = $id;
            $productImage->save(); // insert
        }

        return back();
    }
    // metrodo destroy
    public function destroy(Request $request, $id)
    {
        //eliminar el archivo
        $productImage = ProductImage::find($request->input('image_id'));
        if (substr($productImage->image, 0, 4) === "http") {
            $deleted = true;
        } else {
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            $deleted = File::delete($fullPath);
        }

        //eliminar el registro de la img. en la db
        if ($deleted) {
            $productImage->delete();
        }
        return back();
    }
    public function select($id, $image)
    {
        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        //destacar la imagen
        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
