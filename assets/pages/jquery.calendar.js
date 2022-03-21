/**
* Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
* Author: Mannatthemes
* Component: Full-Calendar
*/


$(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /*  className colors

     className: default(transparent), important(red), chill(pink), success(green), info(blue)

     */


    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });
    /* initalize data from server */
    $.ajax({
        type:"POST",
        url:'/data/API_006.php',
        dataType:'json',
        data:"data="+JSON.stringify({DataType:"JSON",option:1,education:-1}),
        success:function(data){
            if(data.code == 0){
                /* initialize the calendar
                -----------------------------------------------------------------*/

                var calendar =  $('#calendar').fullCalendar({
                    header: {
                        left: 'title',
                        center: 'agendaWeek,month',
                        right: 'prev,next today'
                    },
                
                    editable: false,
                    firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
                    selectable: true,
                    defaultView: 'month',
                    
                    views: {
                        agenda: {
                            columnFormat: {
                            slotLabelFormat: 'ddd',
                            month: 'dddd',    // Monday, Wednesday, etc
                            week: 'dddd, MMM dS', // Monday 9/7
                            day: 'dddd, MMM dS'  // Monday 9/7
                        }
                            // options apply to agendaWeek and agendaDay views
                        }
                    },
                    displayEventTime: false,
                    week:{ titleFormat: "DD MMMM YYYY" },
                    allDaySlot: false,
                    events: data.data,
                });
            }
        }
    });
});


