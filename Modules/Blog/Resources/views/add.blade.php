<form action='{{url("/blog/add")}}' method="POST">
{{ csrf_field() }}
    <div>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <textarea name="desc" cols="30" rows="10" placeholder="Description"></textarea>
    </div>
    <div>
        <input type="submit" value="submit">
    </div>
</form>
