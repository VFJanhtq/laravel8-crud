<?php

namespace App\Services;

use App\Models\Items;
use App\Models\Category;

class LaravelCrudService
{
    function getItem($select_category, $select_name, $select_price)
    {
        // $select_category = $request->input('category_id');
        // $select_name = $request->input('name');
        // $select_price = $request->input('unit_price');
        //$category_list = Category::all();
        // $item_all = Items::all();
        $itemQueries = Items::query();

        if ($select_category != 0) {
            $itemQueries->where('category_id', $select_category);
        }
        if ($select_name != "") {
            $itemQueries->where('item_name', 'like', "%" . $select_name . "%");
        }
        if ($select_price != "") {
            $itemQueries->where('unit_price', $select_price);
        }
        // ->
        // ->where('unit_price', $select_price)

        $items = $itemQueries->get();
        return $items;
        //$item_name = Items::where('item_name', 'like', "%" . $select_name . "%")->get();
        //$request->input('category'))->get();
    }
    function getCategory()
    {
        $category_list = Category::all();
        return $category_list;
    }

    function getDetailItem($request)
    {
        $item = Items::where('id', $request->input('detail_id'))->first();
        return $item;
    }
}
