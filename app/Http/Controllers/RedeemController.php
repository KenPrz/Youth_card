<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Commodity;
class RedeemController extends Controller
{
    /**
     * Display a listing of the redeemed items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $query = Commodity::query();
        if ($request->has('search')) {
            $searchTerm = $request->search;

            $query->where('item_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('item_description', 'like', '%' . $searchTerm . '%')
                ->orWhere('required_points', 'like', '%' . $searchTerm . '%')
                ->orWhere('quantity', 'like', '%' . $searchTerm . '%');
        }
        $items = $query->paginate(6);
        return view('redeem.index', compact('items'));
    }

    /**
     * Create a new redemption.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('redeem.partials.item-create.item-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|max:50',
            'item_description' => 'max:255',
            'required_points' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if an image is present in the request
        if ($request->hasFile('image')) {
            // Generate a unique filename for the image
            $imageName = time() . '_' . $request->image->getClientOriginalName();
    
            Commodity::create([
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'required_points' => $request->required_points,
                'quantity' => $request->quantity,
                'image' => $request->image->storeAs('images', $imageName, 'public'),
            ]);
        } else {
            // If no image is provided, create the Commodity without an image
            Commodity::create([
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'required_points' => $request->required_points,
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->route('redeem.index')
            ->with('success', 'Item created successfully.');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return \Illuminate\View\View
     */
    public function edit(Commodity $commodity): View
    {
        return view('redeem.partials.item-edit.item-edit', compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Commodity  $commodity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Commodity $commodity)
    {
        $request->validate([
            'item_name' => 'required | max:50',
            'item_description' => 'required | max:255',
            'required_points' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ]);
        $commodity->update($request->all());
        return redirect()->route('redeem.index')
            ->with('success', 'Item updated successfully');
    }
}