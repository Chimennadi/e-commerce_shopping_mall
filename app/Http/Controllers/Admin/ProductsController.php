<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use App\Models\Section;
use App\Models\Category;
use App\Models\Brand;
use Session;
use Auth;
use Image;

class ProductsController extends Controller
{
    public function products() {
        Session::put("page", "products");
        $products = Product::with(["section" => function($query) {
            $query->select("id", "name");
        }, "category" => function($query) {
            $query->select("id", "category_name");
        }])->get()->toArray();
        //dd($products);
        return view("admin.products.products")->with(compact("products"));
    }

    public function updateProductStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Product::where("id", $data["product_id"])->update(["status" => $status]);
            return response()->json(["status" => $status, "product_id" => $data["product_id"]]);
        }
    }

    public function deleteProduct($id) {
        //Delete product
        Product::where("id", $id)->delete();
        $message = "Product has been deleted successfully!";
        return redirect()->back()->with("success_message", $message);
    }

    public function addEditProduct(Request $request, $id=null) {
        Session::put("page", "products");
        if($id == "") {
            $title = "Add Product";
            $product = new Product;
            $message = "Product added successfully!";
        } else {
            $title = "Edit Product";
            $product = Product::find($id);
            //dd($product);
            $message = "Product updated successfully!";
        }

        if($request->isMethod("post")) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $rules = [
                "category_id" => "required",
                "product_name" => "required|regex:/^[\pL\s\-]+$/u",
                "product_code" => "required|regex:/^\w+$/",
                "product_price" => "required|numeric",
                "product_color" => "required|regex:/^[\pL\s\-]+$/u",
            ];
            $this->validate($request, $rules);

            //Upload product image after resize (small: 250x250 -- medium: 500x500 --large: 1000x1000)
            if($request->hasFile("product_image")) {
                $image_tmp = $request->file("product_image");
                if($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111, 99999).".".$extension;
                    $largeImagePath = "front/images/product_images/large/".$imageName;
                    $mediumImagePath = "front/images/product_images/medium/".$imageName;
                    $smallImagePath = "front/images/product_images/small/".$imageName;
                    //Upload The large, medium, small image after resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                    
                    //Insert image name to the database product table
                    $product->product_image = $imageName;
                }
            }

            //Upload product video
            if($request->hasFile("product_video")) {
                $video_tmp = $request->file("product_video");
                if($video_tmp->isValid()) {
                    //Upload video in videos folder
                    $extension = $video_tmp->getClientOriginalExtension();
                    $videoName = rand(111, 99999).".".$extension;
                    $videoPath = "front/videos/product_videos/";
                    $video_tmp->move($videoPath,$videoName);
                    //Insert video name in the database product table
                    $product->product_video = $videoName;
                }
            }

            //Save product details in products table
            $categoryDetails = Category::find($data["category_id"]);
            $product->section_id = $categoryDetails["section_id"];
            $product->category_id = $data["category_id"];
            $product->brand_id = $data["brand_id"];

            $adminType = Auth::guard("admin")->user()->type;
            $vendor_id = Auth::guard("admin")->user()->vendor_id;
            $admin_id = Auth::guard("admin")->user()->id;

            $product->admin_type = $adminType;
            $product->admin_id = $admin_id;
            if($adminType == "vendor") {
                $product->vendor_id = $vendor_id;
            } else {
                $product->vendor_id = 0;
            }
            $product->product_name = $data["product_name"];
            $product->product_code = $data["product_code"];
            $product->product_color = $data["product_color"];
            $product->product_price = $data["product_price"];
            $product->product_discount = $data["product_discount"];
            $product->product_weight = $data["product_weight"];
            $product->description = $data["description"];
            $product->meta_title = $data["meta_title"];
            $product->meta_description = $data["meta_description"];
            $product->meta_keywords = $data["meta_keywords"];
            if(!empty($data["is_featured"])) {
                $product->is_featured = $data["is_featured"];
            } else {
                $product->is_featured = "No";
            }
            $product->status = 1;
            $product->save();
            return redirect("admin/products")->with("success_message", $message);
        } 

        //Get sections with categories and sub categories
        $categories = Section::with("categories")->get()->toArray();
        //dd($categories);

        //Get All Brands
        $brands = Brand::where("status", 1)->get()->toArray();
        return view("admin.products.add_edit_product")->with(compact("title", "categories", "brands", "product"));
    }

    public function deleteProductImage($id) {
        //Get product image
        $productImage = Product::select("product_image")->where("id", $id)->first();

        //Get product image path
        $small_image_path = "front/images/product_images/small/";
        $medium_image_path = "front/images/product_images/medium/";
        $large_image_path = "front/images/product_images/large/";

        //Delete product small image if exists in small folder
        if(file_exists($small_image_path.$productImage->product_image)) {
            unlink($small_image_path.$productImage->product_image);
        }

        //Delete product medium image if exists in medium folder
        if(file_exists($medium_image_path.$productImage->product_image)) {
            unlink($medium_image_path.$productImage->product_image);
        }

        //Delete product large image if exists in large folder
        if(file_exists($large_image_path.$productImage->product_image)) {
            unlink($large_image_path.$productImage->product_image);
        }

        //Deleting image from database product table
        Product::where("id", $id)->update(["product_image" => ""]);

        $message = "Product image has been deleted successfully!";
        return redirect()->back()->with("success_message", $message);
    }

    public function deleteProductVideo($id) {
        //Get product video
        $productVideo = Product::select("product_video")->where("id", $id)->first();

        //Get product video path
        $product_video_path = "front/videos/product_videos/";

        //Delete product video from product_videos folder if exists
        if(file_exists($product_video_path.$productVideo->product_video)) {
            unlink($product_video_path.$productVideo->product_video);
        }

        //Delete product video from database product table
        Product::where("id", $id)->update(["product_video" => ""]);

        $message = "Product video has been deleted successfully!";
        return redirect()->back()->with("success_message", $message);

    }

    public function addAttributes(Request $request, $id) {
        Session::put("page", "products");
        $product = Product::select("id","product_name","product_code", "product_color", "product_price", "product_image")->with("attributes")->find($id);
        //$product = json_decode(json_encode($product), true);

        if($request->isMethod("post")) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            foreach($data["sku"] as $key => $value) {
                if(!empty($value)) {

                    //SKU duplicate check
                    $skuCount = ProductsAttribute::where("sku", $value)->count();
                    if($skuCount > 0) {
                        return redirect()->back()->with("error_message", "SKU already exists! Please add another SKU");
                    }

                    //Size duplicate check
                    $sizeCount = ProductsAttribute::where(["product_id" => $id, "size", $data["size"][$key]])->count();
                    if($sizeCount > 0) {
                        return redirect()->back()->with("error_message", "Size already exists! Please add another Size");
                    }

                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data["size"][$key];
                    $attribute->price = $data["price"][$key];
                    $attribute->stock = $data["stock"][$key];
                    $attribute->status = 1;
                    $attribute->save();
                }
            }
            return redirect()->back()->with("success_message", "Product Attributes has been added successfully!");
        }

        return view("admin.attributes.add_edit_attributes")->with(compact("product"));
    }

    public function updateAttributeStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductsAttribute::where("id", $data["attribute_id"])->update(["status" => $status]);
            return response()->json(["status" => $status, "attribute_id" => $data["attribute_id"]]);
        }
    }

    public function editAttributes(Request $request) {
        if($request->isMethod("post")) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach ($data["attributeId"] as $key => $attribute) {
                if(!empty($attribute)) {
                    ProductsAttribute::where(["id" => $data["attributeId"][$key]])->update(["price" => $data["price"][$key], "stock" => $data["stock"][$key]]);
                }
            }
            return redirect()->back()->with("success_message", "Product Attributes has been updated successfully!");
        }
    }

    public function addImages($id, Request $request) {
        Session::put("page", "products");
        $product = Product::select("id","product_name","product_code", "product_color", "product_price", "product_image")->with("images")->find($id);
        //$product = json_decode(json_encode($product), true); 

        if($request->isMethod("post")) {
            if($request->hasFile("images")) {
                $images = $request->file("images");
                //echo "<pre>"; print_r($data); die;
                foreach ($images as $key => $image) {
                    //Generate temp image
                    $image_tmp = Image::make($image);
                    //Get image name
                    $image_name = $image->getClientOriginalName();
                    //Get image extension
                    $extension = $image->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = $image_name.rand(111, 99999).".".$extension;
                    $largeImagePath = "front/images/product_images/large/".$imageName;
                    $mediumImagePath = "front/images/product_images/medium/".$imageName;
                    $smallImagePath = "front/images/product_images/small/".$imageName;
                    //Upload The large, medium, small image after resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                    
                    //Insert image name to the database product table
                    $image = new ProductsImage;
                    $image->image = $imageName;
                    $image->product_id = $id;
                    $image->status = 1;
                    $image->save();
                }
            }
            return redirect()->back()->with("success_message", "Product Images have been updated successfully!");
        }

        return view("admin.images.add_images")->with(compact("product"));

    }

    public function updateImageStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductsImage::where("id", $data["image_id"])->update(["status" => $status]);
            return response()->json(["status" => $status, "image_id" => $data["image_id"]]);
        }
    }

    public function deleteImage($id) {
        //Get product image
        $productImage = ProductsImage::select("image")->where("id", $id)->first();

        //Get product image path
        $small_image_path = "front/images/product_images/small/";
        $medium_image_path = "front/images/product_images/medium/";
        $large_image_path = "front/images/product_images/large/";

        //Delete product small image if exists in small folder
        if(file_exists($small_image_path.$productImage->image)) {
            unlink($small_image_path.$productImage->image);
        }

        //Delete product medium image if exists in medium folder
        if(file_exists($medium_image_path.$productImage->image)) {
            unlink($medium_image_path.$productImage->image);
        }

        //Delete product large image if exists in large folder
        if(file_exists($large_image_path.$productImage->image)) {
            unlink($large_image_path.$productImage->image);
        }

        //Deleting image from database product_images table
        ProductsImage::where("id", $id)->delete();

        $message = "Product image has been deleted successfully!";
        return redirect()->back()->with("success_message", $message);
    }
}
