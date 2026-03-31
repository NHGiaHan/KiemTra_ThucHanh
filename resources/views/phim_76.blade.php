<!DOCTYPE html>
<html>
<head>
    <title>Danh sách phim hành động</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>DANH SÁCH PHIM HÀNH ĐỘNG</h1>
    <table>
        <thead>
            <tr>
                <th>Tên bộ phim (movie_name)</th>
                <th>Ngày phát hành (release_date)</th>
                <th>Mô tả (overview)</th>
                <th>Ảnh đại diện (image_link)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->release_date }}</td>
                <td style="font-size: 13px;">{{ $movie->overview }}</td>
                <td style="text-align: center;">
                    <img src="{{ $movie->image_link }}" alt="Poster" width="100">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>