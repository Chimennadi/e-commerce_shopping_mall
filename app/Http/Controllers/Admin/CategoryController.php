<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function categories() {
        Session::put("page", "categories");
        $categories = Category::get()->toArray();
        return view("admin.categories.categories")->with(compact("categories"));
    }
}
