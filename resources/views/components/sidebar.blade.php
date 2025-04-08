<!-- Sidebar -->
<div class="w-64 bg-blue-900 text-white flex flex-col p-6" style="height: 100%;">
    <a href="{{ route('dashboard') }}" class="mb-8">
        <h3 class="text-2xl font-bold">Homepage</h3>
    </a>
    <p class="mb-2">{{ sprintf('Hi %s!',  ucfirst(Auth::user()->firstname)) }}</p>
    <nav class="space-y-4">
        <a href="{{ route('ballots.index') }}" class="hover:underline block">Ballot</a>
        <a href="{{ route('ballots.results') }}" class="hover:underline block">Results</a>
        @if(Auth::user()->role == 1)
            <a href="{{ route('candidates.index') }}" class="hover:underline block">Registrations</a>
            <a href="{{ route('users.index') }}" class="hover:underline block">User Approval</a>
        @endif
    </nav>
</div>
