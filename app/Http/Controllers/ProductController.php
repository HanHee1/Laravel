<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Exports\ProductsExport; // excel
use Maatwebsite\Excel\Facades\Excel; // excel

class ProductController extends Controller
{
    private $product;

    public function __construct(product $product)
    {
        // Laravel 의 IOC(Inversion of Control) 입니다.
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드 방식.
        $this->product = $product;
    }

    // 전체 조회
    public function index()
    {
        // products 의 데이터를 최신순으로 페이징을 해서 가져옵니다.
        $products = $this->product->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    // 검색
    public function search(Request $requset)
    {
        $products = $this->product
            ->where('name', $requset->search)
            ->orwhere('content', $requset->search)
            ->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    // 생성
    public function store(StoreProductRequest $request)
    {
        // Request 에 대한 유효성 검사 / 유효성에 걸린 에러는 errors 에 담깁니다.
        $validated = $request->validated();
        if($request->hasFile('picture')) {
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('public/images', $fileName);
            $validated['origin_name'] = $fileName;
            $validated['path'] = $path;
        }
        //$this->product->save();
        $this->product->create($validated);
        return redirect()->route('products.index');
    }

    // 상세 조회
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 수정
    public function update(StoreProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        if($request->hasFile('picture')) {
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('public/images', $fileName);
            $validated['origin_name'] = $fileName;
            $validated['path'] = $path;
        }
        $product->update($validated);
        return redirect()->route('products.index', $product);
    }

    // 삭제
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    // Laravel 엑셀 다운로드
    public function export()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }
}
