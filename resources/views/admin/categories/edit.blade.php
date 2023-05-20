@extends('layout.admin')
@section('content')
<div class="container">
    <form action="{{url('categories/update'.$category->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="nameFormControlInput" class="form-label">اسم الصنف</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" placeholder="اسم الصنف">
        </div>

        <div class="mb-3">
          <input type="submit" value="احفظ" class="btn btn-info">
        </div>
    </form>

</div>

@endsection

