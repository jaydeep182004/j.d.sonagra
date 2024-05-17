<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .err{
            color:red;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('update',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <table border="3px">
            <tr>
                <td>name</td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
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
                <td>email</td>
                <td><input type="email" name="email" value="{{$data->email}}"></td>
            </tr>
            <tr>
                <td>
                <span class="err">
                    @error('email')
                        {{$message}}
                    @enderror
                 </span>
                 </td>
            </tr>
            <tr>
                <td>state</td>
                <td>
                    <select name="state" id="">
                        <option value=""></option>
                        <option value="gujarat" {{$data->state=='gujarat' ? 'selected':''}}>gujarat</option>
                        <option value="goa" {{$data->state=='goa' ? 'selected':''}}>goa</option>
                        <option value="punjab" {{$data->state=='punjab' ? 'selected':''}}>punjab</option> 
                    </select>         
                </td>
            </tr>
            <tr>
                <td>
                <span class="err">
                    @error('state')
                        {{$message}}
                    @enderror
                 </span>
                 </td>
            </tr>
            <tr>
                <td>gender</td>
                <td><input type="radio" name="gender" value="male" {{$data->gender=='male' ? 'checked':''}}>male
                    <input type="radio" name="gender" value="female" {{$data->gender=='female' ? 'checked':''}}>female
                </td>
            </tr>
            <tr>
                <td>
                <span class="err">
                    @error('gender')
                        {{$message}}
                    @enderror
                 </span>
                 </td>
            </tr>
            <tr>
                <td>hobbies</td>
                <td>
                    <input type="checkbox" name="hobbies[]" value="player" {{in_array('player' ,explode(',' ,$data->hobbies)) ? 'checked':''}}>player
                    <input type="checkbox" name="hobbies[]" value="gamer" {{in_array('gamer' ,explode(',' ,$data->hobbies)) ? 'checked':''}}>gamer
                    <input type="checkbox" name="hobbies[]" value="singer" {{in_array('singer' ,explode(',' ,$data->hobbies)) ? 'checked':''}}>singer
                    <input type="checkbox" name="hobbies[]" value="dancer" {{in_array('dancer' ,explode(',' ,$data->hobbies)) ? 'checked':''}}>dancer
                    <input type="checkbox" name="hobbies[]" value="watcher" {{in_array('watcher' ,explode(',' ,$data->hobbies)) ? 'checked':''}}>watcher
                    <input type="checkbox" name="hobbies[]" value="reader" {{in_array('reader' ,explode(',' ,$data->hobbies)) ? 'checked':''}}>reader
                </td>
            </tr>
            <tr>
                <td>
                <span class="err">
                    @error('hobbies')
                        {{$message}}
                    @enderror
                 </span>
                 </td>
            </tr>
            <tr>
                <td>category</td>
                <td>
                    <select name="category" id="">
                    <option value=""></option>
                    @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $data->roll == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>image</td>
                <td><input type="file" name="image[]" multiple>
                <!-- <img src="/storage/image/{{$data->image}}" alt="Current Image" width="50px" height="50px"> -->
                </td>
            </tr>
            <tr>
                <td>
                <span class="err">
                    @error('image')
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
</body>
</html>