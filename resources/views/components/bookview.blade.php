<div class='list-book'>
    @foreach($data as $row)
        <div class='book'>
            <a href="{{ url('sach/chitiet/'.$row->id) }}">
                <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}" width='200' height='200'>
                <br>
                <b>{{ $row->tieu_de }}</b><br>
                <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
            </a>
            <div class='btn-add-product'>
                <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{ $row->id }}">
                    Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    @endforeach
</div>