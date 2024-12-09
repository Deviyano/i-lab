<!DOCTYPE html>
<html>
<head>
    <title>Evaluaties</title>
</head>
<body>
    <h1>Evaluaties</h1>

    {{-- Succesbericht --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Formulier voor nieuwe evaluatie --}}
    <h2>Nieuwe Evaluatie</h2>
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <label for="title">Titel:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Beschrijving:</label><br>
        <textarea name="description" id="description"></textarea><br><br>

        <label for="rating">Beoordeling (1-5):</label><br>
        <input type="number" name="rating" id="rating" min="1" max="5" required><br><br>

        <button type="submit">Opslaan</button>
    </form>

    {{-- Overzicht van evaluaties --}}
    <h2>Alle Evaluaties</h2>
    <ul>
        @forelse($evaluations as $evaluation)
            <li>
                <strong>{{ $evaluation->title }}</strong> - Rating: {{ $evaluation->rating }}
                <p>{{ $evaluation->description }}</p>
            </li>
        @empty
            <p>Er zijn nog geen evaluaties toegevoegd.</p>
        @endforelse
    </ul>
</body>
</html>
