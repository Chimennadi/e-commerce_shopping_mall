<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public static function sections() {
        $getSections = Section::with("categories")->where("status", 1)->get()->toArray();
        return $getSections;
    }

    public function categories() {
        return $this->hasMany("App\Models\Category", "section_id")->where(["parent_id" => 0, "status" => 1])->with("sub_categories");
    }
}
