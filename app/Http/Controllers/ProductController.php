<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('products.create');
    }

    // 생성
    public function store(Request $request)
    {
        // Request 에 대한 유효성 검사입니다.
        // 유효성에 걸린 에러는 errors 에 담깁니다.
        $request = $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        $this->product->create($request);
        return redirect()->route('products.index');
    }

    // 상세 조회
    public function show(Product $product)
    {
        // show 에 경우는 해당 페이지의 모델 값이 파라미터로 넘어옵니다.
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 수정
    public function update(Request $request, Product $product)
    {
        $request = $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        $product->update($request);
        return redirect()->route('products.index', $product);
    }

    // 삭제
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
