<html lang="en">
<head>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .header {
            color: rgb(252, 0, 126);
            text-align: center;
            padding: 20px 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 2em;
        }

        .header p {
            font-size: 1em;
        }

        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            table-layout: fixed;
        }

        table, th, td {
            border: 1px solid #E91E63; /* Pink border */
        }

        th, td {
            padding: 8px;
            text-align: left;
            font-size: 0.9em;
            word-wrap: break-word;
        }

        th {
            background-color: #FCE4EC; /* Lighter pink */
            color: #333;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        th:nth-child(1), td:nth-child(1) { width: 5%; } /* Serial Number */
        th:nth-child(2), td:nth-child(2) { width: 15%; } /* Name */
        th:nth-child(3), td:nth-child(3) { width: 20%; } /* Email */
        th:nth-child(4), td:nth-child(4) { width: 15%; } /* Phone */
        th:nth-child(5), td:nth-child(5) { width: 25%; } /* Address */
        th:nth-child(6), td:nth-child(6) { width: 10%; } /* Profession */
        th:nth-child(7), td:nth-child(7) { width: 10%; } /* About */

        .footer {
            position: fixed;
            bottom: 0;
            left: 10px;
            right: 10px;
            text-align: left;
            font-size: 0.9em;
            color: #555;
            background-color: #fff;
            padding: 5px 0;
            border-top: 1px solid #ddd;
        }

        .footer span {
            float: left;
        }

        .footer span.right {
            float: right;
        }

        /* A4 Paper Style */
        @page {
            size: A4;
            margin: 20mm;
        }

        @media print {
            body {
                background-color: white;
            }

            .header {
                page-break-after: avoid;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            .footer {
                position: fixed;
                bottom: 0;
                left: 10px;
                right: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Contact List</h1>
        <p> CMS - Contact Management System</p>

    </div>
    <table>
        <thead>
            <tr>
                <th>No</th> <!-- Serial number column -->
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Profession</th>
                <th>About</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactList as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td> <!-- Display the serial number -->
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->profession }}</td>
                    <td>{{ $contact->about }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <span>Generated on: {{ now()->format('Y-m-d h:i A') }}</span>
        <span class="right">Page: <script>document.write(window.location.pathname)</script></span>
    </div>
</body>
</html>
