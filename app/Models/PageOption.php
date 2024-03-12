<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PageOption extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'language',
        'contents',
        'enable_page_header',
        'enable_page_footer',
        'store_id',
        'meta_title',
        'meta_description',
        'created_by',
    ];

    public static function create($data)
    {
        $obj          = new Utility();
        $table        = with(new PageOption)->getTable();


        $data['slug'] = $obj->createSlug($table, $data['slug']);

        $store        = static::query()->create($data);

        return $store;
    }

    public static function get_page_slug_urls($store)
    {

        $page_slug_urls = DB::table('page_options')
            ->select(DB::raw('page_options.*,page_option_langs.parent_id,lang,name,contents,meta_title,meta_description'))
            ->join('page_option_langs', 'page_options.id', '=', 'page_option_langs.parent_id')
            ->where('store_id', $store->id)
            ->where('lang', App::currentLocale())->get();

        return $page_slug_urls;
    }
    public static function get_page_slug($id)
    {

        $page_slug_urls = DB::table('page_options')
            ->select(DB::raw('page_options.*,page_option_langs.parent_id,lang,name,contents,meta_title,meta_description'))
            ->join('page_option_langs', 'page_options.id', '=', 'page_option_langs.parent_id')
            ->where('page_options.id', $id)
            ->where('lang', App::currentLocale())->first();

        // retry query again with 'en' locale when there is no data with current locale
        if (!$page_slug_urls) {
            $page_slug_urls = DB::table('page_options')
                ->select(DB::raw('page_options.*,page_option_langs.parent_id,lang,name,contents,meta_title,meta_description'))
                ->join('page_option_langs', 'page_options.id', '=', 'page_option_langs.parent_id')
                ->where('page_options.id', $id)
                ->where('lang', "en")->first();
        }


        return $page_slug_urls;
    }
}
