<?php


namespace App\Helper;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GlobalHelper
{

    public static function generateSlug(string $title, string $table_name) : string
    {
        //first generate the slug for given title
        $new_slug = Str::slug($title);

        //check generated title is already exist for given table
        $count = DB::table($table_name)->where('title', $title)->count();

        if($count > 0){
            $count++;
            return $new_slug .'-'. $count;
        }else{
            return $new_slug;
        }
    }
}