<x-account-panel>
    @if ($errors->any())
        <div style='color:red; width:30%; margin:0 auto'>
            <div>{{ __('Whoops! Something went wrong.') }}</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success" style="width:30%; margin:0 auto; text-align:center;">
            {{ session('status') }}
        </div>
    @endif
    <form method="post" action="{{ route('saveinfo') }}" enctype="multipart/form-data" style="width: 35%; margin: 0 auto; background: #f8f9fa; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="text-align: center; font-weight: bold; color: #0066cc; font-size: 18px; margin-bottom: 25px;">
            CẬP NHẬT THÔNG TIN CÁ NHÂN
        </div>

        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{asset('storage/profile/'.$user->photo) }}" width="80px" height="80px" style="border-radius: 50%; border: 2px solid #0066cc; object-fit: cover;" class='mb-1'/>
        </div>

        <div class="form-group">
            <label for="name" class="font-weight-bold">Tên<span style="color: red;">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="font-weight-bold">Email<span style="color: red;">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone" class="font-weight-bold">Số điện thoại</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Ví dụ: 0901234567">
            @error('phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo" class="font-weight-bold">Ảnh đại diện</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                <label class="custom-file-label" for="photo">Chọn ảnh mới</label>
            </div>
            @error('photo')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <input type="hidden" value="{{ $user->id }}" name="id">
        
        @csrf

        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" class="btn btn-primary btn-sm" style="padding: 8px 25px;">
                <i class="fas fa-save"></i> Lưu thông tin
            </button>
            <button type="reset" class="btn btn-secondary btn-sm" style="padding: 8px 25px; margin-left: 10px;">
                <i class="fas fa-undo"></i> Nhập lại
            </button>
        </div>
    </form>
</x-account-panel>