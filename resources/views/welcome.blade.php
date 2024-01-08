<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Laravel</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
        rel="stylesheet"
    />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">

        <div class="mb-4 flex items-center gap-4">
            <!-- Sorting Form -->
            <form
                action="{{ route('welcome') }}"
                method="get"
                class="mb-4"
            >
                <div>
                    <label
                        for="price_sort"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Sort by Price:
                    </label>
                    <select
                        id="price_sort"
                        name="price_sort"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        onchange="this.form.submit()"
                    >
                        <option value="">Select</option>
                        <option
                            value="asc"
                            @selected($price_sort == 'asc')
                        >
                            Ascending
                        </option>
                        <option
                            value="desc"
                            @selected($price_sort == 'desc')
                        >
                            Descending
                        </option>
                    </select>
                </div>
            </form>

            <!-- Sorting button -->
            <button
                id="sortColorBtn"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Sort by Color
            </button>
        </div>

        <!-- Table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table
                            class="min-w-full divide-y divide-gray-200"
                            id="carsTable"
                        >
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Car Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Price
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Discount
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Hand
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Availability
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Color
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cars as $car)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car['car_name'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car['price'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car['discount'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car['hand'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car['availability'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $car['color'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('sortColorBtn').addEventListener('click', sortTableByColor);
    });

    var colorSortAscending = true;
    const colorsColumnIndex = 5;

    function sortTableByColor() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById('carsTable');
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[colorsColumnIndex];
                y = rows[i + 1].getElementsByTagName("TD")[colorsColumnIndex];

                // Check if the rows should switch place based on ascending or descending order
                if (colorSortAscending ? (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) : (x.innerHTML
                        .toLowerCase() < y.innerHTML.toLowerCase())) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        colorSortAscending = !colorSortAscending;
    }
</script>


</html>
