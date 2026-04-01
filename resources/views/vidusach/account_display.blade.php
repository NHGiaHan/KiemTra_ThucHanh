<x-account-panel>
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 600px; margin: 0 auto; background: #f8f9fa; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h3 class="text-center mb-4" style="color: #0066cc;">THÔNG TIN CÁ NHÂN</h3>
            <div style="width:200px; height:200px; border-radius:50%; overflow:hidden; margin:0 auto; border:2px solid #0066cc;">
                <img src="{{ asset('storage/profile/' . Auth::user()->photo) }}"
                    style="width:100%; height:100%; object-fit:cover;">
            </div>
<p><strong>Họ và tên:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Ngày tham gia:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
            <hr>
            <a href="{{ url('sach') }}" class="btn btn-primary btn-sm">Quay lại mua sắm</a>
            <a href="{{ route('account_edit') }}" class="btn btn-warning btn-sm text-white">Cập nhật thông tin</a>
        </div>
    </div>  
</x-account-panel>