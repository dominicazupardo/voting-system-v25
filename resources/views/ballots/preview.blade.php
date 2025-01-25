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
          <h1 class="text-3xl font-bold mb-6">Official Ballot</h1>
          <form id="ballotForm" action="{{ route('ballot.cast') }}" method="POST">
              @csrf
              <div class="flex items-center space-x-2">
                <label for="president" class="block font-semibold">President: </label>
                <span>{{ isset($ballots->president) ? $ballots->president : 'No selected candidate' }}</span>
                <input type="hidden" name="president" value="{{ $ballots->president }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="vice_president" class="block font-semibold">Vice President: </label>
                <span>{{ isset($ballots->vice_president) ? $ballots->vice_president : 'No selected candidate' }}</span>
                <input type="hidden" name="vice_president" value="{{ $ballots->vice_president }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="secretary" class="block font-semibold">Secretary: </label>
                <span>{{ isset($ballots->secretary) ? $ballots->secretary : 'No selected candidate' }}</span>
                <input type="hidden" name="secretary" value="{{ $ballots->secretary }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="treasurer" class="block font-semibold">Treasurer: </label>
                <span>{{ isset($ballots->treasurer) ? $ballots->treasurer : 'No selected candidate' }}</span>
                <input type="hidden" name="treasurer" value="{{ $ballots->treasurer }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="auditor" class="block font-semibold">Auditor: </label>
                <span>{{ isset($ballots->auditor) ? $ballots->auditor : 'No selected candidate' }}</span>
                <input type="hidden" name="auditor" value="{{ $ballots->auditor }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="pio" class="block font-semibold">P.I.O.: </label>
                <span>{{ isset($ballots->pio) ? $ballots->pio : 'No selected candidate' }}</span>
                <input type="hidden" name="pio" value="{{ $ballots->pio }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="business_manager_1" class="block font-semibold">Business Manager 1: </label>
                <span>{{ isset($ballots->business_manager_1) ? $ballots->business_manager_1 : 'No selected candidate' }}</span>
                <input type="hidden" name="business_manager_1" value="{{ $ballots->business_manager_1 }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="business_manager_2" class="block font-semibold">Business Manager 2: </label>
                <span>{{ isset($ballots->business_manager_2) ? $ballots->business_manager_2 : 'No selected candidate' }}</span>
                <input type="hidden" name="business_manager_2" value="{{ $ballots->business_manager_2 }}" />
              </div>              
              <div class="flex items-center space-x-2">
                <label for="peace_officer_1" class="block font-semibold">Peace Officer 1: </label>
                <span>{{ isset($ballots->peace_officer_1) ? $ballots->peace_officer_1 : 'No selected candidate' }}</span>
                <input type="hidden" name="peace_officer_1" value="{{ $ballots->peace_officer_1 }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="peace_officer_2" class="block font-semibold">Peace Officer 2: </label>
                <span>{{ isset($ballots->peace_officer_2) ? $ballots->peace_officer_2 : 'No selected candidate' }}</span>
                <input type="hidden" name="peace_officer_2" value="{{ $ballots->peace_officer_2 }}" />
              </div>
              <div class="flex items-center space-x-2 gap-2 mt-2">
                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                    Cast the Votes
                </button>

                <a href="{{ url()->previous() }}">
                  <button type="button" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                    Back
                  </button>
                </a>
              </div>
          </form>

          <!-- Confirmation Section -->
          <div id="confirmation" class="mt-10 hidden">
              <h2 class="text-2xl font-bold mb-6">Your Selections</h2>
              <div class="space-y-4">
                  <p><strong>President:</strong> <span id="preview-president"></span></p>
                  <p><strong>Vice President:</strong> <span id="preview-vp"></span></p>
                  <p><strong>Secretary:</strong> <span id="preview-secretary"></span></p>
                  <p><strong>Treasurer:</strong> <span id="preview-treasurer"></span></p>
                  <p><strong>P.I.O:</strong> <span id="preview-pio"></span></p>
                  <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
                  <p><strong>Business Manager:</strong> <span id="preview-business-manager"></span></p>
              </div>
              <div class="mt-6 space-x-4">
                  <button class="bg-green-600 text-white font-semibold py-2 px-4 rounded hover:bg-green-700" onclick="confirmSubmission()">
                      Confirm Submission
                  </button>
                  <a href="{{ route('dashboard') }}">
                      <button type="button" class="bg-gray-600 text-white font-semibold py-2 px-4 rounded hover:bg-gray-700">
                          Go Back to Candidates
                      </button>
                  </a>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
