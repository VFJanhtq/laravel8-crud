<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Services\LaravelCrudService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaravelCrud extends Controller
{
    protected $thisLaravelCrudService;
    public function __construct(LaravelCrudService $laravelCrudService)
    {
        $this->thisLaravelCrudService = $laravelCrudService;
    }
    public function index(Request $request)
    {
        $select_category = $request->input('category_id');
        $select_name = $request->input('name');
        $select_price = $request->input('unit_price');
        // $category_list = Category::all();
        // // $item_all = Items::all();
        // $itemQueries = Items::query();

        // if ($select_category != 0) {
        //     $itemQueries->where('category_id', $select_category);
        // }
        // if ($select_name != "") {
        //     $itemQueries->where('item_name', 'like', "%" . $select_name . "%");
        // }
        // if ($select_price != "") {
        //     $itemQueries->where('unit_price', $select_price);
        // }
        // // ->
        // // ->where('unit_price', $select_price)

        // $items = $itemQueries->get();
        // //$item_name = Items::where('item_name', 'like', "%" . $select_name . "%")->get();
        // //$request->input('category'))->get();
        $items = $this->thisLaravelCrudService->getItem($select_category, $select_name, $select_price);
        $category_list = $this->thisLaravelCrudService->getCategory();
        return view("crud.index", [
            'categories' => $category_list,
            'items' => $items,
            'input_name' => $select_name,
            'choice' => $select_category,
            'input_price' => $select_price,
            'item_all' => $items
        ]);
        //return view('crud.index');
    }


    public function add(Request $request)
    {
        $request->validate([ // dat dieu kien cho bien minh nhap
            'name' => 'required',
            'price' => 'required'
        ]);

        $query = DB::table('items')->insert([
            'item_name' => $request->input('name'),
            'unit_price' => $request->input('price'),
            'category_id' => $request->input('cate')
        ]);

        if ($query) {
            return back()->with('success', 'Data have been successful inserted');
        } else {
            return back()->with('fail', 'something went wrong');
        }
    }

    public function detail($id)
    {

        $items = Items::where('id', $id)->first();
        return view('crud.detailItem', [
            'detail_item' => $items
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([ // dat dieu kien cho bien minh nhap
            'name' => 'required',
            'price' => 'required',
            'cate' => 'required'
        ]);

        $updating = Items::where('id', $request->input('cid'))
            ->update([
                'item_name' => $request->input('name'),
                'unit_price' => $request->input('price'),
                'category_id' => $request->input('cate')
            ]);
        if (!$updating) {
            return redirect()->back();
        } else {
            return redirect()->route('detail', ['id' => $request->input('cid')]);
        }
    }

    function delete($id)
    {
        $delete = Items::where('id', $id)
            ->delete();
        if (!$delete) {
            return redirect()->back();
        } else {
            return redirect()->route('index');
        }
    }

    public function dashboard_category()
    {
        return view('dashboard.dashboard');
    }
}
