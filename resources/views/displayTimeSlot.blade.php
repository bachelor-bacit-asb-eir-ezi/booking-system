@extends("layouts.layout")

@section("content")
<div>
    <form>
        <!--$timeSlot er en array som ineholder objectet, derfor er foreach nødvendig-->
        @foreach($timeSlot as $slot)
            <label for="date">Dato:</label>
            <input class="form-control" name="date" readonly type="text" value="{{ $slot->date }}">

            <label for="startTime">Start tid:</label>
            <input class="form-control" name="startTime" readonly type="text" value="{{ $slot->start_time }}">

            <label for="endTime">Slutt tid:</label>
            <input class="form-control" name="endTime" readonly type="text" value="{{ $slot->end_time }}">

            <!--NB! For øyeblikket er det ID til Tutor som blir vist, endre dette til navn FJERN KOMMENTAR NÅR GJORT-->
            <label for="tutor">Veileder tilstede:</label>
            <input class="form-control" name="tutor" readonly type="text" value="{{ $slot->tutor_id }}">

            <label for="description">Tema i fokus:</label>
            <input class="form-control" name="description" readonly type="text" value="{{ $slot->description }}">
        @endforeach
    </form>
    <form method="POST" action="/bookTimeSlot">
        @csrf
        @foreach($timeSlot as $slot)
        <input name="timeSlotId" type="hidden" value="{{$slot->timeslot_id}}">
        @endforeach
        <input type="submit" value="Book veilednings time">
    </form>
    <form action="/timeslot">
        <input type="submit" value="Tilbake">
    </form>
</div>
@endsection