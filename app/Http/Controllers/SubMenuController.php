<?php

namespace App\Http\Controllers;

//use App\Models\GENERATED\Menu;
//use App\Models\GENERATED\Submenu;
//use App\Models\Website\SubMenu;
use Exception;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{

    /**
     * Display a listing of the sub menus.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $subMenus = SubMenu::paginate(25);

        return view('sub_menus.index', compact('subMenus'));
    }

    /**
     * Show the form for creating a new sub menu.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $menus = Menu::pluck('text', 'id')->all();
        $submenus = Submenu::pluck('id', 'id')->all();

        return view('sub_menus.create', compact('menus', 'submenus'));
    }

    /**
     * Store a new sub menu in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            SubMenu::create($data);

            return redirect()->route('sub_menus.sub_menu.index')->with('success_message', 'Sub Menu was successfully added!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     *
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'text'       => 'required',
            'url'        => 'required|string|min:1|max:255',
            'target'     => 'nullable|string|min:0|max:255',
            'route'      => 'nullable|string|min:0|max:255',
            'icon'       => 'nullable|string|min:0|max:255',
            'level'      => 'required|numeric|min:0|max:4294967295',
            'can'        => 'nullable|string|min:0|max:255',
            'menu_id'    => 'nullable',
            'submenu_id' => 'nullable',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    /**
     * Display the specified sub menu.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $subMenu = SubMenu::with('menu', 'submenu')->findOrFail($id);

        return view('sub_menus.show', compact('subMenu'));
    }

    /**
     * Show the form for editing the specified sub menu.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $subMenu = SubMenu::findOrFail($id);
        $menus = Menu::pluck('text', 'id')->all();
        $submenus = Submenu::pluck('id', 'id')->all();

        return view('sub_menus.edit', compact('subMenu', 'menus', 'submenus'));
    }

    /**
     * Update the specified sub menu in the storage.
     *
     * @param  int                    $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $subMenu = SubMenu::findOrFail($id);
            $subMenu->update($data);

            return redirect()->route('sub_menus.sub_menu.index')->with('success_message', 'Sub Menu was successfully updated!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified sub menu from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $subMenu = SubMenu::findOrFail($id);
            $subMenu->delete();

            return redirect()->route('sub_menus.sub_menu.index')->with('success_message', 'Sub Menu was successfully deleted!');
        } catch (Exception $exception) {

            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
