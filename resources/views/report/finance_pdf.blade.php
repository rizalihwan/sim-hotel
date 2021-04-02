<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Finance Report</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-secondary"><u>{{ $now->format('D, m Y') }}</u></h6>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: center;">
                    <div>
                        <strong>Bukti Pendapatan Booking HRI Hotel</strong>
                    </div>
                    <small style="margin : 0px; display: block;">Alamat : Kp tenggek, Desa Cimande hilir Kecamatan caringin, Kabupaten bogor, kode POS : 16730</small>
                    <small style="margin : 0px; display: block;">Linkedln : rizalihwan</small>
                    <small style="margin : 0px; display: block;">Email : rizalihwan94@gmail.com</small>
                    <p style="margin : 0px;">HP/WA : 085770254568</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table border="1" width="100%" cellspacing="0" cellpadding="10" class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Booking Code</th>
                            <th>Income</th>
                        </tr>
                        @forelse ($bookings as $booking)
                            @php
                                $check_out = date_create($booking['check_out']);
                                $check_in = date_create($booking['check_in']);
                                $calculate = date_diff($check_out, $check_in);
                                $day = $calculate->format("%a");
                                $price = $day * $booking->room->price;
                                $total = ($total ?? 0) + $price;
                            @endphp
                            <tr>
                                <th style="text-align : right;">{{ $loop->iteration . '.' }}</th>
                                <td style="text-align : right;">{{ $booking->booking_code }}</td>
                                <td style="text-align : right;">
                                    <span class="badge badge-light">{{ "Rp. " . number_format($price, 0,',','.') }}<span>
                                </td>
                            </tr>   
                        @empty
                            <tr>
                                <th colspan="3" style="color: red; text-align: center;">Data Empty!</th>
                            </tr>    
                        @endforelse
                            <tr>
                                <td colspan="2" style="text-align: right;"><small>TOTAL :</small></td>
                                <th style="text-align: right;"><span class="badge badge-danger justify-content-end">{{ "Rp. " . number_format($total ?? 0, 0,',','.') }}<span></th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
