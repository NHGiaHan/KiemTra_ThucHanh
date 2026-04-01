<x-book-layout>
    <x-slot name="title">Trang chủ</x-slot>
    <div id="book-view-div">
    <div class="list-book">
        @foreach($data as $row)
            <div class="book">
                <a href="{{ url('sach/chitiet/'.$row->id) }}">
                    <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}" width="200px" height="200px">
                    <div class="mt-2">
                        <b>{{ $row->tieu_de }}</b><br>
                        <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
                    </div>
                    <div class="btn-add-product">
                    <button class="btn btn-success btn-sm mb-1 add-product" book_id="{{ $row->id }}">
                        Thêm vào giỏ hàng
                    </button>
                </div>
                </a>
                

<x-slot name="title">Trang chủ</x-slot>
<div class='list-book'>
    @foreach($data as $row)
        <div class='book'>
            <a href="{{url('sach/chitiet/'.$row->id)}}">
                <img src="{{asset('book_image/'.$row->file_anh_bia)}}" width='200px' height='200px'></a>
            <br>
            <b>{{$row->tieu_de}}</b><br/>
            <i>{{number_format($row->gia_ban, 0, ",", ".")}}đ</i>
        </div>
    @endforeach
<div id='book-view-div'>
    <div class='list-book'>
        @foreach($data as $row)
            <div class='book'>
                <a href="{{ url('sach/chitiet/'.$row->id) }}">
                    <img src="{{ asset('images/'.$row->file_anh_bia) }}" width='200px' height='200px'>
                    <br>
                    <b>{{ $row->tieu_de }}</b>
                    <br/>
                    <i>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</i>
                    <br>
                </a> 

                <div class='btn-add-product'>
                    <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{ $row->id }}">
                        Thêm vào giỏ hàng
                    </button> 
                </div>
            </div>
        @endforeach
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".add-product").click(function(){

                id = $(this).attr("book_id");
                num = 1;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{route('cartadd')}}",
                    data: {"_token": "{{ csrf_token() }}", "id":id, "num":num},
                    beforeSend: function(){

                    },
                    success: function(data){
                        $("#cart-number-product").html(data);
                    },
                    error: function(xhr, status, error){

                    },
                    complete: function(xhr, status){

                    }
                });
            });
        });
        $(document).ready(function() {
    $(".menu-the-loai").click(function(e) {
        e.preventDefault(); // Ngăn trang bị load lại nếu là thẻ <a>
        
        var the_loai = $(this).attr("the_loai");
        
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ route('bookview') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "the_loai": the_loai
            },
            beforeSend: function() {
                // Có thể thêm hiệu ứng loading ở đây nếu muốn
                $("#book-view-div").css('opacity', '0.5');
            },
            success: function(data) {
                $("#book-view-div").html(data);
                $("#book-view-div").css('opacity', '1');
            },
            error: function(xhr, status, error) {
                console.error("Lỗi: " + error);
            },
            complete: function(xhr, status) {
                // Hoàn tất xử lý
            }
        });
    });
});
    </script>
</x-book-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script>
        $(document).ready(function() {
            $(".menu-the-loai").click(function(e) {
                e.preventDefault(); 
                
                var the_loai = $(this).attr("the_loai");
                
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "{{ route('bookview') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "the_loai": the_loai
                    },
                    success: function(data) {
                        $("#book-view-div").html(data);
                    },
                    error: function(xhr, status, error) {
                        console.log("Lỗi: " + error);
                    }
                });
            });
        });
    </script>
</x-book-layout>
