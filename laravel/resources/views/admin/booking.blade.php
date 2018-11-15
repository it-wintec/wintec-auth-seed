@extends('layouts.jack')

@section('style')
    <style>
        .tbtimetable td { height : 50px; line-height : 50px; text-align : center; padding : 0; }
        .tbtimetable .tdweek { width : 200px; background-color : #942A25; color : white; font-weight : bold; }
        .tbtimetable .tdday { height : inherit; }
        .tbtimetable .tdday div { font-size : 4em; line-height : 1em; padding-top : 20px; }
        .tbtimetable td.active {
            color            : white;
            cursor           : pointer;
            background       : #007bff;
            background-image : repeating-linear-gradient(45deg, hsla(0, 0%, 100%, .1), hsla(0, 0%, 100%, .1) 15px, transparent 0, transparent 30px), repeating-linear-gradient(-45deg, hsla(0, 0%, 100%, .1), hsla(0, 0%, 100%, .1) 15px, transparent 0, transparent 30px);
        }
        .tbdetail tr td:last-child { text-align : left; }
    </style>
@endsection

@section('content')
    <div class="list-container">
    </div>
@endsection

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.28/sweetalert2.all.min.js"></script>

    <script>

        var bookingList = {!!$list!!};
        $(function () {
            tableInit();
            tableSetData();

            // time pick
            $(document).on("click", ".tbtimetable td.active", function () {
                var booking = $(this).data('booking');
                var html = '<table class="table tbdetail">';
                html += '<tr><td>Guest : </td><td>' + booking.name + '</td></tr>';
                html += '<tr><td>Phone : </td><td><a target="_blank" href="tel:' + booking.phone + '">' + booking.phone + '</a></td></tr>';
                html += '<tr><td>Email : </td><td><a target="_blank" href="mailto:' + booking.email + '">' + booking.email + '</a></td></tr>';
                html += '<tr><td>Service : </td><td>' + booking.style + '</td></tr>';
                html += '</table>';
                swal({
                    title: 'Booking Detail',
                    html: html,
                    showConfirmButton: false,
                })
            });

        });

        // table html init
        function tableInit() {
            var dayNumber = getDayNumber();
            for (var i = 0; i <= dayNumber; i++) {
                var currentday = moment().add(i, 'days');
                var table = $("<table>", {class: "table table-bordered tbtimetable"});
                table.append('<tr><td class="tdweek">' + currentday.format('dddd') + '</td><td>08:00</td><td>09:00</td><td>10:00</td><td>11:00</td><td>12:00</td><td>13:00</td><td>14:00</td><td>15:00</td><td>16:00</td><td>17:00</td></tr>');
                table.append('<tr><td class="tdday" rowspan="3"><div>' + currentday.date() + '</div><span>' + currentday.format('MMMM') + '</span></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                table.append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                table.append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                $('.list-container').append($("<div>", {class: "table-responsive"}).append(table));
            }
        }

        // set data to table
        function tableSetData() {
            var currentday = moment().startOf('day');
            $.each(bookingList, function () {
                var sdate = moment(this.sdate, 'YYYY-MM-DD');
                var stime = this.stime;
                var staff = this.staff;
                if (staff == 1) { // the second row has a day td
                    stime++;
                }
                var index = sdate.diff(currentday, 'days');
                var table = $('.list-container table')[index];

                var tr = $(table).find('tr')[staff];
                var td = $(tr).find('td')[stime];
                $(td).data('booking', this);
                $(td).addClass('active');
                $(td).text(this.style);
            });
        }

        // get the day number
        function getDayNumber() {
            var start = moment().startOf('day').add(6, 'days');
            $.each(bookingList, function () {
                var sdate = moment(this.sdate, 'YYYY-MM-DD');
                if (sdate.isAfter(start)) {
                    start = sdate;
                }
            });
            return start.diff(moment().startOf('day'), 'days');
        }

    </script>
@endsection
