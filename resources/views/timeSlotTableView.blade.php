@extends("layouts.layout")

@section("content")

<table class="table-bordered">
    <thead>
        <tr>
            <th>Dato</th>
            <th>klokkeslett</th>
            <th>Sted</th>
            <th>LA</th>
            <th>Tema</th>
            <th>Ledig/ikke ledig</th>
        </tr>
    </thead>
    <tbody>
        @foreach($timeSlots as $timeSlot)
            <tr>
                <td>{{$timeSlot -> date}}</td>
                <td>{{$timeSlot -> start_time}}</td>
                <td>{{$timeSlot -> location}}</td>
                <td>{{$timeSlot -> tutor_id}}</td>
                <td>{{$timeSlot -> description}}</td>
                @if ($timeSlot -> booked_by != null)  <!-- Booket time -->
                    <td>Booket</td>
                @else <!-- Ledig time -->
                    <td>
                        <form method='POST' action='/bookTimeSlot' id='{{$timeSlot -> timeslot_id}}timeSlotForm'>
                            @csrf
                            <input name="timeSlotId" type="hidden" value="{{$timeSlot->timeslot_id}}">
                            <input name="timeSlotDate" type="hidden" value="{{$timeSlot->date}}">
                            <input type="submit" value="Book time">
                        </form>
                    </td>
                @endif
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection