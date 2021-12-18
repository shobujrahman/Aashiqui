<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\UserBlock;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function blockUser(Request $request)
    {
        UserBlock::create([
            'blockerId' => auth()->id(),
            'blockedId' => $request->user_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User blocked successfully.',
        ]);
    }

    public function unblockUser(Request $request)
    {
        UserBlock::where('blockerId', auth()->id())
            ->where('blockedId', $request->user_id)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'User unblocked successfully.',
        ]);
    }


    public function blockList()
    {
   
        $blocks = UserBlock::where('blockerId', auth()->id())
            ->get();
        return response()->json([
            'success' => true,
            'blocks' => $blocks,
        ]);
    }
}
