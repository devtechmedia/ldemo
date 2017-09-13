<!DOCTYPE html>
<html>
    <head>
        <title>Book Index</title>
        <link href="/css/lib.css" rel="stylesheet">
    </head>
    <body>
        <h1>Welcome to Library</h1>
        <h2>Index of Books</h2>
        <table>

            <th>No</th><th>Book Title</th><th>ISBN</th><th>Author</th><th>Category</th><th>Action</th>
            <tbody>
                @foreach ($books as $i => $book)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $book{'title'} }}</td>
                    <td>{{ isset( $book{'isbn'} ) ?  $book{'isbn'} : ' - ' }}</td>
                    <td>{{ $book{'author'} }}</td>
                    <td>{{ $book{'category'} }}</td>
                    <td>Action
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <hr/>

        
    </body>
</html>