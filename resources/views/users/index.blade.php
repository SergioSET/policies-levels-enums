@php use App\Enums\UserLevel; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="navbar navbar-light float-right">
                        <form class="form-inline">

                            <select name="buscarpor" id="">
                                <option value="">Todos</option>
                                @foreach (UserLevel::cases() as $item)
                                    <option value="{{ $item }}"
                                        {{ old('buscarpor') == $item ? 'selected' : '' }}>
                                        {{ $item->label() }}
                                    </option>
                                @endforeach
                            </select>

                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full table-auto">
                    <thead class="font-bold bg-gray-50 border-b-2">
                        <tr>
                            <td class="p-4">{{ __('ID') }}</td>
                            <td class="p-4">{{ __('Name') }}</td>
                            <td class="p-4">{{ __('Email') }}</td>
                            <td class="p-4">{{ __('Level') }}</td>
                            <td class="p-4">{{ __('Actions') }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border">
                                <td class="p-4">{{ $user->id }}</td>
                                <td class="p-4">{{ $user->name }}</td>
                                <td class="p-4">{{ $user->email }}</td>
                                <td class="p-4">
                                    <span @class([
                                        'px-2 py-1 font-semibold text-sm rounded-lg',
                                        'text-indigo-700 bg-indigo-100' => UserLevel::Member === $user->level,
                                        'text-sky-700 bg-sky-100' => UserLevel::Contributor === $user->level,
                                        'text-teal-700 bg-teal-100' => UserLevel::Administrator === $user->level,
                                    ])>
                                        {{ __($user->level->label()) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @can('updateLevel', $user)
                                        <a href="{{ route('userlevels.edit', $user) }}"
                                            class="px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">Edit</a>
                                    @endcan
                                    @can('delete', $user)
                                        <form class="inline-block" method="post"
                                            action="{{ route('users.destroy', $user) }}">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>Delete</x-danger-button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
