<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deaf\Branch\BranchesResource;
use App\Http\Resources\Deaf\Branch\BranchDetailsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;
use App\Traits\FileManagement;
use Illuminate\Support\Str;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class BranchController extends Controller
{
    use FileManagement;

    public function branches(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foundation_id' => ['required', 'integer', 'exists:foundations,id'],
            'search' => ['nullable', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }

        $branches = Branch::where('foundation_id', $request->foundation_id)->with('translations');

        if ($request->filled('search')) {

            $branches->whereTranslationLike('name', '%' . $request->search . '%');
        }

        return response()->success(BranchesResource::collection($branches->get()), trans("api/deaf.successfull_operation"));

    }

    public function details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }

        $branch = Branch::where('id', $request->branch_id)->with('translations')->first();

        return response()->success(new BranchDetailsResource($branch), trans("api/deaf.successfull_operation"));

    }

}
