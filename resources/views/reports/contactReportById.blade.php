<html lang="en">
<head>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: black; /* Default text color is black */
        }

        .header {
            text-align: center;
            background-color: #f7f7f7;
            color: #E91E63; /* Pink color for header text */
            padding: 40px 20px;
            border-top: 5px solid black;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        .header p {
            margin: 5px 0;
            font-size: 1.2em;
        }

        .container {
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact {
            font-size: 1em;
            line-height: 1.8em;
            text-align: left;
            border-top: 1px solid black;
            padding-top: 15px;
            color: black; /* Ensure contact details are black */
        }

        .contact strong {
            color: black; /* Bolded key details remain black */
        }

        .contact span {
            font-style: italic;
            color: #555; /* Subtle color for additional details */
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .header p {
                font-size: 1em;
            }

            .contact {
                font-size: 0.95em;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.8em;
            }

            .header p {
                font-size: 0.9em;
            }

            .contact {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Information Of {{ $contactList[0]->name }}</h1> <!-- Dynamically insert the first contact's name -->
        <p>Generated on: {{ now()->format('Y-m-d') }}</p>
        <p>Time: {{ now()->format('H:i:s') }}</p>
    </div>
    <div class="container">
        @foreach ($contactList as $contact)
            <div class="contact">
                <strong>{{ $contact->name }}</strong> is a <strong>{{ $contact->profession }}</strong> residing in <strong>{{ $contact->address }}</strong>. You can reach him via email at <strong>{{ $contact->email }}</strong> or call him at <strong>{{ $contact->phone }}</strong>.

            </div>
        @endforeach
    </div>

</body>
</html>
