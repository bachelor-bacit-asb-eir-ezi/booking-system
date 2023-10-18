@extends("layouts.layout")

@section("content")
<form method="POST" action="/submitTimeSlot">
    @csrf
    <label for="date">Dato:</label>
    <input required name="date" type="date">

    <label for="startTime">Start tid:</label>
    <input required name="startTime" type="time">

    <label for="endTime">Slutt tid:</label>
    <input required name="endTime" type="time">

    <label for="description">Tema:</label>
    <input required name="description" type="text">
    
    <label for="submit"></label>
    <input name="submit" type="submit" value="Opprett">
</form>
@endsection