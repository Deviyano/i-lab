
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluaties</title>
    <link rel="stylesheet" href="{{ asset('css/Evaluations.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .error {
            color: red;
            font-size: 0.9em;
        }

        #answers {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }

        #answers p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Evaluaties</h1>

    {{-- Succesbericht --}}
    @if(session('success'))
        <p style="color: black;">{{ session('success') }}</p>
    @endif

    {{-- Formulier voor nieuwe evaluatie --}}
    <h2>Nieuwe Evaluatie</h2>
    @if($errors->any())
        <div style="color: red;">
        </div>
    @endif

    <form method="POST" action="{{ route('evaluations.store') }}">
        @csrf

        <label for="vraag1">Wat vond je van deze opdrachten:</label><br>
        <textarea name="vraag1" id="vraag1">{{ old('vraag1') }}</textarea>
        @error('vraag1')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="vraag2">Wat kan er beter:</label><br>
        <textarea name="vraag2" id="vraag2">{{ old('vraag2') }}</textarea>
        @error('vraag2')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="vraag3">Waarom vind je dat?:</label><br>
        <textarea name="vraag3" id="vraag3">{{ old('vraag3') }}</textarea>
        @error('vraag3')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>
        <button type="submit">Opslaan</button>
    </form>

    
</body>
</html>

