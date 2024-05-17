<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .del{
            justify-content:center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <br><br>
    <table align="center" border="10px">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td><a href="{{route('catedit', ['id'=> $value->id])}}">edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>