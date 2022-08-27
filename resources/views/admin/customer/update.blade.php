@extends('admin.layouts.main')
@section('css')
    <link rel="stylesheet" href="/css/user.css">
@endsection
@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto uppercase">
            Thông tin tài khoản
        </h2>
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent"
                role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Chỉnh sửa thông
                        tin</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="password-tab" data-tabs-target="#password" type="button" role="tab"
                        aria-controls="password"
                        aria-selected="{{ $errors->has('password') || $errors->has('password_confirmation') || session('passSuccess') ? 'true' : 'false' }}">Thay
                        đổi mật khẩu</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6" id="myTabContent">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="" class="rounded-full"
                            src="@php
                            if (!empty($customer->avatar)) {
                                echo '/upload/images/user/' . $customer->avatar;
                            } else {
                                echo '/upload/images/common_img/avt-user.png';
                            }
                        @endphp">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ $customer->name }}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                        <div class="truncate sm:whitespace-normal flex items-center"><i
                                class="fa-solid fa-envelope mr-2"></i> <strong class="mr-2">Email:</strong>
                            <p class="lg:w-2/5 xl:w-52" style="word-wrap: break-word;">{{ $customer->email }}</p>
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i
                                class="fa-solid fa-phone mr-2"></i></i><strong class="mr-2">Số điện
                                thoại:</strong> {{ $customer->phone_number }} </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i
                                class="fa-solid fa-house mr-2"></i></i><strong class="mr-2">Địa chỉ:</strong>
                            {{ $customer->address }}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i
                                class="fa-solid fa-cake-candles mr-2"></i><strong class="mr-2">Ngày sinh:</strong>
                            {{ date('d-m-Y', strtotime($customer->birthday)) }}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i
                                class="fa-solid fa-venus-mars mr-2"></i></i><strong class="mr-2">Giới
                                tính:</strong>
                            {{ $customer->gender }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9 {{ $errors->has('password') || $errors->has('password_confirmation') || session('passSuccess') ? '' : 'hidden' }}"
            id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Thay đổi mật khẩu
                    </h2>
                </div>
                <div class="p-5">
                    <form action="{{ route('customer.updatePassword', $customer->id) }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="change-password-form-1" class="form-label">Mật khẩu mới:</label>
                            <div class="group-input-pw">
                                <input id="change-password-form-1" name="password" type="password"
                                    class="form-control @error('password') border-2 border-red-500 @enderror"
                                    placeholder="Nhập mật khẩu mới" value="{{ old('password') }}" required>
                                <span class="show-btn pw_old" onclick="myFunction()"><i class="fas fa-eye"></i></span>
                            </div>
                            @error('password')
                                <span role="alert">
                                    <p class="italic mt-2 text-red-400">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="change-password-form-2" class="form-label">Nhập lại mật khẩu:</label>
                            <div class="group-input-pw">
                                <input id="change-password-form-2" name="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') border-2 border-red-500 @enderror"
                                    placeholder="Nhập lại mật khẩu mới" value="{{ old('password_confirmation') }}"
                                    required>
                                <span class="show-btn pw_new" onclick="myFunction()"><i class="fas fa-eye"></i></span>
                            </div>
                            @error('password_confirmation')
                                <span role="alert">
                                    <p class="italic mt-2 text-red-400">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" name="btn_update" value="update" class="btn btn-primary mt-4">Lưu thay
                            đổi</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9 {{ $errors->has('password') || $errors->has('password_confirmation') || session('passSuccess') ? 'hidden' : '' }}"
        id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Cập nhật thông tin
                </h2>
            </div>
            <div class="p-5">
                <form action="{{ route('customer.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col-reverse xl:flex-row flex-col">
                        <div class="flex-1 mt-6 xl:mt-0">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 2xl:col-span-6">
                                    <div>
                                        <label for="update-profile-form-1" class="form-label">Họ tên:</label>
                                        <input id="update-profile-form-1" name="name" type="text"
                                            class="form-control mb-3 @error('name') border-2 border-red-500 @enderror"
                                            value="@php
                                                        if (!empty(old('name'))) {
                                                            echo old('name');
                                                        } else {
                                                            echo $customer->name;
                                                        }
                                                    @endphp"
                                            required>
                                        @error('name')
                                            <p class="block mb-2 mt-2 italic text-red-400"><i
                                                    class="fa-solid fa-triangle-exclamation mr-2"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="update-profile-form-2" class="form-label">Email:</label>
                                        <input id="update-profile-form-2" name="email" type="email"
                                            class="form-control mb-3" value="{{ $customer->email }}" disabled>

                                    </div>
                                    <div>
                                        <label for="update-profile-form-3" class="form-label">Số điện
                                            thoại:</label>
                                        <input id="update-profile-form-3" name="phone_number" type="text"
                                            class="form-control @error('phone_number') border-2 border-red-500 @enderror"
                                            value="@php
                                                        if (!empty(old('phone_number'))) {
                                                            echo old('phone_number');
                                                        } else {
                                                            echo $customer->phone_number;
                                                        }
                                                    @endphp">
                                        @error('phone_number')
                                            <p class="block mb-2 mt-2 italic text-red-400"><i
                                                    class="fa-solid fa-triangle-exclamation mr-2"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">Địa chỉ:</label>
                                        <input type="text" name="address" id="update-profile-form-4"
                                            class="form-control"
                                            value="@php
                                                        if (!empty(old('address'))) {
                                                            echo old('address');
                                                        } else {
                                                            echo $customer->address;
                                                        }
                                                    @endphp">
                                        @error('address')
                                            <p class="block mb-2 mt-2 italic text-red-400"><i
                                                    class="fa-solid fa-triangle-exclamation mr-2"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="mt-3">
                                        <label for="update-profile-form-4" class="form-label">Ngày sinh:</label>
                                        <input type="date" name="birthday" class="form-control w-56 block mx-auto"
                                            id="update-profile-form-4"
                                            value="@php
                                                        if (!empty(old('birthday'))) {
                                                            echo old('birthday');
                                                        } else {
                                                            echo $customer->birthday;
                                                        }
                                                    @endphp">
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <label>Giới tính:</label>
                                    <div class="mt-2">
                                        <select class="tom-select w-full" name="gender">
                                            <option value="">Chọn giới tính</option>
                                            <option value="Nam" @if ($customer->gender == 'Nam') selected @endif>
                                                Nam
                                            </option>
                                            <option value="Nữ" @if ($customer->gender == 'Nữ') selected @endif>Nữ
                                            </option>
                                            <option value="Gới tính khác"
                                                @if ($customer->gender == 'Gới tính khác') selected @endif>Giới tính khác
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $customer->id }}" name="user_id">
                            <button type="submit" value="btn_update" name="btn_update"
                                class="btn btn-primary w-30 mt-3">Cập nhật</button>
                        </div>
                        <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                            <div
                                class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" id="upload-image" alt=""
                                        src="@php
                                                    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
                                                        echo '/upload/user/' . $_FILES['avatar']['name'];
                                                    } else {
                                                        if (!empty($customer->avatar)) {
                                                            echo '/upload/images/user/' . $customer->avatar;
                                                        } else {
                                                            echo '/upload/images/common_img/avt-user.png';
                                                        }
                                                    }
                                                @endphp">
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <label for="avatar" class="btn btn-primary w-full cursor-pointer">Thay đổi ảnh
                                        đại
                                        diện</label>
                                    <input type="file" name="avatar" id="avatar"
                                        class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                        onchange="show_upload_image()">
                                </div>
                                @error('avatar')
                                    <p class="block mb-2 mt-2 italic text-red-400"><i
                                            class="fa-solid fa-triangle-exclamation mr-2"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/js/user.js"></script>
<script src="/lib/flowbite.js"></script>
@endsection
