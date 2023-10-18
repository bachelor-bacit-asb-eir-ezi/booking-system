@extends("layouts.layout")

@section("content")
<div>
    <form>
        <!--$timeSlot er en matrise som ineholder objectet, derfor er foreach brukt for å hente objectet ut av matrisen-->
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
            @if(!$slot -> booked_by == null)
                <label for="bookedBy">Bestilt av:</label>
                <input class="form-control" name="bookedBy" readonly type="text" value="{{ $slot->booked_by }}">
            @endif
        @endforeach
    </form>
    @foreach($timeSlot as $slot)
        @if(!$slot -> booked_by)
            <form method="POST" action="/bookTimeSlot">
                @csrf
                <input name="timeSlotId" type="hidden" value="{{$slot->timeslot_id}}">
                <input name="timeSlotDate" type="hidden" value="{{$slot->date}}">
                <input type="submit" value="Book veilednings time">
            </form>
        @else
            <form method="POST" action="/unBookTimeSlot">
                @csrf
                <input name="timeSlotId" type="hidden" value="{{$slot->timeslot_id}}">
                <input name="timeSlotDate" type="hidden" value="{{$slot->date}}">
                <input type="submit" value="Unbook veilednings time">
            </form>
        @endif
    @endforeach
    <form action="/timeslot">
        <input type="submit" value="Tilbake">
    </form>
</div>
@endsection