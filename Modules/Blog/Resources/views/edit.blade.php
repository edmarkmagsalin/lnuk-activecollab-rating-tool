
<form action='{{url("/blog/update/$blogpost->id")}}' method="POST">
{{ csrf_field() }}
    <div>
        <input type="text" name="title" placeholder="Title" value="{{$blogpost->title}}">
    </div>
    <div>
        <textarea name="desc" cols="30" rows="10" placeholder="Description">{{$blogpost->desc}}</textarea>
    </div>
    <div>
        <input type="submit" value="submit">
    </div>
</form>

