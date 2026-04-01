<x-book-layout>
    <x-slot name="title">Trang chủ</x-slot>

    <div id="book-view-div">
        <div class="list-book">
            @foreach($data as $row)
            <div class="book">
                <a href="{{ url('sach/chitiet/'.$row->id) }}">
                    <img src="{{ asset('book_image/'.$row->file_anh_bia) }}" width="200px" height="200px">
                    <div class="mt-2">
                        <b>{{ $row->tieu_de }}</b><br>
                        <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
                    </div>
                </a>
                <div class="btn-add-product">
                    <button class="btn btn-success btn-sm mb-1 add-product" book_id="{{ $row->id }}">
                        Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Xử lý thêm vào giỏ hàng 
            $(document).on('click', ".add-product", function() {
                var id = $(this).attr("book_id");
                $.ajax({
                    type: "POST",
                    url: "{{route('cartadd')}}",
                    data: {"_token": "{{ csrf_token() }}", "id": id, "num": 1},
                    success: function(data) {
                        $("#cart-number-product").html(data);
                    }
                });
            });

            $(".menu-the-loai").click(function(e) {
                e.preventDefault();
                var the_loai = $(this).attr("the_loai");
                $.ajax({
                    type: "POST",
                    url: "{{ route('bookview') }}",
                    data: {"_token": "{{ csrf_token() }}", "the_loai": the_loai},
                    success: function(data) {
                        $("#book-view-div").html(data);
                    }
                });
            });
        });
    </script>
</x-book-layout>