@extends('layout.admin')
@section('content')
<div class="container">
    <form action="{{url('products/store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنتج">
        </div>
        <div class="mb-3">
            <label for="quantityFormControlInput" class="form-label">كمية المنتج</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="الكمية">
        </div>
        <div class="mb-3">
            <label for="priceFormControlInput" class="form-label">سعر المنتج</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="سعر المنتج">
        </div>
        <div class="mb-3">
            <label for="descriptionFormControlTextarea" class="form-label">وصف المنتج</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="descriptionFormControlTextarea" class="form-label"> اختر الصنف</label>
            <select class="form-control" name="catogry" id="catogry">
                <option value="#"></option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>

        </div>
        <div class="mb-3">
          <input type="submit" value="احفظ" class="btn btn-info">
        </div>
    </form>

</div>

@endsection

