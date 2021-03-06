<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //выводим наши категории, получаем их
        $categories = Category::paginate(20);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        добавление новой категории, возвращаем вид, где у нас будет форма для добавления
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //указываем правила валидации... только для title, за остальными полями будет следить sluggable
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        //после прохождения валидации, мы должны сохранить эту категорию.
        //поскольку мы используем массовое заполнение, нам нужно добавить эти поля в свойства $fillable
        Category::create($request->all());

        //пренаправление на главную страницу. Сообщение о том, что категория добавлена. Для пользователя.
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //находим категорию
        $category = Category::find($id);

        return view ('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required'
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
//        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
