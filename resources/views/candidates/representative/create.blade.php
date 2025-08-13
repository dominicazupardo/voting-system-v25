<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-blue-900 text-white flex flex-col p-6 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="mb-8">
                <h3 class="text-2xl font-bold">Homepage</h3>
            </a>
            <nav class="space-y-4">
                <a href="{{ route('ballots.index') }}" class="hover:underline block">Ballot</a>
                <a href="{{ route('ballots.results') }}" class="hover:underline block">Results</a>
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Registrations</a>
            </nav>
        </div>

        <!-- 2-column layout -->
        <div class="flex flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <!-- Candidate List -->
            <div class="w-2/3 pr-8">
                <h1 class="text-3xl font-bold text-blue-900 mb-6">List of Candidates for Year Representative</h1>
                <div class="overflow-hidden bg-blue-900 rounded-lg shadow-lg mb-8">
                    <table class="w-full border-collapse">
                        <thead class="bg-blue-900 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">Name of Candidates</th>
                                <th class="px-6 py-4 text-left">Candidate ID.</th>
                                <th class="px-6 py-4 text-left">Party List</th>
                                <th class="px-6 py-4 text-left">Year</th>
                                <th class="px-6 py-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody id="results-body">
                            @forelse($representatives as $rep)
                            <tr class="border-b bg-white text-blue-900">
                                <td class="px-6 py-4">{{ sprintf("%s %s. %s", $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}</td>
                                <td class="px-6 py-4">{{ sprintf("REP-%s-00%s", date('Y'), $rep->id) }}</td>
                                <td class="px-6 py-4">{{ $rep->partylist_name }}</td>
                                <td class="px-6 py-4">{{ $rep->year }}</td>
                                <td class="px-6 py-4 text-left">
                                    <form action="{{ route('representative.destroy', $rep->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-b bg-white text-blue-900">
                                <td colspan="5" class="px-6 py-4">Empty Record!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Registration Form -->
            <div class="w-1/3 bg-white rounded-xl shadow-lg p-8">
                <h1 class="text-3xl font-bold mb-6">Registration</h1>
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('representative.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="year" value="{{ $year }}">
                    <div>
                        <label for="firstname" class="block font-semibold">First Name</label>
                        <input type="text" name="firstname" placeholder="Candidate's first name" value="" class="w-full border rounded px-2 py-1">
                    </div>
                    <div>
                        <label for="middlename" class="block font-semibold">Middle Name</label>
                        <input type="text" name="middlename" placeholder="Candidate's middle name" value="" class="w-full border rounded px-2 py-1">
                    </div>
                    <div>
                        <label for="lastname" class="block font-semibold">Last Name</label>
                        <input type="text" name="lastname" placeholder="Candidate's last name" value="" class="w-full border rounded px-2 py-1">
                    </div>
                    <div>
                        <label for="image" class="block font-semibold">Choose Image:</label>
                        <input type="file" name="image" class="w-full border rounded px-2 py-1">
                    </div>
                    <div>
                        <label for="candidate_no" class="block font-semibold">Candidate No</label>
                        <input type="number" name="candidate_no" placeholder="Candidate no." value="{{ isset($representatives) ? $representatives->count() + 1 : 1 }}" readonly class="w-full border rounded px-2 py-1">
                    </div>
                    <div>
                        <label for="partylist_name" class="block font-semibold">Party List</label>
                        <input type="text" name="partylist_name" placeholder="Party List" value="" class="w-full border rounded px-2 py-1">
                    </div>
                    <div>
                        <!-- Year Level dropdown removed: registration is separated by year -->
                    </div>
                    <div class="mt-6 space-x-4">
                        <input type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
