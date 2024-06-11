<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\ProductOlahan;
use App\Models\ProductNonOlahan;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://127.0.0.1:8001/api/']);
    }
    public function index()
    {
        $response = $this->client->get('products')->getBody()->getContents();
        $resp = json_decode($response, true);
        $productOlahans = $resp['olahan'];
        $productNonOlahans = $resp['non_olahan'];
        return view('products', compact('productOlahans', 'productNonOlahans'));
    }

    public function create()
    {
        return view('create_product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->type == 'non_olahan') {
            $request->validate([
                'stock' => 'required|integer',
                'weight' => 'required|numeric',
            ]);
        }

        $imagePath = $request->file('image')->store('images', 'public');
        $data = $request->all();
        $data['image'] = $imagePath;

        $response = $this->client->post('products', [
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => fopen(storage_path('app/public/' . $imagePath), 'r')
                ],
                ['name' => 'name', 'contents' => $data['name']],
                ['name' => 'price', 'contents' => $data['price']],
                ['name' => 'category', 'contents' => $data['category']],
                ['name' => 'description', 'contents' => $data['description']],
                ['name' => 'type', 'contents' => $request->type],
                ['name' => 'stock', 'contents' => $data['stock'] ?? null],
                ['name' => 'weight', 'contents' => $data['weight'] ?? null],
            ]
        ])->getBody()->getContents();

        return redirect()->route('products.index');
    }
    public function edit($id, $type)
    {
        $response = $this->client->get("products/{$type}/{$id}")->getBody()->getContents();
        $product = json_decode($response, true);

        return view('edit_product', compact('product', 'type'));
    }

    public function update(Request $request, $id, $type)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($type == 'non_olahan') {
            $request->validate([
                'stock' => 'required|integer',
                'weight' => 'required|numeric',
            ]);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'image']);
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
            $multipart[] = [
                'name' => 'image',
                'contents' => fopen(storage_path('app/public/' . $imagePath), 'r')
            ];
        }

        $multipart = [
            ['name' => 'name', 'contents' => $data['name']],
            ['name' => 'price', 'contents' => $data['price']],
            ['name' => 'category', 'contents' => $data['category']],
            ['name' => 'description', 'contents' => $data['description']],
            ['name' => 'type', 'contents' => $type],
            ['name' => 'stock', 'contents' => $data['stock'] ?? null],
            ['name' => 'weight', 'contents' => $data['weight'] ?? null],
        ];

        $this->client->put("products/{$type}/{$id}", ['multipart' => $multipart]);

        return redirect()->route('products.index');
    }

    public function destroy($id, $type)
    {
        if ($type == 'olahan') {
            $product = ProductOlahan::findOrFail($id);
        } else { 
            $product = ProductNonOlahan::findOrFail($id);
        }

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}

