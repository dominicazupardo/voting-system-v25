<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white flex flex-col p-6">
            <a href="{{ route('home.index') }}" class="mb-8">
                <h3 class="text-2xl font-bold">Homepage</h3>
            </a>
            <p class="mb-6"><strong>Student:</strong> Student 1</p>
            <a href="ballot.html" class="hover:underline">Vote Again</a>
        </div>

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">Election Results</h1>
            <div class="overflow-hidden bg-blue-900 rounded-lg shadow-lg">
                <table class="w-full border-collapse">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">Position</th>
                            <th class="px-6 py-4 text-left">Candidate</th>
                            <th class="px-6 py-4 text-left">Votes</th>
                        </tr>
                    </thead>
                    <tbody id="results-body">
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">President</td>
                            <td class="px-6 py-4">Jay Millena</td>
                            <td class="px-6 py-4">7,000,000,0000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button
                class="mt-6 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded"
                onclick="goToBallot()"
            >
                Go Back to Ballot
            </button>
        </div>
    </div>
</x-app-layout>
