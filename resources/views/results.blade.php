<x-app-layout>
    <style>
        table tbody tr.first-row {
            background-color: #ffffff;
            color: green;
        }
    </style>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">Election Results</h1>
            <div class="overflow-hidden bg-white text-blue-900 rounded-lg shadow-lg">
                <table class="w-full border-collapse">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">Position</th>
                            <th class="px-6 py-4 text-left">Candidate</th>
                            <th class="px-6 py-4 text-left">Votes</th>
                        </tr>
                    </thead>
                    <tbody id="results-body">
                        @forelse($presidents as $index => $president)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">President</td>
                                <td class="px-6 py-4">{{ $president->name }}</td>
                                <td class="px-6 py-4">{{ $president->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for President</td>
                            </tr>
                        @endforelse

                        @forelse($vice_presidents as $index => $vice_president)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">Vice President</td>
                                <td class="px-6 py-4">{{ $vice_president->name }}</td>
                                <td class="px-6 py-4">{{ $vice_president->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for Vice President</td>
                            </tr>
                        @endforelse

                        @forelse($secretaries as $index => $secretary)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">Secretary</td>
                                <td class="px-6 py-4">{{ $secretary->name }}</td>
                                <td class="px-6 py-4">{{ $secretary->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for Secretary</td>
                            </tr>
                        @endforelse

                        @forelse($treasurers as $index => $treasurer)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">Treasurer</td>
                                <td class="px-6 py-4">{{ $treasurer->name }}</td>
                                <td class="px-6 py-4">{{ $treasurer->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for Treasurer</td>
                            </tr>
                        @endforelse

                        @forelse($pios as $index => $pio)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">P.I.O</td>
                                <td class="px-6 py-4">{{ $pio->name }}</td>
                                <td class="px-6 py-4">{{ $pio->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for P.I.O</td>
                            </tr>
                        @endforelse

                        @forelse($peace_officers as $index => $peace_officer)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">Peace Officer</td>
                                <td class="px-6 py-4">{{ $peace_officer->name }}</td>
                                <td class="px-6 py-4">{{ $peace_officer->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for Peace Officer</td>
                            </tr>
                        @endforelse

                        @forelse($business_managers as $index => $business_manager)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                                <td class="px-6 py-4">Business Manager</td>
                                <td class="px-6 py-4">{{ $business_manager->name }}</td>
                                <td class="px-6 py-4">{{ $business_manager->votes }}</td>
                            </tr>
                        @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4" colspan="3">No Candidate for Business Manager</td>
                            </tr>
                        @endforelse

                        @forelse($auditors as $index => $auditor)
                            <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
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
            <a href="{{ route('ballots.index') }}" class="mt-2">
                <button class="mt-6 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded">
                    Go Back to Ballot
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
