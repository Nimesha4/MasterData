@php use Illuminate\Support\Str; @endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Categories Export PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #FF8C00; color: #fff; }
        tr:nth-child(even) { background: #f8fafc; }
    </style>
</head>
<body>
    <h2>Categories Export</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->code }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
