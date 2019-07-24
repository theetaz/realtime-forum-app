<?php


namespace App\Helper;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GlobalHelper
{

    public static function generateSlug(string $title, string $column, string $table_name): string
    {
        //first generate the slug for given title
        $new_slug = Str::slug($title);

        //check generated title is already exist for given table
        $count = DB::table($table_name)->where($column, $title)->count();


        if ($count > 0) {
            if (!$count == 1 || !$count == 2) {
                $count++;
            }
            return $new_slug . '-' . $count;
        } else {
            return $new_slug;
        }
    }
}