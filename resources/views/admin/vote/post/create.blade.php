@extends('admin.layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/vote-form.css') }}" />
@endsection
@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{$title}}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            @can('viewPost',\App\Models\Vote::class)
                <a class="btn btn-primary shadow-md mr-2" href="{{route('vote.indexPost')}}">Danh sách đánh giá</a>
            @endcan
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('vote.storePost')}}" method="post" id="form-post">
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Bài viết</label>
                        <select name="post" class="tom-select w-full change-post" id="crud-form-2">
                            <option value="0">--Chọn bài viết</option>
                            @foreach($arrPost as $index => $item)
                                <option value="{{$index}}"
                                    {{ (old('post') == $index) ? 'selected': false }}
                                >{{$item}}</option>
                            @endforeach
                        </select>
                        @error('post')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Reply</label>
                        <select name="parent_id" data-placeholder="Chọn bình luận reply" class="form-select appearance-none block w-full select-reply" id="crud-form-2">
                            <option value="0">--Chọn bình luận--</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Người đánh giá(<span class="text-red-600">*</span>)</label>
                        <input id="crud-form-2" type="text" name="name_user" value="{{old('name_user')}}" class="form-control w-full" placeholder="Nhập họ tên">
                        @error('name_user')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <div class="col-span-12 xl:col-span-6">
                            <label for="crud-form-2" class="form-label">Đánh giá</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2 rating-selection">

                                    <input id="radio-switch-5" class="form-check-input rating-input" type="radio" name="level"
                                           value="5" {{(old('level') == 5) ? 'checked' : false}}>
                                    <label class="form-check-label rating-star" for="radio-switch-5"></label>

                                    <input id="radio-switch-4" class="form-check-input rating-input" type="radio" name="level"
                                           value="4" {{(old('level') == 4) ? 'checked' : false}}>
                                    <label class="form-check-label rating-star" for="radio-switch-4"></label>

                                    <input id="radio-switch-3" class="form-check-input rating-input" type="radio" name="level"
                                           value="3" {{(old('level') == 3) ? 'checked' : false}}>
                                    <label class="form-check-label rating-star" for="radio-switch-3"></label>

                                    <input id="radio-switch-2" class="form-check-input rating-input" type="radio" name="level"
                                           value="2" {{(old('level') == 2) ? 'checked' : false}}>
                                    <label class="form-check-label rating-star" for="radio-switch-2"></label>

                                    <input id="radio-switch-1" class="form-check-input rating-input" type="radio" name="level"
                                           value="1" {{(old('level') == 1) ? 'checked' : false}}>
                                    <label class="form-check-label rating-star" for="radio-switch-1"></label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Bình luận(<span class="text-red-600">*</span>)</label>
                        <div class="mt-2">
                            <textarea class="form-control" rows="3" name="comment"
                                      placeholder="Nhập bình luận">{{old('comment')}}</textarea>
                            @error('comment')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        @can('viewPost',\App\Models\Vote::class)
                            <a type="button" href="{{route('vote.indexPost')}}"
                               class="btn btn-outline-secondary w-24 mr-1">Hủy</a>
                        @endcan
                        <button type="submit" class="btn btn-primary w-24">Lưu</button>
                    </div>
                    @csrf
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $(document).on('change','.change-post',function (e) {
                e.preventDefault();
                var id = $(this).val();
                var _token = $('meta[name="csrf-token"]').attr('content');
                var data = {
                    id: id,
                    _token: _token
                };
                $.ajax({
                    url: "{{ route('vote.selectReply') }}",
                    method: "GET",
                    data: data,
                    dataType: "json",
                    beforeSend: function(){
                        $('.select-reply').html('');
                    },
                    success: function(data) {
                        console.log(data);
                        var option = '<option value="0">--Chọn bình luận--</option>';
                        $.each(data,function (index, value) {
                            option += '<option value="'+value.id+'">'+value.comment+'</option>'
                        })
                        $('.select-reply').append(option);
                    },

                });
            })
        });
    </script>
@endsection
