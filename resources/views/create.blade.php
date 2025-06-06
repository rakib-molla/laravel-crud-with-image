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
        <h1 class="text-xl">Create New Post</h1>
        <a class="p-2 px-3 text-white bg-green-500 rounded" href="/">Back to Home</a>
      </div>
      <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="flex flex-col gap-1">
            <label for="name">Name</label>
            <input type="text" name="name" class="border w-full" value="{{old('name')}}">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
         </div>
         <div class="flex flex-col gap-1">
            <label for="Description">Description</label>
            <textarea class="border w-full" name="description" id="description">{{old('description')}}</textarea>
            @error('description')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
         </div>
         <div class="flex flex-col gap-1">
            <label for="image">Image</label>
            <input type="file" name="image" class="border w-50">
            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
         </div>
         <input type="submit" value="submit" class="bg-green-500 px-3 py-2 rounded my-2 text-white cursor-pointer">
      </form>
    </div>
</body>
</html>