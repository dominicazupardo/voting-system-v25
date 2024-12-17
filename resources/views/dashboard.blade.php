<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #003399;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h3 {
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 10px 0;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            flex-grow: 1;
            padding: 40px;
            background: linear-gradient(to bottom right, #e0f7ff, #a1caff);
        }

        h1 {
            margin-bottom: 20px;
            color: #003399;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #003399;
            color: white;
        }

        .back-btn {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-btn:hover {
            background-color: #cc6600;
        }
    </style>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="hyas.html">
        <h3>Homepage</h3></a>
        <p><strong>Student:</strong> Student 1</p>
        <a href="ballot.html">Vote Again</a>
        <a href="#logout">Log Out</a>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h1>Election Results</h1>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody id="results-body">
                <!-- Results will be inserted dynamically by JavaScript -->
            </tbody>
        </table>
        <button class="back-btn" onclick="goToBallot()">Go Back to Ballot</button>
    </div>

    <script>
        // Simulated vote data
        const voteData = {
            president: [
                { candidate: "Candidate 1", votes: 35 },
                { candidate: "Candidate 2", votes: 42 }
            ],
            vicePresident: [
                { candidate: "Candidate 1", votes: 50 },
                { candidate: "Candidate 2", votes: 30 }
            ],
            secretary: [
                { candidate: "Candidate 1", votes: 28 },
                { candidate: "Candidate 2", votes: 40 }
            ],
            treasurer: [
                { candidate: "Candidate 1", votes: 45 },
                { candidate: "Candidate 2", votes: 38 }
            ],
            pio: [
                { candidate: "Candidate 1", votes: 22 },
                { candidate: "Candidate 2", votes: 47 }
            ],
            auditor: [
                { candidate: "Candidate 1", votes: 41 },
                { candidate: "Candidate 2", votes: 39 }
            ],
            businessManager: [
                { candidate: "Candidate 1", votes: 34 },
                { candidate: "Candidate 2", votes: 49 }
            ]
        };

        // Function to populate the results table
        function populateResults() {
            const resultsBody = document.getElementById("results-body");
            resultsBody.innerHTML = ""; // Clear the table

            // Iterate over each position and its data
            for (const [position, candidates] of Object.entries(voteData)) {
                candidates.forEach(candidate => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${capitalize(position)}</td>
                        <td>${candidate.candidate}</td>
                        <td>${candidate.votes}</td>
                    `;
                    resultsBody.appendChild(row);
                });
            }
        }

        // Helper function to capitalize position names
        function capitalize(word) {
            return word.replace(/([A-Z])/g, " $1")
                        .replace(/^./, str => str.toUpperCase());
        }

        // Go back to the ballot page
        function goToBallot() {
            window.location.href = "ballot.html";
        }

        // Populate the table on page load
        populateResults();
    </script>
</x-app-layout>
