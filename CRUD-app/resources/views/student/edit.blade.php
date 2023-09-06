<h1> Update  Students </h1>

<form action="{{route('student.update' , $Student->id )}}" method="post">


    @csrf
    @method('PUT')

    <input type="text" name="fname" value={{$Student->fname}} /><br><br>
    <input type="text" name="postion" value={{$Student->postion}} /><br><br>
    <input type="text" name="company" value={{$Student->company}} /><br><br>

    <button type="submit"> Update </button>

</form>
