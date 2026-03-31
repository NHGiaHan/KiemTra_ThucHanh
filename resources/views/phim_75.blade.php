<!DOCTYPE html>
<html>
<head>
    <title>Danh sách phim Canada</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>DANH SÁCH PHIM TẠI CANADA</h1>
    <table>
        <thead>
            <tr>
                <th>Tên bộ phim (movie_name)</th>
                <th>Ngày phát hành (release_date)</th>
                <th>Thời lượng (runtime)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->runtime }} phút</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>