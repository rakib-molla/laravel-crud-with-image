<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel Crud</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @layer utilities {
        .container{
            @apply px-10 mx-auto;
        }
      }
    </style>
</head>
<body>
    <div class="container">
      <div class="flex items-center justify-between my-2">
        <h1>Home</h1>
        <a class="p-2 px-3 text-white bg-green-500" href="/create">Add Post</a>
      </div>
    </div>
</body>
</html>