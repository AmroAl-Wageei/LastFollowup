<h1> Show All Students </h1>

<table>

    <th>ID</th>
    <th>Full Name</th>
    <th>Position</th>
    <th>Company</th>
    <th>Action</th>


    @foreach($Student as $item )


    <tr>
        <td> {{$item->id}}</td>
        <td> {{$item->fname}}</td>
        <td> {{$item->postion}}</td>
        <td> {{$item->company}}</td>
        <td>
            {{-- UPDATE --}}
            <a href="{{route('student.edit', $item->id )}}" > Edit </a> <br>
            {{-- DELETE --}}
            <form action="{{route('student.destroy' , $item->id)}}" method="post">
                @csrf
                @method('Delete')
                <button type=submit> Delete </button>
            </form>
        </td>

    </tr>
    @endforeach



</table>


