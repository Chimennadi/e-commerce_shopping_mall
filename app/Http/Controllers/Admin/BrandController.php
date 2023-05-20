<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;

class BrandController extends Controller
{
    public function brands() {
        Session::put("page", "brands");
        $brands = Brand::get()->toArray();
        //dd($brands);
        return view("admin.brands.brands")->with(compact("brands"));
    }

    public function updateBrandStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Brand::where("id", $data["brand_id"])->update(["status" => $status]);
            return response()->json(["status" => $status, "brand_id" => $data["brand_id"]]);
        }
    }

    public function deleteBrand($id) {
        //Delete brand
        Brand::where("id", $id)->delete();
        $message = "Brand has been deleted successfully!";
        return redirect()->back()->with("success_message", $message);
    }

    public function addEditBrand(Request $request, $id=null) {
        Session::put("page", "brands");
        if($id == "") {
            $title = "Add Brand";
            $brand = new Brand;
            $message = "Brand added successfully!";
        } else {
            $title = "Edit Brand";
            $brand = Brand::find($id);
            $message = "Brand updated successfully!";
        }
        if($request->isMethod("post")) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //Validation
            $rules = [
                "brand_name" => "required|regex:/^[\pL\s\-]+$/u",
            ];
            $this->validate($request, $rules);

            $brand->name = $data["brand_name"];
            $brand->status = 1;
            $brand->save();

            return redirect("admin/brands")->with("success_message", $message);
        }
        return view("admin.brands.add_edit_brand")->with(compact("title", "brand"));
    }
}
