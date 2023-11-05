{{-- layout 으로 --}}
@extends('products.layout')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <h2 class="mt-4 mb-3">
        <a href="{{route('products.index')}}">Product List</a>
    </h2>

    @guest()
        <a href="{{route("register.index")}}">
            <button type="button" class="btn btn-dark prd-button">회원가입</button>
        </a>
        <a href="{{route("login.index")}}">
            <button type="button" class="btn btn-dark prd-button">로그인</button>
        </a>
    @endguest

    @auth()
        <p>아이디: {{auth()->user()->userid}}</p>
        <form action="{{route('login.logout')}}" method="post" class="inline-block">
            @csrf
            <button class="btn btn-dark prd-button" type="submit">로그아웃</button>
        </form>
        <a href="{{route("products.create")}}">
            <button type="button" class="btn btn-dark prd-button">게시글 작성</button>
        </a>
        <a href="{{route("products.export")}}">
            <button type="button" class="btn btn-dark prd-button">엑셀 다운로드</button>
        </a>
    @endauth

    <form action="{{route('products.search')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="search" class="search-label">검색</label>
            <input type="text" name="search" class="index-search" id="search">
            <button type="submit">검색</button>
        </div>
    </form>

    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="55%"/>
            <col width="15%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {{-- Product Controller의 index에서 넘긴 $products(product 데이터 리스트)를 출력. --}}
        @foreach ($products as $key => $product)
            <tr>
                <th scope="row">{{$key+1 + (($products->currentPage()-1) * 10)}}</th>
                <td><a href="{{route("products.show", $product->id)}}">{{$product->name}}</a></td>
                <td>{{$product->created_at}}</td>
                <td>
                    <input type="button" value="Edit" onclick="location.href='{{route("products.edit", $product)}}'"/>

                    <form action="{{route('products.destroy', $product->id)}}" method="post" style="display:inline-block;">
                        {{-- delete method와 csrf 처리 --}}
                        @method('delete')
                        @csrf
                        <input onclick="return confirm('정말로 삭제하겠습니까?')" type="submit" value="delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- 라라벨 기본 지원 페이지네이션 --}}
    {!! $products->links() !!}
@endsection
