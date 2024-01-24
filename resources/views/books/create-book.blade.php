
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Book</title>
    </head>
    <body>
        <div class="container">
            <h1>Add Book</h1>

            <form action="{{ route('books.store') }}" method="POST">
@csrf

<div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title">
</div>

<div class="form-group">
    <label for="publication_date">Publication Date:</label>
    <input type="date" class="form-control" id="publication_date" name="publication_date">
</div>

<div class="form-group">
    <label for="ISBN">ISBN:</label>
    <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="Enter ISBN">
</div>

<button type="submit" class="btn btn-primary">Add Book</button>
</form>
</div>
</body>
</html>
