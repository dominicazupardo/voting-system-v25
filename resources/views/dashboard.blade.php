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
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Registrations</a>
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
                        @forelse($presidents as $president)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">President</td>
                            <td class="px-6 py-4">{{ $president->name }}</td>
                            <td class="px-6 py-4">{{ $president->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for President</td>
                        </tr>
                        @endforelse

                        @forelse($vice_presidents as $vice_president)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">Vice President</td>
                            <td class="px-6 py-4">{{ $vice_president->name }}</td>
                            <td class="px-6 py-4">{{ $vice_president->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for Vice President</td>
                        </tr>
                        @endforelse

                        @forelse($secretaries as $secretary)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">Secretary</td>
                            <td class="px-6 py-4">{{ $secretary->name }}</td>
                            <td class="px-6 py-4">{{ $secretary->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for Secretary</td>
                        </tr>
                        @endforelse

                        @forelse($treasurers as $treasurer)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">Treasurer</td>
                            <td class="px-6 py-4">{{ $treasurer->name }}</td>
                            <td class="px-6 py-4">{{ $treasurer->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for Treasurer</td>
                        </tr>
                        @endforelse

                        @forelse($pios as $pio)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">P.I.O</td>
                            <td class="px-6 py-4">{{ $pio->name }}</td>
                            <td class="px-6 py-4">{{ $pio->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for P.I.O</td>
                        </tr>
                        @endforelse

                        @forelse($business_managers as $business_manager)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">Business Manager</td>
                            <td class="px-6 py-4">{{ $business_manager->name }}</td>
                            <td class="px-6 py-4">{{ $business_manager->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for Business Manager</td>
                        </tr>
                        @endforelse

                        @forelse($auditors as $auditor)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">Auditor</td>
                            <td class="px-6 py-4">{{ $auditor->name }}</td>
                            <td class="px-6 py-4">{{ $auditor->votes }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4" colspan="3">No Candidate for Auditor</td>
                        </tr>
                        @endforelse
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
