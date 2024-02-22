<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Commodity;
use App\Models\Member;
use App\Models\MemberPoints;
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

    public function edit(Request $request, $item_id): View
    {
        $item = Commodity::find($item_id);
        return view('redeem.partials.item-edit.edit-item-form', compact('item'));
    }

    public function update(Request $request, $item_id)
    {
        $request->validate([
            'item_name' => 'required|max:50',
            'item_description' => 'required|max:255',
            'required_points' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $item = Commodity::find($item_id);
            $item->update([
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'required_points' => $request->required_points,
                'quantity' => $request->quantity,
                'image' => $request->image->storeAs('images', $imageName, 'public'),
            ]);
        }else{
            $item = Commodity::find($item_id);
            $item->update([
                'item_name' => $request->item_name,
                'item_description' => $request->item_description,
                'required_points' => $request->required_points,
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->route('redeem.index')->with('success', 'Item updated successfully');
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
     * Delete a redeemed item.
     *
     * @param  int  $item_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($item_id)
    {
        $item = Commodity::find($item_id);
        if ($item) {
            $item->delete();
            return redirect()->route('redeem.index')->with('success', 'Item deleted successfully');
        } else {
            return redirect()->route('redeem.index')->with('error', 'Item not found');
        }
    }

    public function redeemItem(Request $request)
    {
        $request->validate([
            'member_rfid' => 'required|string',
            'item_id' => 'required|numeric',
        ]);
        $member = Member::where('rfid', $request->member_rfid)->first();
        $item = Commodity::find($request->item_id);
        if ($member && $item) {
            $memberPoints = MemberPoints::where('member_id', $member->id)->first();
            if ($memberPoints->points >= $item->required_points) {
                $memberPoints->update([
                    'points' => $memberPoints->points - $item->required_points,
                ]);
                return response()->with('success', 'Item redeemed successfully');
            } else {
                return response()->withCookie('error', 'Insufficient points');
            }
        } else {
            return response()->with('error', 'Member or item not found');
        }
    }
}