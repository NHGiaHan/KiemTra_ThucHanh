<!DOCTYPE html>
<html>
<head>
    <title>Top 10 phim điểm cao nhất</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>TOP 10 PHIM ĐIỂM CAO NHẤT</h1>
    <table>
        <thead>
            <tr>
                <th>Tên bộ phim (movie_name)</th>
                <th>Ngày phát hành (release_date)</th>
                <th>Điểm bình chọn trung bình (vote_average)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->movie_name }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->vote_average }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>