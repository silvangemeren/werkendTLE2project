@props(['vacancy'])

@if($vacancy)
    <div>
        <h1>{{ $vacancy->title }}</h1>
        <h1>{{ $vacancy->description }}</h1>
        <h1>{{ $vacancy->location }}</h1>
        <h1>{{ $vacancy->function }}</h1>
        <h1>{{ $vacancy['work-hours'] }}</h1>
        <h1>{{ $vacancy->salary }}</h1>
        <img src="{{ asset('/storage/images/' . $vacancy->imageUrl) }}">
    </div>
@endif
