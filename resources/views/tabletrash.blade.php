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
                <th>email</th>
                <th>state</th>
                <th>gender</th>
                <th>hobbies</th>
                <th>roll</th>
                <th>image</th>
                <th colspan="2">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->state }}</td>
                <td>{{ $value->gender }}</td>
                <td>{{ $value->hobbies }}</td>
                <td>{{ $value->rolldata}} </td>
                <td>
                    @if($value->image)
                        @foreach(json_decode($value->image) as $image)
                            <img src="{{ asset('storage/image/' . $image) }}" width="50px" height="50px">
                            <a href="delete_image/{{$value->id}}/{{$image}}"><button class="del">delete</button></a><br>
                        @endforeach
                    @endif
                </td>
                <td><a href="edit/{{$value->id}}"><button>restore</button></a></td>
                <td><a href="delete/{{$value->id}}"><button>delete</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>