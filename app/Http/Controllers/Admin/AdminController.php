<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Image;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use Session;

class AdminController extends Controller
{
    public function dashboard() {
        Session::put("page", "dashboard");
        return view("admin.dashboard");
    }

    public function updateAdminPassword(Request $request) {
        Session::put("page", "update_admin_password");
        if($request->isMethod("post")) {
            $data = $request->all();
            // Check if current password entered by admin is correct
            if(Hash::check($data["current_password"], Auth::guard("admin")->user()->password)) {
                //Check if new password is matching with confirm password
                if($data["confirm_password"] == $data["new_password"]) {
                    Admin::where("id", Auth::guard("admin")->user()->id)->update(["password" => bcrypt($data["new_password"])]);
                    return redirect()->back()->with("success_message", "Password has been updated successfully!");
                } else {
                    return redirect()->back()->with("error_message", "New Password and Confirm Password does not match");
                }
            } else {
                return redirect()->back()->with("error_message", "Your current password is incorrect!");
            }
        }
        $adminDetails = Admin::where("email", Auth::guard("admin")->user()->email)->first()->toArray();
        return view("admin.settings.update_admin_password")->with(compact("adminDetails"));
    }

    public function checkAdminPassword(Request $request) {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if(Hash::check($data["current_password"], Auth::guard("admin")->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateAdminDetails(Request $request) {
        Session::put("page", "update_admin_details");
        if($request->isMethod("post")) {
            $data = $request->all();
            //Validation
            $rules = [
                "admin_name" => "required|regex:/^[\pL\s\-]+$/u",
                "admin_mobile" => "required|numeric",
            ];
            $this->validate($request, $rules);
            //Upload Admin Photo
            if($request->hasFile("admin_image")) {
                $image_tmp = $request->file("admin_image");
                if($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111, 99999).".".$extension;
                    $imagePath = "admin/images/photos/".$imageName;
                    //Upload The Image
                    Image::make($image_tmp)->save($imagePath);
                }
            } else if(!empty($data["current_admin_image"])) {
                $imageName = $data["current_admin_image"];
            } else {
                $imageName = "";
            }            
            //Update Admin Details
            Admin::where("id", Auth::guard("admin")->user()->id)->update(["name" => $data["admin_name"], "mobile" => $data["admin_mobile"], "image" => $imageName]);
            return redirect()->back()->with("success_message", "Admin details updated successfully!");
        } else {
            return view("admin.settings.update_admin_details");
        }
    }

    public function updateVendorDetails($slug, Request $request) {
        if($slug == "personal") {
            if($request->isMethod("post")) {
                Session::put("page", "update_personal_details");
                $data = $request->all();
                /* echo "<pre>"; print_r($data); die; */
                //Validation
                $rules = [
                    "vendor_name" => "required|regex:/^[\pL\s\-]+$/u",
                    "vendor_state" => "required|regex:/^[\pL\s\-]+$/u",
                    "vendor_country" => "required|regex:/^[\pL\s\-]+$/u",
                    "vendor_mobile" => "required|numeric",
                ];
                $this->validate($request, $rules);
                //Upload Vendor Photo
                if($request->hasFile("vendor_image")) {
                    $image_tmp = $request->file("vendor_image");
                    if($image_tmp->isValid()) {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111, 99999).".".$extension;
                        $imagePath = "admin/images/photos/".$imageName;
                        //Upload The Image
                        Image::make($image_tmp)->save($imagePath);
                    }
                } else if(!empty($data["current_vendor_image"])) {
                    $imageName = $data["current_vendor_image"];
                } else {
                    $imageName = "";
                }  
                //Update in admins table
                Admin::where("id", Auth::guard("admin")->user()->id)->update(["name" => $data["vendor_name"], "mobile" => $data["vendor_mobile"], "image" => $imageName]);
                //Update in vendors table
                Vendor::where("id", Auth::guard("admin")->user()->vendor_id)->update(
                    ["name" => $data["vendor_name"], 
                    "mobile" => $data["vendor_mobile"], 
                    "address" => $data["vendor_address"], 
                    "city" => $data["vendor_city"], 
                    "state" => $data["vendor_state"], 
                    "country" => $data["vendor_country"], 
                    "pincode" => $data["vendor_pincode"], 
                ]);
                return redirect()->back()->with("success_message", "Vendor details updated successfully!");
            }
            $vendorDetails = Vendor::where("id", Auth::guard("admin")->user()->vendor_id)->first()->toArray();
        } else if($slug == "business") {
            if($request->isMethod("post")) {
                Session::put("page", "update_business_details");
                $data = $request->all();
                //Validation
                $rules = [
                    "shop_name" => "required|regex:/^[\pL\s\-]+$/u",
                    "shop_state" => "required|regex:/^[\pL\s\-]+$/u",
                    "shop_country" => "required|regex:/^[\pL\s\-]+$/u",
                    "shop_mobile" => "required|numeric",
                    "address_proof" => "required",
                ];
                $this->validate($request, $rules);
                //Upload shop Photo
                if($request->hasFile("address_proof_image")) {
                    $image_tmp = $request->file("address_proof_image");
                    if($image_tmp->isValid()) {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName = rand(111, 99999).".".$extension;
                        $imagePath = "admin/images/proofs/".$imageName;
                        //Upload The Image
                        Image::make($image_tmp)->save($imagePath);
                    }
                } else if(!empty($data["current_address_proof"])) {
                    $imageName = $data["current_address_proof"];
                }  else {
                    $imageName = "";
                }  

                //Update in vendors_business_details table
                VendorsBusinessDetail::where("vendor_id", Auth::guard("admin")->user()->vendor_id)->update(
                    ["shop_name" => $data["shop_name"], 
                    "shop_mobile" => $data["shop_mobile"], 
                    "shop_address" => $data["shop_address"], 
                    "shop_city" => $data["shop_city"], 
                    "shop_state" => $data["shop_state"], 
                    "shop_country" => $data["shop_country"], 
                    "shop_pincode" => $data["shop_pincode"],
                    "business_license_number" => $data["business_license_number"],
                    "nin_number" => $data["nin_number"],
                    "pan_number" => $data["pan_number"],
                    "address_proof" => $data["address_proof"],
                    "address_proof_image" => $imageName
                ]);
                return redirect()->back()->with("success_message", "shop details updated successfully!");
            }
            $vendorDetails = VendorsBusinessDetail::where("vendor_id", Auth::guard("admin")->user()->vendor_id)->first()->toArray();
        } else if($slug == "bank") {
            if($request->isMethod("post")) {
                Session::put("page", "update_bank_details");
                $data = $request->all();
                //Validation
                $rules = [
                    "account_holder_name" => "required|regex:/^[\pL\s\-]+$/u",
                    "bank_name" => "required|regex:/^[\pL\s\-]+$/u",
                    "account_number" => "required|numeric",
                    "bank_bin_code" => "required",
                ];
                $this->validate($request, $rules);

                //Update in vendors_bank_details table
                VendorsBankDetail::where("vendor_id", Auth::guard("admin")->user()->vendor_id)->update(
                    ["account_holder_name" => $data["account_holder_name"], 
                    "bank_name" => $data["bank_name"], 
                    "account_number" => $data["account_number"], 
                    "bank_bin_code" => $data["bank_bin_code"]
                ]);
                return redirect()->back()->with("success_message", "shop details updated successfully!");
            }
            $vendorDetails = VendorsBankDetail::where("vendor_id", Auth::guard("admin")->user()->vendor_id)->first()->toArray();
        }
        return view("admin.settings.update_vendor_details")->with(compact("slug", "vendorDetails"));
    }

    public function login(Request $request) {
        if($request->isMethod("post")) {
            $data = $request->all();
            //Server side validation
            $rules = [
                "email" => "required|email|max:255",
                "password" => "required",
            ];
            $customMessages = [
                //Add Custom Messages here
                "email.required" => "Email address is required",
                "email.email" => "Valid email Address is required",
                "password.required" => "Password is required",
            ];
            $this->validate($request, $rules, $customMessages);
            if(Auth::guard('admin')->attempt(["email" => $data["email"], "password" => $data["password"], "status" => 1])) {
                return redirect("admin/dashboard");
            }
            return redirect()->back()->with("error_message", "Invalid Email or Password");
        }
        return view("admin.login");
    }

    public function admins($type = null) {
        $admins = Admin::query();
        if(!empty($type)) {
            $admins = $admins->where("type", $type);
            $title = ucfirst($type)."s";
        Session::put("page", "view_".strtolower($title));
        } else {
            $title = "All Admins/Subadmins/Vendors";
            Session::put("page", "view_all");
        }
        $admins = $admins->get()->toArray();
        //dd($admins);
        return view("admin.admins.admins")->with(compact("admins", "title"));
    }

    public function viewVendorDetails($id) {
        $vendorDetails = Admin::with("vendorPersonal", "vendorBusiness", "vendorBank")->where("id", $id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails), true);
        //dd($vendorDetails);
        return view("admin.admins.view_vendor_details")->with(compact("vendorDetails"));
    }

    public function updateAdminStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data["status"] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Admin::where("id", $data["admin_id"])->update(["status" => $status]);
            return response()->json(["status" => $status, "admin_id" => $data["admin_id"]]);
        }
    }

    public function logout() {
        //Admin Logout
        Auth::guard("admin")->logout();
        return redirect("admin/login");
    }
}
