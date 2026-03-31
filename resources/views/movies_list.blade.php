<!DOCTYPE html>
<html>
<head>
    <title>Danh sách phim</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <table>
        <thead>
            <tr>
                <th>Tên phim (movie_name)</th>
                <th>Ngày phát hành (release_date)</th>
                <th>Doanh thu (budget)</th>
                <th>Thời lượng (runtime)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>${{ number_format($movie->budget) }}</td>
                <td>{{ $movie->runtime }} phút</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>