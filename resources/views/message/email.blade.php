<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Message</title>
</head>
<body>
    @php
        $check_in = date_create($booking['check_in']);
        $check_out = date_create($booking['check_out']);
        $calculate = date_diff($check_out, $check_in);
        $day = $calculate->format('%a');
        $price = $day * $booking->room->price;
    @endphp
    <h1>👋 Hi, <span>{{ $name }}</span></h1>
    <p>Congratulations, your order has been verified ✅</p>
    <hr>
    <h3><strong>-- Detail Booking --</strong></h3>
    <span>Booking Code : {{ $booking->booking_code }}</span>,
    <span>Room : {{ $booking->room->name }} [ {{ $day }}@if ($day == 1) Day @else Days @endif]</span>,
    <span>Total : {{ 'Rp. ' . number_format($price, 0, ',', '.') }}</span>, 
    <span>Check In : {{ $booking->check_in }}</span>,
    <span>Check Out : {{ $booking->check_out }}</span>, 
</body>
</html>