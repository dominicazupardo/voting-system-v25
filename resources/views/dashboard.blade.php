<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white flex flex-col p-6">
            <a href="{{ route('dashboard') }}" class="mb-8">
                <h3 class="text-2xl font-bold">Homepage</h3>
            </a>
            <p class="mb-6"><strong>Student:</strong> {{ Auth::user()->name }}</p>
            <nav class="space-y-4">
                <a href="ballot.html" class="hover:underline block">Vote Again</a>
                <a href="{{ route('ballots.index') }}" class="hover:underline block">Ballot</a>
                <a href="{{ route('dashboard') }}" class="hover:underline block">Results</a>
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Candidates</a>
            </nav>
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
            <a href="{{ route('ballots.index') }}">
                <button class="mt-6 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded">
                    Go Back to Ballot
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
