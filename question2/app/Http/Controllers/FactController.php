<?php

namespace App\Http\Controllers;

use App\Services\FactServices;
use Illuminate\Http\Request;

class FactController extends Controller
{
    protected $factService;

    public function __construct(FactServices $factService) {
        $this->factService = $factService;
    }

    public function random(Request $request)
    {
        switch ($request->get('category', 'random')) {
            case 'random':
                return response()->json($this->factService->randomFact());
                break;

            case 'chuck_norris':
                return response()->json($this->factService->randomChuckNorris());
                break;

            case 'cat_facts':
                return response()->json($this->factService->randomCatFacts());
                break;

            default:
                return response()->json([
                    'error' => 'Invalid fact category'
                ]);
                break;
        }
    }

    public function categories()
    {
        return response()->json([
            'categories' => [
                'chuck_norris',
                'cat_facts'
            ]
        ]);
    }
}
