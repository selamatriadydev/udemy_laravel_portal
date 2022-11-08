<?php

namespace App\Helper;

use App\Models\Language;
use Illuminate\Http\Request; 
use File;

class Helpers
{
    public static function read_json(){
        $current_short_name = "en";
        $current_lang_name ="English";
        if (!session()->get('lang_short_name')){
            $lang_default_data = Language::where('is_default', 'Yes')->first();
            if ($lang_default_data && $lang_default_data->short_name !=""){
                $current_short_name = $lang_default_data->short_name;
                $current_lang_name = $lang_default_data->name;
            }
        }else {
            if(session()->get('lang_name')){
                $current_lang_name= session()->get('lang_name');
            }
            $current_short_name = session()->get('lang_short_name');
        }
        
        $json_data = json_decode(file_get_contents(resource_path('languages/'.$current_short_name.'.json')));
        foreach ($json_data as $key => $value) {
            define($key, $value);
        }
    }
}
