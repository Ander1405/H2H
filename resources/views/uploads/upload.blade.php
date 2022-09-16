<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>H2H</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="h-screen">
    <div class="bg-green-400 py-4">
        <h1 class="text-2xl ml-6">Host to Host</h1>
    </div>
    <div class="text-center font-semibold text-4xl mt-8">
        <h1>Cargar archivos</h1>
    </div>
    <div class="py-12 mx-10 my-12 bg-gray-300 rounded-md shadow shadow-gray-600">
        <form action="{{ route('uploads.file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-x-10 grid-cols-3 ml-20">
               <div>
                   <input type="text" name="name" placeholder="Nombre del archivo" required autocomplete="disabled" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               </div>
                <div class="">
                    <input type="file" name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
                </div>
                <div class="ml-32">
                    <button class="bg-indigo-500 rounded-md p-2 px-12">Subir</button>
                </div>
            </div>

        </form>
    </div>
    <div class="mt-8">
        <h1 class="text-center font-semibold text-4xl">
            Archivos cargados
        </h1>
    </div>
    <div class="md:px-32 py-8 w-full">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">Archivos</th>
                    <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">Tamaño</th>
                    <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">Tipo</th>
{{--                    <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">Acciones</th>--}}
                </tr>
            </thead>
            <tbody class="text-center">
                @if(isset($files))
                    @foreach($files as $file)
                    <tr>
                        <td class="w-1/3 text-center py-3 px-4">
                            <a href="{{ route('download', $file['name']) }}" target="_blank"> {{ $file['name'] }}</a>
                        </td>
                        <td class="w-1/3 text-center py-3 px-4">
                            {{ $file['size'] }}
                        </td>
                        <td class="w-1/3 text-center py-3 px-4">
                            {{ $file['type'] }}
                        </td>
{{--                        <td class="w-1/3 text-center py-3 px-4">--}}
{{--                            <form action="{{ route('delete', $file['name']) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit">--}}
{{--                                    <img--}}
{{--                                        src="https://cdn3.iconfinder.com/data/icons/basicolor-essentials/24/007_remove_trash-512.png"--}}
{{--                                        alt=""--}}
{{--                                        class="hover:bg-red-400 transition duration-300 w-10 h-10 mr-2 rounded-full">--}}
{{--                                </button>--}}

{{--                            </form>--}}
{{--                        </td>--}}
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
