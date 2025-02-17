<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-blue-900 text-white flex flex-col p-6 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="mb-8">
                <h3 class="text-2xl font-bold">Homepage</h3>
            </a>
            <p class="mb-6"><strong>Student:</strong> {{ Auth::user()->name }}</p>
            <nav class="space-y-4">
                <a href="{{ route('ballots.index') }}" class="hover:underline block">Ballot</a>
                <a href="{{ route('dashboard') }}" class="hover:underline block">Results</a>
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Registrations</a>
            </nav>
        </div>

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">List of Candidates for Business Manager</h1>
            <div class="overflow-hidden bg-blue-900 rounded-lg shadow-lg">
                <table class="w-full border-collapse">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">Name of Candidates</th>
                            <th class="px-6 py-4 text-left">Candidate ID.</th>
                            <th class="px-6 py-4 text-left">Party List</th>
                        </tr>
                    </thead>
                    <tbody id="results-body">
                        @forelse($business_managers as $business_manager)
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-6 py-4">{{ $business_manager->name }}</td>
                            <td class="px-6 py-4">{{ sprintf("BM-%s-00%s", date('Y'), $business_manager->id) }}</td>
                            <td class="px-6 py-4">{{ $business_manager->partylist_name }}</td>
                        </tr>
                        @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td colspan="3" class="px-6 py-4">Empty Record!</td>
                        </tr>
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <h1 class="text-3xl font-bold mb-6">Registration</h1>
            <form action="{{ route('business_managers.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block font-semibold">Name</label>
                    <input type="text" name="name" placeholder="Candidate for Business Manager">
                </div>

                <div>
                    <label for="canidate_no" class="block font-semibold">Candidate No</label>
                    <input type="number" name="candidate_no" placeholder="Candidate no." value="{{ $business_managers->count() + 1 }}" readonly>
                </div>

                <div>
                    <label for="partylist_name" class="block font-semibold">Party List</label>
                    <input type="text" name="partylist_name" placeholder="Party List" value="">
                </div>

                <div class="mt-6 space-x-4">
                    <input type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" value="Add Candidate">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
