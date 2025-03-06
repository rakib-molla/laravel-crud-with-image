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
        .btn{
          @apply p-1 bg-green-400;
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
      @if (session('success'))
          <h5 class="text-green-500">{{ session('success') }}</h5>
      @endif

      <section>
      <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Description</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Image</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
            </tr>
          </thead>
          <tbody>
            
          @foreach($posts as $post)
          <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{$post->id}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$post->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{$post->description}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><img class="h-10 w-10 rounded-full" src="images/{{$post->image}}" alt=""></td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium ">
                <a href="{{ route('edit', $post->id) }}" class="btn">Edit</a>
                <a href="{{ route('delete', $post->id) }}" class="btn">Delete</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{$posts->links()}}

      </div>
    </div>
  </div>
</div>
      </section>
    </div>
</body>
</html>