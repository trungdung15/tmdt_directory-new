@extends('admin.layouts.main')
@section('subcontent')
 <div class="content">

                <h2 class="intro-y text-lg font-medium mt-10">
                   {{ $title }}
                </h2>
    <div class="form-group">
        <form action="{{ route('categorypost.store')}}" method="POST">
            @csrf
            <div class="form-heade">
            </div>
            <div class="grid grid-cols-12 gap-x-5">
            <div class="col-span-12 xl:col-span-6">
            <div class="form-group mb-4">
                <label>Tên danh mục</label>
                <input type="text" class=" form-control" name='name' id="typinginput" value="{{old('name')}}">
                @error('name') <span style="color: rgb(239 68 68);">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-4">
                <label>Tên danh mục(ngoại ngữ)</label>
                <input type="text" class=" form-control" name='name2' value="{{old('name2')}}">
            </div>
            <div class="form-group mb-4">
                <label>SLUG</label>
                <textarea type="text" class="form-control" rows="1" id="slugchanged" name='slug'>{{old('slug')}}</textarea>
                @error('slug') <span style="color: rgb(239 68 68);">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-4">
                <label>Danh mục cha</label>
                <select name="parent_id"  class="tom-select w-full">
                    <option value="0">Mặc định</option>
                    @foreach ($categorieslv as $val)
                    <option value="{{$val->id}}" class="form-control">
                        @php
                        $str ='';
                        for ($i=0; $i < $val->level; $i++) {
                            echo $str;
                            $str.='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                            // code...
                        }
                        @endphp
                        {{$val->name}}
                    </option>
                    @endforeach

            </select>
            </div>
            <div class="form-group mb-4">
                <label>Trạng thái</label> <br>
                 <input type="checkbox" name='status' checked="checked" class="form-check-switch">
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default" href="{{ route('categorypost.index')}}">Hủy</a>
                <input type="submit" class="btn btn-primary " value="Thêm mới">
                </div>
            </div>
            <div class="col-span-12 xl:col-span-6">
            {{-- <div class="form-group mb-4">
                <label>Người dùng</label>
                <input type="number" class="form-control" name='user_id' value="{{old('user_id') ?? $user_id }}">
            </div> --}}

            </div>
        </div>

    </form>
</div>
</div>
@endsection
