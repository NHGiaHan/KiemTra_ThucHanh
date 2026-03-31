<!DOCTYPE html>
<html>
<head>
    <title>Danh sách thể loại phim</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>DANH SÁCH THỂ LOẠI PHIM</h1>
    <table>
        <thead>
            <tr>
                <th>Tên thể loại tiếng Anh (genre_name)</th>
                <th>Tên thể loại tiếng Việt (genre_name_vn)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->genre_name }}</td>
                <td>{{ $genre->genre_name_vn }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>