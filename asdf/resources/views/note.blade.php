<form method="post" action="/note/check">
    @csrf
    <input type="heading" name="heading" id="heading">
    <textarea type="text" name="text" id="text"></textarea>
    <button type="submit" class="btn btn-success">Send</button>
</form>
