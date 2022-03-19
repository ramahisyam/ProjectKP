<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class TypeaheadController extends Controller
{
    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Customer::where('name', 'LIKE', '%'. $query. '%')->get();
        return response()->json($filterResult);
    }
}
