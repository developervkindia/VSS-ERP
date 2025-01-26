<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 p-4">
            <div class="mb-8">
               <h2 class="text-2xl font-bold text-center">ERP System</h2>
            </div>
            <nav>
                <a href="{{ route('dashboard.admin') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Admin Dashboard</a>
                <a href="{{ route('dashboard.hr') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">HR Dashboard</a>
                <a href="{{ route('dashboard.manager') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Manager Dashboard</a>
                <a href="{{ route('dashboard.employee') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Employee Dashboard</a>
                {{-- <a href="{{ route('home') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Back to app</a> --}}
            </nav>

        </aside>
          <main class="flex-1 p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
