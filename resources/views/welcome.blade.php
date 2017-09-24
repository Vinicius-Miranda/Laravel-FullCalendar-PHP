<?php
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href='/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        <link href='/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='/fullcalendar/lib/moment.min.js'></script>
        <script src='/fullcalendar/lib/jquery.min.js'></script>
        <script src='/fullcalendar/fullcalendar.min.js'></script>
        <script>

            $(document).ready(function () {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '{{$dataAtual}}',
                    navLinks: true, // can click day/week names to navigate views
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end) {
                        var title = prompt('Event Title:');
                        var eventData;
                        if (title) {
                            eventData = {
                                title: title,
                                start: start,
                                end: end
                            };
                            $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                        }
                        $('#calendar').fullCalendar('unselect');
                    },
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                        {
                            title: 'All Day Event',
                            start: '{{ date("Y-m-d", strtotime("+2 days",strtotime($dataAtual))) }}'
                        },
                        {
                            title: 'Long Event',
                            start: '{{ date("Y-m-d", strtotime("-5 days",strtotime($dataAtual))) }}',
                            end: '{{ date("Y-m-d", strtotime("-3 days",strtotime($dataAtual))) }}'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '{{ date("Y-m-d", strtotime("-12 days",strtotime($dataAtual))) }}'
                        },
                        {
                            title: 'Conference',
                            start: '{{ date("Y-m-d", strtotime("-7 days",strtotime($dataAtual))) }}',
                            end: '{{ date("Y-m-d", strtotime("-6 days",strtotime($dataAtual))) }}'
                        },
                        {
                            title: 'Workshop',
                            start: '{{ date("Y-m-d", strtotime("+3 days",strtotime($dataAtual))) }}',
                            end: '{{ date("Y-m-d", strtotime("+5 days",strtotime($dataAtual))) }}'
                        }
                    ]
                });

            });

        </script>
        <style>

            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }

            #calendar {
                max-width: 900px;
                margin: 0 auto;
            }

        </style>
    </head>
    <body>

        <div id='calendar'></div>

    </body>
</html>
