<h1> Create New Students </h1>

<form action="{{route('student.store')}}" method="post">


    <!-- Important for request and increption تشفير   -->
    @csrf
    <input type="text" name="fname" placeholder="Enter Your First Name " /><br><br>
    <input type="text" name="postion" placeholder="Enter Your Position " /><br><br>
    <input type="text" name="company" placeholder="Enter Your Company " /><br><br>

    <button type="submit"> Submit </button>

</form>
