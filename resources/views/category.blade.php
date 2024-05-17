
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{isset($data) ? url('cat_update/'. $data->id) : url('/category')}}" method="post">
        @csrf
        <table border="3px">
            <tr>
                <td>name</td>
                <td><input type="text" name="name" value="{{ isset($data) ? $data->name : '' }}"></td>
            </tr>
            <tr>
                <td>
                <span class="err">
                    @error('name')
                        {{$message}}
                    @enderror
                 </span>
                 </td>
            </tr>
              <tr>
                <td colspan="2" align="center"><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
