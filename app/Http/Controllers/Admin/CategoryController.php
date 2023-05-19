<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Session;


class CategoryController extends Controller
{
    public function categories() {
        Session::put("page", "categories");
        $categories = Category::with(["section", "parent_category"])->get()->toArray();
        //dd($categories);
        return view("admin.categories.categories")->with(compact("categories"));
    }

    public function updateCategoryStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where("id", $data["category_id"])->update(["status" => $status]);
            return response()->json(["status" => $status, "category_id" => $data["category_id"]]);
        }
    }

    public function addEditCategory(Request $request, $id=null) {
        Session::put("page", "categories");
        if($id == "") {
            //Add Category Functionality
            $title = "Add Category";
            $category = new Category;
            $message = "Category added successfully!";
        } else {
            //Edit Category Functionality
            $title = "Edit Category";
            $category = Category::find($id);
            $message = "Category updated successfully!";
        }

        if($request->isMethod("post")) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            //Upload Category Image
            if($request->hasFile("category_image")) {
                $image_tmp = $request->file("category_image");
                if($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111, 99999).".".$extension;
                    $imagePath = "admin/images/category_images/".$imageName;
                    //Upload The Image
                    Image::make($image_tmp)->save($imagePath);
                    $category->category_image = $imageName;
                }
            } else {
                $category->category_image = "";
            }
            $category->section_id = $data["section_id"];
            $category->parent_id = $data["parent_id"];
            $category->category_name = $data["category_name"];
            $category->category_discount = $data["category_discount"];
            $category->description = $data["description"];
            $category->url = $data["url"];
            $category->meta_title = $data["meta_title"];
            $category->meta_description = $data["meta_description"];
            $category->meta_keywords = $data["meta_keywords"];
            $category->save();
            return redirect("admin/categories")->with("success_message", $message);
        }

        //Get All Sections
        $getSections = Section::get()->toArray();
        return view("admin.categories.add_edit_category")->with(compact("title", "category", "getSections"));
    }
}
