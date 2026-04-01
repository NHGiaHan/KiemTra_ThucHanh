<html>
<body>
    <h3>THÔNG TIN ĐƠN HÀNG</h3>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
        </tr>
        @foreach($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->tieu_de }}</td>
            <td>{{ session('cart')[$row->id] ?? 1 }}</td>
            <td>{{ number_format($row->gia_ban, 0, ",", ".") }}đ</td>
        </tr>
        @endforeach
    </table>
    <p>Trân trọng!</p>
</body>
</html>