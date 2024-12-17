<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Ballot</title>
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

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .submit-btn {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #cc6600;
        }

        .confirmation {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .confirmation p {
            font-size: 16px;
        }

        .confirmation button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirmation button:hover {
            background-color: #008000;
        }

        .go-back-btn {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .go-back-btn:hover {
            background-color: #b22222;
        }

        .cancel-btn {
            background-color: gray;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background-color: #666;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="hyas.html">
        <h3>Homepage</h3></a>
        <p><strong>Student:</strong> Student 1</p>
        <a href="#candidates">Candidates</a>
        <a href="#results">Results</a>
        <a href="#logout">Log Out</a>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h1>Official Ballot</h1>
        <form id="ballotForm" onsubmit="return showPreview(event)">
            <label for="president">President</label>
            <select id="president" name="president">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <label for="vp">Vice President</label>
            <select id="vp" name="vp">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <label for="secretary">Secretary</label>
            <select id="secretary" name="secretary">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <label for="treasurer">Treasurer</label>
            <select id="treasurer" name="treasurer">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <label for="pio">P.I.O</label>
            <select id="pio" name="pio">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <label for="auditor">Auditor</label>
            <select id="auditor" name="auditor">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <label for="business-manager">Business Manager</label>
            <select id="business-manager" name="business-manager">
                <option value="">-- Select a Candidate --</option>
                <option value="candidate1">Candidate 1</option>
                <option value="candidate2">Candidate 2</option>
            </select>

            <button type="submit" class="submit-btn">Preview Your Choices</button>
        </form>

        <!-- Confirmation Section (hidden by default) -->
        <div id="confirmation" class="confirmation" style="display: none;">
            <h2>Your Selections</h2>
            <p><strong>President:</strong> <span id="preview-president"></span></p>
            <p><strong>Vice President:</strong> <span id="preview-vp"></span></p>
            <p><strong>Secretary:</strong> <span id="preview-secretary"></span></p>
            <p><strong>Treasurer:</strong> <span id="preview-treasurer"></span></p>
            <p><strong>P.I.O:</strong> <span id="preview-pio"></span></p>
            <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
            <p><strong>Business Manager:</strong> <span id="preview-business-manager"></span></p>
            <button class="submit-btn" onclick="confirmSubmission()">Confirm Submission</button>
            <button class="go-back-btn" onclick="goBackToBallot()">Go Back to Ballot</button>
        </div>
    </div>

    <script>
        function showPreview(event) {
            event.preventDefault();  // Prevent form submission
            
            // Get values from the form
            const president = document.getElementById("president").value;
            const vp = document.getElementById("vp").value;
            const secretary = document.getElementById("secretary").value;
            const treasurer = document.getElementById("treasurer").value;
            const pio = document.getElementById("pio").value;
            const auditor = document.getElementById("auditor").value;
            const businessManager = document.getElementById("business-manager").value;
            
            // Show the preview
            document.getElementById("preview-president").innerText = president || "No selection";
            document.getElementById("preview-vp").innerText = vp || "No selection";
            document.getElementById("preview-secretary").innerText = secretary || "No selection";
            document.getElementById("preview-treasurer").innerText = treasurer || "No selection";
            document.getElementById("preview-pio").innerText = pio || "No selection";
            document.getElementById("preview-auditor").innerText = auditor || "No selection";
            document.getElementById("preview-business-manager").innerText = businessManager || "No selection";
            
            // Hide the form and show the confirmation
            document.querySelector("form").style.display = "none";
            document.getElementById("confirmation").style.display = "block";
        }

        function confirmSubmission() {
            alert("Your vote has been successfully submitted!");
            // Redirect to the results or confirmation page
            window.location.href = "resu.html";  // Replace with the actual redirect page
        }

        function goBackToBallot() {
            document.querySelector("form").style.display = "block";
            document.getElementById("confirmation").style.display = "none";
        }
    </script>

</body>
</html>
