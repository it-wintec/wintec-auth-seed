<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '模板里面的title') }}</title>

    <link href="//fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css"/>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.css"/>
    <!-- Styles -->
    <style>


        /* ---------------------------------------------------------
            global
        --------------------------------------------------------- */
        * { font-family : 'Abel', sans-serif; }
        /* ---------------------------------------------------------
            full screen modal
        --------------------------------------------------------- */
        .modal { padding : 0 !important; }
        .modal-dialog {
            width     : 100%;
            max-width : 100%;
            height    : 100%;
            margin    : 0;
            padding   : 0;
        }
        .modal-content {
            height        : auto;
            min-height    : 100%;
            border        : none;
            border-radius : 0;
        }
        .modal-body { padding : 0; }
        /* ---------------------------------------------------------
            date picker
        --------------------------------------------------------- */
        .bootstrap-datetimepicker-widget table td.day { line-height : 35px; }
        .bootstrap-datetimepicker-widget table th { line-height : 35px; }
        .bootstrap-datetimepicker-widget table td, .bootstrap-datetimepicker-widget table th { border-radius : 0; }
        /* ---------------------------------------------------------
            timetable
        --------------------------------------------------------- */
        .tbtimetable td, .tbtimetable th { height : 40px; line-height : 16px; text-align : center; padding-left : 0; padding-right : 0; }
        .tbtimetable th {
            background-color : #00A699;
            color            : white; }
        .tbtimetable td {
            background : linear-gradient(45deg, #fff 25%, #fdfdfd 0, #fdfdfd 50%, #fff 0, #fff 75%, #fdfdfd 0); }
        .tbtimetable td.disable {
            cursor     : not-allowed;
            background : repeating-linear-gradient(45deg, #ddd, #ddd 15px, #ccc 0, #ccc 30px);
        }
        .tbtimetable td.active {
            background       : #007bff;
            background-image : repeating-linear-gradient(45deg, hsla(0, 0%, 100%, .1), hsla(0, 0%, 100%, .1) 15px, transparent 0, transparent 30px), repeating-linear-gradient(-45deg, hsla(0, 0%, 100%, .1), hsla(0, 0%, 100%, .1) 15px, transparent 0, transparent 30px);
        }
        .tbtimetable.tb2 th { width : 25%; }
        /* ---------------------------------------------------------
            media
        --------------------------------------------------------- */
        @media (max-width : 575.98px) {
            .tbtimetable.tb1 { display : none; }
            .tbtimetable.tb2 { display : table; }
            .btnSave { width : 100%; }
        }
        @media (min-width : 575.99px) {
            .tbtimetable.tb1 { display : table; }
            .tbtimetable.tb2 { display : none; }
        }


    </style>
</head>
<body>


<div class="container-fluid mt-2 mb-5">
    <div class="row">
        <div class="col  my-3 text-center">
            <h1>Online Booking</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">

            <div id="datetimepicker13"></div>

        </div>
        <div class="col-md-8">

            <div class="mb-5">
                <div class="container-table"></div>

                <div class="text-secondary">Please click on the grid above to select a time.</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtName">Name</label> <label class="text-danger">*</label>
                        <input id="txtName" name="txtName" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtPhone">Phone</label> <label class="text-danger">*</label>
                        <input id="txtPhone" name="txtPhone" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="txtEmail">Email</label> <label class="text-danger">*</label>
                        <input id="txtEmail" name="txtEmail" type="text" class="form-control">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <button type="button" class="btn btn-primary btnSave" data-color="mint" data-size="s">
                <strong>Save Booking</strong>
            </button>
        </div>
    </div>
</div>


<script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.28/sweetalert2.all.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>

<script type="text/javascript">

    var btnLadda, disableJson, sid;
    var url = new URL(location.href);
    var sidurl = url.searchParams.get("sid");
    switch (sidurl) {
        case '2':
            sid = 2;
            break;
        case '3':
            sid = 3;
            break;
        default:
            sid = 1;
    }

    $(function () {
        commonInit();
        datePickerInit();
        timePickerInit();
        submitBooking();
    });

    // common init
    function commonInit() {
        // toastr
        toastr.options = {
            "positionClass": "toast-top-center",
        };

        // ladda
        btnLadda = Ladda.create(document.querySelector('.btnSave'));

        // data init
        var params = {type: 'GETBOOKINGS'};
        fetch('/api/barber', {
            method: "POST",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(params)
        }).then(function (res) {
            if (res.ok) {
                return res.json();
            }
        }).then(function (json) {
            disableJson = json.body;
            timeDataDisableSet();
        });
    }

    // init date picker
    function datePickerInit() {
        // date pick
        $('#datetimepicker13').datetimepicker({
            format: 'YYYY-MM-DD',
            inline: true,
            sideBySide: true,
            minDate: moment(),
            maxDate: moment().add(60, 'd'),
        });
        $("#datetimepicker13").on("change.datetimepicker", function (e) {
            // selected a date
            timeDataDisableSet();
        });
    }

    // generate two tables
    function timePickerInit() {

        var tb1 = $("<table>", {class: "table table-bordered mb-0 tbtimetable tb1"});
        tb1.append("<tr><th>08:00</th><th>09:00</th><th>10:00</th><th>11:00</th><th>12:00</th><th>13:00</th><th>14:00</th><th>15:00</th><th>16:00</th><th>17:00</th></tr>");
        for (var j = 0; j < 3; j++) {
            tb1.append("<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
        }
        $('.container-table').append(tb1);

        var tb2 = $("<table>", {class: "table table-bordered mb-0 tbtimetable tb2"});
        for (var j = 8; j <= 17; j++) {
            tb2.append("<tr><th>" + j + ":00</th><td></td><td></td><td></td></tr>");
        }
        $('.container-table').append(tb2);


        // time pick
        $(document).on("click", ".tbtimetable td", function () {
            if ($(this).hasClass('disable')) {
                toastr.warning("The selected time is not available!");
            } else {
                $('.tbtimetable td').removeClass('active');
                $(this).addClass('active');
            }
        });
    }

    // time picker data init
    function timeDataDisableSet() {
        $('.tbtimetable td').removeClass('active');
        $('.tbtimetable td').removeClass('disable');
        var curDate = moment($('#datetimepicker13').data("date"), 'YYYY-MM-DD');
        $.each(disableJson, function () {
            var sdate = moment(this.sdate, 'YYYY-MM-DD');
            if (curDate.isSame(sdate, 'day')) {
                var tr = $('.tbtimetable.tb1').find('tr')[this.staff];
                var td = $(tr).find('td')[this.stime];
                $(td).addClass('disable');

                var tr = $('.tbtimetable.tb2').find('tr')[this.stime];
                var td = $(tr).find('td')[this.staff - 1];
                $(td).addClass('disable');
            }
        });
    }

    // submit to server
    function submitBooking() {

        $(document).on("click", ".btnSave", function () {
            var sdate = $('#datetimepicker13').data("date");
            var timetable = $('.tbtimetable td.active');
            if (!timetable.length) {
                swal("", "Please choose a time");
                return;
            }
            var stime = timetable.index();
            var staff = timetable.parent().index();
            var name = $('#txtName').val();
            var phone = $('#txtPhone').val();
            var email = $('#txtEmail').val();
            if (!name || !phone || !email) {
                swal("", "Please complete the contact information", "");
                return;
            }
            var params = {
                name: name,
                name: name,
                phone: phone,
                email: email,
                sid: sid,
                sdate: sdate,
                stime: stime,
                staff: staff,
            };
            params.type = 'SAVEBOOKING';

            btnLadda.start();
            var promise = $.ajax({
                url: "/api/barber",
                method: "POST",
                data: params,
                cache: false
            });
            promise.done(function (result) {
                btnLadda.stop();
                var json = JSON.parse(result);
                if (json.code == 0) {
                    swal("Booking Success").then((value) => {
                        $('#JackModal').modal('hide');
                    });
                } else {
                    swal("Booking Failed", json.body);
                }
            });
        });

    }

</script>

</body>
</html>
